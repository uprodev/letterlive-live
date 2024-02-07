<!doctype html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <?php if ($field = get_field('code_in_head_h', 'option')): ?>
    <?= $field ?>
  <?php endif ?>

</head>

<?php $body_class = get_field('is_transparent_header') ? 'header-bg-none' : '' ?>

<body <?php body_class($body_class); ?>>
  <?php wp_body_open(); ?>
  
  <?php if ($field = get_field('code_in_body_h', 'option')): ?>
    <?= $field ?>
  <?php endif ?>

  <header>
    <div class="top-line">
      <div class="content-width">
        <div class="left">

          <?php if (get_field('image_h', 'option') || get_field('image_mobile_h', 'option')): ?>
          <div class="logo-wrap">
            <a href="<?= get_home_url() ?>">

              <?php if ($field = get_field('image_h', 'option')): ?>
                <?= wp_get_attachment_image($field['ID'], 'full') ?>
              <?php endif ?>

              <?php if ($field = get_field('image_mobile_h', 'option')): ?>
                <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'mob')) ?>
              <?php endif ?>
              
            </a>
          </div>
        <?php endif ?>

        <nav class="top-menu">

          <?php wp_nav_menu( array(
            'theme_location'  => 'header',
            'container'       => '',
            'items_wrap'      => '<ul>%3$s</ul>'
          )); ?>

        </nav>
      </div>
      <div class="right">

        <?php if(have_rows('links_h', 'option')): ?>

          <div class="btn-wrap">

            <?php while(have_rows('links_h', 'option')): the_row() ?>

              <?php if ($field = get_sub_field('link')): ?>
                <a href="<?= $field['url'] ?>" class="btn-default<?php if(get_sub_field('color') == 'White') echo ' btn-border' ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
              <?php endif ?>

            <?php endwhile ?>

          </div>

        <?php endif ?>

        <?php custom_language_switcher() ?>

        <div class="open-menu">
          <a href="#">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/menu.svg" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="menu-responsive" id="menu-responsive" style="display: none">
  <div class="wrap">
    <nav class="mob-menu">

      <?php wp_nav_menu( array(
        'theme_location'  => 'header',
        'container'       => '',
        'items_wrap'      => '<ul>%3$s</ul>'
      )); ?>

    </nav>
    
    <?php if(have_rows('links_h', 'option')): ?>

      <div class="btn-wrap">

        <?php while(have_rows('links_h', 'option')): the_row() ?>

          <?php if ($field = get_sub_field('link')): ?>
            <a href="<?= $field['url'] ?>" class="btn-default<?php if(get_sub_field('color') == 'White') echo ' btn-border' ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
          <?php endif ?>

        <?php endwhile ?>

      </div>

    <?php endif ?>

    <div class="lang-wrap">

      <?php custom_language_switcher_mob() ?>

    </div>
  </div>
</div>
<main>