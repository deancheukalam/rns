<?php
get_template_part('banner','strip');?>
<!-- Container -->
<div id="content">
<div class="container">
	<!-- Blog Section Content -->
	<div class="row-fluid">
	<div class="blog-sidebar">
		<!-- Blog Single Page -->
		<?php if ( class_exists( 'WooCommerce' ) ) {
					
					if( is_account_page() || is_cart() || is_checkout() ) {
							echo '<div class="span'.( !is_active_sidebar( "woocommerce" ) ?"12" :"8" ).' Blog_main">'; 
					}
					else{ 
				
					echo '<div class="span'.( !is_active_sidebar( "sidebar-1" ) ?"12" :"8" ).' Blog_main">'; 
					
					}
					
				}
				else{ 
				
					echo '<div class="span'.( !is_active_sidebar( "sidebar-1" ) ?"12" :"8" ).' Blog_main">';
					
					}
					?>
		
			<div class="blog_single_post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php  the_post(); ?>
			<?php $rambo_defalt_arg =array('class' => "img-responsive blog_section2_img" )?>
			<?php if(has_post_thumbnail()):?>
			<a  href="<?php the_permalink(); ?>" class="blog_pull_img2">
				<?php the_post_thumbnail('', $rambo_defalt_arg); ?>
			</a>
			<?php endif;?>
			<?php  the_content( __('Read More','rambo') ); ?>
			</div>
			<?php comments_template( '', true );?>
		</div>
		<?php if ( class_exists( 'WooCommerce' ) ) {
					
					if( is_account_page() || is_cart() || is_checkout() ) {
							get_sidebar('woocommerce'); 
					}
					else{ 
				
					get_sidebar(); 
					
					}
					
				}
				else{ 
				
					get_sidebar(); 
					
					}?>
	</div></div>
</div>
</div>
<?php get_footer();?>