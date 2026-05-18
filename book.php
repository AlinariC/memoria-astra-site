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
      <p class="eyebrow"><?php echo e($book['package']); ?> / <?php echo e(book_meta_line($book)); ?></p>
      <h1><?php echo e($book['title']); ?></h1>
      <p class="detail-signal"><?php echo e($book['signal']); ?></p>
      <p><?php echo e($book['description']); ?></p>
      <dl class="book-facts">
        <div>
          <dt>Sequence</dt>
          <dd><?php echo e($book['volume_label']); ?></dd>
        </div>
        <div>
          <dt>Ebook</dt>
          <dd><?php echo e($book['ebook_price'] ?? 'Available'); ?></dd>
        </div>
        <div>
          <dt>Paperback</dt>
          <dd><?php echo e($book['paperback_price'] ?? 'Available'); ?></dd>
        </div>
        <?php if (!empty($book['hardcover_price'])): ?>
          <div>
            <dt>Hardcover</dt>
            <dd><?php echo e($book['hardcover_price']); ?></dd>
          </div>
        <?php endif; ?>
      </dl>
      <div class="tag-list" aria-label="Book themes">
        <?php foreach ($book['tags'] as $tag): ?>
          <span><?php echo e($tag); ?></span>
        <?php endforeach; ?>
      </div>
      <div class="store-row store-row-large" aria-label="Retail links for <?php echo e($book['title']); ?>">
        <?php foreach (retail_links($book) as $link): ?>
          <?php echo retail_button($link); ?>
        <?php endforeach; ?>
      </div>
      <div class="hero-actions detail-actions">
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
