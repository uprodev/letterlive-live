<?php
/*
Template Name: Research
*/
?>

<?php get_header(); ?>

<?php if (get_the_content()): ?>
	<section class="old-site">
		<div class="content-width">
			<?php the_content() ?>
		</div>
	</section>
<?php endif ?>

<?php get_footer(); ?>