# Dockerfile
FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
        postgresql-dev \
        nodejs \
        npm \
        zip \
        unzip \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN touch ./database/database.sqlite

RUN composer install

RUN npm install

RUN chown -R www-data:www-data storage/

WORKDIR /app
