<section class="<?= get_field('width') == 'wide' ? 'wide' : 'narrow' ?> panel panel-white">
	<div class="panel-content">

		<?php if ($field = get_field('title')): ?>
			<h2><?= $field ?></h2>
		<?php endif ?>
		
		<?php if ($field = get_field('text')): ?>
			<?= $field ?>
		<?php endif ?>
		
	</div>
</section>