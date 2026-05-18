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
    $book['links'] = $book['links'] ?? [];
    $book['status'] = $book['status'] ?? 'Available';
    $book['signal'] = $book['signal'] ?? 'Memory, myth, and survival across the stars.';
    $book['series_type'] = $book['series_type'] ?? 'main';
    return $book;
  }, $decoded, array_keys($decoded));

  return $books;
}

function filter_books_by_type($type) {
  return array_values(array_filter(load_books(), function ($book) use ($type) {
    return ($book['series_type'] ?? 'main') === $type;
  }));
}

function main_books() {
  return filter_books_by_type('main');
}

function collection_books() {
  return filter_books_by_type('collection');
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
    return '/assets/images/optimized/' . encode_asset_path($filename);
  }

  return '/assets/images/' . encode_asset_path($filename);
}

function book_image($book) {
  return asset_image($book['image']);
}

function encode_asset_path($path) {
  $segments = explode('/', $path);
  $encoded = array_map('rawurlencode', $segments);
  return implode('/', $encoded);
}

function book_meta_line($book) {
  $parts = [];

  if (!empty($book['volume_label'])) {
    $parts[] = $book['volume_label'];
  }

  if (!empty($book['page_count'])) {
    $parts[] = (int) $book['page_count'] . ' pages';
  }

  if (!empty($book['ebook_price'])) {
    $parts[] = 'ebook ' . $book['ebook_price'];
  }

  return implode(' / ', $parts);
}

function retail_links($book) {
  return is_array($book['links'] ?? null) ? $book['links'] : [];
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
