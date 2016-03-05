<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Nevia
 * @since Nevia 1.0
 */
?>
</div>
<!-- Content Wrapper / End -->
<?php $style = get_theme_mod( 'astrum_footer_style', 'light' ); ?>
<!-- Footer
================================================== -->
<div id="footer" class="<?php echo $style; ?>">
    <!-- 960 Container -->
    <div class="container">

        <div class="four columns">
             <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1st Column')) : endif; ?>
        </div>

        <div class="four columns">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2nd Column')) : endif; ?>
        </div>


        <div class="four columns">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3rd Column')) : endif; ?>
        </div>

        <div class="four columns">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 4th Column')) : endif; ?>
        </div>
    </div>
    <!-- Container / End -->

</div>
<!-- Footer / End -->

<!-- Footer Bottom / Start -->
<div id="footer-bottom" class="<?php echo $style; ?>">

    <!-- Container -->
    <div class="container">
        <div class="eight columns">
            <?php $copyrights = ot_get_option('pp_copyrights' );
                if (function_exists('icl_register_string')) {
                    icl_register_string('Copyrights in footer','copyfooter', $copyrights);
                    echo icl_t('Copyrights in footer','copyfooter', $copyrights);
                } else {
                  echo $copyrights;
                } ?>
        </div>
        <div class="eight columns">
                <?php /* get the slider array */
                $footericons = ot_get_option( 'pp_headericons', array() );
                if ( !empty( $footericons ) ) {
                    echo '<ul class="social-icons-footer">';
                    foreach( $footericons as $icon ) {
                        echo '<li><a class="tooltip top" title="' . $icon['title'] . '" href="' . $icon['icons_url'] . '"><i class="icon-' . $icon['icons_service'] . '"></i></a></li>';
                    }
                    echo '</ul>';
                }
            ?>
        </div>
    </div>
    <!-- Container / End -->
</div>
<!-- Footer Bottom / Start -->
<?php wp_footer(); ?>
</body>
</html>