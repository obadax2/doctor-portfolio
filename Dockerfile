FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    nginx bash curl git zip unzip \
    libpng-dev libjpeg-turbo-dev freetype-dev libzip-dev \
    oniguruma-dev icu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo_mysql mbstring exif pcntl bcmath gd zip intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-interaction --optimize-autoloader --no-scripts

COPY . .

RUN rm -f bootstrap/cache/packages.php bootstrap/cache/services.php

RUN composer dump-autoload --optimize --no-scripts \
    && mkdir -p storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 8731

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]