<!Doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charaset="<?php bloginfo('charaset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="N2StG2wMSgkmJ3BBlOBqB_-blKQmaow4h3H1lhv6HXI" />
    <link href="<?php echo esc_url(get_template_directory_uri()); ?>/style.css" rel="stylesheet">
    <link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo esc_url(get_template_directory_uri()); ?>/css/palalax.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="SHORTCUT ICON" href="<?php echo esc_url(get_template_directory_uri()); ?>/image/orange----32-245507.png" type="image/vnd.microsoft.icon">
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery-ui.min.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.js"></script>
    <?php
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css' );
    wp_head();
    ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header class="">
        <div class="blog-top-title-container">
            
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/logo.png" alt="" class="top-title-logo">
                <h1 class="blog-top-title">Yuzu BloG</h1>
                <span class="border-start-point"><span>
            </a>
        </div>

    
        <?php if(has_nav_menu('menu-1')): ?>
            <nav class="main-nav">
                <?php
                wp_nav_menu(
                    [
                        'theme-location' => 'menu-1',
                        'menu_class' => 'main-menu'
                    ]
                );
                ?>
            </nav>
        <?php endif; ?>

        <div class="header-search-container">
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="header-search cleafix">
            
                <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="search…">
                <button type="submit"><i class="fas fa-search"></i></button>
            
        </form>
        </div>

        <div class="responsive-search-btn">
            <i class="fas fa-search search-btn"></i>

            <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="responsive-header-search clearfix">
            
            
                <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="search…">
                <button type="submit"><i class="fas fa-search"></i></button>
            
            </form>
        </div>

        <ul class="main-nav-under-540px">
            <li><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></li>
            <li><a href="<?php echo esc_url(get_permalink(20)); ?>">PROFILE</a></li>
            <li><a href="<?php echo esc_url(get_permalink(17)); ?>">CONTACT</a></li>
        </ul>
        
        <i class="fas fa-bars"></i>

    </header>

    <div class="all-contents-without-header">

    <div class="blog-top-title-container under-770px">
            
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/logo.png" alt="" class="top-title-logo">
                <h1 class="blog-top-title">Yuzu BloG</h1>
                <span class="border-start-point"><span>
            </a>
    </div>