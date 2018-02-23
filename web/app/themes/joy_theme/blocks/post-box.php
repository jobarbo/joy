<article class="post">
  <a href="<?= get_the_permalink(); ?>">
    <?= the_post_thumbnail() ?>
    <div class="content">
      <h2 class="title"><?= the_title(); ?></h2>
      <span class="date"><?= the_date('j/m/y'); ?></span>
      <p><?= excerpt(25) ?></p>
      <button class="button"><?= __('Read more','root'); ?></button>
    </div>
  </a>
</article>