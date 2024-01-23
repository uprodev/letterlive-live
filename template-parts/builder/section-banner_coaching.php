<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="coaching-block">

		<?php if ($background || $background_mobile): ?>
			<div class="bg">

				<?php if ($background): ?>
					<?= wp_get_attachment_image($background['ID'], 'full') ?>
				<?php endif ?>

				<?php if ($background_mobile): ?>
					<?= wp_get_attachment_image($background_mobile['ID'], 'full', false, array('class' => 'mob-img')) ?>
				<?php endif ?>

			</div>
		<?php endif ?>
		
		<div class="content-width">
			<div class="text-block">

				<?php if ($text): ?>
					<?= $text ?>
				<?php endif ?>
				
				<?php if ($link): ?>
					<div class="btn-wrap">
						<a href="<?= $link['url'] ?>" class="btn-default btn-big"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
					</div>
				<?php endif ?>

				<div class="rating">

					<?php if ($rating): ?>

						<?php $rating_floor = floor($rating) ?>

						<div class="stars-wrap">

							<?php for ($i = 0; $i < $rating_round; $i++) { ?>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/star-full.svg" alt="">
							<?php } ?>

							<?php if ($rating > $rating_floor): ?>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/star.svg" alt="">
							<?php endif ?>
							
							<p><?= $rating ?> <?php _e('Rating', 'Letterlife') ?></p>
						</div>
					<?php endif ?>
					
					<?php if ($testimonials): ?>
						<?php foreach ($testimonials as $item): ?>
							<?php if ($item['text']): ?>
								<div class="item">
									<p>
										<i><?= $item['text'] ?></i>

										<?php if ($item['name']): ?>
											<b><?= $item['name'] ?></b>
										<?php endif ?>
										
									</p>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>