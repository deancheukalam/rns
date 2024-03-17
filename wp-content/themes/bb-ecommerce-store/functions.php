<?php
/**
 * Ecommerce Store functions and definitions
 *
 * @package BB Ecommerce Store
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
/* Breadcrumb Begin */
function bb_ecommerce_store_the_breadcrumb() {
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
if ( ! function_exists( 'bb_ecommerce_store_setup' ) ) :

function bb_ecommerce_store_setup() {

	$GLOBALS['content_width'] = apply_filters( 'bb_ecommerce_store_content_width', 640 );

	load_theme_textdomain( 'bb-ecommerce-store', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-zoom' ); 
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('bb-ecommerce-store-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bb-ecommerce-store' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
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
	add_editor_style( array( 'css/editor-style.css', bb_ecommerce_store_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'])) {
		add_action( 'admin_notices', 'bb_ecommerce_store_activation_notice' );
	}	
}
endif; // bb_ecommerce_store_setup
add_action( 'after_setup_theme', 'bb_ecommerce_store_setup' );

// Notice after Theme Activation
function bb_ecommerce_store_activation_notice() {
	echo '<div class="notice notice-success is-dismissible get-started">';
		echo '<p>'. esc_html__( 'Thank you for choosing ThemeShopy. We are sincerely obliged to offer our best services to you. Please proceed towards welcome page and give us the privilege to serve you.', 'bb-ecommerce-store' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=bb_ecommerce_store_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click here...', 'bb-ecommerce-store' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function bb_ecommerce_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on blog page sidebar', 'bb-ecommerce-store' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on posts and pages', 'bb-ecommerce-store' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on posts and pages', 'bb-ecommerce-store' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$bb_ecommerce_store_widget_areas = get_theme_mod('bb_ecommerce_store_footer_widget_areas', '4');
	for ($i=1; $i<=$bb_ecommerce_store_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'bb-ecommerce-store' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Home Page Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on Home Page', 'bb-ecommerce-store' ),
		'id'            => 'homepage',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on shop page', 'bb-ecommerce-store' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'bb-ecommerce-store' ),
		'description'   => __( 'Appears on shop page', 'bb-ecommerce-store' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bb_ecommerce_store_widgets_init' );

/* Theme Font URL */
function bb_ecommerce_store_font_url(){
	$font_url = '';
	$font_family = array(
		'ABeeZee:ital@0;1',
		'Abril Fatfac',
		'Acme',
		'Allura',
		'Amatic SC:wght@400;700',
		'Anton',
		'Architects Daughter',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Asap:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Assistant:wght@200;300;400;500;600;700;800',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Barlow Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Berkshire Swash',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat:wght@400;500;600;700',
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
		'DM Serif Display:ital@0;1',
		'Dosis:wght@200;300;400;500;600;700;800',
		'EB Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Familjen Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
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
		'Jomhuria',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kaisei HarunoUmi:wght@400;500;700',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kaushan Script',
		'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Marck Script',
		'Marcellus',
		'Merienda One',
		'Monda:wght@400;700',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Nunito Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
		'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
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
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Ropa Sans:ital@0;1',
		'Russo One',
		'Righteous',
		'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Satisfy',
		'Sen:wght@400;700;800',
		'Slabo 13px',
		'Slabo 27px',
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
		'ZCOOL XiaoWei'
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/* Theme enqueue scripts */
function bb_ecommerce_store_scripts() {
	wp_enqueue_style( 'bb-ecommerce-store-font', bb_ecommerce_store_font_url(), array() );
	// blocks-css
	wp_enqueue_style( 'bb-ecommerce-store-block-style', get_theme_file_uri('/css/blocks.css') );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'bb-ecommerce-store-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'bb-ecommerce-store-style', 'rtl', 'replace' );
	wp_enqueue_style('bb-ecommerce-store-block-pattern-frontend', get_template_directory_uri().'/theme-block-pattern/css/block-pattern-frontend.css');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );

	// Paragraph
	    $bb_ecommerce_store_paragraph_color = get_theme_mod('bb_ecommerce_store_paragraph_color', '');
	    $bb_ecommerce_store_paragraph_font_family = get_theme_mod('bb_ecommerce_store_paragraph_font_family', '');
	    $bb_ecommerce_store_paragraph_font_size = get_theme_mod('bb_ecommerce_store_paragraph_font_size', '');
	// "a" tag
		$bb_ecommerce_store_atag_color = get_theme_mod('bb_ecommerce_store_atag_color', '');
	    $bb_ecommerce_store_atag_font_family = get_theme_mod('bb_ecommerce_store_atag_font_family', '');
	// "li" tag
		$bb_ecommerce_store_li_color = get_theme_mod('bb_ecommerce_store_li_color', '');
	    $bb_ecommerce_store_li_font_family = get_theme_mod('bb_ecommerce_store_li_font_family', '');
	// H1
		$bb_ecommerce_store_h1_color = get_theme_mod('bb_ecommerce_store_h1_color', '');
	    $bb_ecommerce_store_h1_font_family = get_theme_mod('bb_ecommerce_store_h1_font_family', '');
	    $bb_ecommerce_store_h1_font_size = get_theme_mod('bb_ecommerce_store_h1_font_size', '');
	// H2
		$bb_ecommerce_store_h2_color = get_theme_mod('bb_ecommerce_store_h2_color', '');
	    $bb_ecommerce_store_h2_font_family = get_theme_mod('bb_ecommerce_store_h2_font_family', '');
	    $bb_ecommerce_store_h2_font_size = get_theme_mod('bb_ecommerce_store_h2_font_size', '');
	// H3
		$bb_ecommerce_store_h3_color = get_theme_mod('bb_ecommerce_store_h3_color', '');
	    $bb_ecommerce_store_h3_font_family = get_theme_mod('bb_ecommerce_store_h3_font_family', '');
	    $bb_ecommerce_store_h3_font_size = get_theme_mod('bb_ecommerce_store_h3_font_size', '');
	// H4
		$bb_ecommerce_store_h4_color = get_theme_mod('bb_ecommerce_store_h4_color', '');
	    $bb_ecommerce_store_h4_font_family = get_theme_mod('bb_ecommerce_store_h4_font_family', '');
	    $bb_ecommerce_store_h4_font_size = get_theme_mod('bb_ecommerce_store_h4_font_size', '');
	// H5
		$bb_ecommerce_store_h5_color = get_theme_mod('bb_ecommerce_store_h5_color', '');
	    $bb_ecommerce_store_h5_font_family = get_theme_mod('bb_ecommerce_store_h5_font_family', '');
	    $bb_ecommerce_store_h5_font_size = get_theme_mod('bb_ecommerce_store_h5_font_size', '');
	// H6
		$bb_ecommerce_store_h6_color = get_theme_mod('bb_ecommerce_store_h6_color', '');
	    $bb_ecommerce_store_h6_font_family = get_theme_mod('bb_ecommerce_store_h6_font_family', '');
	    $bb_ecommerce_store_h6_font_size = get_theme_mod('bb_ecommerce_store_h6_font_size', '');

		$bb_ecommerce_store_custom_css ='
			p,span{
			    color:'.esc_html($bb_ecommerce_store_paragraph_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_paragraph_font_family).';
			    font-size: '.esc_html($bb_ecommerce_store_paragraph_font_size).';
			}
			a{
			    color:'.esc_html($bb_ecommerce_store_atag_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_atag_font_family).';
			}
			li{
			    color:'.esc_html($bb_ecommerce_store_li_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_li_font_family).';
			}
			h1{
			    color:'.esc_html($bb_ecommerce_store_h1_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_h1_font_family).'!important;
			    font-size: '.esc_html($bb_ecommerce_store_h1_font_size).'!important;
			}
			h2{
			    color:'.esc_html($bb_ecommerce_store_h2_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_h2_font_family).'!important;
			    font-size: '.esc_html($bb_ecommerce_store_h2_font_size).'!important;
			}
			h3{
			    color:'.esc_html($bb_ecommerce_store_h3_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_h3_font_family).'!important;
			    font-size: '.esc_html($bb_ecommerce_store_h3_font_size).'!important;
			}
			h4{
			    color:'.esc_html($bb_ecommerce_store_h4_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_h4_font_family).'!important;
			    font-size: '.esc_html($bb_ecommerce_store_h4_font_size).'!important;
			}
			h5{
			    color:'.esc_html($bb_ecommerce_store_h5_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_h5_font_family).'!important;
			    font-size: '.esc_html($bb_ecommerce_store_h5_font_size).'!important;
			}
			h6{
			    color:'.esc_html($bb_ecommerce_store_h6_color).'!important;
			    font-family: '.esc_html($bb_ecommerce_store_h6_font_family).'!important;
			    font-size: '.esc_html($bb_ecommerce_store_h6_font_size).'!important;
			}

			';
			
		wp_add_inline_style( 'bb-ecommerce-store-basic-style',$bb_ecommerce_store_custom_css );

	wp_enqueue_script( 'bb-ecommerce-store-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	require get_parent_theme_file_path( '/inc/ts-color-pallete.php' );
	wp_add_inline_style( 'bb-ecommerce-store-basic-style',$bb_ecommerce_store_custom_css );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bb_ecommerce_store_scripts' );

/*** Enqueue block editor style */
function bb_ecommerce_store_block_editor_styles() {
	wp_enqueue_style( 'bb-ecommerce-store-font', bb_ecommerce_store_font_url(), array() );
    wp_enqueue_style( 'bb-ecommerce-store-block-patterns-style-editor', get_theme_file_uri( '/theme-block-pattern/css/block-pattern-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'bb_ecommerce_store_block_editor_styles' );

define('BB_ECOMMERCE_STORE_BUY_NOW',__('https://www.themeshopy.com/themes/ecommerce-store-wordpress-theme/', 'bb-ecommerce-store'));
define('BB_ECOMMERCE_STORE_LIVE_DEMO',__('https://www.themeshopy.com/ecommerce-store-wordpress-theme/', 'bb-ecommerce-store'));
define('BB_ECOMMERCE_STORE_PRO_DOC',__('https://themeshopy.com/demo/docs/bb-ecommerce-store/', 'bb-ecommerce-store'));
define('BB_ECOMMERCE_STORE_FREE_DOC',__('https://www.themeshopy.com/demo/docs/free-bb-ecommerce/', 'bb-ecommerce-store'));
define('BB_ECOMMERCE_STORE_CONTACT',__('https://wordpress.org/support/theme/bb-ecommerce-store/', 'bb-ecommerce-store'));
define('BB_ECOMMERCE_STORE_CREDIT',__('https://www.themeshopy.com/themes/wp-ecommerce-store-wordpress-theme/', 'bb-ecommerce-store'));

if ( ! function_exists( 'bb_ecommerce_store_credit' ) ) {
	function bb_ecommerce_store_credit(){
		echo "<a href=".esc_url(BB_ECOMMERCE_STORE_CREDIT).">".esc_html__(' By Themeshopy','bb-ecommerce-store')."</a>";
	}
}

//Display the related posts
if ( ! function_exists( 'bb_ecommerce_store_related_posts' ) ) {
	function bb_ecommerce_store_related_posts() {
		wp_reset_postdata();
		global $post;
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'    => absint( get_theme_mod( 'bb_ecommerce_store_related_posts_number', '3' ) ),
		);
		// Categories
		if ( get_theme_mod( 'bb_ecommerce_store_related_posts_taxanomies_options', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Tags
		if ( get_theme_mod( 'bb_ecommerce_store_related_posts_taxanomies_options', 'categories' ) == 'tags' ) {

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

function bb_ecommerce_store_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/
 function bb_ecommerce_store_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function bb_ecommerce_store_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function bb_ecommerce_store_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function bb_ecommerce_store_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function bb_ecommerce_store_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'bb_ecommerce_store_loop_columns');
if (!function_exists('bb_ecommerce_store_loop_columns')) {
	function bb_ecommerce_store_loop_columns() {
		$columns = get_theme_mod( 'bb_ecommerce_store_wooproducts_per_columns', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'bb_ecommerce_store_shop_per_page', 20 );
function bb_ecommerce_store_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'bb_ecommerce_store_wooproducts_per_page', 9 );
	return $cols;
}

//* Excerpt Limit Begin */
function bb_ecommerce_store_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/*compatibility file. */
require get_template_directory() . '/inc/customizer.php';

/* compatibility file. */
require get_template_directory() . '/inc/custom-header.php';

/* admin file. */
require get_template_directory() . '/inc/admin/admin.php';

/* Implement the block pattern. */
require get_template_directory().'/theme-block-pattern/theme-block-pattern.php';

/* TGM Plugin Activation */
require get_template_directory() .'/inc/tgm.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';