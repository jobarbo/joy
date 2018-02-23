<?php
//
//
// FLEXIBLE CONTENTS
$contents = get_field('flexible_content');

if($contents):
  foreach($contents as $content):
    switch ($content['acf_fc_layout']) {
      //
      // TEXT
      case 'wysiwyg':
        ?>
        <div class="text-section">
          <div class="content">
            <?= $content['text'] ?>
          </div>
        </div>
        <?php
      break;
      //
      // IMAGE
      case 'image': ?>
        <div class="image-section<?= ($content['full_width']) ? ' -full-width' : ''  ?>">
          <div class="content">
            <img src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
          </div>
        </div>
      <?php
      break;
      //
      // QUOTE
      case "quote":
        ?>
        <div class="quote-section">
          <div class="content">
            <?= $content['quote'] ?>
          </div>
        </div>
      <?php
      break;
      //
      // SLIDER - CAROUSSEL
      case "slider":
        ?>
        <div class="slider-section">

          <div class="slider">
            <div class="slider-controls">
              <span data-js-flexible-slider-prev></span>
              <span data-js-flexible-slider-next></span>
            </div>
            <ul data-js-flexible-slider>
              <?php foreach ($content['slider'] as $slide): ?>
              <li class="slide">
                <img src="<?= $slide['image']['url']; ?>" alt="<?= $slide['image']['alt'] ?>">
                <div class="legend">
                  <span><?= $slide['legend']; ?></span>
                  <?php if ($slide['add_link']): ?>
                    | <a href="<?= $slide['link']; ?>" target="_blank"><?= $slide['label']; ?></a>
                  <?php endif; ?>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="pager">
            <ul data-js-flexible-slider-pager>
              <?php
              $cpt = 0;
              foreach ($content['slider'] as $slide): ?>
              <li>
                <a data-slide-index="<?= $cpt ?>">
                  <img src="<?= $slide['image']['sizes']['thumbnail']; ?>" alt="<?= $slide['image']['alt'] ?>">
                </a>
              </li>
              <?php $cpt++; ?>
              <?php endforeach; ?>
            </ul>
          </div>

        </div>
      <?php
      break;
    }
  endforeach;
endif;
?>