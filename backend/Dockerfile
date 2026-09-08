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
    && npm --version \
    && node --version \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# ---------------------------------------------------------
# Composer
# ---------------------------------------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# ---------------------------------------------------------
# Copier Laravel
# ---------------------------------------------------------
COPY . .

# ---------------------------------------------------------
# Dépendances PHP
# ---------------------------------------------------------
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# ---------------------------------------------------------
# Dépendances JS + build Vite
# ---------------------------------------------------------
RUN npm install
RUN npm run build

# ---------------------------------------------------------
# Apache → Laravel /public
# ---------------------------------------------------------
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' \
    /etc/apache2/sites-available/000-default.conf

RUN printf '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' \
    > /etc/apache2/conf-available/laravel.conf

RUN a2enconf laravel

# ---------------------------------------------------------
# Permissions Laravel
# ---------------------------------------------------------
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache

RUN chmod -R 775 \
    storage \
    bootstrap/cache

# ---------------------------------------------------------
# Entrypoint
# ---------------------------------------------------------
RUN chmod +x docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["./docker-entrypoint.sh"]