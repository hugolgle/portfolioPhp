FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
        postgresql-dev \
        nodejs \
        npm \
        zip \
        unzip \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN touch database/database.sqlite
RUN cp .env.example .env

RUN composer install
RUN npm install
RUN npm run build

RUN chown -R www-data:www-data storage/
RUN chmod -R 755 storage/
RUN chown -R www-data:www-data database/
RUN chmod -R 755 database/

# Setup Laravel project
RUN php artisan key:generate
RUN php artisan migrate
RUN php artisan storage:link



