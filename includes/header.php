<?php
require_once __DIR__ . '/helpers.php';

$siteName = 'Memoria Astra';
$pageTitle = $pageTitle ?? $siteName;
$pageDescription = $pageDescription ?? 'Explore the Memoria Astra Cycle, a speculative saga of memory, flame, song, survival, and rebirth across the stars.';
$title = $pageTitle === $siteName ? $siteName : $pageTitle . ' | ' . $siteName;
$stylesVersion = filemtime(__DIR__ . '/../assets/styles.css') ?: time();
$scriptVersion = filemtime(__DIR__ . '/../assets/site.js') ?: time();
$navItems = [
  ['href' => '/index.php', 'label' => 'Home', 'page' => 'index.php'],
  ['href' => '/books.php', 'label' => 'Books', 'page' => 'books.php'],
  ['href' => '/author.php', 'label' => 'Author', 'page' => 'author.php'],
  ['href' => '/contact.php', 'label' => 'Contact', 'page' => 'contact.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?php echo e($pageDescription); ?>" />
  <meta property="og:title" content="<?php echo e($title); ?>" />
  <meta property="og:description" content="<?php echo e($pageDescription); ?>" />
  <meta property="og:image" content="https://memoriaastra.com/assets/images/optimized/starfield.jpg" />
  <meta property="og:url" content="https://memoriaastra.com/" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <title><?php echo e($title); ?></title>
  <link rel="preload" href="/assets/images/optimized/starfield.jpg" as="image" />
  <link rel="stylesheet" href="/assets/styles.css?v=<?php echo e($stylesVersion); ?>" />
  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <script src="/assets/site.js?v=<?php echo e($scriptVersion); ?>" defer></script>
</head>
<body>
  <div class="ambient-field" aria-hidden="true"></div>
  <a class="skip-link" href="#content">Skip to content</a>
  <header class="site-header">
    <nav class="site-nav" aria-label="Primary navigation">
      <a class="brand" href="/index.php" aria-label="Memoria Astra home">
        <span class="brand-mark" aria-hidden="true"></span>
        <span>
          <span class="brand-name">Memoria Astra</span>
          <span class="brand-subline">Fifteen-book cycle</span>
        </span>
      </a>
      <ul class="nav-menu">
        <?php foreach ($navItems as $item): ?>
          <li>
            <a href="<?php echo e($item['href']); ?>" <?php echo is_current_page($item['page']) ? 'aria-current="page"' : ''; ?>>
              <?php echo e($item['label']); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </header>
  <main id="content">
