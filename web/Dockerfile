FROM php:8.1.0-apache

RUN docker-php-ext-install \
    pdo_mysql \
    && a2enmod \
    rewrite