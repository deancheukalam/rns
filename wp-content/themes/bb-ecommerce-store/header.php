<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package BB Ecommerce Store
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
  <?php if ( function_exists( 'wp_body_open' ) ) {
      wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  } ?>
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
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'bb-ecommerce-store' ); ?></a>
    <?php if( get_theme_mod('bb_ecommerce_store_display_topbar', false) != ''){ ?>
      <div class="topbar py-2">
        <div class="container">
          <div class="row">
            <div class="top-contact col-lg-3 col-md-3">
              <?php if( get_theme_mod( 'bb_ecommerce_store_contact','' ) != '') { ?>
                <a class="call" href="tel:<?php echo esc_attr( get_theme_mod('bb_ecommerce_store_contact','' )); ?>"><i class="fa fa-phone me-2" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?></span></a>
              <?php } ?>
            </div>
            <div class="top-contact col-lg-3 col-md-4">
              <?php if( get_theme_mod( 'bb_ecommerce_store_email','' ) != '') { ?>
                <a class="email" href="mailto:<?php echo esc_attr( get_theme_mod('bb_ecommerce_store_email','') ); ?>"><i class="fa fa-envelope me-2" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?></span></a>
              <?php } ?>
            </div>
            <div class="social-media col-lg-6 col-md-5 text-end">
              <?php if( get_theme_mod( 'bb_ecommerce_store_youtube_url') != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_youtube_icon','fab fa-youtube')); ?> me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','bb-ecommerce-store' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url') != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_facebook_icon','fab fa-facebook')); ?> me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','bb-ecommerce-store' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url') != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_twitter_icon','fab fa-twitter')); ?> me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','bb-ecommerce-store' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_instagram_icon','fab fa-instagram')); ?> me-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','bb-ecommerce-store' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url') != '') { ?>
                <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('bb_ecommerce_store_rss_icon','fas fa-rss')); ?> me-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS','bb-ecommerce-store' );?></span></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    <?php } ?>
    <div class="header pt-3">
      <div class="container">
        <div class="row">
          <div class="logo col-lg-3 col-md-3 align-self-center">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if( get_theme_mod('bb_ecommerce_store_site_title',true) != ''){ ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title text-uppercase"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                  <p class="site-title text-uppercase mb-3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif; ?>
              <?php }?>
            <?php endif; ?>
            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('bb_ecommerce_store_tagline',false) != ''){ ?>
                <p class="site-description mb-3">
                  <?php echo esc_html($description); ?>
                </p>
              <?php }?>
            <?php endif; ?>
          </div>      
          <div class="side_search  col-lg-6 col-md-5 align-self-center">
            <?php if(class_exists('woocommerce')){ ?>
              <?php get_product_search_form()?>
            <?php } ?>
          </div>
          <div class="cart-btn-box col-lg-3 col-md-4 align-self-center">
            <div class="cart_icon"><i class="fas fa-shopping-bag rounded-circle me-2"></i><a href="<?php the_permalink((get_option('woocommerce_cart_page_id'))); ?>"><?php echo esc_html_e('SHOPPING CART','bb-ecommerce-store'); ?><span class="screen-reader-text"><?php esc_html_e( 'SHOPPING CART','bb-ecommerce-store' );?></span></a></div>
          </div>
        </div>
      </div>
      <div class="toggle-menu responsive-menu <?php if( get_theme_mod( 'bb_ecommerce_store_responsive_sticky_header',false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <button role="tab" class="mobiletoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','bb-ecommerce-store'); ?></span></button>
      </div>
      <div class="top-header">
        <div class="container">
          <div class="row">
            <div class=" col-lg-3 col-md-3 align-self-center">
            </div>
            <div class=" col-lg-9 col-md-9 align-self-center">
              <div id="menu-sidebar" class="nav sidebar text-lg-start text-center <?php if( get_theme_mod( 'bb_ecommerce_store_sticky_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'bb-ecommerce-store' ); ?>">
                  <?php
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu-navigation clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav ps-lg-0">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) );
                  ?>
                  <div id="contact-info">
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
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="fab fa-facebook" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                    </div>
                    <?php if(get_theme_mod('bb_ecommerce_store_mobile_search_option',true) != ''){ ?>
                      <?php get_search_form();?>
                    <?php }?>
                  </div>
                  <a href="javascript:void(0)" class="closebtn responsive-menu"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','bb-ecommerce-store'); ?></span></a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </header>