<?php get_header(); ?>

<?php if (get_the_content()): ?>
	<section class="terms">
		<div class="bg">
			<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-3.png" alt="">
			<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-4.png" alt="" class="mob">
		</div>
		<div class="content-width">
			<h1><?php the_title() ?></h1>
			<div class="content">
				<?php the_content() ?>
			</div>
		</div>
	</section>
<?php endif ?>

<?php if ( have_posts() ) :

	get_template_part( 'template-parts/content', 'builder' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php get_footer(); ?>