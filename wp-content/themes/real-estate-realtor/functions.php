<?php
/**
 * Real Estate Realtor functions and definitions
 * @package Real Estate Realtor
 */
 /* Breadcrumb Begin */
  function real_estate_realtor_the_breadcrumb() {
  	if (!is_home()) {
  		echo '<a href="';
  			echo esc_url( home_url() );
  		echo '">';
  			bloginfo('name');
  		echo "</a> ";
  		if (is_category() || is_single()) {
  			the_category(',');
  			if (is_single()) {
  				echo "<span> ";
  					the_title();
  				echo "</span> ";
  			}
  		} elseif (is_page()) {
  			echo "<span> ";
  				the_title();
  		}
  	}
  }
/* Theme Setup */
if ( ! function_exists( 'real_estate_realtor_setup' ) ) :

function real_estate_realtor_setup() {

	$GLOBALS['content_width'] = apply_filters( 'real_estate_realtor_content_width', 640 );

	load_theme_textdomain( 'real-estate-realtor', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('real-estate-realtor-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'real-estate-realtor' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', real_estate_realtor_font_url() ) );
}
endif; // real_estate_realtor_setup
add_action( 'after_setup_theme', 'real_estate_realtor_setup' );

/* Theme Widgets Setup */
function real_estate_realtor_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'real-estate-realtor' ),
		'description'   => __( 'Appears on posts and pages', 'real-estate-realtor' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'real-estate-realtor' ),
		'description'   => __( 'Appears on posts and pages', 'real-estate-realtor' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'real-estate-realtor' ),
		'description'   => __( 'Appears on posts and pages', 'real-estate-realtor' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$real_estate_realtor_widget_areas = get_theme_mod('real_estate_realtor_footer_widget_areas', '4');
	for ($i=1; $i<=$real_estate_realtor_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'real-estate-realtor' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'real_estate_realtor_widgets_init' );

/* Theme Font URL */
function real_estate_realtor_font_url()  {
	$font_family   = array(
		'ABeeZee:ital@0;1',
		'Abril Fatface',
		'Acme',
		'Allura',
		'Anton',
		'Architects Daughter',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Barlow Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat Brush',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Charm:wght@400;700',
		'Chewy',
		'Days One',
		'Dosis:wght@200;300;400;500;600;700;800',
		'DM Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700',
		'EB Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Fira Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fredoka One',
		'Fjalla One',
		'Francois One',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Gabriela',
		'Gloria Hallelujah',
		'Great Vibes',
		'Handlee',
		'Hammersmith One',
		'Heebo:wght@100;200;300;400;500;600;700;800;900',
		'Hind:wght@300;400;500;600;700',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Indie Flower',
		'IM Fell English SC',
		'Julius Sans One',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
		'Lobster',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Marck Script',
		'Marcellus',
		'Merienda One',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Nunito Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Oxygen:wght@300;400;700',
		'Oswald:wght@200;300;400;500;600;700',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Pacifico',
		'Padauk:wght@400;700',
		'Playball',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
		'PT Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Permanent Marker',
		'Poiret One',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prata',
		'Quicksand:wght@300;400;500;600;700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	 	'Russo One',
	 	'Righteous',
	 	'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Satisfy',
	 	'Sen:wght@400;700;800',
	 	'Slabo 13px',
	 	'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	 	'Shadows Into Light Two',
	 	'Shadows Into Light',
	 	'Sacramento',
	 	'Sail',
	 	'Shrikhand',
	 	'League Spartan:wght@100;200;300;400;500;600;700;800;900',
	 	'Staatliches',
	 	'Stylish',
	 	'Tangerine:wght@400;700',
	 	'Titillium Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700',
	 	'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	 	'Unica One',
	 	'VT323',
	 	'Varela Round',
	 	'Vampiro One',
	 	'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	 	'Work Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
	 	'ZCOOL XiaoWei',
	 	'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700'
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );	
}

/* Theme enqueue scripts */
function real_estate_realtor_scripts() {
	wp_enqueue_style( 'real-estate-realtor-font', real_estate_realtor_font_url(), array() );
	// blocks-css
	wp_enqueue_style( 'real-estate-realtor-block-style', get_theme_file_uri('/css/blocks.css') );

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style( 'real-estate-realtor-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'real-estate-realtor-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );

	// Body
	$real_estate_realtor_body_color       = get_theme_mod(
		'real_estate_realtor_body_color', '');
	$real_estate_realtor_body_font_family = get_theme_mod('real_estate_realtor_body_font_family', '');
	$real_estate_realtor_body_font_size   = get_theme_mod(
		'real_estate_realtor_body_font_size', '');

	// Paragraph
	$real_estate_realtor_paragraph_color       = get_theme_mod('real_estate_realtor_paragraph_color', '');
	$real_estate_realtor_paragraph_font_family = get_theme_mod('real_estate_realtor_paragraph_font_family', '');
	$real_estate_realtor_paragraph_font_size   = get_theme_mod('real_estate_realtor_paragraph_font_size', '');
	// "a" tag
	$real_estate_realtor_atag_color       = get_theme_mod('real_estate_realtor_atag_color', '');
	$real_estate_realtor_atag_font_family = get_theme_mod('real_estate_realtor_atag_font_family', '');
	// "li" tag
	$real_estate_realtor_li_color       = get_theme_mod('real_estate_realtor_li_color', '');
	$real_estate_realtor_li_font_family = get_theme_mod('real_estate_realtor_li_font_family', '');

	// H1
	$real_estate_realtor_h1_color       = get_theme_mod('real_estate_realtor_h1_color', '');
	$real_estate_realtor_h1_font_family = get_theme_mod('real_estate_realtor_h1_font_family', '');
	$real_estate_realtor_h1_font_size   = get_theme_mod('real_estate_realtor_h1_font_size', '');

	// H2
	$real_estate_realtor_h2_color       = get_theme_mod('real_estate_realtor_h2_color', '');
	$real_estate_realtor_h2_font_family = get_theme_mod('real_estate_realtor_h2_font_family', '');
	$real_estate_realtor_h2_font_size   = get_theme_mod('real_estate_realtor_h2_font_size', '');
	// H3
	$real_estate_realtor_h3_color       = get_theme_mod('real_estate_realtor_h3_color', '');
	$real_estate_realtor_h3_font_family = get_theme_mod('real_estate_realtor_h3_font_family', '');
	$real_estate_realtor_h3_font_size   = get_theme_mod('real_estate_realtor_h3_font_size', '');
	// H4
	$real_estate_realtor_h4_color       = get_theme_mod('real_estate_realtor_h4_color', '');
	$real_estate_realtor_h4_font_family = get_theme_mod('real_estate_realtor_h4_font_family', '');
	$real_estate_realtor_h4_font_size   = get_theme_mod('real_estate_realtor_h4_font_size', '');
	// H5
	$real_estate_realtor_h5_color       = get_theme_mod('real_estate_realtor_h5_color', '');
	$real_estate_realtor_h5_font_family = get_theme_mod('real_estate_realtor_h5_font_family', '');
	$real_estate_realtor_h5_font_size   = get_theme_mod('real_estate_realtor_h5_font_size', '');
	// H6
	$real_estate_realtor_h6_color       = get_theme_mod('real_estate_realtor_h6_color', '');
	$real_estate_realtor_h6_font_family = get_theme_mod('real_estate_realtor_h6_font_family', '');
	$real_estate_realtor_h6_font_size   = get_theme_mod('real_estate_realtor_h6_font_size', '');


	$real_estate_realtor_custom_css = '
		body{
		    color:'.esc_html($real_estate_realtor_body_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_body_font_family).';
		    font-size: '.esc_html($real_estate_realtor_body_font_size).'px;
		}
		p,span{
		    color:'.esc_html($real_estate_realtor_paragraph_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_paragraph_font_family).';
		    font-size: '.esc_html($real_estate_realtor_paragraph_font_size).'px;
		}
		a{
		    color:'.esc_html($real_estate_realtor_atag_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_atag_font_family).';
		}
		li{
		    color:'.esc_html($real_estate_realtor_li_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_li_font_family).';
		}
		h1{
		    color:'.esc_html($real_estate_realtor_h1_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_h1_font_family).'!important;
		    font-size: '.esc_html($real_estate_realtor_h1_font_size).'px!important;
		}
		h2{
		    color:'.esc_html($real_estate_realtor_h2_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_h2_font_family).'!important;
		    font-size: '.esc_html($real_estate_realtor_h2_font_size).'px!important;
		}
		h3{
		    color:'.esc_html($real_estate_realtor_h3_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_h3_font_family).'!important;
		    font-size: '.esc_html($real_estate_realtor_h3_font_size).'px!important;
		}
		h4{
		    color:'.esc_html($real_estate_realtor_h4_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_h4_font_family).'!important;
		    font-size: '.esc_html($real_estate_realtor_h4_font_size).'px!important;
		}
		h5{
		    color:'.esc_html($real_estate_realtor_h5_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_h5_font_family).'!important;
		    font-size: '.esc_html($real_estate_realtor_h5_font_size).'px!important;
		}
		h6{
		    color:'.esc_html($real_estate_realtor_h6_color).'!important;
		    font-family: '.esc_html($real_estate_realtor_h6_font_family).'!important;
		    font-size: '.esc_html($real_estate_realtor_h6_font_size).'px!important;
		}
	';
	wp_add_inline_style('real-estate-realtor-basic-style', $real_estate_realtor_custom_css);

	/* Theme Color sheet */
	require get_parent_theme_file_path( '/theme-color-option.php' );
	wp_add_inline_style( 'real-estate-realtor-basic-style',$real_estate_realtor_custom_css );
	wp_enqueue_script( 'tether-js', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery') ,'',true);
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'real-estate-realtor-custom-scripts-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'real_estate_realtor_scripts' );

function real_estate_realtor_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function real_estate_realtor_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/*radio button sanitization*/
function real_estate_realtor_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function real_estate_realtor_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function real_estate_realtor_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function real_estate_realtor_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
* Switch sanitization
*/
if ( ! function_exists( 'real_estate_realtor_switch_sanitization' ) ) {
	function real_estate_realtor_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/**
 * Integer sanitization
 */
if ( ! function_exists( 'real_estate_realtor_sanitize_integer' ) ) {
	function real_estate_realtor_sanitize_integer( $input ) {
		return (int) $input;
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'real_estate_realtor_loop_columns');
if (!function_exists('real_estate_realtor_loop_columns')) {
	function real_estate_realtor_loop_columns() {
		$columns = get_theme_mod( 'real_estate_realtor_per_columns', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'real_estate_realtor_shop_per_page', 20 );
function real_estate_realtor_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'real_estate_realtor_product_per_page', 9 );
	return $cols;
}

//Display the related posts
if ( ! function_exists( 'real_estate_realtor_related_posts' ) ) {
	function real_estate_realtor_related_posts() {
		wp_reset_postdata();
		global $post;
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => absint( get_theme_mod( 'real_estate_realtor_related_posts_count_number', '3' ) ),
		);
		// Categories
		if ( get_theme_mod( 'real_estate_realtor_related_posts_taxanomies', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Tags
		if ( get_theme_mod( 'real_estate_realtor_related_posts_taxanomies', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}
		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();
		return $query;
	}
}

function real_estate_realtor_enable_post_featured_image(){
	if(get_theme_mod('real_estate_realtor_post_featured_image') == 'Image' ) {
		return true;
	}
	return false;
}

function real_estate_realtor_post_color_enabled(){
	if(get_theme_mod('real_estate_realtor_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

function real_estate_realtor_enable_post_image_custom_dimention(){
	if(get_theme_mod('real_estate_realtor_post_featured_image_dimention') == 'Custom' ) {
		return true;
	}
	return false;
}

function real_estate_realtor_show_post_color(){
	if(get_theme_mod('real_estate_realtor_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Customizer file. */
require get_template_directory() . '/inc/customizer.php';

/* About Widget */
require get_template_directory() . '/inc/about.php';

/* Contact Widget */
require get_template_directory() . '/inc/contact.php';

// Popular Properties
function real_estate_realtor_bn_custom_meta_properties() {
    add_meta_box( 'bn_meta', __( 'Popular Properties Feilds', 'real-estate-realtor' ), 'real_estate_realtor_meta_callback_properties', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'real_estate_realtor_bn_custom_meta_properties');
}

function real_estate_realtor_meta_callback_properties( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'real_estate_realtor_popular_properties_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $property_amount = get_post_meta( $post->ID, 'real_estate_realtor_property_amount', true );
    $property_sale_rent = get_post_meta( $post->ID, 'real_estate_realtor_property_sale_rent', true );
    $property_bed = get_post_meta( $post->ID, 'real_estate_realtor_property_bed', true );
    $property_baths = get_post_meta( $post->ID, 'real_estate_realtor_property_baths', true );
    $property_sqft = get_post_meta( $post->ID, 'real_estate_realtor_property_sqft', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Property Amount', 'real-estate-realtor' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_realtor_property_amount" id="real_estate_realtor_property_amount" value="<?php echo esc_html($property_amount); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Property For Sale or Rent', 'real-estate-realtor' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_realtor_property_sale_rent" id="real_estate_realtor_property_sale_rent" value="<?php echo esc_html($property_sale_rent); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Bedrooms', 'real-estate-realtor' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_realtor_property_bed" id="real_estate_realtor_property_bed" value="<?php echo esc_html($property_bed); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Bathrooms', 'real-estate-realtor' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_realtor_property_baths" id="real_estate_realtor_property_baths" value="<?php echo esc_html($property_baths); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Sqft', 'real-estate-realtor' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_realtor_property_sqft" id="real_estate_realtor_property_sqft" value="<?php echo esc_html($property_sqft); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function real_estate_realtor_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['real_estate_realtor_popular_properties_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['real_estate_realtor_popular_properties_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Property Amount Data
    if( isset( $_POST[ 'real_estate_realtor_property_amount' ] ) ) {
        update_post_meta( $post_id, 'real_estate_realtor_property_amount', strip_tags( wp_unslash( $_POST[ 'real_estate_realtor_property_amount' ]) ) );
    }
    // Save Sale or Rent Data
    if( isset( $_POST[ 'real_estate_realtor_property_sale_rent' ] ) ) {
        update_post_meta( $post_id, 'real_estate_realtor_property_sale_rent', strip_tags( wp_unslash( $_POST[ 'real_estate_realtor_property_sale_rent' ]) ) );
    }
    // Save Bedrooms Data
    if( isset( $_POST[ 'real_estate_realtor_property_bed' ] ) ) {
        update_post_meta( $post_id, 'real_estate_realtor_property_bed', strip_tags( wp_unslash( $_POST[ 'real_estate_realtor_property_bed' ]) ) );
    }
    // Save Bathrooms Data
    if( isset( $_POST[ 'real_estate_realtor_property_baths' ] ) ) {
        update_post_meta( $post_id, 'real_estate_realtor_property_baths', strip_tags( wp_unslash( $_POST[ 'real_estate_realtor_property_baths' ]) ) );
    }
    // Save Property Sqft Data
    if( isset( $_POST[ 'real_estate_realtor_property_sqft' ] ) ) {
        update_post_meta( $post_id, 'real_estate_realtor_property_sqft', strip_tags( wp_unslash( $_POST[ 'real_estate_realtor_property_sqft' ]) ) );
    }
}
add_action( 'save_post', 'real_estate_realtor_bn_metadesig_save' );

define('REAL_ESTATE_REALTOR_LIVE_DEMO',__('https://www.buywptemplates.com/bwt-real-estate-realtor-pro/', 'real-estate-realtor'));
define('REAL_ESTATE_REALTOR_BUY_PRO',__('https://www.buywptemplates.com/themes/real-estate-realtor-wordpress-theme/', 'real-estate-realtor'));
define('REAL_ESTATE_REALTOR_PRO_DOC',__('https://buywptemplates.com/demo/docs/bwt-real-estate-realtor-pro/', 'real-estate-realtor'));
define('REAL_ESTATE_REALTOR_FREE_DOC',__('https://buywptemplates.com/demo/docs/free-bwt-real-estate-realtor/', 'real-estate-realtor'));
define('REAL_ESTATE_REALTOR_PRO_SUPPORT',__('https://www.buywptemplates.com/support/', 'real-estate-realtor'));
define('REAL_ESTATE_REALTOR_FREE_SUPPORT',__('https://wordpress.org/support/theme/real-estate-realtor/', 'real-estate-realtor'));

define('REAL_ESTATE_REALTOR_CREDIT',__('https://www.buywptemplates.com/themes/free-real-estate-realtor-wordpress-theme/', 'real-estate-realtor'));

if ( ! function_exists( 'real_estate_realtor_credit' ) ) {
	function real_estate_realtor_credit(){
		echo "<a href=".esc_url(REAL_ESTATE_REALTOR_CREDIT).">".esc_html__('Real Estate Realtor WordPress Theme ','real-estate-realtor')."</a>";
	}
}

/* Load welcome message.*/
require get_template_directory() . '/inc/dashboard/get_started_info.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';