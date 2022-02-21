# Infrastructure
Some instructions to bring up the infrastructure for the servers.

## Create a server
Ubuntu 20.04 would be the best choice. Any provider can be used.

## Install docker
```shell
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh
rm get-docker.sh
sudo usermod -aG docker "$USER"
```
After the last step, you need to restart the ssh session.

## Create docker network
```shell
docker network create bsa-look-network
```

## Create database container
Replace `<random-secure-password>` and `<random-super-secure-password>` with the actual passwords.

```shell
docker run -dit \
  --name=bsa-look-database \
  --restart unless-stopped \
  --network=bsa-look-network \
  --volume mysql-data:/var/lib/mysql \
  --env MYSQL_DATABASE=look \
  --env MYSQL_USER=look \
  --env MYSQL_PASSWORD=<random-secure-password> \
  --env MYSQL_ROOT_PASSWORD=<random-super-secure-password> \
  mysql:8.0.28
```

## Retrieve SSL certificate
The script will bring up a temporary web server to pass the ACME challenge,
and store the certificates in the docker volume.

Replace `<email>`, `<web-domain>` and `<api-domain>` with the appropriate data.

```shell
cat << 'EOF' > ssl.conf
server {
    listen 80;
    listen [::]:80;
    server_name <web-domain> <api-domain>;

    error_log stderr;
    access_log /dev/stdout;

    location /.well-known/acme-challenge/ {
        root /certbot-webroot;
    }
}
EOF
docker run -dit \
  --name=bsa-look-temp \
  --restart unless-stopped \
  --network=bsa-look-network \
  --volume "$(pwd)/ssl.conf":/etc/nginx/conf.d/default.conf \
  --volume "certbot-webroot":/certbot-webroot/ \
  --volume "certbot-ssl":/etc/nginx/ssl/ \
  -p 80:80 \
  nginx:1.21.6
docker run --rm -it \
  --volume "certbot-webroot":/var/www/certbot/ \
  --volume "certbot-ssl":/etc/letsencrypt/ \
  certbot/certbot:latest \
  certonly \
  --webroot \
  --webroot-path /var/www/certbot/ \
  -n \
  --agree-tos \
  --email <email> \
  -d <web-domain> \
  -d <api-domain>
docker stop bsa-look-temp
docker container rm bsa-look-temp
```

> We are retrieving **one SSL certificate** for the multiple domains.
> Pay attention to the output of the certbot container to know the folder name with the certificate (one of the domain names).
> We need it for the next step.

## Create root web server
Replace `<certificate-folder>` (from the previous step), `<web-domain>` and `<api-domain>` with the real data.

```shell
cat << 'EOF' > gateway.conf
server {
    listen 80;
    listen [::]:80;
    server_name <web-domain> <api-domain>;

    error_log stderr;
    access_log /dev/stdout;

    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name <api-domain>;
    resolver 127.0.0.11;

    ssl_certificate /etc/nginx/ssl/live/<certificate-folder>/fullchain.pem;
    ssl_certificate_key /etc/nginx/ssl/live/<certificate-folder>/privkey.pem;

    error_log stderr;
    access_log /dev/stdout;

    location / {
      proxy_pass http://bsa-look-api;
      proxy_set_header Host $host;
      proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
      proxy_set_header X-Real-IP $remote_addr;
    }
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name <web-domain>;
    resolver 127.0.0.11;

    ssl_certificate /etc/nginx/ssl/live/<certificate-folder>/fullchain.pem;
    ssl_certificate_key /etc/nginx/ssl/live/<certificate-folder>/privkey.pem;

    error_log stderr;
    access_log /dev/stdout;

    location / {
      proxy_pass http://bsa-look-web;
      proxy_set_header Host $host;
      proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
      proxy_set_header X-Real-IP $remote_addr;
    }
}
EOF
docker run -dit \
  --name=bsa-look-gateway \
  --restart unless-stopped \
  --network=bsa-look-network \
  --volume "$(pwd)/gateway.conf":/etc/nginx/conf.d/default.conf \
  --volume "certbot-webroot":/certbot-webroot/ \
  --volume "certbot-ssl":/etc/nginx/ssl/ \
  -p 80:80 \
  -p 443:443 \
  nginx:1.21.6
```