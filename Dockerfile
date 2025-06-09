FROM php:8.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    zip unzip curl git libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
