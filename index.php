<?php get_header(); ?>

<!--
    <div class="keyvisual">
        <p>Yuzu Blogへようこそ<br>
            このブログでは、管理者が気ままにWeb制作関連の情報や書評を載せております。<br>
            免責事項・情報に関する閲覧者リスクについては<a href="<?php echo esc_url(get_permalink(45));?>">こちら</a>をご覧ください。</p>
    </div>-->
    
    <main class="index-main-container main-container">

        <div class="posts-container">
            <?php
                if ( have_posts() ) {
                    
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'excerpt' );

                    endwhile;

                    the_posts_pagination( [
                        'prev_text' => '<i class="fas fa-chevron-left"></i>',
                        'next_text' => '<i class="fas fa-chevron-right"></i>',
                    ] );
                } else {
                    echo '記事はありません。';
                }
            ?>
        </div>

        <?php get_template_part('sidemenu'); ?>
    </main>

<?php get_footer(); ?>