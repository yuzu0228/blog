<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>

    <?php get_template_part( 'breadcrumb' ); ?>
    <main class="page-main">
        
        <?php the_content(); ?>
    </main>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>