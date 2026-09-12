# B7HOTEL — B7 Landmark Website

Premium hotel + land-share investment website for B7HOTEL (Patuakhali, Bangladesh),
built with **Laravel 13 + Livewire 4 + Alpine.js + Tailwind CSS v4**.

Pages: `/` (home) · `/about` · `/project` · `/investment` (Livewire calculator) ·
`/gallery` · `/contact` · `/docs` (renders `docs/B7Hotel_Premium_Website_UI_UX_Prompt.md`).

---

## 1. Prerequisites

| Tool | Version |
| --- | --- |
| PHP | ^8.3 (with `sqlite3` + `pdo_sqlite` extensions for the default DB) |
| Composer | ^2.x |
| Node.js + npm | Node 20+ recommended |
| MySQL | Only if you want MySQL instead of SQLite |

Verify:

```bash
php -v
composer --version
node -v
npm -v
```

## 2. First-time setup (fresh clone)

```bash
# 1) Enter the project
cd b7landmark

# 2) One-command setup (installs PHP + JS deps, creates .env + key,
#    runs migrations, builds frontend assets)
composer setup
```

`composer setup` runs, in order:

1. `composer install`
2. copies `.env.example` → `.env` (if missing)
3. `php artisan key:generate`
4. `php artisan migrate --force`
5. `npm install`
6. `npm run build`

### Manual setup (if you prefer each step)

```bash
composer install
cp .env.example .env          # Windows (cmd): copy .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

## 3. Database

Default is **SQLite — zero configuration** (`.env.example` ships `DB_CONNECTION=sqlite`).

To use **MySQL** instead, edit `.env`:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=b7
DB_USERNAME=root
DB_PASSWORD=secret
```

Then create the `b7` database and migrate:

```bash
php artisan migrate
```

## 4. Run locally

### Option A — everything at once (recommended)

Starts web server + queue worker + Vite HMR together:

```bash
composer dev
```

Open <http://localhost:8000>.

### Option B — run pieces separately

```bash
# Terminal 1: Laravel
php artisan serve

# Terminal 2: Vite dev server (hot-reload for CSS/JS)
npm run dev
```

Open <http://localhost:8000>.

### Option C — serve with prebuilt assets (no Vite process)

```bash
npm run build
php artisan serve
```

> Use this when you only want `php artisan serve` running.
> The pages load CSS/JS from `public/build/`.

## 5. Verify it works

```bash
php artisan route:list --except-vendor
```

You should see: `/`, `/home`, `/about`, `/project`, `/investment`,
`/gallery`, `/contact`, `/docs`.

Open in the browser:

- `/` — homepage (header, hero slider, packages, calculator, FAQ, footer)
- `/investment` — Livewire + Alpine investment calculator
- `/docs` — full UI/UX spec rendered from markdown

## 6. Useful commands

```bash
php artisan migrate              # run migrations
php artisan tinker               # REPL
php artisan test                 # Pest test suite
php artisan route:list           # list routes
php artisan view:clear           # clear compiled Blade views
php artisan config:clear         # clear config cache
npm run dev                      # Vite HMR dev server
npm run build                    # production frontend build
composer lint                    # Pint code style fix
```

## 7. Troubleshooting

| Symptom | Fix |
| --- | --- |
| Page loads with **no styling** (raw HTML) | A stale `public/hot` file is pointing Blade at a Vite dev server that isn't running. Either start it (`npm run dev`) **or** delete the marker and use built assets: `rm public/hot` (Windows: `del public\hot`) then `npm run build`. |
| `Vite manifest not found` | Run `npm install && npm run build` (or `npm run dev` while developing). |
| Port `8000` busy | `php artisan serve --port=8931` |
| `No application encryption key` | `php artisan key:generate` |
| Blade changes not showing | `php artisan view:clear` |
| MySQL `Connection refused` | Check MySQL is running and `.env` credentials; or switch back to `DB_CONNECTION=sqlite` + `php artisan migrate`. |

## 8. Project layout (where things live)

```text
routes/web.php                          # all site + /docs routes
app/Http/Controllers/DocsController.php # renders the UI/UX prompt as HTML
app/Livewire/InvestmentCalculator.php   # calculator state (server truth)
resources/views/layouts/site.blade.php  # base layout (fonts, nav, footer slots)
resources/views/partials/               # site-header, hero-slider, site-footer
resources/views/site/                   # home, about, project, investment, gallery, contact
resources/views/livewire/               # investment-calculator (Livewire + Alpine)
resources/views/docs.blade.php          # /docs page with markdown + TOC
resources/css/app.css                   # Tailwind v4 theme + brand tokens + type scale
docs/                                   # UI/UX prompt + architecture notes
```
