<?php get_header(); ?> 
 
<section class="catalog">
	<div class="container">
		<?php 
			$curr_category = get_queried_object();
			$children = getCategoriesByID($curr_category->term_id);
			if (is_product_category() && count($children) > 0) : ?>
				<h2 class="title title--secondary-c">Каталог</h2>
			<?php else : ?>
				<h2 class="title title--secondary-c"><?php echo $curr_category->name; ?></h2>
			<?php endif; ?>
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); }?>
		<?php if (is_product_category() && count($children) > 0) : ?>
				<div class="categories">
				<?php foreach($children as $category) :
					$image = getThumbnail($category); ?>
					<a href="<?php echo get_category_link($category); ?>" class="product">
						<img src="<?php echo $image; ?>" alt="product">
						<p><?php echo $category->name; ?></p>
					</a>
				<?php endforeach; ?>
				</div>
		<?php else : ?>
			<?php if($curr_category->count > 1) : 
					$image = getThumbnail($curr_category); ?>
					<div class="products">
						<div class="products-wrapper">
							<div class="products__text"><?php echo $curr_category->description; ?></div><img class="products__img" src="<?php echo $image; ?>" alt="product">
						</div>
						<div class="products__items">
							<div class="products__header">
								<ul>
									<li>№</li>
									<li>Продукт</li>
									<li>Характеристики</li>
								</ul>
							</div>
					<?php while ( have_posts() ) : the_post(); ?>
							<div class="product product--big"><a class="product-link" href="<?php echo get_permalink(); ?>" ><?php echo get_the_excerpt(); ?></a><a class="product-add" rel="nofollow" href="<?php echo '?add-to-cart='.get_the_ID(); ?>">+</a></div>
					<?php endwhile; ?>
						</div>
					</div>
				<?php else :
						while ( have_posts() ) : the_post(); 
							wp_redirect(get_permalink());
							exit;
						endwhile;
					endif;
				endif;
				?>
        </div>
</section>

<?php get_footer(); ?>