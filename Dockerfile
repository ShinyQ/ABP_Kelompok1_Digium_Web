FROM php:8

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN apt-get install -y build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql gd

WORKDIR /app
COPY . /app

RUN composer install --ignore-platform-reqs

RUN php artisan passport:install
