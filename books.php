<?php
$pageTitle = 'Books';
$pageDescription = 'Browse every volume in the Memoria Astra Cycle.';
include 'includes/header.php';

$books = load_books();
?>

<section class="page-hero compact reveal">
  <p class="eyebrow">Archive</p>
  <h1>The Memoria Astra Cycle</h1>
  <p>Seven volumes trace the long arc from forgotten origins to harmonic rebirth.</p>
</section>

<section class="archive-grid">
  <?php foreach ($books as $index => $book): ?>
    <article class="archive-card reveal" style="--delay: <?php echo (int) ($index * 65); ?>ms;">
      <a href="<?php echo e(book_url($book)); ?>" class="archive-cover" aria-label="View <?php echo e($book['title']); ?>">
        <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" loading="lazy" />
      </a>
      <div class="archive-content">
        <p class="eyebrow"><?php echo e($book['volume_label']); ?></p>
        <h2><a href="<?php echo e(book_url($book)); ?>"><?php echo e($book['title']); ?></a></h2>
        <p><?php echo e($book['description']); ?></p>
        <div class="tag-list" aria-label="Book themes">
          <?php foreach ($book['tags'] as $tag): ?>
            <span><?php echo e($tag); ?></span>
          <?php endforeach; ?>
        </div>
        <?php if (!empty($book['buy_url'])): ?>
          <a class="button button-primary button-small" href="<?php echo e($book['buy_url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="Buy <?php echo e($book['title']); ?> on Amazon">Buy Now</a>
        <?php endif; ?>
      </div>
    </article>
  <?php endforeach; ?>
</section>

<?php include 'includes/footer.php'; ?>
