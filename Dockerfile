FROM php:7.4-fpm-alpine

ENV COMPOSER_MEMORY_LIMIT=-1

RUN docker-php-ext-install pdo pdo_mysql sockets && apk add --no-cache git
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:1.10.1 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install && composer require alexminichino/swapi