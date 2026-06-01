FROM php:8.5-fpm-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions \
    && install-php-extensions pdo_sqlite opcache

RUN apk add --no-cache git unzip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
