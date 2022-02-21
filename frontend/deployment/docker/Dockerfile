FROM node:16.13.2 as build-stage

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

FROM nginx as production-stage

COPY --from=build-stage /app/dist /app

# Configure NGINX
RUN rm /etc/nginx/conf.d/default.conf
COPY deployment/docker/nginx/*.conf /etc/nginx/conf.d/
