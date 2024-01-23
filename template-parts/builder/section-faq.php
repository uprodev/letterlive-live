<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($items): ?>
		<section class="faq">
			<div class="bg">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-5.png" alt="">
				<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-6.png" alt="" class="mob">
			</div>
			<div class="content-width">
				<div class="top">

					<?php if ($title): ?>
						<h1><?= $title ?></h1>
					<?php endif ?>
					
					<?php if ($text): ?>
						<p><?= $text ?></p>
					<?php endif ?>
					
				</div>
				<ul class="accordion">

					<?php foreach ($items as $item): ?>
						<li class="accordion-item ">

							<?php if ($item['question']): ?>
								<div class="accordion-thumb">
									<p><?= $item['question'] ?></p>
								</div>
							<?php endif ?>
							
							<?php if ($item['answer']): ?>
								<div class="accordion-panel">
									<div class="wrap">
										<?= $item['answer'] ?>
									</div>
								</div>
							<?php endif ?>
							
						</li>
					<?php endforeach ?>
					
				</ul>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>