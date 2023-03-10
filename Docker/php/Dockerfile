FROM php:8.2-fpm

WORKDIR /var/www/html
COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update
RUN composer dump-autoload
RUN composer install