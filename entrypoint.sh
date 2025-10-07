#!/bin/bash
set -e

#composer install --no-dev --optimize-autoloader

# Выполняем миграции (можно добавить --force для prod)
echo "Running migrations..."
php artisan migrate || true

# Выполняем сидеры
echo "Running seeders..."
php artisan db:seed || true

# Запускаем основной процесс (php-fpm)
echo "Starting PHP-FPM..."
exec "$@"
