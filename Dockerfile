FROM php:8.0-apache
COPY ./app /var/www/html/

RUN a2enmod rewrite
RUN apt-get update

RUN apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql pdo pdo_pgsql 

RUN service apache2 restart