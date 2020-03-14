FROM php:5.6-apache

RUN a2enmod rewrite
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql