#!/bin/bash
set -e

#composer install --no-dev --optimize-autoloader

# Run migrations (guarded in production)
if [ "${APP_ENV}" = "production" ] && [ "${RUN_MIGRATIONS}" != "1" ]; then
  echo "Skipping migrations in production (set RUN_MIGRATIONS=1 to enable)"
else
  echo "Running migrations..."
  if [ "${APP_ENV}" = "production" ]; then
    php artisan migrate --force || true
  else
    php artisan migrate || true
  fi
fi

# Run seeders (guarded in production)
if [ "${APP_ENV}" = "production" ] && [ "${RUN_SEEDERS}" != "1" ]; then
  echo "Skipping seeders in production (set RUN_SEEDERS=1 to enable)"
else
  echo "Running seeders..."
  if [ "${APP_ENV}" = "production" ]; then
    php artisan db:seed --force || true
  else
    php artisan db:seed || true
  fi
fi

# Start main process (php-fpm)
echo "Starting PHP-FPM..."
exec "$@"
