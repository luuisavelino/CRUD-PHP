FROM php:7-apache

WORKDIR /var/www/html/

RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

ADD ./crud_php/ /var/www/html/