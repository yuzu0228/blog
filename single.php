<?php get_header(); ?>


		<main class="">
		
			
			<div class="single-main-container main-container">

				<div class="main-contents-in-single-page">
				<?php get_template_part( 'breadcrumb' ); ?>
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'content' ); 
						if ( comments_open() || get_comments_number() ) { ?> 
																		
							<div id="comments" class="comments-area">
							<?php comments_template();  ?>
					
							</div><?php
						}

						if ( is_singular( 'post' ) ) { 
							the_post_navigation( [ //前後の投稿へのリンクp181
								'prev_text' => '<span class="post-title"><i class="fas fa-chevron-left"></i> %title</span>', //%titleは記事のタイトル
								'next_text' => '<span class="post-title">%title <i class="fas fa-chevron-right"></i></span>',
								'screen_reader_text' => '',
							] );
						}
					endwhile; 
					?>
				</div>

				<?php get_template_part('sidemenu'); ?>
			</div>
		</main>

<?php get_footer();