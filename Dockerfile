FROM php:7.2-apache

WORKDIR /var/www/html/

RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

COPY ./crud_php/ /var/www/html/