<?php 
$permalink = get_field('date') ? get_the_permalink() : $args['register_page_url']; 
$link_text = get_field('date') ? __('Register', 'Letterlife') : __('Get notified', 'Letterlife');
?>

<div class="item">
	<div class="bg">

		<?php if ($field = get_field('background')): ?>
			<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img')) ?>
		<?php endif ?>

		<?php if ($field = get_field('background_mobile')): ?>
			<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img-mob')) ?>
		<?php endif ?>

		<?php if (has_post_thumbnail()): ?>
			<?php the_post_thumbnail('full', 'class=user') ?>
		<?php endif ?>

	</div>
	<div class="wrap">
		<h3 class="title"><?php the_title() ?></h3>

		<?php if (get_the_excerpt()): ?>
			<p><?php the_excerpt() ?></p>
		<?php endif ?>

		<ul>

			<li>
				<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-1.svg" alt="">
				<p><?= ($field = get_field('date')) ? date('M d', strtotime($field)) : __('TBA', 'Letterlife') ?></p>
			</li>

			<?php if ($field = get_field('language')): ?>
				<li>
					<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-2.svg" alt="">
					<p><?= $field ?></p>
				</li>
			<?php endif ?>

			<li>
				<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-3.svg" alt="">
				<p>

					<?= ($field = get_field('date')) ? date('H:i', strtotime($field)) . ' ' . __('CET', 'Letterlife') . ', ' : __('TBA', 'Letterlife') ?>

					<?php if ($field = get_field('duration')): ?>
						<?= $field ?>
					<?php endif ?>

				</p>
			</li>

			<?php if ($field = get_field('new_price')): ?>
				<li>
					<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-4.svg" alt="">
					<p><?= $field ?></p>

					<?php if (get_field('old_price')): ?>
						<p class="old"><?= get_field('old_price') ?></p>
					<?php endif ?>

				</li>
			<?php endif ?>

		</ul>
		<div class="btn-wrap">
			<a href="<?= get_field('date') ? get_permalink() : $args['register_page_url'] ?>" class="btn-default btn-big"><?= get_field('date') ? __('Register', 'Letterlife') : __('Get notified', 'Letterlife') ?></a>
		</div>
	</div>
</div>