# Set the base image
FROM php:7.0.4-fpm

WORKDIR /var/www

MAINTAINER Janaka Rathnayake <janakastill@gmail.com> 

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client --no-install-recommends \
    && docker-php-ext-install mcrypt pdo_mysql

ADD . /var/www