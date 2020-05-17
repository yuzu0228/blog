<?php get_header(); ?>


		<main class="">
        <?php get_template_part( 'breadcrumb' ); ?>

            <div class="archive-main-container main-container">
                
                <div class="posts-container-with-title">
                    <?php if ( have_posts() ) : ?>

                        <div class="archive-title-container">
                            <?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
                        </div>

                        <div class="posts-container">
                            <?php
                            while ( have_posts() ) : 
                                the_post();
                                
                                get_template_part( 'excerpt' );
                
                            endwhile;

                            the_posts_pagination( [
                                'prev_text' => '&larr;',
                                'next_text' => '&rarr;',
                            ] );

                            else :
                                echo '記事はありません。';

                            endif;
                            ?>
                        </div>
                </div>

                <?php get_template_part('sidemenu'); ?>
            </div>
		</main>

<?php get_footer(); ?>