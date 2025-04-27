---
layout: default
title: Home
---

<header class="hero">
  <div class="hero-content">
    <h1>Memoria Astra</h1>
    <p>A Song Woven Across the Stars</p>
  </div>
</header>

<section class="intro">
  <h2>Welcome to the Cycle</h2>
  <p>The Memoria Astra Cycle is an epic journey through breath, memory, sorrow, and becoming — a saga spanning worlds, stars, and the deep longing woven into the heart of existence.</p>
</section>

<section class="book-grid">
  {% for book in site.data.books %}
  <div class="book-card">
    <img src="{{ book.image | relative_url }}" alt="{{ book.title }}">
    <h3>{{ book.title }}</h3>
    <p>{{ book.subtitle }}</p>
    <a href="{{ book.url | relative_url }}" class="button">Explore →</a>
  </div>
  {% endfor %}
</section>