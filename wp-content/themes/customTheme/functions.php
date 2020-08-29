<?php

	function additional_custom_styles() {
		wp_enqueue_style( 'bootstrapGrid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css' );
		wp_enqueue_style( 'bootstrapGridMap', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css.map' );
		wp_enqueue_style( 'bootstrapReboot', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css' );
		wp_enqueue_style( 'bootstrapRebootMap', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css.map' );
		wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css' );
	}
	add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

	// add_filter( 'wpseo_breadcrumb_single_link' ,'wpseo_remove_breadcrumb_link', 10 ,2);
	// function wpseo_remove_breadcrumb_link( $link_output , $link ) {
	// 	$text_to_remove = [
	// 		'Каталог'
	// 	];
	// 	if ( in_array( $link['text'], $text_to_remove, true ) ) {
	// 		return ;
	// 	}
	// }
?>