# PHP 8.3 + Apache
FROM php:8.3-apache

# ---------------------------------------------------------
# Extensions PHP nécessaires à Laravel + PostgreSQL
# ---------------------------------------------------------
RUN apt-get update \
    && apt-get install -y \
        libpq-dev \
        curl \
        git \
        unzip \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# ---------------------------------------------------------
# Node.js 20 + npm
# ---------------------------------------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && node --version \
    && npm --version

# ---------------------------------------------------------
# Composer
# ---------------------------------------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ---------------------------------------------------------
# Répertoire de travail
# ---------------------------------------------------------
WORKDIR /var/www/html

# ---------------------------------------------------------
# Copier le projet Laravel
# ---------------------------------------------------------
COPY . .

# ---------------------------------------------------------
# Installer les dépendances PHP
# ---------------------------------------------------------
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist

# ---------------------------------------------------------
# Installer les dépendances JavaScript
# ---------------------------------------------------------
RUN npm install

# Compiler les assets Vite
RUN npm run build

# ---------------------------------------------------------
# Configuration Apache
# Laravel doit être servi depuis /public
# ---------------------------------------------------------
RUN sed -i \
    's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' \
    /etc/apache2/sites-available/000-default.conf

# Autoriser Apache à utiliser le .htaccess de Laravel
RUN printf '%s\n' \
    '<Directory /var/www/html/public>' \
    '    AllowOverride All' \
    '    Require all granted' \
    '</Directory>' \
    > /etc/apache2/conf-available/laravel.conf

RUN a2enconf laravel

# ---------------------------------------------------------
# Permissions Laravel
# ---------------------------------------------------------
RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

RUN chmod -R 775 \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

# ---------------------------------------------------------
# Port Apache
# ---------------------------------------------------------
EXPOSE 80

# ---------------------------------------------------------
# Démarrage Apache
# ---------------------------------------------------------
CMD ["apache2-foreground"]