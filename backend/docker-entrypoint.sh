#!/bin/bash

set -e

echo "🚀 Démarrage de Laravel..."

echo "🧹 Nettoyage du cache..."
php artisan config:clear
php artisan cache:clear

echo "📦 Exécution des migrations..."
php artisan migrate --force

echo "👤 Création du compte administrateur..."
php artisan db:seed --class=AdminUserSeeder --force

echo "🔗 Création du lien storage..."
php artisan storage:link || true

echo "⚡ Optimisation Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Laravel est prêt !"

exec apache2-foreground
