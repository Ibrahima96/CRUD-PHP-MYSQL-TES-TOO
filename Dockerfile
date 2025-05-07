FROM php:8.2-apache

# Installation des extensions PHP de base
RUN docker-php-ext-install \
    mysqli \
    pdo_mysql

# Copie des fichiers du projet
COPY . /var/www/html/

# Activation du module rewrite d'Apache
RUN a2enmod rewrite

# Configuration du répertoire de travail
WORKDIR /var/www/html

# Configuration des permissions
RUN chown -R www-data:www-data /var/www/html

# Exposition du port 80
EXPOSE 80