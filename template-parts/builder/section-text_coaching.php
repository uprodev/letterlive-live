<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($text): ?>
		<section class="text-center-block">
			<div class="content-width">
				<?= $text ?>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>