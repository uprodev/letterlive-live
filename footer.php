</main>
<footer>
  <div class="content-width">
    <div class="top">
      <div class="left">

        <?php if ($field = get_field('title_f', 'option')): ?>
          <h6 class="footer-title"><?= $field ?></h6>
        <?php endif ?>

        <?php if ($field = get_field('text_f', 'option')): ?>
          <?= $field ?>
        <?php endif ?>

      </div>
      <div class="form">

        <?php if ($field = get_field('shortcode_f', 'option')): ?>
          <?= do_shortcode($field) ?>
        <?php endif ?>

        <?php if ($field = get_field('form_text_f', 'option')): ?>
          <p><?= $field ?></p>
        <?php endif ?>

      </div>
    </div>
    <div class="footer-menu">

      <?php if(have_rows('emails_f', 'option')): ?>

        <?php while(have_rows('emails_f', 'option')): the_row() ?>

          <div class="item">

            <?php if ($field = get_sub_field('title')): ?>
              <h6 class="title-menu"><?= $field ?></h6>
            <?php endif ?>
            
            <?php if ($field = get_sub_field('email')): ?>
              <?= $field ?>
            <?php endif ?>
            
          </div>

        <?php endwhile ?>

      <?php endif ?>

      <?php if ($items = get_field('socials_f', 'option')['items']): ?>
        <div class="item">

          <?php if ($field = get_field('socials_f', 'option')['title']): ?>
            <h6 class="title-menu"><?= $field ?></h6>
          <?php endif ?>

          <ul class="soc">

            <?php foreach ($items as $item): ?>
              <?php if ($item['icon']): ?>
                <li>
                  <a href="<?= $item['url'] ?>" target="_blank">
                    <?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
                  </a>
                </li>
              <?php endif ?>
            <?php endforeach ?>

          </ul>
        </div>
      <?php endif ?>

    </div>
    
    <div class="bottom">

      <?php if ($field = get_field('logo_f', 'option')): ?>
        <div class="logo-wrap">
          <a href="<?= get_home_url() ?>">
            <?= wp_get_attachment_image($field['ID'], 'full') ?>
          </a>
        </div>
      <?php endif ?>
      
      <?php if ($field = get_field('copyright_f', 'option')): ?>
        <div class="text-wrap">
          <p><?= $field ?></p>
        </div>
      <?php endif ?>
      
    </div>
  </div>
</footer>

<div id="default-popup " style="display:none;">
  <div class="popup-main">
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>