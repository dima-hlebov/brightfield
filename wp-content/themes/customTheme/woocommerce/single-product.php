<?php get_header(); ?>
        <? $post = get_queried_object(); ?>
        <section class="catalog">
            <div class="container">
                <h2 class="title title--secondary-c"><?php echo $post->post_title; ?></h2>
                <? if (function_exists('yoast_breadcrumb')) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); } ?>
                <div class="products">
                    <div class="products-wrapper">
                        <div class="products__text"><?php echo $post->post_content; ?></div>
                        <img class="products__img" src="<?php echo get_the_post_thumbnail_url($post->post->ID); ?>" alt="product">
                    </div>
                    <a class="btn" rel="nofollow" href="<?php echo '?add-to-cart='.get_the_ID(); ?>">В корзину</a>
                </div>
            </div>
        </section>
<?php get_footer(); ?>