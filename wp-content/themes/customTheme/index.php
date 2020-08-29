<?php get_header(); ?>

<?php
		echo do_shortcode('[smartslider3 slider="2"]');
?>

<section class="about" id="about">
	<div class="container">
		<div class="row">
			<div class="about-wrapper">
				<h1 class="title">О Brightfield</h1>
				<h2 class="about__subheader">Все для эндоскопии</h2>
				<p class="about__text">Штаб-квартира компании Brightfield и ее конструкторский отдел находиться в Стокгольме, 
					а ее конструкторский отдел находиться в городе Мальмо, Швеция. Основным направлением деятельности 
					компании является разработка и продвижение систем и технологий для эндоскопии, малоинвазивной хирургии и 
					сопутствующего медицинского оборудования.
				</p>
			</div>
		</div>
	</div>
</section>

<section class="categories" id="categories">
	<div class="container">
		<div class="row">
			<?php 
				$categories = getCategoriesByID(4);
				$counter = 0;
				$columnSize = 4;
				if($categories){
					foreach($categories as $category) {
						if($counter > 2 && $counter < 5){
							$columnSize = 6;
						}else{
							$columnSize = 4;
						}?>
						<div class="col-md-<?php echo $columnSize ?>">
								<div class="categorie">
									<div class="categorie__front"><?php echo $category->name ?></div>
									<div class="categorie__back">
										<ul class="categorie__items">
										<?php
											$childrenCategories = getCategoriesByID($category->term_id);
											if($childrenCategories){
												foreach($childrenCategories as $child) {
													echo '<li><a href="'.get_category_link($child).'">'.$child->name.'</a></li>';
												}
											}	
										?>
									</ul>
								</div>
							</div>
						</div>
						<?php
						$counter++;
					}
				}
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<?php 
	function getCategoriesByID($catID){
		$categories = get_categories(array(
			hide_empty => 0,
			'parent' => $catID
		));
		return $categories;
	}
?>