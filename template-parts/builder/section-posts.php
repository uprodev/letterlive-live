<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if($posts): ?>

		<section class="read-block">
			<div class="content-width">

				<?php if ($title): ?>
					<div class="title-h2"><?= $title ?></div>
				<?php endif ?>
				
				<div class="slider-wrap">
					<div class="swiper read-slider">
						<div class="swiper-wrapper">

							<?php foreach($posts as $post): 

								global $post;
								setup_postdata($post); ?>
								<div class="swiper-slide">

									<?php get_template_part('parts/content', 'post') ?>

								</div>
							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						</div>
						<div class="nav-wrap">
							<div class="swiper-pagination read-pagination"></div>
							<div class="wrap">
								<div class="swiper-button-next read-next"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""></div>
								<div class="swiper-button-prev read-prev"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endif; ?>

	<?php endif; ?>