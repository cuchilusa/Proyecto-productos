# Usa PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Copia el código
COPY ./src /var/www/html

# Exponer el puerto 80
EXPOSE 80