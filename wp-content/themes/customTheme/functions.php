<?php
	// css
	function additional_custom_styles() {
		wp_enqueue_style( 'bootstrapGrid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css' );
		wp_enqueue_style( 'bootstrapGridMap', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css.map' );
		wp_enqueue_style( 'bootstrapReboot', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css' );
		wp_enqueue_style( 'bootstrapRebootMap', get_template_directory_uri() . '/assets/css/bootstrap-reboot.min.css.map' );
		wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css' );
	}
	add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

	add_action('wp_enqueue_scripts','additional_custom_js');

	function mytheme_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

	add_filter('woocommerce_enqueue_styles', '__return_false');

	add_filter( 'loop_shop_per_page', create_function( '$products', 'return 40;' ), 30 );

	add_filter('woocommerce_default_catalog_orderby', 'custom_default_catalog_orderby');

	//sort catalog by sku
	add_filter('woocommerce_get_catalog_ordering_args', 'custom_default_catalog_orderby'); 
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

	remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
	add_filter( 'woocommerce_return_to_shop_redirect', 'st_woocommerce_shop_url' );
	function st_woocommerce_shop_url(){
		return site_url() . '/product-category/products/';
	}

	//Remove chekout billing shipping and etc
	function sv_free_checkout_fields() {

		if ( ! function_exists( 'WC' ) ) {
			return;	
		}
	
		if ( function_exists( 'is_checkout' ) && ( is_checkout() || is_ajax() ) ) {
	
			remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

			add_filter( 'woocommerce_checkout_fields', function( $fields ) {
				
			remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );	
				$billing_keys = array(
					'billing_company',
					'billing_address_1',
					'billing_address_2',
					'billing_city',
					'billing_postcode',
					'billing_country',
					'billing_state',
				);

				foreach( $billing_keys as $key ) {
					unset( $fields['billing'][ $key ] );
				}
	
				$fields['billing']['billing_first_name']['label'] = 'Имя';
				$fields['billing']['billing_last_name']['label'] = 'Фамилия';
				$fields['billing']['billing_phone']['label'] = 'Телефон';
				$fields['billing']['billing_email']['label'] = 'Email';
				$fields['order']['order_comments']['label'] = 'Комментарий';
				$fields['order']['order_comments']['placeholder'] = '';

				return $fields;
			} );
		}
	
	}
	add_action( 'wp', 'sv_free_checkout_fields' );

	// Change chekout button text
	add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

	function woo_custom_order_button_text() {
		return __( 'Отправить заказ', 'woocommerce' ); 
	}

	// cart empty text
	add_filter( 'wc_empty_cart_message', 'custom_wc_empty_cart_message' );

	function custom_wc_empty_cart_message() {
		return '';
	}

	add_filter( 'wc_add_to_cart_message_html', '__return_false' );
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