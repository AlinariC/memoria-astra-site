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

function retail_service($link) {
  return preg_replace('/[^a-z0-9-]/', '', strtolower((string) ($link['service'] ?? 'store')));
}

function retail_icon($service) {
  $icons = [
    'apple' => '<svg class="retail-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M13.2 5.7c.5-1.5 1.8-2.8 3.1-3.3.4 1.5-.2 3-1.1 3.9-.7.8-1.7 1.4-2.8 1.3-.1-.7.1-1.3.8-1.9Z"/><path d="M19.2 17.4c-.5 1.1-.8 1.6-1.5 2.5-1 1.3-2.4 2.9-4.1 2.9-1.6 0-2-1-4.1-1s-2.6 1-4.1 1c-1.8 0-3.1-1.5-4.1-2.8C-1.5 16.1.1 10 3.4 8.1c1.4-.8 3.2-.9 4.8-.2.6.3 1.2.5 1.7.5s1.1-.3 1.9-.6c1.4-.5 3.1-.6 4.4.2 1.1.6 2 1.5 2.5 2.6-2.3 1.3-2 4.6.5 6.8Z"/></svg>',
    'google' => '<svg class="retail-icon retail-icon-play" viewBox="0 0 24 24" aria-hidden="true"><path class="play-blue" d="M3.6 2.5 13 12 3.6 21.5c-.4-.4-.6-1-.6-1.7V4.2c0-.7.2-1.3.6-1.7Z"/><path class="play-green" d="m13 12 3.1-3.1L5.7 2.8c-.8-.5-1.5-.5-2.1-.3L13 12Z"/><path class="play-yellow" d="m13 12 3.1 3.1L5.7 21.2c-.8.5-1.5.5-2.1.3L13 12Z"/><path class="play-red" d="m16.1 8.9 3.8 2.2c1.1.6 1.1 1.2 0 1.8l-3.8 2.2L13 12l3.1-3.1Z"/></svg>',
    'kindle' => '<svg class="retail-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5.3 3.5h3.1v7.1l6.4-7.1h3.8l-6.5 7 7 10h-3.7l-5.3-7.6-1.7 1.8v5.8H5.3v-17Z"/><path d="M5 21.7c3.8 1.5 9.1 1.4 14-.4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.6"/></svg>',
    'paperback' => '<svg class="retail-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3.5h10.5c1.9 0 3.5 1.6 3.5 3.5v13.5H8.2A3.2 3.2 0 0 1 5 17.3V3.5Z" fill="none" stroke="currentColor" stroke-width="1.7"/><path d="M8 6.5h7.8M8 10h7.8M8 17.2h11" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"/></svg>',
    'hardcover' => '<svg class="retail-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 3.2h12.1A2.9 2.9 0 0 1 20 6.1v14.7H7.4A2.4 2.4 0 0 1 5 18.4V3.2Z" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M8 3.2v17.6M11 7h5.5M11 10.4h5.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"/></svg>',
  ];

  return $icons[$service] ?? '<svg class="retail-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 5h14v14H5z" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M8 9h8M8 13h8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"/></svg>';
}

function retail_button($link, $variant = '') {
  $service = retail_service($link);
  $label = $link['label'] ?? ucfirst($service);
  $url = $link['url'] ?? '#';
  $variantClass = $variant ? ' retail-button-' . preg_replace('/[^a-z0-9-]/', '', strtolower($variant)) : '';

  return '<a class="retail-button retail-' . e($service) . e($variantClass) . '" href="' . e($url) . '" target="_blank" rel="noopener noreferrer">' . retail_icon($service) . '<span>' . e($label) . '</span></a>';
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
