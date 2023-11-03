FROM php:8.0-apache
COPY . /var/www/html/

RUN a2enmod rewrite
RUN apt-get update

RUN apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql pdo pdo_pgsql 
EXPOSE 8080
EXPOSE 80
EXPOSE 5432
RUN service apache2 restart