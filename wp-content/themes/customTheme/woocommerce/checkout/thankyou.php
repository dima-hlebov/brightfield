<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */
defined( 'ABSPATH' ) || exit;
?>
<div class="pop-up">
	<div class="pop-up__content">
		<?php $post = get_post(1247)?>
		<span class="pop-up__close">&times;</span>
		<h2 class="title"><?php echo $post->post_title; ?></h2>
		<p class="pop-up__text"><?php echo $post->post_content; ?></p>
	</div>	
</div>

<script>
    let popup = document.querySelector(".pop-up");
    let close = document.querySelector(".pop-up__close");
    popup.style.display = "block";

    close.onclick = function() {
        document.location.href="/";
    }

    window.onclick = function(event) {
        document.location.href="/";
    }
</script>
