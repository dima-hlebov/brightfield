<?php get_header(); ?>
    <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : 
                the_post();
                echo '<div class="item">
                    <div class="container">
                        <h2 class="title title--secondary-c">'.get_the_title().'</h2>';
                        if ( function_exists('yoast_breadcrumb')) {
                            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                        }
                        echo get_the_content();
                echo '</div>
                </div>';
            endwhile; 
        endif;
    ?>
<?php get_footer(); ?>
