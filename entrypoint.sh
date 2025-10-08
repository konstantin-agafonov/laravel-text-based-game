#!/bin/bash
set -e

#composer install --no-dev --optimize-autoloader

# Run migrations (can add --force for prod)
echo "Running migrations..."
php artisan migrate || true

# Run seeders
echo "Running seeders..."
php artisan db:seed || true

# Start main process (php-fpm)
echo "Starting PHP-FPM..."
exec "$@"
