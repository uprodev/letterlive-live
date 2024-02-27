<?php 
$webinars_pade_id = apply_filters('wpml_object_id', 2702, 'page');
$from = is_singular('webinar') && !get_field('get_webinars_from_page_3') ? get_the_ID() : $webinars_pade_id;
?>

<?php if(have_rows('items_3', $from)): ?>

	<section class="recorded-webinars webinar-2x">
		<div class="bg">
			<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-29.png" alt="">
		</div>
		<div class="content-width">

			<?php if ($field = get_field('title_3', $webinars_pade_id)): ?>
				<h2 class="title-h3"><?= $field ?></h2>
			<?php endif ?>

			<div class="link-wrap">
				<a href="<?= $args['register_page_url'] ?>"><?php _e('See all', 'Letterlife') ?></a>
			</div>
			<div class="content">

				<?php while(have_rows('items_3', $from)): the_row() ?>

					<div class="item">
						<figure>

							<?php if ($field = get_sub_field('background')): ?>
								<div class="bg">
									<?= wp_get_attachment_image($field['ID'], 'full') ?>
								</div>
							<?php endif ?>
							
							<?php if ($field = get_sub_field('photo')): ?>
								<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'user')) ?>
							<?php endif ?>
							
							<div class="info">

								<?php if ($field = get_sub_field('name')): ?>
									<p class="name"><?= $field ?></p>
								<?php endif ?>

								<?php if ($field = get_sub_field('position')): ?>
									<p><?= $field ?></p>
								<?php endif ?>

							</div>
						</figure>
						<div class="text-wrap">

							<?php if ($field = get_sub_field('title')): ?>
								<h6 class="title"><?= $field ?></h6>
							<?php endif ?>

							<?php if ($field = get_sub_field('text')): ?>
								<div class="hide-block-mob">
									<p><?= $field ?></p>
									<a href="#" class="mob-read"><?php _e('Read all', 'Letterlife') ?></a>
								</div>
							<?php endif ?>

							<?php if ($field = get_sub_field('duration')): ?>
								<ul class="list-info">
									<li>
										<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-12-2.svg" alt="">
										<p><?= $field ?></p>
									</li>

								</ul>
							<?php endif ?>

							<div class="btn-wrap">
								<a href="<?= $args['register_page_url'] ?>" class="btn-default btn-big btn-border"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-13.svg" alt=""><?php _e('Watch', 'Letterlife') ?></a>
							</div>
						</div>
					</div>

				<?php endwhile ?>

			</div>

			<?php if ($field = get_field('upgrade_block_3', $webinars_pade_id)['text']): ?>
				<div class="content content-bottom">
					<div class="info-block">
						<div class="text-info">
							<?= $field ?>
						</div>

						<?php if ($field = get_field('upgrade_block_3', $webinars_pade_id)['link_text']): ?>
							<div class="btn">
								<a href="<?= $args['register_page_url'] ?>" class="btn-default btn-big"><?= $field ?></a>
							</div>
						<?php endif ?>

					</div>
				</div>
			<?php endif ?>
			
		</div>
	</section>

<?php endif ?>