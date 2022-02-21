FROM php:8.1.2-fpm

ARG PHP_ENVIRONMENT=production

ENV PHP_ENVIRONMENT=${PHP_ENVIRONMENT}

WORKDIR /app

# Install general dependencies
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        acl git zip unzip supervisor cron nginx mariadb-client \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configure Supervisor
COPY deployment/docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Configure NGINX
RUN rm /etc/nginx/sites-enabled/default
COPY deployment/docker/nginx/*.conf /etc/nginx/sites-enabled/

# Configure PHP
COPY deployment/docker/php/php.ini-* /tmp/
RUN if [ "$PHP_ENVIRONMENT" = "production" ]; then \
        mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
        mv "/tmp/php.ini-production" "$PHP_INI_DIR/conf.d/override.ini" && \
        rm /tmp/php.ini-* $PHP_INI_DIR/php.ini-*; \
    else \
        mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini" && \
        mv "/tmp/php.ini-development" "$PHP_INI_DIR/conf.d/override.ini" && \
        rm /tmp/php.ini-* $PHP_INI_DIR/php.ini-*; \
        pecl install xdebug-3.1.2 && \
        docker-php-ext-enable xdebug; \
    fi
RUN docker-php-ext-install pdo_mysql

# Configure PHP-FPM
COPY deployment/docker/php-fpm/*.conf /usr/local/etc/php-fpm.d/

# Copy project files
ADD . .

# Configure permissions
RUN chown -R www-data:www-data \
    /app/storage \
    /app/bootstrap/cache

# Install project dependencies
RUN if [ "$PHP_ENVIRONMENT" = "production" ]; then \
        composer install --optimize-autoloader --no-dev; \
    else \
        composer install; \
    fi

CMD ["/app/deployment/docker/entrypoint.sh"]
