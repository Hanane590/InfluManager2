# Image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les extensions système nécessaires pour MongoDB
RUN apt-get update \
    && apt-get install -y libssl-dev pkg-config unzip git

# Installer l'extension MongoDB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Activer mod_rewrite (optionnel mais recommandé)
RUN a2enmod rewrite

# Copier ton code dans le conteneur
COPY . /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Exposer le port 80
EXPOSE 80

# Lancer Apache
CMD ["apache2-foreground"]
