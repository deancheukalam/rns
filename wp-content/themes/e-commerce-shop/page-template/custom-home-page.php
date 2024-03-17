<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main role="main" id="maincontent">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9">
				<?php do_action( 'bb_ecommerce_store_before_slider' ); ?>
				<?php if( get_theme_mod('bb_ecommerce_store_slider_hide_show', false) != '' || get_theme_mod('bb_ecommerce_store_responsive_slider', false) != '' ){ ?>
					<section id="slider" class="mt-4">
					  	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_slider_speed_option', 3000)); ?>"> 
						    <?php $bb_ecommerce_store_slider_pages = array();
						      	for ( $count = 1; $count <= 4; $count++ ) {
							        $mod = intval( get_theme_mod( 'bb_ecommerce_store_slider' . $count ));
							        if ( 'page-none-selected' != $mod ) {
							          $bb_ecommerce_store_slider_pages[] = $mod;
							        }
						      	}
						      	if( !empty($bb_ecommerce_store_slider_pages) ) :
						        $args = array(
						          	'post_type' => 'page',
						          	'post__in' => $bb_ecommerce_store_slider_pages,
						          	'orderby' => 'post__in'
						        );
						        $query = new WP_Query( $args );
						        if ( $query->have_posts() ) :
						          $i = 1;
						    ?>     
						    <div class="carousel-inner" role="listbox">
						      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
						        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
						          	<?php if(has_post_thumbnail()){
                  						the_post_thumbnail();
			              			} else{?>
				                		<img src="<?php echo esc_url(get_theme_file_uri()); ?>/theme-block-pattern/images/banner.png" alt="" />
					              	<?php } ?>
						          	<div class="carousel-caption">
							            <div class="inner_carousel">
							            	<?php if( get_theme_mod('bb_ecommerce_store_slider_title_Show_hide',true) != ''){ ?>
							              		<h1><?php the_title();?></h1>
							              	<?php } ?>
							              	<?php if( get_theme_mod('bb_ecommerce_store_slider_button_show_hide',true) != ''){ ?>
							              	<?php if( get_theme_mod('bb_ecommerce_store_slider_button','READ MORE') != '' || get_theme_mod('bb_ecommerce_store_slider_button_url') != ''){ ?>
								              	<div class="more-btn">
						                        	<a href="<?php echo esc_url(get_theme_mod('bb_ecommerce_store_slider_button_url','')); ?>" alt="<?php esc_attr_e( 'READ MORE','e-commerce-shop' );?>" class="p-3"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_slider_button','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_slider_button','READ MORE'));?></span></a>
						                        </div>	
						                    <?php } ?>	 
						                    <?php } ?>           
							            </div>
						          	</div>
						        </div>
						      	<?php $i++; endwhile; 
						      	wp_reset_postdata();?>
						    </div>
						    <?php else : ?>
						    <div class="no-postfound"></div>
						      <?php endif;
						    endif;?>
						    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
						      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
						      <span class="screen-reader-text"><?php esc_html_e( 'Previous','e-commerce-shop' );?></span>
						    </a>
						    <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
						      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
						      <span class="screen-reader-text"><?php esc_html_e( 'Next','e-commerce-shop' );?></span>
						    </a>
					  	</div>  
					  	<div class="clearfix"></div>
					</section>
				<?php }?>
				<?php do_action( 'bb_ecommerce_store_after_slider' ); ?>
				<?php if( get_theme_mod('bb_ecommerce_store_services_category') != ''){ ?> 
					<section id="our-service" class="px-4 m-0">					
						<div class="row">
						    <?php 
							  $bb_ecommerce_store_catData=  get_theme_mod('bb_ecommerce_store_services_category');
							  if($bb_ecommerce_store_catData){
						    $page_query = new WP_Query(array( 'category_name' => esc_html($bb_ecommerce_store_catData,'e-commerce-shop')));?>
						     	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
						     		<div class="col-lg-4 col-md-4">
						     			<div class="service my-1">
						          			<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><strong class="text-center"><?php the_title(); ?></strong><span class="screen-reader-text"><?php the_title(); ?></span></a>
						          			<p class="text-center"><?php $excerpt = get_the_excerpt(); echo esc_html( bb_ecommerce_store_string_limit_words( $excerpt,10 ) ); ?></p>
						          		</div>
						        	</div>
					     	<?php endwhile;
					     	wp_reset_postdata();
							}?>
						</div>
					</section>
				<?php }?>
				<?php do_action( 'bb_ecommerce_store_after_services_category' ); ?>
				<section id="our-products" class="my-5">
				    <div class="text-center innerlightbox">
				        <?php if( get_theme_mod('bb_ecommerce_store_sec1_title') != ''){ ?>
				            <strong class="text-center"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_sec1_title','')); ?></strong>
				        <?php }?>
				    </div>
					<?php $bb_ecommerce_store_slider_pages = array();
						$mod = intval( get_theme_mod( 'bb_ecommerce_store_servicesettings' ));
						if ( 'page-none-selected' != $mod ) {
						  $bb_ecommerce_store_slider_pages[] = $mod;
						}
					if( !empty($bb_ecommerce_store_slider_pages) ) :
					  $args = array(
					    'post_type' => 'page',
					    'post__in' => $bb_ecommerce_store_slider_pages,
					    'orderby' => 'post__in'
					  );
					  $query = new WP_Query( $args );
					  if ( $query->have_posts() ) :
							while ( $query->have_posts() ) : $query->the_post(); ?>
							    <div class="row box-image text-center m-0">
							        <p><?php the_content(); ?></p>
							        <div class="clearfix"></div>
							    </div>
							<?php endwhile; ?>
						<?php else : ?>
					  		<div class="no-postfound"></div>
						<?php endif;
					endif;
					wp_reset_postdata();?>
				    <div class="clearfix"></div> 
				</section>
				<?php do_action( 'bb_ecommerce_store_after_productsec' ); ?>
				<section id="shop-now" class="my-3">
				    <div class="shopimage">
					    <?php if( get_theme_mod( 'ecommerce_shop_image')  != '') { ?>
				          	<img  src="<?php echo esc_url( get_theme_mod('ecommerce_shop_image',esc_url(get_template_directory_uri()).'images/gift.jpg') ); ?>" alt="shop image">
				        <?php } ?>
				        <div class="shomain w-100 text-center">
					        <?php if( get_theme_mod('ecommerce_shop_title') != ''){ ?> 
					            <h3><?php echo esc_html(get_theme_mod('ecommerce_shop_title','')); ?></h3>
					        <?php }?>
					        <?php if( get_theme_mod('ecommerce_shop_linkname') != ''){ ?>     
					        <a href="<?php echo esc_url(get_theme_mod('ecommerce_shop_link','')); ?>"><p class="testparabt my-0 mx-auto p-2"><?php echo esc_html(get_theme_mod('ecommerce_shop_linkname','')); ?></p><span class="screen-reader-text"><?php esc_html_e( 'SHOP NOW','e-commerce-shop' );?></span></a>
					    </div>
					    <?php }?>
				    </div>
				</section>
			</div>
			<div class="col-lg-3 col-md-3 static-sidebar mb-3">
				<div class="cathead w-100 p-3"><i class="fas fa-bars"></i><span class="ms-3"><?php echo esc_html('ALL CATEGORIES') ?></span></div>
				<div class="sidepro p-3">
					<?php dynamic_sidebar('static-sidebar');?>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</main>

<?php get_footer(); ?>