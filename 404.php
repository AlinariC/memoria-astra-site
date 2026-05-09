<?php
$pageTitle = 'Page Not Found';
$pageDescription = 'The requested page could not be found.';
include 'includes/header.php';
?>

<section class="not-found-section reveal">
  <p class="eyebrow">404</p>
  <h1>Signal lost in deep space.</h1>
  <p>The page you requested is not in the archive. Return home or continue through the book cycle.</p>
  <div class="hero-actions">
    <a class="button button-primary" href="/index.php">Return home</a>
    <a class="button button-ghost" href="/books.php">Browse books</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
