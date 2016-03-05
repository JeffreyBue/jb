  <!-- Post -->
  <?php $format = get_post_format();
  if( false === $format )  $format = 'standard'; ?>
  <article <?php post_class('post '.$format); ?> id="post-<?php the_ID(); ?>" >
    <?php
    $thumb_status = get_post_meta($post->ID, 'pp_thumb_status', TRUE);
    if(empty($thumb_status)) { $thumb_status = array(); }
if(!in_array("hide_blog", $thumb_status)){
    if (( function_exists( 'get_post_format' ) && 'video' == get_post_format( $post->ID ) )  ) {
      global $wp_embed;
      $videoembed = get_post_meta($post->ID, 'pp_video_embed', true);
      echo '<div class="five alt columns alpha">';
      if($videoembed) {
        echo '<section class="video" style="margin-bottom:20px">'.$videoembed.'</section>';
      } else {
        $videolink = get_post_meta($post->ID, 'pp_video_link', true);
                $post_embed = $wp_embed->run_shortcode('[embed height="290" width="320" ]'.$videolink.'[/embed]') ;
        echo '<section class="video" style="margin-bottom:20px">'.$post_embed.'</section>';
      }
    } echo "</div>";
}    ?>


    <?php if(!in_array("hide_blog", $thumb_status)){ ?><div class="seven columns"> <?php } else { ?>
    <div class="post-format">
      <div class="circle"><i class="icon-film"></i><span></span></div>
    </div>
    <?php } ?>
      <section class="post-content">

        <header class="meta">
          <h2><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'purepress'), the_title_attribute('echo=0')); ?>" rel="bookmark">
            <?php the_title(); ?>
          </a></h2>
          <?php astrum_posted_on(); ?>
        </header>

        <?php the_excerpt(); ?>

        <a href="<?php the_permalink(); ?>" class="button color"><?php  _e('Read More', 'purepress'); ?> </a>

      </section>
    <?php if(!in_array("hide_blog", $thumb_status)){ ?></div><?php } ?>
    <div class="clearfix"></div>
  </article>