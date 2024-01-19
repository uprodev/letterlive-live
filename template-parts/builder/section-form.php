<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="form-wrap<?php if($is_padding) echo ' form-wrap-android'  ?>">

		<?php if ($background || $background_mobile): ?>
			<div class="bg">

				<?php if ($background): ?>
					<?= wp_get_attachment_image($background['ID'], 'full') ?>
				<?php endif ?>

				<?php if ($background_mobile): ?>
					<?= wp_get_attachment_image($background_mobile['ID'], 'full', false, array('class' => 'mob')) ?>
				<?php endif ?>

			</div>
		<?php endif ?>
		
		<div class="content-width">
			<div class="content">

				<?php if ($label): ?>
					<p class="top"><?= $label ?></p>
				<?php endif ?>
				
				<?php if ($title): ?>
					<div class="title-h2"><?= $title ?></div>
				<?php endif ?>
				
				<?php if ($text): ?>
					<?= $text ?>
				<?php endif ?>
				
				<div class="form">

					<?php if ($shortcode): ?>
						<?= do_shortcode($shortcode) ?>
					<?php endif ?>

					<?php if ($link): ?>
						<div class="bottom-link">
							<a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
						</div>
					<?php endif ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>