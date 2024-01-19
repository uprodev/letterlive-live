<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($testimonials): ?>
		<section class="testimonials<?php if($is_slider) echo ' testimonials-slider-wrap' ?>">
			<div class="content-width">

				<?php if ($title): ?>
					<div class="title-h2"><?= $title ?></div>
				<?php endif ?>

				<?php if ($is_slider): ?>
					<div class="slider-wrap">
						<div class="swiper testimonials-slider">
							<div class="swiper-wrapper">
							<?php else: ?>
								<div class="content">
								<?php endif ?>

								<?php foreach ($testimonials as $item): ?>

									<?php if ($is_slider): ?>
										<div class="swiper-slide">
										<?php endif ?>

										<div class="item">

											<?php if ($item['text']): ?>
												<blockquote>“<span><?= $item['text'] ?></span>”</blockquote>
											<?php endif ?>

											<div class="name-wrap">

												<?php if ($item['name']): ?>
													<p><b><?= $item['name'] ?></b></p>
												<?php endif ?>

												<?php if ($item['position']): ?>
													<p><?= $item['position'] ?></p>
												<?php endif ?>

											</div>
										</div>

										<?php if ($is_slider): ?>
										</div>
									<?php endif ?>

								<?php endforeach ?>

								<?php if ($is_slider): ?>
								</div>
							</div>
							<div class="nav-wrap">
								<div class="swiper-pagination testimonials-pagination"></div>
								<div class="wrap">
									<div class="swiper-button-next testimonials-next"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""></div>
									<div class="swiper-button-prev testimonials-prev"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""></div>
								</div>
							</div>
						</div>
					<?php else: ?>
					</div>
				<?php endif ?>

			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>