<?php
$pageTitle = 'Author';
$pageDescription = 'Meet the author behind the Memoria Astra Cycle.';
include 'includes/header.php';
?>

<section class="author-section">
  <div class="author-photo-wrap reveal">
    <img src="<?php echo e(asset_image('author.jpg')); ?>" alt="The author of Memoria Astra" class="author-photo" />
  </div>
  <div class="author-copy reveal" style="--delay: 120ms;">
    <p class="eyebrow">The storyteller</p>
    <h1>Worlds built from memory, myth, and cosmic design.</h1>
    <p>The voice behind <strong>Memoria Astra</strong> channels speculative science, ancient tradition, and the ache of remembered worlds into a cycle that stretches from prehistory to the galactic deep.</p>
    <p>The series began with one question: <strong>What if the universe remembers?</strong> From that seed came a saga of relics, descendants, signals, and rebirth.</p>
    <p>Outside the pages of the cycle, the author is a lifelong explorer, builder of worlds, and devoted storyteller living somewhere between the stars and the Pacific coast.</p>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
