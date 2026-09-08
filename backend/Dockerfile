###
# Multi-stage Dockerfile for Laravel + Vite
###

# --- Node builder: build frontend assets ---
FROM node:20 AS node_builder
WORKDIR /app
ENV NODE_ENV=production

# Copy only package files to leverage Docker cache
COPY package*.json ./
RUN npm ci --production=false

# Copy sources and build
COPY . .
RUN npm run build


# --- PHP runtime image ---
FROM php:8.3-apache

ARG APP_ENV=production
ENV APP_ENV=${APP_ENV}

# System deps for PHP extensions and tools
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
 && docker-php-ext-install pdo pdo_pgsql zip \
 && a2enmod rewrite \
 && rm -rf /var/lib/apt/lists/*

# Composer (copy from official image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy composer files first for better cache
COPY composer.json composer.lock ./
COPY artisan ./
COPY bootstrap ./bootstrap
# Install PHP deps without running composer scripts (scripts require app files).
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Copy application source
COPY . .

# Copy built frontend assets from node_builder
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Now that the application files are present, run discovery scripts
RUN composer dump-autoload --optimize || true
RUN php artisan package:discover --ansi || true

# Configure Apache to use Laravel public directory
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf \
 && printf '<Directory /var/www/html/public>\n    AllowOverride All\n    Require all granted\n</Directory>\n' > /etc/apache2/conf-available/laravel.conf \
 && a2enconf laravel

# Create storage directories and set permissions
RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
 && chown -R www-data:www-data storage bootstrap/cache public/build \
 && chmod -R 775 storage bootstrap/cache public/build

# Copy entrypoint and ensure it's executable
COPY docker-entrypoint.sh ./
RUN chmod +x docker-entrypoint.sh

EXPOSE 80
ENTRYPOINT ["./docker-entrypoint.sh"]