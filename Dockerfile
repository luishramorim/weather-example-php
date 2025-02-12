# Use the official PHP image with Apache
FROM php:8.0-apache

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git

# Install PHP extensions: PDO, MySQL, and GD
RUN docker-php-ext-install pdo pdo_mysql gd

# Enable Apache's mod_rewrite module for URL rewriting
RUN a2enmod rewrite

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy Composer files and install PHP dependencies
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --no-interaction --prefer-dist

# Copy the rest of the project files into the container
COPY . .

# Adjust permissions for storage and bootstrap/cache directories
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 80 to allow web traffic
EXPOSE 80
