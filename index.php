<?php
$pageTitle = 'Memoria Astra';
$pageDescription = 'Explore Memoria Astra, a 15-book speculative saga with two collection novels spanning memory, flame, song, and rebirth across the stars.';
include 'includes/header.php';

$books = load_books();
$mainBooks = main_books();
$collectionBooks = collection_books();
$featured = $collectionBooks[1] ?? ($books[0] ?? null);
$heroStack = array_slice(array_merge([$featured], array_reverse(array_slice($mainBooks, -4))), 0, 5);
?>

<section class="hero">
  <div class="hero-copy reveal">
    <p class="eyebrow">A 15-book speculative saga</p>
    <h1>Memoria Astra</h1>
    <p class="hero-lede">Civilizations of mist, flame, root, memory, and song cross the long dark between collapse and rebirth. The complete cycle now spans fifteen main titles plus two collection novels.</p>
    <div class="hero-actions">
      <a class="button button-primary" href="/books.php">Explore the cycle</a>
      <a class="button button-ghost" href="/author.php">Meet the author</a>
    </div>
    <div class="hero-metrics" aria-label="Series scale">
      <span><strong><?php echo count($mainBooks); ?></strong> main titles</span>
      <span><strong><?php echo count($collectionBooks); ?></strong> collection novels</span>
      <span><strong>3</strong> storefronts</span>
    </div>
  </div>

  <?php if ($featured): ?>
    <div class="hero-library reveal" style="--delay: 120ms;">
      <?php foreach ($heroStack as $index => $book): ?>
        <a class="hero-volume hero-volume-<?php echo (int) $index; ?>" href="<?php echo e(book_url($book)); ?>" aria-label="View <?php echo e($book['title']); ?>">
          <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" />
        </a>
      <?php endforeach; ?>
      <div class="hero-feature">
        <span><?php echo e($featured['volume_label']); ?></span>
        <strong><?php echo e($featured['title']); ?></strong>
        <p><?php echo e($featured['signal']); ?></p>
      </div>
    </div>
  <?php endif; ?>
</section>

<section class="statement reveal" id="signal">
  <div>
    <p class="eyebrow">The archive</p>
    <h2>A universe remembered through worlds, heirs, relics, and songs.</h2>
  </div>
  <p>From the mists before Earth to the Loomheart at the end of the Second Spiral, every volume carries a distinct cover, platform presence, and place in the larger myth.</p>
</section>

<section class="book-showcase">
  <div class="section-heading reveal">
    <p class="eyebrow">Main sequence</p>
    <h2>Fifteen books in orbit.</h2>
    <a class="text-link" href="/books.php">View full archive</a>
  </div>

  <div class="book-grid">
    <?php foreach ($mainBooks as $index => $book): ?>
      <article class="book-card reveal" style="--delay: <?php echo (int) ($index * 55); ?>ms;">
        <a href="<?php echo e(book_url($book)); ?>" class="book-card-link" aria-label="View <?php echo e($book['title']); ?>">
          <span class="book-number"><?php echo e($book['package']); ?></span>
          <span class="book-cover-frame">
            <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" class="book-cover" loading="lazy" />
          </span>
          <span class="book-glow" aria-hidden="true"></span>
          <h3><?php echo e($book['title']); ?></h3>
          <p><?php echo e($book['signal']); ?></p>
        </a>
        <div class="mini-store-row" aria-label="Retail links for <?php echo e($book['title']); ?>">
          <?php foreach (array_slice(retail_links($book), 0, 3) as $link): ?>
            <a class="store-pill store-<?php echo e($link['service']); ?>" href="<?php echo e($link['url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($link['label']); ?></a>
          <?php endforeach; ?>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="collection-strip reveal">
  <div class="section-heading">
    <p class="eyebrow">Collection novels</p>
    <h2>The two great spirals.</h2>
  </div>
  <div class="collection-grid">
    <?php foreach ($collectionBooks as $index => $book): ?>
      <article class="collection-card">
        <a class="collection-cover" href="<?php echo e(book_url($book)); ?>" aria-label="View <?php echo e($book['title']); ?>">
          <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
        </a>
        <div>
          <p class="eyebrow"><?php echo e($book['package']); ?> / <?php echo e($book['volume_label']); ?></p>
          <h3><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h3>
          <p><?php echo e($book['description']); ?></p>
          <div class="store-row" aria-label="Retail links for <?php echo e($book['title']); ?>">
            <?php foreach (retail_links($book) as $link): ?>
              <a class="store-button store-<?php echo e($link['service']); ?>" href="<?php echo e($link['url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($link['label']); ?></a>
            <?php endforeach; ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="feature-band reveal">
  <div class="feature-stat">
    <strong><?php echo count($mainBooks); ?></strong>
    <span>main titles</span>
  </div>
  <div class="feature-stat">
    <strong><?php echo count($books); ?></strong>
    <span>total books</span>
  </div>
  <div class="feature-stat">
    <strong>Apple</strong>
    <span>Google and Amazon too</span>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
