<?php if (has_post_thumbnail()): ?>
	<figure>
		<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail('full') ?>
		</a>
	</figure>
<?php endif ?>

<div class="text">
	<ul class="list-info">

		<?php $terms = wp_get_object_terms($post->ID, 'category') ?>

		<?php if ($terms): ?>
			<?php foreach ($terms as $term): ?>
				<li class="teg">
					<p><?= $term->name ?></p>
				</li>
			<?php endforeach ?>
		<?php endif ?>
		
		<?php if ($field = get_field('reading_p', 'option')): ?>
			<li>
				<p><?= reading_time() ?> <?= $field ?></p>
			</li>
		<?php endif ?>
		
	</ul>
	<h6>
		<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
	</h6>

	<?php if (get_the_excerpt()): ?>
		<p class="text-p"><?php the_excerpt() ?></p>
	<?php endif ?>
	
	<div class="link-wrap">
		<a href="<?php the_permalink() ?>"><?php the_field('more_p', 'option') ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-3.svg" alt=""></a>
	</div>
</div>