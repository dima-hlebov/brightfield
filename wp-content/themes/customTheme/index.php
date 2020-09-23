<?php get_header(); ?>

<?php
		echo do_shortcode('[metaslider id="1257"]'); 
?>

<section class="about" id="about">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="about-wrapper">
					<?php 
						// $curr_lang = pll_current_language();
						// $post = '';
						// if($curr_lang == 'ru'){
							$post = get_post(1255); 
						// }else{
						// 	$post = get_post(1450);
						// }
						$title = $post->post_title;
						$content = $post->post_content;
					?>
					<h1 class="title"><?php echo $title; ?></h1>
					<?php echo $content; ?>
				</div>
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