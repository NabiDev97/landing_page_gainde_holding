#!/bin/bash

set -e

echo "🚀 Démarrage de Laravel..."

echo "🧹 Nettoyage du cache..."
php artisan config:clear || true
php artisan cache:clear || true

# By default do NOT run migrations/seeds in production. To force run them set
# RUN_MIGRATIONS=true or RUN_SEEDS=true in the environment. Also allow running
# in non-production environments automatically.
if [ "${APP_ENV:-production}" != "production" ] || [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
	echo "📦 Exécution des migrations..."
	php artisan migrate --force

	if [ "${RUN_SEEDS:-false}" = "true" ]; then
		echo "👤 Création du compte administrateur..."
		php artisan db:seed --class=AdminUserSeeder --force
	fi
else
	echo "⛔ Migrations/seeds skipped in production (set RUN_MIGRATIONS=true to override)"
fi

echo "🔗 Création du lien storage..."
php artisan storage:link || true

echo "⚡ Optimisation Laravel..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "✅ Laravel est prêt !"

exec apache2-foreground
