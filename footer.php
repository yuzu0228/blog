



<footer class="main-footer">

<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>
    
    <nav class="footer-nav">
        <ul>
            <li><a href="<?php echo esc_url(get_permalink(70)); ?>">当ブログについて</a><li>
            <li><a href="<?php echo esc_url(get_permalink(45)); ?>">免責事項</a><li>
            <li><a href="<?php echo esc_url(get_permalink(17)); ?>">お問い合わせ</a><li>
        </ul>
    </nav>
    <small>© 2020 Yuzu_blog. All Rights Reserved.</small>
    
</footer>
</div>

<?php if( is_home() || is_archive() || is_single()): ?>
<div class="smooth-scroll-btn">
    <i class="fas fa-chevron-up"></i>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>