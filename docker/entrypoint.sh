#!/bin/bash
set -e

echo "Waiting for database..."
until nc -z "$DB_HOST" "$DB_PORT" 2>/dev/null; do
  sleep 1
done
echo "Database is ready."

# Discover packages (was skipped during build)
php artisan package:discover --ansi

# Generate key only if the env var is empty
if [ -z "$APP_KEY" ]; then
  php artisan key:generate --force
fi

# Fix storage permissions (bind mount overrides Dockerfile's chown)
chown -R www-data:www-data storage bootstrap/cache

# For dev/testing: fresh migrate + seed each time (wipes + re-creates all data)
php artisan migrate:fresh --seed --force
php artisan storage:link 2>/dev/null || true
php artisan filament:assets --ansi 2>/dev/null || true
php artisan config:cache
php artisan route:cache 2>/dev/null || true

# PHP-FPM as a background daemon
php-fpm -D

# Nginx in the foreground (keeps container alive)
echo "Starting Nginx on port 8731..."
exec nginx -g "daemon off;"