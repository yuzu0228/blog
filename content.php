<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-title-container">
		<?php the_title( '<h1 class="single-post-title">', '</h1>' ); ?>
		
		<div class="single-post-time-cat-tag-container">
			<?php if ( is_singular( 'post' ) ) { ?>
				<?php the_date( '', '<span><i class="fas fa-clock"></i>', '</span>' ); ?>
				<?php if(get_the_modified_date('Ymd') > get_the_date('Ymd')): ?>
					<?php the_modified_date('', '<i class="fas fa-redo"></i>'); ?>
				<?php endif; ?>
			<?php } ?>

			<?php if ( is_singular( 'post' ) ) { ?>
				
					<span class="cat-links"><i class="fas fa-folder-open"></i> <?php the_category( ', ' ); ?></span>
					<?php the_tags( '<span class="tags-links"><i class="fas fa-tag"></i> ', ', ', '</span>' ); ?>
				
			<?php } ?>
		</div>
	</div>

	<?php if(has_post_thumbnail()) { ?>
		<figure class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</figure>
	<?php } ?>

	

	<div class="entry-content">
		<?php the_content();?>

		<?php 
		wp_link_pages( 
			[
				'before' => '<div class="page-links">ページ:',
				'after'  => '</div>',
			]
		); ?>

		<div class="same-cat-articles-container">
			<h2 class="same-cat-articles-h2">SAME CATEGORY ARTICLES</h2>
			<div class="same-cat-articles-container-without-title">
				<?php
				$categories = get_the_category($post->ID);
				$category_ID = array();
				foreach($categories as $category):
				array_push( $category_ID, $category -> cat_ID);
				endforeach ;
				$args = array(
				'post__not_in' => array($post -> ID),
				'posts_per_page'=> 6,
				'category__in' => $category_ID,
				'orderby' => 'rand', 
				);
				$query = new WP_Query($args);

				
				if( $query -> have_posts() ): while ($query -> have_posts()) : $query -> the_post();
				?>
				
					
						<a href="<?php the_permalink(); ?>" class="post">
							<figure class="same-cat-articles-img">
								<?php the_post_thumbnail('thumbnail'); ?>
							</figure>
							<div class="same-cat-articles-text">
								<p class="title"><?php the_title(); ?></p>
								<p class="excerpt"><?php the_excerpt(); ?></p>
							</div>
						</a>
					
				
				<?php endwhile; endif; ?>
			
				<?php wp_reset_postdata(); ?>
			</div>
		</div>

	
	</div>

</article>