<section class="sidemenu-container">
    <div class="sidemenu-for-tablet-container">
        <div class="archive-lists sidemenu-part">
            <h2 class="side-menu-title">CATEGORIES</h2>
        
            <?php 
            $string = wp_list_categories(array(
                            'title_li' =>'',
                            'show_count' => 1,
                            'echo' => 0 
                        ));
            $string = preg_replace('/<\/a> (\([0-9]*\))/', ' $1</a>', $string);
            $string = str_replace('(', '<span class="post-count">', $string);
            $string = str_replace(')', '</span>', $string);
            echo $string;
            ?>
            </ul>
        </div>
        <!--$string = str_replace(array('(',')'), '<span class="post-count"></span>', $string);-->

        <div class="term-lists sidemenu-part">
            <h2 class="side-menu-title">TAGS</h2>
            <ul>
                <?php
                $term_lists = get_terms('post_tag');
                $result_lists = [];
                foreach ($term_lists as $term) {
                $u = (get_term_link( $term, 'post_tag' ));
                echo "<li><a href='".$u."'>".$term->name ."<span class='post-count'>".$term->count."</span></li>"."</a>";
                }
                ?>
            </ul>
        </div>
    </div>
    
    <div class="sidemenu-for-tablet-container">
        <div class="recent-posts sidemenu-part">
            <?php
            $args = array('posts_per_page' => 5, 'offset' => 0, 'order' => 'DESC', 'orderby' => 'date');
            $newpost_query = new WP_Query($args);
            ?>
            <?php if ($newpost_query->have_posts()): ?>
                <h2 class="side-menu-title">RECENT POSTS</h2>
                <ul>
                <?php while ($newpost_query->have_posts()): $newpost_query->the_post(); ?>
                    <li>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="clearfix">
                        <?php if (has_post_thumbnail()): ?>
                            <figure class="recent-post-img">
                                <?php the_post_thumbnail(array(100,100)); ?>
                            </figure>
                        <?php else: ?>
                            <figure class="recent-post-img">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimage.png" />
                            </figure>
                        <?php endif; ?>
                        <div class="recent-post-text">
                            <?php the_title('<span class="recent-post-title">', '</span>'); ?>
                            <span class="recent-post-date"><i class="fas fa-clock"></i><?php echo get_the_date(); ?></span>
                        </div>
                    </a>
                    </li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <div class="profile sidemenu-part">
            <h2 class="side-menu-title">PROFILE</h2>
            <a href="<?php echo esc_url(get_permalink(20)); ?>" class="img-anchor">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/profile-img.jpg" width="60%" height="60%" alt="">
            </a>
            <div class="profile-text">
                <p>ごく普通のサラリーマン(25歳)。<br>
                    ほとんど趣味でフロントエンド関連の勉強や開発を行っています。<br>
                    一応、Twitter(<a href="https://twitter.com/fcposd" target="_blank" rel="noopener" class="twitter">@fcposd</a>)もやっております。</p>
                    <a class="profile-more" href="<?php echo esc_url(get_permalink(20)); ?>">もっと詳しく</a>
            </div>
        </div>
    </div>

</section>