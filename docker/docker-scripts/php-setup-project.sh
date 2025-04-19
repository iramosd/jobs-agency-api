#!/bin/bash

# Install dependencies
COMPOSER_PROCESS_TIMEOUT=0
composer clear-cache
composer install

# Need run this command to generate key
php artisan key:generate

# Run migrations and seed database
php artisan migrate

# Run Server
php artisan serve --host=0.0.0.0 --port=8000

# In case of fail
tail -f /dev/null
