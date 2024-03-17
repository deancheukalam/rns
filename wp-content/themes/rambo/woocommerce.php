<?php
get_header();
?>
<div class="hero-unit-small">
  <div class="container">
    <div class="row-fluid about_space">
	 <div class="span8">
      <h2 class="page_head">
			<?php
            if ( is_shop() || is_product_category() || is_product_tag() ) {
                 woocommerce_page_title();
		    }
		    else{
		       the_title();
		    } 
			?>
	  </h2>
	  </div>
	  <div class="span4">
		  <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="input-append search_head pull-right">
			  <input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search','rambo' ); ?>" />
			  <button type="submit" class="Search_btn" name="submit" ><?php esc_html_e("Go", 'rambo' ); ?></button>
			</div>
		  </form>
	  </div>
    </div>
  </div>
</div>
<!-- /Page Title Section -->
<div class="clearfix"></div>
<!-- Blog Section with Sidebar -->
<div id="content">
<div class="container">
	<div class="row">
		<div class="blog-sidebar">
			<!-- Blog Area -->
			<div class="span<?php echo (  is_active_sidebar('woocommerce') ? '8' : '12' ); ?>">
				<div id="post-<?php the_ID(); ?>">
					<?php woocommerce_content(); ?>
				</div>	
			</div>
			<!--/End of Blog Detail-->	
			<!--Sidebar Area-->
			<?php get_sidebar('woocommerce'); ?>
			<!--Sidebar Area-->
	</div></div>
</div>
</div>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>