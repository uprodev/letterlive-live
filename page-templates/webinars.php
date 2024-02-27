<?php
/*
Template Name: Webinars
*/
?>

<?php get_header(); ?>

<?php if (get_field('webinar_1') || get_field('title_1')): ?>

<?php $register_page_url = get_field('webinar_register_page_w', 'option') ?: get_permalink(apply_filters('wpml_object_id', 2482, 'page')) ?>

<section class="banner-webinar">
	<div class="content-width">

		<?php if ($field = get_field('title_1')): ?>
			<h2 class="title"><?= $field ?></h2>
		<?php endif ?>

		<?php if ($webinar = get_field('webinar_1')): ?>
			<div class="content">
				<div class="bg">

					<?php if ($field = get_field('background', $webinar->ID)): ?>
						<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img')) ?>
					<?php endif ?>

					<?php if ($field = get_field('background_mobile', $webinar->ID)): ?>
						<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img-mob')) ?>
					<?php endif ?>

					<?php if (has_post_thumbnail($webinar->ID)): ?>
						<?= get_the_post_thumbnail($webinar->ID, 'full', 'class=img') ?>
					<?php endif ?>

				</div>
				<div class="timer"></div>
				<div class="wrap">
					<h1><?= get_the_title($webinar->ID) ?></h1>
					<div class="text-wrap">

						<?php if (has_excerpt($webinar->ID)): ?>
							<p>
								<?= get_the_excerpt($webinar->ID) ?>
								<a href="#" class="read-more">Read more</a>
							</p>
						<?php endif ?>
						
						<?= get_the_content(null, false, $webinar->ID) ?>
					</div>
					<ul class="list-info">

						<?php if ($field = get_field('date', $webinar->ID)): ?>
							<li>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-1.svg" alt="">
								<p><?= date('M d', strtotime($field)) ?></p>
							</li>
						<?php endif ?>

						<?php if ($field = get_field('language', $webinar->ID)): ?>
							<li>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-2.svg" alt="">
								<p><?= $field ?></p>
							</li>
						<?php endif ?>

						<?php if (get_field('date', $webinar->ID) || get_field('duration', $webinar->ID)): ?>
						<li>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-3.svg" alt="">
							<p>

								<?php if ($field = get_field('date', $webinar->ID)): ?>
									<?= date('H:i', strtotime($field)) . ' ' . __('CET', 'Letterlife') . ', ' ?>
								<?php endif ?>

								<?php if ($field = get_field('duration', $webinar->ID)): ?>
									<?= $field ?>
								<?php endif ?>

							</p>
						</li>
					<?php endif ?>

					<?php if ($field = get_field('new_price', $webinar->ID)): ?>
						<li>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-4.svg" alt="">
							<p><?= $field ?></p>

							<?php if (get_field('old_price', $webinar->ID)): ?>
								<p class="old"><?= get_field('old_price', $webinar->ID) ?></p>
							<?php endif ?>

						</li>
					<?php endif ?>

				</ul>
				<div class="btn-wrap">
					<a href="<?= get_field('date', $webinar->ID) ? get_permalink($webinar->ID) : $register_page_url ?>" class="btn-default btn-big"><?= get_field('date', $webinar->ID) ? __('Register', 'Letterlife') : __('Get notified', 'Letterlife') ?></a>
				</div>
			</div>
		</div>
	<?php endif ?>

</div>
</section>
<?php endif ?>

<section class="webinar-2x">
	<div class="content-width">
		<div class="content">

			<?php if (get_field('all_webinars_2')): ?>
				
				<?php 
				$args = array(
					'post_type' => 'webinar', 
					'posts_per_page' => -1,
					'paged' => get_query_var('paged')
				);
				if($webinar) $args['post__not_in'] = [$webinar->ID];
				$wp_query = new WP_Query($args);
				if($wp_query->have_posts()): 
					?>

					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
						<?php get_template_part('parts/content', 'webinar', ['register_page_url' => $register_page_url]) ?>
					<?php endwhile; ?>

					<?php 
				endif;
				wp_reset_query(); 
				?>

			<?php elseif($featured_posts = get_field('webinars_2')): ?>

				<?php foreach($featured_posts as $post): 

					global $post;
					setup_postdata($post); ?>
					<?php get_template_part('parts/content', 'webinar', ['register_page_url' => $register_page_url]) ?>
				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>

			<?php endif ?>

		</div>
	</div>
</section>

<?php get_template_part('parts/recorded_webinars', '', ['register_page_url' => $register_page_url]) ?>

<?php get_template_part('parts/webinar_subscribe') ?>

<?php get_footer(); ?>