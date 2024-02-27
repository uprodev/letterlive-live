<?php 
$webinars_pade_id = apply_filters('wpml_object_id', 2702, 'page');
?>

<section class="subscribe">
	<div class="content-width">
		<div class="content">

			<?php if ($field = get_field('title_4', $webinars_pade_id)): ?>
				<h2 class="title-h3"><?= $field ?></h2>
			<?php endif ?>
			
			<?php if ($field = get_field('text_4', $webinars_pade_id)): ?>
				<?= $field ?>
			<?php endif ?>
			
			<?php if ($field = get_field('form_4', $webinars_pade_id)): ?>
				<?= do_shortcode($field) ?>
			<?php endif ?>
			
		</div>
	</div>
</section>