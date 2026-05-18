<?php
$pageTitle = 'Books';
$pageDescription = 'Browse all 15 main Memoria Astra titles and the two collection novels.';
include 'includes/header.php';

$books = load_books();
$mainBooks = main_books();
$collectionBooks = collection_books();
?>

<section class="page-hero compact reveal">
  <p class="eyebrow">Complete archive</p>
  <h1>The Memoria Astra Cycle</h1>
  <p>Fifteen main titles trace the long arc from living mists to the Final Loom, with two collection novels framing the First and Second Spirals.</p>
</section>

<section class="catalog-jump reveal" aria-label="Catalog sections">
  <a href="#main-sequence">15 main titles</a>
  <a href="#collections">2 collection novels</a>
  <a href="#storefronts">Storefront links</a>
</section>

<section class="archive-section" id="main-sequence">
  <div class="section-heading reveal">
    <p class="eyebrow">Main sequence</p>
    <h2>Books I-XV</h2>
  </div>

<section class="archive-grid">
  <?php foreach ($mainBooks as $index => $book): ?>
    <article class="archive-card reveal" style="--delay: <?php echo (int) ($index * 65); ?>ms;">
      <a href="<?php echo e(book_url($book)); ?>" class="archive-cover" aria-label="View <?php echo e($book['title']); ?>">
        <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
      </a>
      <div class="archive-content">
        <p class="eyebrow"><?php echo e($book['package']); ?> / <?php echo e(book_meta_line($book)); ?></p>
        <h2><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h2>
        <p><?php echo e($book['description']); ?></p>
        <div class="tag-list" aria-label="Book themes">
          <?php foreach ($book['tags'] as $tag): ?>
            <span><?php echo e($tag); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="archive-actions" aria-label="Retail links for <?php echo e($book['title']); ?>">
        <?php foreach (retail_links($book) as $link): ?>
          <a class="store-button store-<?php echo e($link['service']); ?>" href="<?php echo e($link['url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($link['label']); ?></a>
        <?php endforeach; ?>
      </div>
    </article>
  <?php endforeach; ?>
</section>
</section>

<section class="archive-section" id="collections">
  <div class="section-heading reveal">
    <p class="eyebrow">Collection novels</p>
    <h2>The arc volumes</h2>
  </div>

  <section class="archive-grid archive-grid-collections">
    <?php foreach ($collectionBooks as $index => $book): ?>
      <article class="archive-card collection-archive-card reveal" style="--delay: <?php echo (int) ($index * 65); ?>ms;">
        <a href="<?php echo e(book_url($book)); ?>" class="archive-cover" aria-label="View <?php echo e($book['title']); ?>">
          <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
        </a>
        <div class="archive-content">
          <p class="eyebrow"><?php echo e($book['package']); ?> / <?php echo e(book_meta_line($book)); ?></p>
          <h2><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h2>
          <p><?php echo e($book['description']); ?></p>
          <div class="tag-list" aria-label="Book themes">
            <?php foreach ($book['tags'] as $tag): ?>
              <span><?php echo e($tag); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="archive-actions" aria-label="Retail links for <?php echo e($book['title']); ?>">
          <?php foreach (retail_links($book) as $link): ?>
            <a class="store-button store-<?php echo e($link['service']); ?>" href="<?php echo e($link['url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($link['label']); ?></a>
          <?php endforeach; ?>
        </div>
      </article>
    <?php endforeach; ?>
  </section>
</section>

<section class="storefront-note reveal" id="storefronts">
  <p class="eyebrow">Storefronts</p>
  <h2>Apple Books, Google Play Books, and Amazon formats are linked title by title.</h2>
  <p>The cycle is staged across Apple Books, Google Play Books, Kindle, paperback, and selected hardcover editions.</p>
</section>

<?php include 'includes/footer.php'; ?>
