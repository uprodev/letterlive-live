<?php 
$permalink = get_field('date') ? get_the_permalink() : $args['register_page_url']; 
$link_text = get_field('date') ? __('Register', 'Letterlife') : __('Get notified', 'Letterlife');
?>

<div class="item <?php if(get_field('hide_content_on_mobile')) echo ' item-hide-mob' ?>">
	<figure>

		<?php if ($field = get_field('background')): ?>
			<div class="bg">
				<?= wp_get_attachment_image($field['ID'], 'full') ?>
			</div>
		<?php endif ?>
		
		<?php if (has_post_thumbnail()): ?>
			<?php the_post_thumbnail('full', 'class=people') ?>
		<?php endif ?>
		
		<?php if (get_field('name') || get_field('position')): ?>
		<div class="info">

			<?php if ($field = get_field('name')): ?>
				<p class="name"><?= $field ?></p>
			<?php endif ?>
			
			<?php if ($field = get_field('position')): ?>
				<p><?= $field ?></p>
			<?php endif ?>
			
		</div>
	<?php endif ?>

</figure>
<div class="text-wrap">
	<h6 class="title"><?php the_title() ?></h6>

	<?php if (get_the_content()): ?>
		<div class="hide-block-mob">
			<?php the_content() ?>
			<a href="#" class="mob-read"><?php _e('Read all', 'Letterlife') ?></a>
		</div>
	<?php endif ?>
	
	<ul class="list-info">

		<?php if ($field = get_field('date')): ?>
			<li>
				<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-12-1.svg" alt="">
				<p><?= date('F d', strtotime($field)) ?></p>
			</li>
		<?php endif ?>

		<?php if (get_field('date') || get_field('duration')): ?>
		<li>
			<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-12-2.svg" alt="">
			<p>

				<?php if ($field = get_field('date')): ?>
					<?= date('H:i', strtotime($field)) . ' ' . __('CET', 'Letterlife') . ', ' ?>
				<?php endif ?>

				<?php if ($field = get_field('duration')): ?>
					<?= $field ?>
				<?php endif ?>

			</p>
		</li>
	<?php endif ?>

	<?php if ($field = get_field('language')): ?>
		<li>
			<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-12-3.svg" alt="">
			<p><?= $field ?></p>
		</li>
	<?php endif ?>

</ul>
<div class="btn-wrap">
	<a href="<?= $permalink ?>" class="btn-default btn-big"><?= $link_text ?></a>
</div>
</div>
</div>