# Memoria Astra Website

[![License: PPPL v1.0](https://img.shields.io/badge/license-PPPL%20v1.0-purple.svg)](/LICENSE)

Welcome to the official repository for the **Memoria Astra** website — a cosmic journey across memory, survival, and the stars.

This site is built using **Jekyll**, **Markdown**, and **Liquid templates** for clean, mobile-first, professional publishing. It is deployed live via **GitHub Pages**.

---

## 🌌 Project Structure

```plaintext
/
├── _config.yml
├── _data/
│    └── books.yml
├── _includes/
│    ├── nav.html
│    └── footer.html
├── _layouts/
│    ├── default.html
│    └── book.html
├── assets/
│    ├── images/
│    └── styles.css
├── books/
│    ├── terra-in-the-mists.md
│    ├── before-the-mists.md
│    └── (etc.)
├── index.md
├── author.md
├── favicon.ico
├── robots.txt
├── sitemap.txt
├── Gemfile
├── Gemfile.lock
```

---

## 🚀 Features

- Mobile-first, fluid design
- Thin transparent sticky nav with fully working Books dropdown
- Starfield cosmic background aesthetic
- Dynamic book grid sourced from `_data/books.yml`
- SEO enhancements:
  - `robots.txt`
  - OpenGraph meta tags for social previews
  - Sitemap for indexing
- Fast Jekyll build with Bundler dependency management
- Easy future expansion (add books, blog, mailing list)

---

## 📋 Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/alinaric/memoria-astra-site.git
   cd memoria-astra-site
   ```

2. **Install dependencies:**
   ```bash
   bundle install
   ```

3. **Run locally:**
   ```bash
   bundle exec jekyll serve
   ```
   Visit `http://localhost:4000/` to view the site locally.

4. **Deploy:**
   - GitHub Pages automatically builds from `main` branch.

---

## ✨ Optional Enhancements

- Add a blog via Jekyll `_posts/`
- Add mailing list integration
- Add progressive web app (PWA) offline support

---

## 🛡 License

Content and design © 2025 Alinari Campbell.  
Website code licensed under the PPPL v1.0 License unless otherwise noted.

---

## 🌠 Thank You

Thank you for exploring Memoria Astra — may the Wells of Breath guide your journey.

---

