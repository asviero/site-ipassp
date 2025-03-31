FROM php:8.2-fpm

RUN apt update && apt install -y curl unzip git mariadb-client nodejs npm\
    && docker-php-ext-install pdo pdo_mysql exif \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www
