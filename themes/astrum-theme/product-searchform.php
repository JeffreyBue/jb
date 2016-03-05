<form role="search" method="get" class="search-form" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
    <button class="search-btn" type="submit"><i class="icon-search"></i></button>
    <input type="text" class="search" name="s" id="s" onblur="if(this.value=='')this.value='<?php _e('Search for products','purepress'); ?>';" onfocus="if(this.value=='<?php _e('Search for products','purepress'); ?>')this.value='';"  value="<?php esc_attr_e( 'Search for products', 'purepress' ); ?>" />
    <input type="hidden" name="post_type" value="product" />
</form>
<div class="clearfix"></div>
