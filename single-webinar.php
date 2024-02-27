<?php get_header(); ?>

<?php 
$webinars_pade_id = apply_filters('wpml_object_id', 2702, 'page');
$register_page_url = get_field('webinar_register_page_w', 'option') ?: get_permalink(apply_filters('wpml_object_id', 2482, 'page')); 
?>

<section class="banner-webinar banner-webinar-all">
	<div class="content-width">
		<div class="content">
			<div class="bg">

				<?php if ($field = get_field('background')): ?>
					<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img')) ?>
				<?php endif ?>

				<?php if ($field = get_field('background_mobile')): ?>
					<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img-mob')) ?>
				<?php endif ?>

				<?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail('full', 'class=img') ?>
				<?php endif ?>

			</div>
			<div class="timer"></div>
			<div class="wrap">
				<h1><?php the_title() ?></h1>
				<div class="text-wrap">

					<?php if (has_excerpt()): ?>
						<p><?php the_excerpt() ?></p>
					<?php endif ?>
					
					<?php the_content() ?>
				</div>
				<ul class="list-info">

					<?php if ($field = get_field('date')): ?>
						<li>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-1.svg" alt="">
							<p><?= date('M d', strtotime($field)) ?></p>
						</li>
					<?php endif ?>

					<?php if ($field = get_field('language')): ?>
						<li>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-2.svg" alt="">
							<p><?= $field ?></p>
						</li>
					<?php endif ?>

					<?php if (get_field('date') || get_field('duration')): ?>
					<li>
						<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-3.svg" alt="">
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
				<a href="<?= get_field('date') ? get_permalink($webinar->ID) : $register_page_url ?>" class="btn-default btn-big"><?= get_field('date') ? __('Register', 'Letterlife') : __('Get notified', 'Letterlife') ?></a>
			</div>
		</div>
	</div>
</div>
</section>

<section class="webinar-big">
	<div class="content-width">
		<div class="content">

			<?php if ($field = get_field('title_1', $webinars_pade_id)): ?>
				<h3 class="title-h3"><?= $field ?></h3>
			<?php endif ?>

			<?php if (get_field('get_webinars_from_page_2') && !get_field('all_webinars_2', $webinars_pade_id) && get_field('webinars_2', $webinars_pade_id)): ?>

			<?php
			$featured_posts = get_field('webinars_2', $webinars_pade_id);
			if($featured_posts): ?>

				<?php foreach($featured_posts as $post): 

					global $post;
					setup_postdata($post); ?>
					<?php get_template_part('parts/content', 'webinar_full_width', ['register_page_url' => $register_page_url]) ?>
				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

		<?php elseif (!get_field('get_webinars_from_page_2') && !get_field('all_webinars_2') && get_field('webinars_2')): ?>

		<?php
		$featured_posts = get_field('webinars_2');
		if($featured_posts): ?>

			<?php foreach($featured_posts as $post): 

				global $post;
				setup_postdata($post); ?>
				<?php get_template_part('parts/content', 'webinar_full_width', ['register_page_url' => $register_page_url]) ?>
			<?php endforeach; ?>

			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

	<?php else: ?>

		<?php 
		$args = array(
			'post_type' => 'webinar', 
			'posts_per_page' => -1,
			'post__not_in' => [get_the_ID()],
			'paged' => get_query_var('paged')
		);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()): 
			?>

			<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
				<?php get_template_part('parts/content', 'webinar_full_width', ['register_page_url' => $register_page_url]) ?>
			<?php endwhile; ?>

			<?php 
		endif;
		wp_reset_query(); 
		?>

	<?php endif ?>

</div>
</div>
</section>

<?php get_template_part('parts/recorded_webinars', '', ['register_page_url' => $register_page_url]) ?>

<?php get_template_part('parts/webinar_subscribe') ?>

<?php get_footer(); ?>