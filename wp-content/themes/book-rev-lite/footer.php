<footer id="main-footer" class="clearfix">

<?php if(is_active_sidebar('book_rev_lite_footer_sidebar')): ?>
    <div class="upper-footer clearfix">
        <div class="container">
            <?php dynamic_sidebar('book_rev_lite_footer_sidebar'); ?>
        </div><!-- end .container -->
    </div><!-- end .upper-footer -->
<?php endif; ?>

    <div class="lower-footer clearfix">
        <div class="container">
            <div class="footer-logo">
                <a href="<?php echo home_url(); ?>">
                    <?php
                        $display_footer_logo = get_theme_mod("mp_display_footer_logo_image",true);
                        if($display_footer_logo)
                        {
                            $footer_logo = get_theme_mod("footer-logo-upload",get_template_directory_uri().'/img/footerlogo.png');
                            if( !empty($footer_logo) )
                            {
                                echo "<img src='" . esc_url($footer_logo) . "'/>";
                            }
                        }
                    ?>
                </a>
            </div><!-- end .footer-logo -->

            <div class="copyright-info">
                <p><?php echo get_theme_mod( 'copyright_textbox' ); ?></p>
            </div><!-- end .copyright-info -->
        </div><!-- end .container -->
    </div><!-- end .lower-footer -->
    


</footer><!-- end .main-footer -->
<?php
    // Gets and includes the custom body code.
    //echo cwp("cwp_custom_body_code");
    wp_footer();
?>
</body>
</html>