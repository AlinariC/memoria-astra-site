FROM php:8.3-apache

RUN a2enmod rewrite headers expires deflate \
    && echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php-production.ini /usr/local/etc/php/conf.d/production.ini
COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
