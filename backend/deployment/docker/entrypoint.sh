#!/bin/bash

set -e

if [ "$PHP_ENVIRONMENT" = "development" ]; then \
    echo "Fixing permissions for the mounted volume..."
    setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX storage bootstrap/cache; \
    setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX storage bootstrap/cache; \
fi

echo "Waiting for db to be ready..."
ATTEMPTS_LEFT_TO_REACH_DATABASE=60
until [ $ATTEMPTS_LEFT_TO_REACH_DATABASE -eq 0 ] || php artisan migrate:status -q || php artisan migrate:install -q; do
    sleep 1
    ATTEMPTS_LEFT_TO_REACH_DATABASE=$((ATTEMPTS_LEFT_TO_REACH_DATABASE-1))
    echo "Still waiting for db to be ready... Or maybe the db is not reachable. $ATTEMPTS_LEFT_TO_REACH_DATABASE attempts left"
done

if [ $ATTEMPTS_LEFT_TO_REACH_DATABASE -eq 0 ]; then
    echo "The db is not up or not reachable"
    exit 1
else
    echo "Running migrations..."
    php artisan migrate
fi

echo "Starting supervisor daemon..."
supervisord -c /etc/supervisor/conf.d/supervisord.conf
