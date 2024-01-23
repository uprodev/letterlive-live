<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="img-text">
		<div class="content-width">
			<div class="content">

				<?php if ($image): ?>
					<figure>
						<?= wp_get_attachment_image($image['ID'], 'full') ?>
					</figure>
				<?php endif ?>
				
				<div class="text">

					<?php if ($title): ?>
						<h2 class="title"><?= $title ?></h2>
					<?php endif ?>
					
					<?php if ($image): ?>
						<figure class="mob">
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						</figure>
					<?php endif ?>
					
					<?php if ($text): ?>
						<?= $text ?>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>