# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Copier les fichiers du projet dans le dossier HTML d'Apache
COPY ./public /var/www/html

# Donner les bons droits
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80 (Apache)
EXPOSE 80
