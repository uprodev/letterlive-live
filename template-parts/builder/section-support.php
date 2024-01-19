<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="support-system">
		<div class="content-width">

			<?php if ($title): ?>
				<div class="title-h1"><?= $title ?></div>
			<?php endif ?>

			<div class="content">
				<div class="left">

					<?php if ($subtitle): ?>
						<div class="sub-title"><?= $subtitle ?></div>
					<?php endif ?>

					<?php if ($text): ?>
						<p><?= $text ?></p>
					<?php endif ?>

				</div>
				<div class="right">

					<?php if ($items): ?>
						<?php foreach ($items as $item): ?>
							<div class="item">

								<?php if ($item['icon']): ?>
									<div class="icon-wrap">
										<?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
									</div>
								<?php endif ?>
								
								<?php if ($item['text']): ?>
									<p><?= $item['text'] ?></p>
								<?php endif ?>
								
							</div>
						<?php endforeach ?>
					<?php endif ?>
					
					<?php if ($link): ?>
						<div class="item-link">
							<p><?= $link['title'] ?></p>
							<a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2.svg" alt=""></a>
						</div>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>