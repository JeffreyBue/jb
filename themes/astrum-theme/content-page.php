<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nevia
 * @since Nevia 1.0
 */
?>
<!-- Titlebar
    ================================================== -->
    <section id="titlebar">
        <!-- Container -->
        <div class="container">

            <div class="eight columns">

                <h2><?php the_title(); ?> <?php $subtitle = get_post_meta($post->ID, 'pp_subtitle', true); if($subtitle)  echo "<span>".$subtitle."</span>";?>
                    <?php edit_post_link( __( 'Edit', 'purepress' ), '<span class="edit-link">', '</span>' ); ?>
                </h2>
            </div>
            <div class="eight columns">
                <?php if(ot_get_option('pp_breadcrumbs') != 'no') echo dimox_breadcrumbs(); ?>

            </div>

        </div>
        <!-- Container / End -->
    </section>
<!-- Content
    ================================================== -->

    <!-- Container -->
    <div  id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> >
        <?php
        global $post;
        if ( has_shortcode( $post->post_content, 'template' ) ) {  $tmp_flag = true; }
        ?>
        <?php if(!isset($tmp_flag)) { ?><div class="sixteen columns"> <?php } ?>
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'purepress' ), 'after' => '</div>' ) ); ?>
        <?php if(!isset($tmp_flag)) { ?></div> <?php } ?>

 </div>
 <!-- Page Content / End -->
 <?php            // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() )
        echo '<div class="container"><div class="sixteen columns page-comments">';
            comments_template( '', true );
        echo '</div></div>'; ?>

