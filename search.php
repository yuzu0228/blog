<?php get_header(); ?>

<main class="">
    <div class="">
        <h2 class="">「<?php the_search_query(); ?>」の検索結果</h2>
        <div class="posts-container">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'excerpt' ); ?>
                <?php endwhile; ?>
                <?php 
                the_posts_pagination( [
                    'prev_text' => '&larr;',
                    'next_text' => '&rarr;',
                ] );
                ?>
            <?php else: ?>
                <div class="">
                    <p>検索結果はありませんでした</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>
