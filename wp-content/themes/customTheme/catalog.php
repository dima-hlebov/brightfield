<?php /* Template Name: Catalog*/ ?>

<?php get_header(); ?>

<section class="catalog">
        <div class="container">
            <div class="row">
                <h1>Каталог</h1>
                <div class="products">
                    <div class="product">
                        <?php
                            global $post;
                            $post_slug = $post->post_name;
                            echo '<img src="" alt="product">
                                    <p>'.$post_slug.'</p>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php get_footer(); ?>