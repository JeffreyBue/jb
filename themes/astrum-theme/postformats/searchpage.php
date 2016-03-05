  <!-- Post -->
  <?php $format = get_post_format();
  if( false === $format )  $format = 'standard'; ?>
  <article class="post" id="post-<?php the_ID(); ?>" >

    <div class="post-format">
      <div class="circle"><i class="icon-pencil"></i><span></span></div>
    </div>

    <section class="post-content">

      <header class="meta">
        <h2><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'purepress'), the_title_attribute('echo=0')); ?>" rel="bookmark">
          <?php the_title(); ?>
        </a></h2>
         <?php astrum_posted_on(); ?>
      </header>
      <p>
          <?php $excerpt = get_the_content();
          $short_excerpt = strip_shortcodes( $excerpt ); echo $short_excerpt.'..'; ?>
     </p>
      <a href="<?php the_permalink(); ?>" class="button color"><?php  _e('Read More', 'purepress'); ?> </a>

    </section>
    <div class="clearfix"></div>
  </article>




