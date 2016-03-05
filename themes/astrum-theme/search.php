<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Nevia
 * @since Nevia 1.0
 */

$htype = ot_get_option('pp_header_menu');
get_header($htype);
?>

<!-- 960 Container -->
<section id="titlebar">
    <!-- Container -->
    <div class="container">

        <div class="eight columns">

          <h2><?php printf( __( 'Search Results for: %s', 'purepress' ), '<span>' . get_search_query() . '</span>' ); ?></h2>


      </div>

      <div class="eight columns">
        <nav id="breadcrumbs">
            <?php if(ot_get_option('pp_breadcrumbs') != 'no') echo dimox_breadcrumbs(); ?>
        </nav>
    </div>

</div>
<!-- Container / End -->
</section>

<!-- 960 Container / End -->

<!-- Content
    ================================================== -->
    <!-- Container -->
    <div class="container">
        <div class="twelve alt columns">
            <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
            /* Include the Post-Format-specific template for the content.
             * If you want to overload this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            $type =  get_post_type();

            switch ($type) {
                case 'product' :

                    get_template_part( 'postformats/searchproduct' );

                break;
                case 'post':
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
                break;

                case 'page':
                get_template_part( 'postformats/searchpage' );

                break;
                case 'portfolio':
                get_template_part( 'postformats/searchpf' );
                break;
                default:
                    # code...
                break;
            }

            endwhile;
            endif; ?>

            <?php if(function_exists('wp_pagenavi')) {
                wp_pagenavi();
            } else { ?>
            <?php if ( get_next_posts_link() ||  get_previous_posts_link() ) : ?>
            <nav class="pagination">
                <ul>
                    <?php if ( get_next_posts_link() ) : ?>
                    <li class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'purepress' ) ); ?></li>
                <?php endif; if ( get_previous_posts_link() ) : ?>
                <li class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'purepress' ) ); ?></li>
            <?php endif; ?>
        </ul>
        <div class="clearfix"></div>
    </nav>
<?php endif; ?>
<?php } ?>

</div>

<!-- Sidebar
    ================================================== -->
    <?php get_sidebar(); ?>

</div>
<!-- Container / End -->
<?php get_footer(); ?>