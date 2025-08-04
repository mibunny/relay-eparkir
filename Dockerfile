FROM php:8.2-apache

# Install driver MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Salin semua file ke container
COPY . /var/www/html/

# Aktifkan mod_rewrite jika pakai .htaccess
RUN a2enmod rewrite
