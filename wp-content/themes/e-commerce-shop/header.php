<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package E-commerce Shop
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); }?>
  <header role="banner">
    <!-- preloader -->
    <?php if(get_theme_mod('bb_ecommerce_store_preloader_option',false)!= '' || get_theme_mod('bb_ecommerce_store_responsive_preloader', false) != ''){ ?>
      <?php if(get_theme_mod('bb_ecommerce_store_preloader_type_options', 'Preloader 1')  == 'Preloader 1') {?>
        <div id="loader-wrapper" class="w-100 h-100">
          <div id="loader" class="rounded-circle"></div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
        </div>
      <?php } else if(get_theme_mod('bb_ecommerce_store_preloader_type_options', 'Preloader 1') ==  'Preloader 2') {?>
        <div id="loader-wrapper" class="w-100 h-100">
          <div class="loader">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      <?php }?>
    <?php }?>
  <!-- preloader end -->
    <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_attr_e( 'Skip to content', 'e-commerce-shop' ); ?>"><?php esc_html_e( 'Skip to content', 'e-commerce-shop' ); ?></a>
    <?php if( get_theme_mod('bb_ecommerce_store_display_topbar',false) != ''){ ?>
      <div class="topbar py-2">
        <div class="container">
          <div class="row">
            <div class="top-contact col-lg-3 col-md-4">
              <?php if( get_theme_mod( 'bb_ecommerce_store_contact','' ) != '') { ?>
                <a class="call" href="tel:<?php echo esc_attr( get_theme_mod('bb_ecommerce_store_contact','' )); ?>"><i class="fa fa-phone me-2" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?></span></a>
               <?php } ?>
            </div>
            <div class="top-contact col-lg-3 col-md-4">
              <?php if( get_theme_mod( 'bb_ecommerce_store_email','' ) != '') { ?>
                <a class="email" href="mailto:<?php echo esc_attr( get_theme_mod('bb_ecommerce_store_email','') ); ?>"><i class="fa fa-envelope me-2" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?></span></a>
              <?php } ?>
            </div>
            <div class="social-media col-lg-6 col-md-4 text-end">
              <?php if( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_youtube_icon','fab fa-youtube')); ?> me-3" aria-hidden="true"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_facebook_icon','fab fa-facebook-f')); ?> me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','e-commerce-shop' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_twitter_icon','fab fa-twitter')); ?> me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','e-commerce-shop' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_instagram_icon','fab fa-instagram')); ?> me-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','e-commerce-shop' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_rss_icon','fas fa-rss')); ?> me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS','e-commerce-shop' );?></span></a>
              <?php } ?>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    <?php } ?>
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="logo my-2 align-self-center">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if( get_theme_mod('bb_ecommerce_store_site_title',true) != ''){ ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title mb-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php }?>
              <?php endif; ?>
              <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('bb_ecommerce_store_tagline',false) != ''){ ?>
                  <p class="site-description mb-0">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php }?>  
              <?php endif; ?>
            </div>
      	    <div class="clearfix"></div>
          </div>
          <div class="side_search col-lg-6 col-md-6 my-3 align-self-center">
            <div class="responsive_search align-self-center">
            </div>
            <div class="search_form">
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="<?php if( get_theme_mod( 'bb_ecommerce_store_sticky_header',false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <div class="toggle-menu responsive-menu <?php if( get_theme_mod( 'bb_ecommerce_store_responsive_sticky_header',false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
          <button role="tab" class="mobiletoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','e-commerce-shop'); ?></span></button>
        </div>
        <div class="nav">
      		<div class="container">
            <div id="menu-sidebar" class="nav sidebar">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'e-commerce-shop' ); ?>">
                  <?php 
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu-navigation clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) );
                  ?>
                  <div id="contact-info" class="text-center">
                    <div class="top-contact">
                      <?php if( get_theme_mod( 'bb_ecommerce_store_contact','' ) != '') { ?>
                        <a class="call" href="tel:<?php echo esc_attr( get_theme_mod('bb_ecommerce_store_contact','' )); ?>"><i class="fa fa-phone me-2" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?></span></a>
                      <?php } ?>
                    </div>
                    <div class="top-contact">
                      <?php if( get_theme_mod( 'bb_ecommerce_store_email','' ) != '') { ?>
                        <a class="email" href="mailto:<?php echo esc_attr( get_theme_mod('bb_ecommerce_store_email','') ); ?>"><i class="fa fa-envelope me-2" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?></span></a>
                      <?php } ?>
                    </div>
                    <div class="social-media">
                      <?php if( get_theme_mod( 'bb_ecommerce_store_youtube_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="fab fa-youtube me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','e-commerce-shop' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="fab fa-facebook me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','e-commerce-shop' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="fab fa-twitter me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','e-commerce-shop' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>"><i class="fab fa-instagram me-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','e-commerce-shop' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="fas fa-rss me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS','e-commerce-shop' );?></span></a>
                      <?php } ?>
                    </div>
                    <?php if(get_theme_mod('bb_ecommerce_store_mobile_search_option',true) != ''){ ?>
                      <?php get_search_form();?>
                    <?php } ?>
                  </div>
                  <a href="javascript:void(0)" class="closebtn responsive-menu"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','e-commerce-shop'); ?></span></a>
                </nav>
              </div>
      		</div>
        </div><!-- nav -->
      </div>
      <div class="clear"></div>
    </div><!-- aligner -->
  </header>