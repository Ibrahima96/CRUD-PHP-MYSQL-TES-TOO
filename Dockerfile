# Use a slim variant to reduce vulnerabilities
FROM php:8.2-apache-bookworm@sha256:e2408924aac97ed8dce0ba54adff30443fe7a940a87d7b0d083b36941d8aa431

# Update system packages to address known vulnerabilities
RUN apt-get update && apt-get upgrade -y && apt-get clean

# Installation des extensions PHP de base
RUN docker-php-ext-install \
    mysqli \
    pdo_mysql

# Copie des fichiers du projet
COPY . C:\wamp64\www\PHP-EXEMPLE\CRUD-PHP-MYSQL-TES-TOO

# Activation du module rewrite d'Apache
RUN a2enmod rewrite

# Configuration du répertoire de travail
WORKDIR C:\wamp64\www\PHP-EXEMPLE\CRUD-PHP-MYSQL-TES-TOO

# Configuration des permissions
RUN chown -R www-data:www-data C:\wamp64\www\PHP-EXEMPLE\CRUD-PHP-MYSQL-TES-TOO

# Exposition du port 80
EXPOSE 80