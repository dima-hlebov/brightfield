<?php get_header(); ?> 
 
 <section class="catalog">
        <div class="container">
            <div class="row">
				<h1 class="title title--secondary-c">Каталог</h1>
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
                <div class="products">
				<?php
					$curr_category = get_queried_object();
					$children = getCategoriesByID($curr_category->term_id);
					if (is_product_category() && count($children) > 0) {
						foreach($children as $category) {
							$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
	    					$image = wp_get_attachment_url( $thumbnail_id );
							echo '<a href="'.get_category_link($category).'" class="product"><img src="'.$image.'" alt="product">
						 			<p>'.$category->name.'</p></a>';
						}
					}else{ 
						while ( have_posts() ) : the_post(); 
								echo '<a href="'.get_permalink().'" class="product"><img src="dsaf" alt="product">
										<p>'.get_the_title().'</p></a>';
						
						endwhile; 
					}
					?>
                </div>
            </div>
        </div>
</section>

<?php get_footer(); ?>

<?php 
	function getCategoriesByID($catID){
		$categories = get_categories(array(
			'taxonomy' => 'product_cat',
			'parent' => $catID,
			hide_empty => 0
		));
		return $categories;
	}
?>