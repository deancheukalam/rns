<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head> 
	<meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link rambo-screen-reader" href="#content"><?php esc_html_e( 'Skip to content', 'rambo' ); ?></a>
<div class="container">		
		<div class="navbar">
            <div class="navbar-inner">
                 <?php if(has_custom_logo()):
                 the_custom_logo(); 
                 endif;?>
                 <?php $rambo_blog_name = esc_html(get_bloginfo( ));
						$rambo_blog_name1 = substr($rambo_blog_name,0,1);
						$rambo_blog_name2 = substr($rambo_blog_name,1);
				  ?>
                <div class="logo-link-url">
                <h1 class="site-title" style="margin: 0px;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="logo-title"><?php echo esc_html(ucfirst($rambo_blog_name1)); ?><small><?php echo esc_html($rambo_blog_name2); ?></small></span></a></h1>
				<?php
				$rambo_description = get_bloginfo( 'description', 'display' );
				if ( $rambo_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $rambo_description; ?></p>
				<?php endif; ?>
                   </div>
                   <button type="button" data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar navbar-toggle">
					<span class="sr-only"><?php echo esc_html_e('Toggle navigation','rambo'); ?></span>
					 <span class="icon-bar"></span>
		             <span class="icon-bar"></span>
		             <span class="icon-bar"></span>
				  </button>
                  <div class="nav-collapse collapse navbar-responsive-collapse">
				  <?php	wp_nav_menu( array(  
									'theme_location' => 'primary',
									'container'  => 'nav-collapse collapse navbar-inverse-collapse',
									'menu_class' => 'nav navbar-nav',
									'fallback_cb' => 'rambo_fallback_page_menu',
									'walker' => new Rambo_nav_walker()
									)
								);	?>                    
                  </div>
            </div>
        </div>
</div>