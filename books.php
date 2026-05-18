<?php
$pageTitle = 'Books';
$pageDescription = 'Browse all 15 main Memoria Astra titles and the two collection novels.';
include 'includes/header.php';

$books = load_books();
$mainBooks = main_books();
$collectionBooks = collection_books();
?>

<section class="books-hero reveal">
  <div>
    <p class="eyebrow">Complete archive</p>
    <h1>The Memoria Astra Cycle</h1>
  </div>
  <p>Seventeen volumes, organized for actual browsing: fifteen main titles in sequence, two collection novels that frame the larger myth, and direct storefront buttons for Apple Books, Google Play Books, Kindle, paperback, and selected hardbacks.</p>
</section>

<nav class="archive-tabs reveal" aria-label="Book archive sections">
  <a href="#main-sequence">Main Sequence</a>
  <a href="#collections">Collection Novels</a>
  <a href="#formats">Formats</a>
</nav>

<section class="catalog-shell">
  <aside class="catalog-aside reveal" id="formats">
    <p class="eyebrow">Formats</p>
    <h2>Choose your shelf.</h2>
    <div class="format-list" aria-label="Available storefront and format types">
      <span class="format-badge retail-apple"><?php echo retail_icon('apple'); ?>Apple Books</span>
      <span class="format-badge retail-google"><?php echo retail_icon('google'); ?>Google Play</span>
      <span class="format-badge retail-kindle"><?php echo retail_icon('kindle'); ?>Kindle</span>
      <span class="format-badge retail-paperback"><?php echo retail_icon('paperback'); ?>Paperback</span>
      <span class="format-badge retail-hardcover"><?php echo retail_icon('hardcover'); ?>Hardcover</span>
    </div>
  </aside>

  <div class="catalog-main">
    <section class="catalog-section" id="main-sequence">
      <div class="catalog-section-heading reveal">
        <p class="eyebrow">Main sequence</p>
        <h2>Books I-XV</h2>
      </div>

      <div class="catalog-list">
        <?php foreach ($mainBooks as $index => $book): ?>
          <article class="catalog-row reveal" style="--delay: <?php echo (int) ($index * 35); ?>ms;">
            <a href="<?php echo e(book_url($book)); ?>" class="catalog-thumb" aria-label="View <?php echo e($book['title']); ?>">
              <span><?php echo e($book['package']); ?></span>
              <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
            </a>
            <div class="catalog-copy">
              <p class="catalog-meta"><?php echo e(book_meta_line($book)); ?></p>
              <h3><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h3>
              <p><?php echo e($book['signal']); ?></p>
              <div class="tag-list" aria-label="Book themes">
                <?php foreach (array_slice($book['tags'], 0, 3) as $tag): ?>
                  <span><?php echo e($tag); ?></span>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="catalog-actions" aria-label="Retail links for <?php echo e($book['title']); ?>">
              <?php foreach (retail_links($book) as $link): ?>
                <?php echo retail_button($link, 'compact'); ?>
              <?php endforeach; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="catalog-section" id="collections">
      <div class="catalog-section-heading reveal">
        <p class="eyebrow">Collection novels</p>
        <h2>The arc volumes</h2>
      </div>

      <div class="collection-catalog-grid">
        <?php foreach ($collectionBooks as $index => $book): ?>
          <article class="collection-catalog-card reveal" style="--delay: <?php echo (int) ($index * 70); ?>ms;">
            <a href="<?php echo e(book_url($book)); ?>" class="collection-catalog-art" aria-label="View <?php echo e($book['title']); ?>">
              <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
            </a>
            <div class="collection-catalog-copy">
              <p class="eyebrow"><?php echo e($book['package']); ?> / <?php echo e(book_meta_line($book)); ?></p>
              <h3><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h3>
              <p><?php echo e($book['description']); ?></p>
              <div class="tag-list" aria-label="Book themes">
                <?php foreach ($book['tags'] as $tag): ?>
                  <span><?php echo e($tag); ?></span>
                <?php endforeach; ?>
              </div>
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
  </div>
</section>

<?php include 'includes/footer.php'; ?>
