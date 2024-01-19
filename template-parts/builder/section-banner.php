<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="home-banner">

		<?php if ($background): ?>
			<div class="bg">
				<?= wp_get_attachment_image($background['ID'], 'full', false, array('class' => 'img-right')) ?>
			</div>
		<?php endif ?>

		<div class="content-width">
			<div class="left">

				<?php if ($text): ?>
					<?= $text ?>
				<?php endif ?>

				<?php if ($links): ?>
					<div class="btn-wrap">

						<?php foreach ($links as $item): ?>

							<?php if ($item['image']): ?>
								<a href="<?= $item['url'] ?>" target="_blank">
									<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
								</a>
							<?php endif ?>
							
						<?php endforeach ?>

					</div>
				<?php endif ?>
				
			</div>

			<?php if ($image): ?>
				<figure>
					<?= wp_get_attachment_image($image['ID'], 'full') ?>
				</figure>
			<?php endif ?>

		</div>
	</section>

	<?php endif; ?>