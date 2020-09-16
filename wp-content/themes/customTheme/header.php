<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/fonts.css" type="text/css" media="all" />
	<title>Brightfield</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <section class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="languages">
                        <?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?>
                    </ul>
                </div>
                <div class="col">
                    <?php echo do_shortcode('[wcas-search-form]'); ?>
                </div>
            </div>
        </div>
    </section>
    <header class="header">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <div class="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Brightfield logo" class="logo__img"></a></div>
                </div>
                <div class="col">
                    <nav class="menu">
                        <?php $curr_lang = pll_current_language();
						if($curr_lang == 'ru') : ?>
							<a href="/#about">О компании</a>
                            <a href="/#categories">Каталог</a>
                            <a href="/#footer">Контакты</a> 
                        <?php else : ?>
							<a href="/#about">О компанії</a>
                            <a href="/#categories">Каталог</a>
                            <a href="/#footer">Контакти</a>
                        <?php endif; ?>
                        <a class="cart-contents"><i class="fas fa-shopping-cart"></i><?php echo sprintf ( WC()->cart->get_cart_contents_count() ); ?></a>
                        <button class="burger" id="burger-open">
                        </button>
                    </nav>
                </div>
            </div>
        </div>
        <div class="navigation">
            <button class="burger" id="burger-close">
                <span></span>
            </button>
            <nav>
                <a href="/#about">О компании</a>
                <a href="/#categories">Каталог</a>
                <a href="/#footer">Контакты</a>
            </nav>
        </div>
    </header>