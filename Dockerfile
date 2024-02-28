FROM php:8.3

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    libicu-dev && \
    docker-php-ext-install zip pdo_mysql sockets intl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader

COPY . .

RUN mkdir -p storage/framework/cache && \
    mkdir -p storage/framework/sessions && \
    mkdir -p storage/framework/views && \
    mkdir -p storage/app/public && \
    mkdir -p storage/logs

RUN composer dump-autoload --optimize && php artisan cache:clear && php artisan key:generate

EXPOSE 80

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
