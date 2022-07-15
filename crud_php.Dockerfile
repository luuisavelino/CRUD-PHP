FROM php:7-apache

WORKDIR /var/www/html/

LABEL testlabel=""

RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

COPY ./crud_php/ /var/www/html/