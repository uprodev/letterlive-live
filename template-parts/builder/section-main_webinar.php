<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($webinar): ?>

		<?php $register_page_url = get_field('webinar_register_page_w', 'option') ?: get_permalink(apply_filters('wpml_object_id', 2482, 'page')) ?>

		<section class="banner-webinar">
			<div class="content-width">

				<?php if ($title): ?>
					<h2 class="title"><?= $title ?></h2>
				<?php endif ?>

				<div class="content">
					<div class="bg">

						<?php if ($field = get_field('background', $webinar->ID)): ?>
							<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img')) ?>
						<?php endif ?>

						<?php if ($field = get_field('background_mobile', $webinar->ID)): ?>
							<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img-mob')) ?>
						<?php endif ?>

						<?php if (has_post_thumbnail($webinar->ID)): ?>
							<?= get_the_post_thumbnail($webinar->ID, 'full', 'class=img') ?>
						<?php endif ?>
						
					</div>
					<div class="timer"></div>
					<div class="wrap">
						<h1><?php the_title() ?></h1>
						<div class="text-wrap">
							<p>
								<?= get_the_excerpt($webinar->ID) ?>
								<a href="#" class="read-more">Read more</a>
							</p>
							<?= get_the_content(null, false, $webinar->ID) ?>
						</div>
						<ul class="list-info">

							<?php if ($field = get_field('date', $webinar->ID)): ?>
								<li>
									<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-1.svg" alt="">
									<p><?= date('M d', strtotime($field)) ?></p>
								</li>
							<?php endif ?>
							
							<?php if ($field = get_field('language', $webinar->ID)): ?>
								<li>
									<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-2.svg" alt="">
									<p><?= $field ?></p>
								</li>
							<?php endif ?>
							
							<?php if (get_field('date', $webinar->ID) || get_field('duration', $webinar->ID)): ?>
							<li>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-3.svg" alt="">
								<p>

									<?php if ($field = get_field('date', $webinar->ID)): ?>
										<?= date('H:i', strtotime($field)) . ' ' . __('CET', 'Letterlife') . ', ' ?>
									<?php endif ?>

									<?php if ($field = get_field('duration', $webinar->ID)): ?>
										<?= $field ?>
									<?php endif ?>

								</p>
							</li>
						<?php endif ?>

						<?php if ($field = get_field('new_price', $webinar->ID)): ?>
							<li>
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-11-4.svg" alt="">
								<p><?= $field ?></p>

								<?php if (get_field('old_price', $webinar->ID)): ?>
									<p class="old"><?= get_field('old_price', $webinar->ID) ?></p>
								<?php endif ?>

							</li>
						<?php endif ?>

					</ul>
					<div class="btn-wrap">
						<a href="<?= $register_page_url ?>" class="btn-default btn-big"><?= get_field('date', $webinar->ID) ? __('Register', 'Letterlife') : __('Get notified', 'Letterlife') ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php endif; ?>