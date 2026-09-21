# GAÏNDE-HOLDING — Site vitrine

Site web de **GAÏNDE-HOLDING**, entreprise de construction et BTP basée à Dakar, Sénégal.

## Structure du projet

```
├── backend/          # Application Laravel 10 (front + admin)
├── render.yaml       # Configuration de déploiement Render
└── README.md
```

L'application Laravel dans `backend/` gère :

- **Front** : accueil, projets, services, équipe, témoignages, blog, formulaire de devis
- **Admin** : CRUD complet pour tout le contenu + gestion des demandes de devis (PDF)
- **Email** : envoi asynchrone des demandes de devis avec pièce jointe PDF

## Prérequis

- PHP 8.1+
- Composer
- Node.js 20+
- PostgreSQL (production) ou SQLite (tests)

## Installation locale

```bash
cd backend
cp .env.example .env
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed   # optionnel : contenu de démo + admin
npm run build
php artisan serve
```

L'application est accessible sur `http://localhost:8000`.

### Créer un compte administrateur

Configurez dans `.env` :

```env
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=votre_mot_de_passe
```

Puis lancez :

```bash
php artisan db:seed --class=AdminUserSeeder
```

Connexion admin : `/login` puis `/admin/dashboard`.

## Tests

```bash
cd backend
php artisan test
```

Les tests utilisent SQLite en mémoire (configuré dans `phpunit.xml`). L'extension PHP `pdo_sqlite` doit être installée (`sudo apt install php-sqlite3` sur Debian/Ubuntu).

## Déploiement (Render)

Voir [backend/DEPLOYMENT.md](backend/DEPLOYMENT.md) pour les variables d'environnement et les vérifications post-déploiement.

Variables essentielles :

| Variable | Description |
|---|---|
| `APP_URL` | URL HTTPS du site (ex. `https://landing-page-gainde-holding.onrender.com`) |
| `APP_KEY` | Clé Laravel (générée via `php artisan key:generate`) |
| `DB_*` | Connexion PostgreSQL |
| `MAIL_*` | Configuration SMTP |
| `MAIL_QUOTE_REQUEST_TO` | Destinataire des demandes de devis |
| `ADMIN_EMAIL` / `ADMIN_PASSWORD` | Compte admin (seeder) |

## Stack technique

- **Backend** : Laravel 10, Breeze (auth), DomPDF
- **Front** : Bootstrap 5, Blade, Vite
- **Infra** : Docker multi-stage, Render
