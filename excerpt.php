<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php echo esc_url( get_permalink()); ?>" class="post-anchor">
	
		<div class="excerpt-title-container">
			<!--<span><img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/holl-back-transparent_0229074019.png" alt="" width="10%" height="10%" class="holl-img"></span>-->
			<?php the_title( '<h2 class="excerpt-title">','', '</h2>' );  ?>
			
		</div>


		<figure class="post-thumbnail">
			
				<?php the_post_thumbnail(); ?>
			
		</figure>

		<div class="excerpt-content">
			<?php the_excerpt(); ?>

			<?php if(is_home() || is_category() ) :?>
				<div class="excerpt-footer-link-container">
					<div>
						<i class="fas fa-folder-open"></i>
						<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
					</div>
					<div>
						<i class="fas fa-tag"></i>
						<?php
						foreach((get_the_tags()) as $tag) {
						
						echo $tag->name . ' ';
						
						}
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->