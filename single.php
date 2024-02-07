<?php get_header(); ?>

<section class="post-block">
	<div class="content-width">
		<div class="main">
			<div class="top">
				<ul class="breadcrumb">
					<?php if(function_exists('bcn_display')) bcn_display() ?>
				</ul>

				<?php get_template_part('parts/share') ?>

			</div>
			<div class="content">
				<h1><?php the_title() ?></h1>
				<?php the_content() ?>
			</div>
			<div class="share">

				<?php if (!get_field('is_not_author') && get_field('author')): ?>
					<div class="author-wrap">

						<?php if ($field = get_field('author')['image']): ?>
							<div class="img-wrap-author">
								<?= wp_get_attachment_image($field['ID'], 'full') ?>
							</div>
						<?php endif ?>

						<?php if (get_field('author')['name'] || get_field('author')['description']): ?>
						<p class="name">

							<?php if ($field = get_field('author')['name']): ?>
								<?= $field ?>
							<?php endif ?>

							<?php if ($field = get_field('author')['description']): ?>
								<span><?= $field ?></span>
							<?php endif ?>

						</p>
					<?php endif ?>

				</div>
			<?php endif ?>

			<?php if (get_field('form_p', 'option')): ?>
				<div class="mail-wrap-block mail-wrap-block-mob">

					<?php if ($field = get_field('form_p', 'option')['title']): ?>
						<p class="title"><?= $field ?></p>
					<?php endif ?>

					<?php if ($field = get_field('form_p', 'option')['text']): ?>
						<?= $field ?>
					<?php endif ?>

					<?php if ($field = get_field('form_p', 'option')['form']): ?>
						<?= do_shortcode($field) ?>
					<?php endif ?>

				</div>
			<?php endif ?>

			<h6><?php the_field('share_p', 'option') ?></h6>
			
			<?php get_template_part('parts/share') ?>
			
			<?php $tags = wp_get_object_terms(get_the_ID(), 'post_tag') ?>

			<?php if ($tags): ?>
				<ul class="tag">

					<?php foreach ($tags as $tag): ?>
						<li>
							<a href="<?= get_term_link($tag->term_id) ?>"><?= $tag->name ?></a>
						</li>
					<?php endforeach ?>

				</ul>
			<?php endif ?>

		</div>
	</div>

	<?php 
	$args = array(
		'post_type' => 'post',  
		'posts_per_page' => 10,
		'post__not_in' => [get_the_ID()],
		'paged' => get_query_var('paged')
	);
	$wp_query = new WP_Query($args);
	if($wp_query->have_posts()): 
		?>

		<aside class="aside-right">
			<p class="title"><?php the_field('latest_p', 'option') ?></p>
			<ul>

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink() ?>">
							<?php the_title() ?>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-8.svg" alt="">
						</a>
					</li>
				<?php endwhile; ?>

			</ul>

			<?php if (get_field('form_p', 'option')): ?>
				<div class="mail-wrap-block">

					<?php if ($field = get_field('form_p', 'option')['title']): ?>
						<p class="title"><?= $field ?></p>
					<?php endif ?>
					
					<?php if ($field = get_field('form_p', 'option')['text']): ?>
						<?= $field ?>
					<?php endif ?>
					
					<?php if ($field = get_field('form_p', 'option')['form']): ?>
						<?= do_shortcode($field) ?>
					<?php endif ?>
					
				</div>
			<?php endif ?>

		</aside>

		<?php 
	endif;
	wp_reset_query(); 
	?>

</div>
</section>

<section class="read-block blog latest-blog">
	<div class="content-width">
		<div class="title-h2 title-600"><?php the_field('latest_p', 'option') ?></div>

		<?php 
		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => 3,
			'post__not_in' => [get_the_ID()],
			'paged' => get_query_var('paged')
		);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()): 
			?>

			<div class="content posts-response">

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<div class="item">

						<?php get_template_part('parts/content', 'post') ?>

					</div>
				<?php endwhile; ?>

			</div>

			<?php 
		endif;
		wp_reset_postdata(); 
		?>

		<?php if ($wp_query->max_num_pages > 1) { ?>
			<script> var this_page = 1; </script>

			<div class="btn-wrap">
				<a href="#" class="btn-loadmore btn-default" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><?php the_field('load_p', 'option') ?></a>
			</div>
		<?php } ?>

	</div>
</section>

<?php get_footer(); ?>