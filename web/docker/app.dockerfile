# Set the base image
FROM php:7.0.4-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y libmcrypt-dev \
    && docker-php-ext-install mcrypt pdo_mysql

ADD . /var/www