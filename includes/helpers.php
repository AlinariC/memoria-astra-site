<?php

function e($value) {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function load_books() {
  static $books = null;

  if ($books !== null) {
    return $books;
  }

  $path = __DIR__ . '/../data/books.json';
  $json = file_get_contents($path);
  $decoded = json_decode($json, true);

  if (!is_array($decoded)) {
    return [];
  }

  $books = array_map(function ($book, $index) {
    $book['volume'] = $book['volume'] ?? ($index + 1);
    $book['volume_label'] = $book['volume_label'] ?? ('Book ' . ($index + 1));
    $book['description'] = $book['description'] ?? 'A volume in the Memoria Astra Cycle.';
    $book['tags'] = $book['tags'] ?? [];
    $book['status'] = $book['status'] ?? 'Available';
    $book['signal'] = $book['signal'] ?? 'Memory, myth, and survival across the stars.';
    return $book;
  }, $decoded, array_keys($decoded));

  return $books;
}

function find_book_by_slug($slug) {
  foreach (load_books() as $book) {
    if (($book['slug'] ?? '') === $slug) {
      return $book;
    }
  }

  return null;
}

function book_url($book) {
  return '/book.php?slug=' . rawurlencode($book['slug']);
}

function asset_image($filename) {
  $optimizedPath = __DIR__ . '/../assets/images/optimized/' . $filename;

  if (file_exists($optimizedPath)) {
    return '/assets/images/optimized/' . rawurlencode($filename);
  }

  return '/assets/images/' . rawurlencode($filename);
}

function book_image($book) {
  return asset_image($book['image']);
}

function current_page() {
  return basename(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: 'index.php');
}

function is_current_page($file) {
  $page = current_page();

  if ($page === '' && $file === 'index.php') {
    return true;
  }

  return $page === $file;
}
