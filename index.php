<?php
$pageTitle = 'Memoria Astra';
$pageDescription = 'Explore the Memoria Astra Cycle, a seven-volume speculative saga of memory, myth, survival, and rebirth across the stars.';
include 'includes/header.php';

$books = load_books();
$featured = $books[0] ?? null;
?>

<section class="hero">
  <div class="hero-copy reveal">
    <p class="eyebrow">A speculative myth cycle</p>
    <h1>Memory is the oldest force in the universe.</h1>
    <p class="hero-lede">The Memoria Astra Cycle follows civilizations, relics, bloodlines, and songs across the long dark between forgetting and rebirth.</p>
    <div class="hero-actions">
      <a class="button button-primary" href="/books.php">Explore the books</a>
      <a class="button button-ghost" href="/author.php">Meet the author</a>
    </div>
  </div>

  <?php if ($featured): ?>
    <div class="hero-art reveal" style="--delay: 120ms;">
      <div class="orbit-graphic" aria-hidden="true"></div>
      <a class="hero-cover" href="<?php echo e(book_url($featured)); ?>" aria-label="View <?php echo e($featured['title']); ?>">
        <img src="<?php echo e(book_image($featured)); ?>" alt="<?php echo e($featured['title']); ?> cover" />
      </a>
      <div class="hero-card">
        <span><?php echo e($featured['volume_label']); ?></span>
        <strong><?php echo e($featured['title']); ?></strong>
        <p><?php echo e($featured['signal']); ?></p>
      </div>
    </div>
  <?php endif; ?>
</section>

<section class="statement reveal">
  <div>
    <p class="eyebrow">The signal</p>
    <h2>A cosmic archive of worlds, heirs, relics, and songs.</h2>
  </div>
  <p>Built as a polished home for the series, this archive gives every volume a visual identity while keeping the whole saga tied together by one unmistakable atmosphere: ancient, luminous, and alive.</p>
</section>

<section class="book-showcase">
  <div class="section-heading reveal">
    <p class="eyebrow">Complete cycle</p>
    <h2>Seven books in orbit.</h2>
    <a class="text-link" href="/books.php">View full archive</a>
  </div>

  <div class="book-grid">
    <?php foreach ($books as $index => $book): ?>
      <article class="book-card reveal" style="--delay: <?php echo (int) ($index * 55); ?>ms;">
        <a href="<?php echo e(book_url($book)); ?>" class="book-card-link" aria-label="View <?php echo e($book['title']); ?>">
          <span class="book-number"><?php echo str_pad((string) $book['volume'], 2, '0', STR_PAD_LEFT); ?></span>
          <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" class="book-cover" loading="lazy" />
          <span class="book-glow" aria-hidden="true"></span>
          <h3><?php echo e($book['title']); ?></h3>
          <p><?php echo e($book['signal']); ?></p>
        </a>
        <?php if (!empty($book['buy_url'])): ?>
          <a class="buy-link" href="<?php echo e($book['buy_url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="Buy <?php echo e($book['title']); ?> on Amazon">Buy Now</a>
        <?php endif; ?>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="feature-band reveal">
  <div class="feature-stat">
    <strong><?php echo count($books); ?></strong>
    <span>volumes</span>
  </div>
  <div class="feature-stat">
    <strong>1</strong>
    <span>remembered universe</span>
  </div>
  <div class="feature-stat">
    <strong>All</strong>
    <span>echoes across time</span>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
