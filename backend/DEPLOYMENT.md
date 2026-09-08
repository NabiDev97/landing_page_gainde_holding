# Déploiement et vérifications (Render / production)

Cette page contient les étapes recommandées pour déployer l'application sur Render (ou un autre PaaS) et vérifier que les assets HTTPS fonctionnent.

1) Variables d'environnement recommandées

- `APP_ENV=production`
- `APP_URL=https://landing-page-gainde-holding.onrender.com` (important pour générer des URLs en https)
- `APP_KEY=` (fourni depuis Render - **recommandé** pour la prod)
- Optionnel pour démarrage contrôlé: `RUN_MIGRATIONS=true` / `RUN_SEEDS=true` (à utiliser explicitement)

2) Comportement du conteneur

- Le script `docker-entrypoint.sh` créera `.env` à partir de `.env.example` **seulement** si `APP_ENV` n'est pas `production`.
- Si `APP_KEY` est fourni via la variable d'environnement, il sera injecté dans `.env` (pour non-prod) ; en prod fournissez directement `APP_KEY` via les settings Render.
- Les migrations ne sont pas exécutées automatiquement en production, sauf si `RUN_MIGRATIONS=true`.

3) Vérifications à effectuer après déploiement

- Vérifier que `APP_URL` contient bien le schéma `https://`.
- Ouvrir DevTools → Network et vérifier que les fichiers CSS/JS renvoient des URLs `https://...` (pas `http://`).
- Vérifier l'absence d'erreurs Mixed Content et que la page charge les `public/build` assets.

4) Commandes utiles (dans le conteneur)

```bash
# Nettoyages et caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# (Re)générer caches si nécessaire
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Lancer les migrations si vous avez explicitement activé RUN_MIGRATIONS
php artisan migrate --force
```

5) Tests rapides depuis votre machine

```bash
# Page principale (HTTPS)
curl -I https://landing-page-gainde-holding.onrender.com

# Vérifier qu'un asset CSS renvoie HTTPS (exemple)
curl -I https://landing-page-gainde-holding.onrender.com/css/style.css
```

6) Notes de sécurité et bonnes pratiques

- Ne pas créer automatiquement `.env` en production — fournissez `APP_KEY` et autres secrets via le panneau Render.
- Eviter d'exécuter les migrations automatiquement en prod sans supervision.
- Pour les environnements de test/staging, l'entrypoint gère la copie de `.env.example` et la génération d'`APP_KEY` pour faciliter les tests.

---
Si vous voulez, je peux aussi :
- committer et pousser ces changements (je vais le faire maintenant si vous confirmez),
- ou créer une PR dédiée.

