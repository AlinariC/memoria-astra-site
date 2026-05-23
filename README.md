# Memoria Astra

Official website for the Memoria Astra book cycle.

## Project Layout

- `index.php`, `books.php`, `book.php`, `author.php`, `contact.php`, and `404.php` are the public page entrypoints.
- `includes/` contains shared PHP helpers, header, and footer templates.
- `data/books.json` stores book metadata, retailer links, tags, and descriptions.
- `assets/` contains styles, browser behavior, cover art, and optimized image derivatives.
- `Dockerfile` defines the production PHP/Apache image used by DigitalOcean App Platform.
- `.do/app.yaml` documents the current DigitalOcean App Platform spec.

## Local PHP

```bash
php -S localhost:8080
```

Open `http://localhost:8080`.

## Docker

```bash
docker compose up --build -d
```

The included `docker-compose.yml` expects an existing external Traefik network. Copy `.env.example` to `.env` and adjust the domain, network, and certificate resolver names to match the host.

## DigitalOcean App Platform

The live site is deployed through DigitalOcean App Platform from the root `Dockerfile`. The App Platform app should point at `AlinariC/memoria-astra-site`, branch `main`, with automatic deploys enabled on push.

GitHub repository: <https://github.com/AlinariC/memoria-astra-site>

The root `DO_API_KEY` file is intentionally ignored by git and Docker. Keep deployment credentials local.

## Deployment Notes

- Traefik should already expose a secure `websecure` entrypoint.
- The app listens on container port `80`.
- Apache serves clean routes such as `/books/terra-in-the-mists` through `.htaccess`.
- Book metadata lives in `data/books.json`; cover images live in `assets/images/`.
