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

	add_filter( 'loop_shop_per_page', create_function( '$products', 'return 40;' ), 30 );

	add_filter('woocommerce_default_catalog_orderby', 'custom_default_catalog_orderby');

	function custom_default_catalog_orderby() {
		$args['meta_key'] = '_sku';
		$args['orderby'] = 'meta_value';
		$args['order'] = 'asc'; 
		return $args;
	}

	add_filter( 'wpseo_breadcrumb_single_link' ,'wpseo_remove_breadcrumb_link', 10 ,2);
	function wpseo_remove_breadcrumb_link( $link_output , $link ){
		$text_to_remove = 'Shop';
	
		if( $link['text'] == $text_to_remove ) {
		$link_output = '';
		}
	
		return $link_output;
	}

	//custom functions
	function getCategoriesByID($catID){
		$categories = get_categories(array(
			'taxonomy' => 'product_cat',
			'parent' => $catID,
			hide_empty => 0
		));
		return $categories;
	}
	function getThumbnail($category){
		$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		return $image;
	}
?>