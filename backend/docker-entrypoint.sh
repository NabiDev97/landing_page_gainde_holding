#!/bin/bash

set -e

echo "🚀 Démarrage de Laravel..."

echo "🧹 Nettoyage du cache..."
php artisan config:clear || true
php artisan cache:clear || true

# Ensure .env exists and APP_KEY is set in non-production environments.
if [ ! -f .env ]; then
	if [ "${APP_ENV:-production}" = "production" ]; then
		echo "⚠️  .env not found and APP_ENV=production — do NOT create .env automatically. Provide APP_KEY via environment variables."
	else
		echo "✳️  .env not found — copying .env.example -> .env"
		if [ -f .env.example ]; then
			cp .env.example .env || true
		else
			echo "⚠️  .env.example missing; continuing without creating .env"
		fi
		if [ -n "${APP_KEY:-}" ]; then
			echo "🔐 Writing provided APP_KEY into .env"
			sed -i '/^APP_KEY=/d' .env || true
			printf "\nAPP_KEY=%s\n" "$APP_KEY" >> .env
		else
			echo "🔐 Generating APP_KEY"
			php artisan key:generate --force
		fi
	fi
else
	if [ -z "${APP_KEY:-}" ]; then
		# If .env exists but APP_KEY not set in environment and not present in file, try to generate (non-prod)
		if ! grep -q '^APP_KEY=' .env; then
			if [ "${APP_ENV:-production}" != "production" ]; then
				echo "🔐 .env exists but APP_KEY missing — generating key"
				php artisan key:generate --force
			else
				echo "⚠️ .env exists but APP_KEY missing in production — provide APP_KEY env var to avoid errors"
			fi
		fi
	fi
fi

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
