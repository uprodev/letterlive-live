<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($items): ?>
		<section class="faq-block"<?php if($background) echo ' style="background-image:url(' . $background['url'] . ');"' ?>>
			<div class="content-width">
				<div class="content">

					<?php if ($title): ?>
						<h2 class="title"><?= $title ?></h2>
					<?php endif ?>
					
					<ul class="accordion">

						<?php foreach ($items as $item): ?>
							<li class="accordion-item ">

								<?php if ($item['question']): ?>
									<div class="accordion-thumb">
										<h6><?= $item['question'] ?></h6>
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
			</div>
		</section>
	<?php endif; ?>

	<?php endif; ?>