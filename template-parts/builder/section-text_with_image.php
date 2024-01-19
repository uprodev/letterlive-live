<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="title-img-text">
		<div class="content-width">

			<?php if ($title): ?>
				<div class="title-wrap">
					<div class="title-h2"><?= $title ?></div>
				</div>
			<?php endif ?>
			
			<?php if ($text): ?>
				<div class="text-wrap">
					<?= $text ?>
				</div>
			<?php endif ?>
			
			<?php if ($image): ?>
				<figure>
					<?= wp_get_attachment_image($image['ID'], 'full') ?>
				</figure>
			<?php endif ?>
			
		</div>
	</section>

	<?php endif; ?>