<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($slider): ?>
		<section class="coach-slider-wrap">
			<div class="bg">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-12.png" alt="">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-15.png" alt="" class="mob-bg">
			</div>
			<div class="content-width">
				<div class="slider-wrap">
					<div class="swiper coach-slider">
						<div class="swiper-wrapper">

							<?php foreach ($slider as $item): ?>
								<div class="swiper-slide">
									<div class="text">

										<?php if ($item['title']): ?>
											<h2 class="title"><?= $item['title'] ?></h2>
										<?php endif ?>
										
										<?php if ($item['photo']): ?>
											<figure class="mob">
												<?= wp_get_attachment_image($item['photo']['ID'], 'full') ?>

												<?php if ($item['caption']): ?>
													<figcaption><?= $item['caption'] ?></figcaption>
												<?php endif ?>

											</figure>
										<?php endif ?>
										
										<?php if ($item['text']): ?>
											<?= $item['text'] ?>
										<?php endif ?>

										<?php if ($item['link']): ?>
											<div class="btn-wrap">
												<a href="<?= $item['link']['url'] ?>" class="btn-default btn-big"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
											</div>
										<?php endif ?>

									</div>

									<?php if ($item['photo']): ?>
										<figure>
											<?= wp_get_attachment_image($item['photo']['ID'], 'full') ?>

											<?php if ($item['caption']): ?>
												<figcaption><?= $item['caption'] ?></figcaption>
											<?php endif ?>

										</figure>
									<?php endif ?>

								</div>
							<?php endforeach ?>
							
						</div>
						<div class="swiper-pagination coach-pagination"></div>
					</div>

				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>