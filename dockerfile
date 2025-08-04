FROM php:8.2-apache

# Install PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copy project files
COPY . /var/www/html/

# Enable mod_rewrite (opsional jika pakai .htaccess)
RUN a2enmod rewrite
