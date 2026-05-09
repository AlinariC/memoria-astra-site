# Memoria Astra

Official website for the Memoria Astra book cycle.

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

## Deployment Notes

- Traefik should already expose a secure `websecure` entrypoint.
- The app listens on container port `80`.
- Apache serves clean routes such as `/books/terra-in-the-mists` through `.htaccess`.
- Book metadata lives in `data/books.json`; cover images live in `assets/images/`.
