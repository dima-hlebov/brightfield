<form role="search" method="get" сlass="search-form" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <input type="text" value="" name="s" id="s" class="search__input" value="<?php echo get_search_query() ?>"/>
    <input type="submit" id="searchsubmit" value="Поиск" class="search__btn">
</form>