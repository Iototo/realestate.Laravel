FROM php:8.1.1-fpm

RUN apt-get update \
    && docker-php-ext-install pdo_mysql

ADD ./php.ini /usr/local/etc/php/php.ini