<?php

	function additional_custom_styles() {
		wp_enqueue_style( 'bootstrapGrid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css' );
		wp_enqueue_style( 'bootstrapGridMap', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css.map' );
		wp_enqueue_style( 'bootstrapReboot', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css' );
		wp_enqueue_style( 'bootstrapRebootMap', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css.map' );
		wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css' );
	}
	add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

	function mytheme_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

	add_filter('woocommerce_enqueue_styles', '__return_false');
?>