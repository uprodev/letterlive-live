<?php

// Script for Customer IO forms we use today see attache:

function signup_form($args = [])
{
	ob_start();
	$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$return_url = $current_url . "?&signup=success#signup-form-" . ($args["position"] ?? "");
	?>
	<a name="signup-form-<?= ($args["position"] ?? "") ?>"></a>
	<div class="mc4wp-form __this-is-not-mc4wp-class-just-preserved-for-styling">
		<form method="POST" action="https://eu.customerioforms.com/forms/submit_action?site_id=de10c64e88e15af323dd&form_id=2bc27846b8da440&success_url=<?= urlencode($return_url) ?>" class="<?= $args["is_post"] ?  'form-wrap' : 'form-email' ?>">

			<?php if ($args["name"] || $args["code"]): ?>
				<input id="cio_<?= ($args["name"] ?? "") ?>" name="<?= ($args["name"] ?? "") ?>" type="hidden" value="<?= ($args["code"] ?? "") ?>" />
			<?php endif ?>
			
			<input id="cio_language" name="language" type="hidden" value="<?= ($args["lang"] ?? "") ?>" />
			<input id="cio_source" name="source" type="hidden" value="website" />
			<input id="cio_source_page" name="source_page" type="hidden" value="<?= $current_url ?>" />
			<div class="mc4wp-form-fields<?php if($args["is_post"]) echo ' input-wrap' ?>">
				<label for="email_input"></label>
				<input type="email" id="email_input" name="email" placeholder="Email" required>
				<button type="submit"<?php if(!$args["is_post"]) echo ' class="btn-default"' ?>>

					<?php if ($args["is_post"]): ?>
						<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt="">
					<?php else: ?>
						<?= get_field('form_t', 'option')['button'] ?>
					<?php endif ?>

				</button>
			</div>
		</form>
		<?
		if (isset($_GET['signup']) && $_GET['signup'] == "success") {
			?>
			<br>
			<p><?= get_field('form_t', 'option')['thank_text'] ?></p>
			<?
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('signup', 'signup_form');


function webinar_waitlist_form($args = [])
{
	ob_start();
	$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$return_url = $current_url . "?&webinar_waitlist=success#webinar_waitlist-form-" . ($args["position"] ?? "");
	?>
	<a name="webinar_waitlist-form-<?= ($args["position"] ?? "") ?>"></a>
	<div class="mc4wp-form __this-is-not-mc4wp-class-just-preserved-for-styling">
		<form method="POST" action="https://eu.customerioforms.com/forms/submit_action?site_id=de10c64e88e15af323dd&form_id=59cbba7dea9446f&success_url=<?= urlencode($return_url) ?>" class="form-email">
			
			<?php if ($args["name"] || $args["code"]): ?>
				<input id="cio_<?= ($args["name"] ?? "") ?>" name="<?= ($args["name"] ?? "") ?>" type="hidden" value="<?= ($args["code"] ?? "") ?>" />
			<?php endif ?>
			
			<input id="cio_language" name="language" type="hidden" value="<?= ($args["lang"] ?? "") ?>" />
			<input id="cio_source" name="source" type="hidden" value="website" />
			<input id="cio_source_page" name="source_page" type="hidden" value="<?= $current_url ?>" />
			<div class="mc4wp-form-fields">
				<label for="email_input"></label>
				<input type="email" id="email_input" name="email" placeholder="Email" required>
				<button type="submit" class="btn-default"><?= get_field('form_t', 'option')['button'] ?></button>
			</div>
		</form>
		<?
		if (isset($_GET['webinar_waitlist']) && $_GET['webinar_waitlist'] == "success") {
			?>
			<br>
			<p><?= get_field('form_t', 'option')['thank_text'] ?></p>
			<?
		}
		?>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode('webinar_waitlist', 'webinar_waitlist_form');