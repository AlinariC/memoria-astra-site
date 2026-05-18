<?php
$pageTitle = 'Memoria Astra';
$pageDescription = 'Explore Memoria Astra, a 15-book speculative saga with two collection novels spanning memory, flame, song, and rebirth across the stars.';
include 'includes/header.php';

$books = load_books();
$mainBooks = main_books();
$collectionBooks = collection_books();
$heroBook = end($mainBooks) ?: ($books[0] ?? null);
$collectionFeature = $collectionBooks[1] ?? ($collectionBooks[0] ?? null);
$originBooks = array_slice($mainBooks, 0, 5);
$middleBooks = array_slice($mainBooks, 5, 5);
$closingBooks = array_slice($mainBooks, -5);
$totalBooks = count($books);
?>

<section class="home-hero">
  <div class="home-hero-copy reveal">
    <p class="eyebrow">Complete cycle now available</p>
    <h1>Memoria Astra</h1>
    <p class="hero-lede">Fifteen main titles and two collection novels trace a remembered universe from living mist to the Final Loom: flame, roots, relics, thrones, songs, and civilizations brave enough to begin again.</p>
    <div class="hero-actions">
      <a class="button button-primary" href="/books.php">Explore the archive</a>
      <a class="button button-ghost" href="/author.php">Meet the author</a>
    </div>
    <?php if ($heroBook): ?>
      <div class="hero-retail-panel" aria-label="Retail links for <?php echo e($heroBook['title']); ?>">
        <span class="retail-panel-label">Latest main title</span>
        <div class="retail-button-row">
          <?php foreach (array_slice(retail_links($heroBook), 0, 4) as $link): ?>
            <?php echo retail_button($link, 'compact'); ?>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($heroBook): ?>
    <div class="hero-book-stage reveal" style="--delay: 120ms;">
      <a class="hero-cover-card" href="<?php echo e(book_url($heroBook)); ?>" aria-label="View <?php echo e($heroBook['title']); ?>">
        <img src="<?php echo e(book_image($heroBook)); ?>" alt="<?php echo e($heroBook['title']); ?> cover" />
        <span class="cover-caption">
          <span><?php echo e($heroBook['volume_label']); ?></span>
          <strong><?php echo e($heroBook['title']); ?></strong>
        </span>
      </a>
      <?php if ($collectionFeature): ?>
        <a class="hero-companion-card" href="<?php echo e(book_url($collectionFeature)); ?>" aria-label="View <?php echo e($collectionFeature['title']); ?>">
          <img src="<?php echo e(book_image($collectionFeature)); ?>" alt="<?php echo e($collectionFeature['title']); ?> cover" />
          <span><?php echo e($collectionFeature['title']); ?></span>
        </a>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>

<section class="signal-board reveal" aria-label="Series overview">
  <div class="signal-stat">
    <strong><?php echo count($mainBooks); ?></strong>
    <span>Main titles</span>
  </div>
  <div class="signal-stat">
    <strong><?php echo count($collectionBooks); ?></strong>
    <span>Collection novels</span>
  </div>
  <div class="signal-stat">
    <strong><?php echo $totalBooks; ?></strong>
    <span>Total volumes</span>
  </div>
  <div class="signal-stat">
    <strong>5</strong>
    <span>Formats and storefronts</span>
  </div>
</section>

<section class="spiral-index">
  <div class="section-heading reveal">
    <div>
      <p class="eyebrow">Spiral index</p>
      <h2>Read the cycle like a star chart.</h2>
    </div>
    <a class="text-link" href="/books.php">Full books page</a>
  </div>
  <ol class="orbit-list" aria-label="Main sequence quick index">
    <?php foreach ($mainBooks as $index => $book): ?>
      <li class="reveal" style="--delay: <?php echo (int) ($index * 35); ?>ms;">
        <a href="<?php echo e(book_url($book)); ?>">
          <span class="orbit-number"><?php echo e($book['package']); ?></span>
          <span class="orbit-title"><?php echo e($book['title']); ?></span>
          <span class="orbit-signal"><?php echo e($book['signal']); ?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ol>
</section>

<section class="book-lane">
  <div class="section-heading reveal">
    <div>
      <p class="eyebrow">Begin here</p>
      <h2>The first signals.</h2>
    </div>
  </div>
  <div class="cover-lane">
    <?php foreach ($originBooks as $index => $book): ?>
      <article class="cover-tile reveal" style="--delay: <?php echo (int) ($index * 60); ?>ms;">
        <a class="cover-tile-art" href="<?php echo e(book_url($book)); ?>">
          <span><?php echo e($book['package']); ?></span>
          <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
        </a>
        <div class="cover-tile-copy">
          <h3><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h3>
          <p><?php echo e($book['signal']); ?></p>
          <div class="retail-button-row retail-button-row-tight" aria-label="Retail links for <?php echo e($book['title']); ?>">
            <?php foreach (array_slice(retail_links($book), 0, 3) as $link): ?>
              <?php echo retail_button($link, 'mini'); ?>
            <?php endforeach; ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="arc-split">
  <div class="arc-copy reveal">
    <p class="eyebrow">Middle movement</p>
    <h2>Memory turns into inheritance, accord, and power.</h2>
    <p>The central volumes widen the saga from survival into consent, restraint, and the civilizations that learn what ancient music can demand of the living.</p>
  </div>
  <div class="arc-stack reveal" style="--delay: 120ms;">
    <?php foreach ($middleBooks as $book): ?>
      <a href="<?php echo e(book_url($book)); ?>">
        <span><?php echo e($book['package']); ?></span>
        <strong><?php echo e($book['title']); ?></strong>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<section class="book-lane book-lane-final">
  <div class="section-heading reveal">
    <div>
      <p class="eyebrow">Closing arc</p>
      <h2>The Second Spiral gathers.</h2>
    </div>
  </div>
  <div class="finale-grid">
    <?php foreach ($closingBooks as $index => $book): ?>
      <article class="finale-card reveal" style="--delay: <?php echo (int) ($index * 60); ?>ms;">
        <a href="<?php echo e(book_url($book)); ?>" class="finale-cover">
          <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
        </a>
        <div>
          <p class="eyebrow"><?php echo e($book['package']); ?> / <?php echo e($book['volume_label']); ?></p>
          <h3><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h3>
          <p><?php echo e($book['signal']); ?></p>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="collection-ledger reveal">
  <div class="section-heading">
    <div>
      <p class="eyebrow">Collection novels</p>
      <h2>The two great spirals.</h2>
    </div>
  </div>
  <div class="collection-ledger-grid">
    <?php foreach ($collectionBooks as $book): ?>
      <article class="collection-ledger-card">
        <a class="collection-ledger-cover" href="<?php echo e(book_url($book)); ?>">
          <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
        </a>
        <div class="collection-ledger-copy">
          <p class="eyebrow"><?php echo e($book['package']); ?> / <?php echo e($book['volume_label']); ?></p>
          <h3><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h3>
          <p><?php echo e($book['description']); ?></p>
          <div class="retail-button-row" aria-label="Retail links for <?php echo e($book['title']); ?>">
            <?php foreach (retail_links($book) as $link): ?>
              <?php echo retail_button($link, 'compact'); ?>
            <?php endforeach; ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
