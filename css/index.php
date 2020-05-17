<?php get_header(); ?>
    <main>
        <div class="keyvisual">
            <p>Yuzu Blogへようこそ</p>
        </div>

        <?php if(have_posts()): {
            while(have_posts()): the_post();

            get_template_part( 'excerpt' );

            endwhile;
        } else {
            echo '記事はありません';
        }
        ?>
    </main>

<?php get_footer(); ?>