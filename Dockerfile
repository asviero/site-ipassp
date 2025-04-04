FROM php:8.2-fpm

RUN apt update && apt install -y curl unzip git mariadb-client nodejs npm\
    && docker-php-ext-install pdo pdo_mysql exif \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www

# Copia os arquivos package.json e package-lock.json antes de copiar o restante do código
COPY src/package*.json ./

# Instala as dependências do npm
RUN npm install

# Agora copia o restante dos arquivos do projeto
COPY src ./

