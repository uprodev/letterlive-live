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

		<?php if ($field = get_field('people_image')): ?>
			<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'user')) ?>
		<?php endif ?>

	</div>
	<div class="wrap">
		<h3 class="title"><?php the_title() ?></h3>

		<?php if ($field = get_field('excerpt')): ?>
			<p><?= $field ?></p>
		<?php endif ?>
		
		<ul>

			<li>
				<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-1.svg" alt="">
				<p><?= ($field = get_field('date')) ? date('M d', strtotime($field)) : (get_field('tba_date_text') ?: __('TBA', 'Letterlife')) ?></p>
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

					<?= ($field = get_field('date')) ? date('H:i', strtotime($field)) . ' ' . __('CET', 'Letterlife') . ', ' : (get_field('tba_time_text') ?: __('TBA', 'Letterlife')) ?>

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
		
		<?php if ($field = get_field('link')): ?>
			<div class="btn-wrap">
				<a href="<?= $field['url'] ?>" class="btn-default btn-big"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
			</div>
		<?php endif ?>

	</div>
</div>