<!-- Titlebar
    ================================================== -->
    <section id="titlebar">
        <!-- Container -->
        <div class="container">
            <div class="eight columns">
                <h2><?php
                if ( is_category() ) {
                    printf( __( 'Category Archives: %s', 'purepress' ), '<span>' . single_cat_title( '', false ) . '</span>' );

                } elseif ( is_tag() ) {
                    printf( __( 'Tag Archives: %s', 'purepress' ), '<span>' . single_tag_title( '', false ) . '</span>' );

                } elseif ( is_author() ) {
                    /* Queue the first post, that way we know
                     * what author we're dealing with (if that is the case).
                    */
                    the_post();
                    printf( __( 'Author Archives: %s', 'purepress' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();

                } elseif ( is_day() ) {
                    printf( __( 'Daily Archives: %s', 'purepress' ), '<span>' . get_the_date() . '</span>' );

                } elseif ( is_month() ) {
                    printf( __( 'Monthly Archives: %s', 'purepress' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

                } elseif ( is_year() ) {
                    printf( __( 'Yearly Archives: %s', 'purepress' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

                } else {
                    $pp_blog_page = ot_get_option('pp_blog_page');
                    if (function_exists('icl_register_string')) {
                        icl_register_string('Blog page title','pp_blog_page', $pp_blog_page);
                        echo icl_t('Blog page title','pp_blog_page', $pp_blog_page); }
                        else {
                            echo $pp_blog_page;
                        }
                    }
                    ?></h2>
                </div>

                <div class="eight columns">
                    <nav id="breadcrumbs">
                        <?php if(ot_get_option('pp_breadcrumbs') != 'no') echo dimox_breadcrumbs(); ?>
                    </nav>
                </div>
            </div>
            <!-- Container / End -->
        </section>

<!-- Content
    ================================================== -->
    <?php $layout = ot_get_option('pp_blog_layout'); ?>
    <!-- Container -->
    <div class="container <?php if($layout == 'left-sidebar') { echo "page-left"; }?>">
        <div class="twelve <?php if($layout == 'left-sidebar') { echo "alt2"; } else { echo "alt"; } ?> columns">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
            /* Include the Post-Format-specific template for the content.
             * If you want to overload this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            $format = get_post_format();
            $formatslist = array('status','aside','quote','audio','chat','link');
            if( false === $format  )  $format = 'standard';

            if (in_array($format, $formatslist))  $format = 'standard';
            $thumbstyle = ot_get_option('pp_blog_thumbs');
            if($thumbstyle == 'small') {
               get_template_part( 'postformats/'.$format , 'medium' );
            } else {
                get_template_part( 'postformats/'.$format );
            }
            endwhile; ?>
        <?php else :
                get_template_part( 'no-results', 'index' );
            endif; ?>

        <?php if(function_exists('wp_pagenavi')) {
                wp_pagenavi();
            } else { ?>
        <?php if ( get_next_posts_link() ||  get_previous_posts_link() ) : ?>
            <nav class="pagination">
                <ul>
                    <?php if ( get_next_posts_link() ) : ?>
                    <li class="nav-previous"><?php next_posts_link( __( '&larr; Older posts', 'purepress' ) ); ?></li>
                <?php endif; if ( get_previous_posts_link() ) : ?>
                    <li class="nav-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'purepress' ) ); ?></li>
                <?php endif; ?>
                </ul>
                <div class="clearfix"></div>
            </nav>
        <?php endif;
    } ?>
</div>
<!-- Sidebar
    ================================================== -->
<?php get_sidebar(); ?>
</div>
<!-- Container / End -->