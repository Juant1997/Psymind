<article class="post-card h-100 overflow-hidden">
  <?php if (!empty($image)) : ?>
    <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" class="img-fluid post-image" loading="lazy" />
  <?php endif; ?>
  <div class="p-4">
    <div><?php echo $badge; ?></div>
    <p class="text-secondary small mb-2"><?php echo $date; ?></p>
    <h2 class="h5"><?php echo $title; ?></h2>
    <p class="text-secondary"><?php echo $description; ?></p>
    <a class="fw-bold text-primary" href="<?php echo $link; ?>"><?php echo $linkText; ?><i class="bi bi-arrow-right"></i></a>
  </div>
</article>