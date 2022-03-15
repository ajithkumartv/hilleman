
    <!-- footer Start -->
    <footer class="hl-footer">
        <div class="content-wrapper">
            <div class="hl-footer__outer-wrapper">
                
                <?php
                    if ( is_active_sidebar( 'footer_left_column' ) ) :
                        dynamic_sidebar( 'footer_left_column' );
                    endif;	
                ?>
                
            </div>
        </div>
    </footer>
    <!-- footer end -->




    <!-- footer ends -->
    <!-- JS -->
    <!-- <script src="<?php echo get_bloginfo( 'template_directory' );?>/js/jquery.slim.min.js"></script> -->
    <script src="<?php echo get_bloginfo( 'template_directory' );?>/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo get_bloginfo( 'template_directory' );?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_bloginfo( 'template_directory' );?>/js/slick.min.js"></script>
    <script src="<?php echo get_bloginfo( 'template_directory' );?>/js/script.js"></script>

    <?php wp_footer(); ?>
</body>

</html>