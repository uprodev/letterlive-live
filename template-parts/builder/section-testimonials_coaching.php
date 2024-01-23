<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($testimonials): ?>
		<section class="say">
			<div class="content-width">

				<?php if ($title): ?>
					<h2 class="title"><?= $title ?></h2>
				<?php endif ?>

				<div class="content slider-wrap">
					<div class="swiper say-slider">
						<div class="swiper-wrapper">

							<?php foreach ($testimonials as $item): ?>
								<div class="swiper-slide">
									<div class="item">

										<?php if ($item['text']): ?>
											<?= $item['text'] ?>
										<?php endif ?>

										<figure>

											<?php if ($item['photo']): ?>
												<?= wp_get_attachment_image($item['photo']['ID'], 'full') ?>
											<?php else: ?>
												<img src="<?= get_stylesheet_directory_uri() ?>/img/img-10-3.svg" alt="">
											<?php endif ?>

											<?php if ($item['name']): ?>
												<figcaption><?= $item['name'] ?></figcaption>
											<?php endif ?>

										</figure>
									</div>
								</div>

							<?php endforeach ?>
							
						</div>
						<div class="swiper-pagination say-pagination"></div>
					</div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>