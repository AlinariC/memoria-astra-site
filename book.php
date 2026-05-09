<?php
require_once __DIR__ . '/includes/helpers.php';

$slug = $_GET['slug'] ?? '';
$book = find_book_by_slug($slug);
$pageTitle = $book ? $book['title'] : 'Book Not Found';
$pageDescription = $book ? $book['description'] : 'The requested Memoria Astra volume could not be found.';
include 'includes/header.php';
?>

<?php if ($book): ?>
  <article class="book-detail">
    <div class="book-detail-art reveal">
      <img src="<?php echo e(book_image($book)); ?>" alt="<?php echo e($book['title']); ?> cover" class="book-cover-large" />
    </div>
    <div class="book-detail-copy reveal" style="--delay: 120ms;">
      <p class="eyebrow"><?php echo e($book['volume_label']); ?> / <?php echo e($book['status']); ?></p>
      <h1><?php echo e($book['title']); ?></h1>
      <p class="detail-signal"><?php echo e($book['signal']); ?></p>
      <p><?php echo e($book['description']); ?></p>
      <div class="tag-list" aria-label="Book themes">
        <?php foreach ($book['tags'] as $tag): ?>
          <span><?php echo e($tag); ?></span>
        <?php endforeach; ?>
      </div>
      <div class="hero-actions">
        <?php if (!empty($book['buy_url'])): ?>
          <a class="button button-primary" href="<?php echo e($book['buy_url']); ?>" target="_blank" rel="noopener noreferrer">Buy Now</a>
        <?php endif; ?>
        <a class="button button-ghost" href="/books.php">Back to archive</a>
      </div>
    </div>
  </article>
<?php else: ?>
  <section class="not-found-section reveal">
    <p class="eyebrow">Lost signal</p>
    <h1>Book Not Found</h1>
    <p>We could not find that book in the archive. Please check the URL or return to the complete cycle.</p>
    <a class="button button-primary" href="/books.php">Return to books</a>
  </section>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
