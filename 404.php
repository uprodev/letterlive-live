<?php get_header(); ?>

<section class="home-banner">
	<div class="content-width">
		<div class="left">

			<?php if ($field = get_field('text_404', 'option')): ?>
				<?= $field ?>
			<?php endif ?>

			<?php if ($field = get_field('button_text_404', 'option')): ?>
				<a href="<?= get_home_url() ?>" class="btn-default">
					<?= $field ?>
					<img src="<?= get_stylesheet_directory_uri() ?>/img/arrow.svg" alt="">
				</a>
			<?php endif ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>