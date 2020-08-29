<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />
	<title>Brightfield</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <section class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="languages">
                        <li><button class="languages__btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/ukraine-flag.png" alt="ukrainian language"></button></li>
                        <li><button class="languages__btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/russia-flag.png" alt="russian language"></button></li>
                    </ul>
                </div>
                <div class="col">
                <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </section>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Brightfield logo" class="logo__img"></a></div>
                </div>
                <div class="col">
                    <nav>
                        <ul class="menu">
                            <li><a href="/#about">О компании</a></li>
                            <li><a href="/#categories">Каталог</a></li>
                            <li><a href="/#footer">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>