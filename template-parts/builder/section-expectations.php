<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="plan-couch">
		<div class="bg">
			<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-13.png" alt="">
			<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-16.png" alt="" class="mob-bg">
		</div>
		<div class="content-width">
			<div class="content">
				<div class="img-wrap">

					<?php if ($title): ?>
						<h2 class="title"><?= $title ?></h2>
					<?php endif ?>
					
					<?php if ($image): ?>
						<figure>
							<?= wp_get_attachment_image($image['ID'], 'full') ?>

							<?php if ($caption): ?>
								<figcaption><?= $caption ?></figcaption>
							<?php endif ?>

						</figure>
					<?php endif ?>
					
				</div>
				<div class="text">

					<?php if ($text): ?>
						<?= $text ?>
					<?php endif ?>

					<?php if ($link): ?>
						<div class="btn-wrap">
							<a href="<?= $link['url'] ?>" class="btn-default btn-big"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
						</div>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>