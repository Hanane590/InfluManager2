FROM php:8.2-apache

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libssl-dev \
    pkg-config \
    php-pear \
    php-dev

# Installer extension MongoDB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Activer mod_rewrite
RUN a2enmod rewrite

# Copier code source
COPY . /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80

CMD ["apache2-foreground"]
