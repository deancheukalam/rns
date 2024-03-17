<?php
/**
 * Ecommerce Store Theme Customizer
 *
 * @package BB Ecommerce Store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bb_ecommerce_store_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'bb_ecommerce_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'bb-ecommerce-store' ),
	    'description' => __( 'Description of what this panel does.', 'bb-ecommerce-store' ),
	) );

	// font array
	
	$bb_ecommerce_store_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Coming Soon' => 'Coming Soon',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Noto Sans' => 'Noto Sans',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Poppins' => 'Poppins',
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Roboto' => 'Roboto',
        'Roboto Condensed' => 'Roboto Condensed',
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Satisfy' => 'Satisfy',
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Unica One' => 'Unica One',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'bb_ecommerce_store_typography', array(
    	'title'      => __( 'Typography', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );

	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_paragraph_color', array(
		'label' => __('Paragraph Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_paragraph_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'Paragraph Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	$wp_customize->add_setting('bb_ecommerce_store_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_atag_color', array(
		'label' => __('"a" Tag Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_atag_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( '"a" Tag Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_li_color', array(
		'label' => __('"li" Tag Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_li_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( '"li" Tag Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h1_color', array(
		'label' => __('H1 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h1_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'H1 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h1_font_size',array(
		'label'	=> __('H1 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h2_color', array(
		'label' => __('h2 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h2_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h2 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h2_font_size',array(
		'label'	=> __('h2 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h3_color', array(
		'label' => __('h3 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h3_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h3 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h3_font_size',array(
		'label'	=> __('h3 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h4_color', array(
		'label' => __('h4 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h4_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h4 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h4_font_size',array(
		'label'	=> __('h4 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h5_color', array(
		'label' => __('h5 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h5_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h5 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h5_font_size',array(
		'label'	=> __('h5 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h6_color', array(
		'label' => __('h6 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h6_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h6 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h6_font_size',array(
		'label'	=> __('h6 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h6_font_size',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('bb_ecommerce_store_background_skin_mode',array(
        'default' => 'Transparent Background',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_background_skin_mode',array(
        'type' => 'select',
        'label' => __('Background Type','bb-ecommerce-store'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background','bb-ecommerce-store'),
            'Transparent Background' => __('Transparent Background','bb-ecommerce-store'),
        ),
	) );

	// woocommerce section
	$wp_customize->add_section('bb_ecommerce_store_woocommerce_settings', array(
		'title'    => __('WooCommerce Settings', 'bb-ecommerce-store'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_shop_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Woocommerce Page Sidebar','bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_woocommerce_settings'
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('bb_ecommerce_store_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'bb-ecommerce-store'),
		'section'        => 'bb_ecommerce_store_woocommerce_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'bb-ecommerce-store'),
			'Right Sidebar' => __('Right Sidebar', 'bb-ecommerce-store'),
		),
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Single Product Page Sidebar','bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_woocommerce_settings'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('bb_ecommerce_store_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'bb-ecommerce-store'),
		'section'        => 'bb_ecommerce_store_woocommerce_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'bb-ecommerce-store'),
			'Right Sidebar' => __('Right Sidebar', 'bb-ecommerce-store'),
		),
	));

	$wp_customize->add_setting('bb_ecommerce_store_show_related_products',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_show_related_products',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Product','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_woocommerce_settings',
    ));

	$wp_customize->add_setting('bb_ecommerce_store_show_wooproducts_border',array(
       'default' => false,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_show_wooproducts_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product Border','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_woocommerce_settings',
    ));

    $wp_customize->add_setting( 'bb_ecommerce_store_wooproducts_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_wooproducts_per_columns', array(
		'label'    => __( 'Display Product Per Columns', 'bb-ecommerce-store' ),
		'section'  => 'bb_ecommerce_store_woocommerce_settings',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	)  );

	$wp_customize->add_setting('bb_ecommerce_store_wooproducts_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));	
	$wp_customize->add_control('bb_ecommerce_store_wooproducts_per_page',array(
		'label'	=> __('Display Product Per Page','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_woocommerce_settings',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_top_bottom_wooproducts_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control( 'bb_ecommerce_store_top_bottom_wooproducts_padding',	array(
		'label' => esc_html__( 'Top Bottom Product Padding','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_left_right_wooproducts_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control( 'bb_ecommerce_store_left_right_wooproducts_padding',	array(
		'label' => esc_html__( 'Right Left Product Padding','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_wooproducts_border_radius',array(
		'default' => 0,
		'sanitize_callback'    => 'bb_ecommerce_store_sanitize_number_range',
	));
	$wp_customize->add_control('bb_ecommerce_store_wooproducts_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'range'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_wooproducts_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'bb_ecommerce_store_sanitize_number_range',
	));
	$wp_customize->add_control('bb_ecommerce_store_wooproducts_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_setting('bb_ecommerce_store_products_navigation',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_choices'
    ));
    $wp_customize->add_control('bb_ecommerce_store_products_navigation',array(
       'type' => 'radio',
       'label' => __('Woocommerce Products Navigation','bb-ecommerce-store'),
       'choices' => array(
            'Yes' => __('Yes','bb-ecommerce-store'),
            'No' => __('No','bb-ecommerce-store'),
        ),
       'section' => 'bb_ecommerce_store_woocommerce_settings',
    ));

	$wp_customize->add_setting( 'bb_ecommerce_store_top_bottom_product_button_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_top_bottom_product_button_padding',	array(
		'label' => esc_html__( 'Product Button Top Bottom Padding','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'bb_ecommerce_store_left_right_product_button_padding',array(
		'default' => 16,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_left_right_product_button_padding',array(
		'label' => esc_html__( 'Product Button Right Left Padding','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_product_button_border_radius',array(
		'default' => 0,
		'sanitize_callback'    => 'bb_ecommerce_store_sanitize_number_range',
	));
	$wp_customize->add_control('bb_ecommerce_store_product_button_border_radius',array(
		'label' => esc_html__( 'Product Button Border Radius','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'type'		=> 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
	),));

	$wp_customize->add_setting('bb_ecommerce_store_align_product_sale',array(
        'default' => 'Right',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_align_product_sale',array(
        'type' => 'radio',
        'label' => __('Product Sale Button Alignment','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_woocommerce_settings',
        'choices' => array(
            'Right' => __('Right','bb-ecommerce-store'),
            'Left' => __('Left','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting( 'bb_ecommerce_store_border_radius_product_sale',array(
		'default' => 50,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_border_radius_product_sale', array(
        'label'  => __('Product Sale Button Border Radius','bb-ecommerce-store'),
        'section'  => 'bb_ecommerce_store_woocommerce_settings',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    ) );

	$wp_customize->add_setting('bb_ecommerce_store_product_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float'
	));
	$wp_customize->add_control('bb_ecommerce_store_product_sale_font_size',array(
		'label'	=> __('Product Sale Button Font Size','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_woocommerce_settings',
		'type'=> 'number'
	));

	// sale button padding
	$wp_customize->add_setting( 'bb_ecommerce_store_sale_padding_top',array(
		'default' => 0,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control( 'bb_ecommerce_store_sale_padding_top',	array(
		'label' => esc_html__( ' Product Sale Top Bottom Padding','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_sale_padding_left',array(
		'default' => 0,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control( 'bb_ecommerce_store_sale_padding_left',	array(
		'label' => esc_html__( ' Product Sale Left Right Padding','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	 // Add the Theme Color Option section.
	$wp_customize->add_section( 'bb_ecommerce_store_theme_color_option', array( 
		'panel' => 'bb_ecommerce_store_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'bb-ecommerce-store'
	) )	);
	
  	$wp_customize->add_setting( 'bb_ecommerce_store_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_theme_color', array(
  		'label' => __('Color Option', 'bb-ecommerce-store' ),
  		'description' => __('One can change complete theme color on just one click.', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_theme_color_option',
	    'settings' => 'bb_ecommerce_store_theme_color',
  	)));

    //Topbar section
	$wp_customize->add_section('bb_ecommerce_store_topbar',array(
		'title'	=> __('Topbar Section','bb-ecommerce-store'),
		'description'	=> __('Add Header Content here','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'bb_ecommerce_store_display_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_display_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Topbar','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_topbar'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_topbar_top_bottom_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_topbar_top_bottom_spacing',array(
		'label'	=> __('Top Bottom Topbar Content Space','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_topbar',
		'type'=> 'number'
	));

    //Sticky Header
	$wp_customize->add_setting( 'bb_ecommerce_store_sticky_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_topbar'
    ));

    $wp_customize->add_setting( 'bb_ecommerce_store_sticky_header_padding_settings', array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_sticky_header_padding_settings', array(
		'label'       => esc_html__( 'Sticky Header Padding','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_topbar',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_phone_number'
	));
	$wp_customize->add_control('bb_ecommerce_store_contact',array(
		'label'	=> __('Add Phone Number','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_topbar',
		'setting'	=> 'bb_ecommerce_store_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('bb_ecommerce_store_email',array(
		'label'	=> __('Add Email','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_topbar',
		'setting'	=> 'bb_ecommerce_store_email',
		'type'		=> 'text'
	));

	//Menus Settings
	$wp_customize->add_section('bb_ecommerce_store_menus_settings',array(
		'title'	=> __('Menus Settings','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_text_tranform_menu',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
 	));
 	$wp_customize->add_control('bb_ecommerce_store_text_tranform_menu',array(
		'type' => 'radio',
		'label' => __('Menu Text Transform','bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_menus_settings',
		'choices' => array(
		   'Uppercase' => __('Uppercase','bb-ecommerce-store'),
		   'Lowercase' => __('Lowercase','bb-ecommerce-store'),
		   'Capitalize' => __('Capitalize','bb-ecommerce-store'),
		),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_menus_font_size',array(
		'default'=> 12,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float'
	));
	$wp_customize->add_control('bb_ecommerce_store_menus_font_size',array(
		'label'	=> __('Menus Font Size','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_menus_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting('bb_ecommerce_store_menu_weight',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_menu_weight',array(
		'label'	=> __('Menus Font Weight','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_menus_settings',
		'type' => 'select',
		'choices' => array(
            '100' => __('100','bb-ecommerce-store'),
            '200' => __('200','bb-ecommerce-store'),
            '300' => __('300','bb-ecommerce-store'),
            '400' => __('400','bb-ecommerce-store'),
            '500' => __('500','bb-ecommerce-store'),
            '600' => __('600','bb-ecommerce-store'),
            '700' => __('700','bb-ecommerce-store'),
            '800' => __('800','bb-ecommerce-store'),
            '900' => __('900','bb-ecommerce-store'),
        ),
	));

	$wp_customize->add_setting('bb_ecommerce_store_menus_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float'
	));
	$wp_customize->add_control('bb_ecommerce_store_menus_padding',array(
		'label'	=> __('Menus Padding','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_menus_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_menu_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_menu_color_settings', array(
  		'label' => __('Menu Color', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_menus_settings',
	    'settings' => 'bb_ecommerce_store_menu_color_settings',
  	)));

  	$wp_customize->add_setting( 'bb_ecommerce_store_menu_hover_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_menu_hover_color_settings', array(
  		'label' => __('Menu Hover Color', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_menus_settings',
	    'settings' => 'bb_ecommerce_store_menu_hover_color_settings',
  	)));
  
  	$wp_customize->add_setting( 'bb_ecommerce_store_submenu_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_submenu_color_settings', array(
  		'label' => __('Sub-menu Color', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_menus_settings',
	    'settings' => 'bb_ecommerce_store_submenu_color_settings',
  	)));

  	$wp_customize->add_setting( 'bb_ecommerce_store_submenu_hover_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_submenu_hover_color_settings', array(
  		'label' => __('Sub-menu Hover Color', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_menus_settings',
	    'settings' => 'bb_ecommerce_store_submenu_hover_color_settings',
  	)));

	//Social Icons(topbar)
	$wp_customize->add_section('bb_ecommerce_store_social',array(
		'title'	=> __('Social Icon Section','bb-ecommerce-store'),
		'description'	=> __('Add Header Content here','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_youtube_icon',array(
		'label'	=> __('Youtube Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_social',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('bb_ecommerce_store_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_youtube_url',array(
		'label'	=> __('Add Youtube link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_youtube_url',
		'type'		=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_facebook_icon',array(
		'default'	=> 'fab fa-facebook',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_facebook_icon',array(
		'label'	=> __('Facebook Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_social',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('bb_ecommerce_store_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_facebook_url',array(
		'label'	=> __('Add Facebook link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_facebook_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_twitter_icon',array(
		'label'	=> __('Twitter Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_social',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('bb_ecommerce_store_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_twitter_url',array(
		'label'	=> __('Add Twitter link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_twitter_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_instagram_icon',array(
		'label'	=> __('Instagram Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_social',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('bb_ecommerce_store_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_instagram_url',array(
		'label'	=> __('Add Instagram link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_instagram_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_rss_icon',array(
		'default'	=> 'fas fa-rss',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_rss_icon',array(
		'label'	=> __('RSS Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_social',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('bb_ecommerce_store_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_rss_url',array(
		'label'	=> __('Add RSS link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_rss_url',
		'type'	=> 'url'
	) );

    //home page slider
	$wp_customize->add_section( 'bb_ecommerce_store_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_slider_hide_show',array(
      'default' => false,
      'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_hide_show',array(
	  'type' => 'checkbox',
	  'label' => __('Show / Hide slider','bb-ecommerce-store'),
	  'section' => 'bb_ecommerce_store_slidersettings',
	));

	$wp_customize->add_setting('bb_ecommerce_store_slider_title_Show_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_slider_title_Show_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Title','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_slidersettings'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_slider_button_show_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_slider_button_show_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Button','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_slidersettings'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {
		
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'bb_ecommerce_store_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'bb_ecommerce_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'bb_ecommerce_store_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'bb-ecommerce-store' ),
			'section'  => 'bb_ecommerce_store_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('bb_ecommerce_store_slider_overlay',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_slider_overlay',array(
       'type' => 'checkbox',
       'label' => __('Home Page Slider Overlay','bb-ecommerce-store'),
		'description'    => __('This option will add colors over the slider.','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_slidersettings'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_ecommerce_store_slider_image_overlay_color', array(
		'label'    => __('Home Page Slider Overlay Color', 'bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_slidersettings',
		'description'    => __('It will add the color overlay of the slider. To make it transparent, use the below option.','bb-ecommerce-store'),
		'settings' => 'bb_ecommerce_store_slider_image_overlay_color',
	)));

	//content layout
    $wp_customize->add_setting('bb_ecommerce_store_slider_content_alignment',array(
    'default' => 'Right',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_slidersettings',
        'choices' => array(
            'Center' => __('Center','bb-ecommerce-store'),
            'Left' => __('Left','bb-ecommerce-store'),
            'Right' => __('Right','bb-ecommerce-store'),
        ),
	) );

	//Opacity
	$wp_customize->add_setting('bb_ecommerce_store_slider_image_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control( 'bb_ecommerce_store_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','bb-ecommerce-store' ),
	'section'     => 'bb_ecommerce_store_slidersettings',
	'type'        => 'select',
	'settings'    => 'bb_ecommerce_store_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','bb-ecommerce-store'),
		'0.1' =>  esc_attr('0.1','bb-ecommerce-store'),
		'0.2' =>  esc_attr('0.2','bb-ecommerce-store'),
		'0.3' =>  esc_attr('0.3','bb-ecommerce-store'),
		'0.4' =>  esc_attr('0.4','bb-ecommerce-store'),
		'0.5' =>  esc_attr('0.5','bb-ecommerce-store'),
		'0.6' =>  esc_attr('0.6','bb-ecommerce-store'),
		'0.7' =>  esc_attr('0.7','bb-ecommerce-store'),
		'0.8' =>  esc_attr('0.8','bb-ecommerce-store'),
		'0.9' =>  esc_attr('0.9','bb-ecommerce-store')
	),
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_slider_speed_option',array(
		'default' => 3000,
		'sanitize_callback'    => 'bb_ecommerce_store_sanitize_number_range',
	));
	$wp_customize->add_control( 'bb_ecommerce_store_slider_speed_option',array(
		'label' => esc_html__( 'Slider Speed Option','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_slidersettings',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	));

	$wp_customize->add_setting('bb_ecommerce_store_slider_image_height',array(
		'default'=> __('550','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_image_height',array(
		'label'	=> __('Slider Image Height','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_slider_button',array(
		'default'=> __('SHOP NOW','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_button',array(
		'label'	=> __('Slider Button Text','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_slider_button_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_button_url',array(
		'label'	=> esc_html__('Add Button Link','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_slidersettings',
		'type'=> 'url'
	));

	$wp_customize->add_setting('bb_ecommerce_store_slider_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_ecommerce_store_slider_btn_bg_color', array(
		'label'    => __('Slider Button Background Color', 'bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_slidersettings',
	)));

	$wp_customize->add_setting('bb_ecommerce_store_top_bottom_slider_content_space',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_top_bottom_slider_content_space',array(
		'label'	=> __('Top Bottom Slider Content Space','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_slidersettings',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	$wp_customize->add_setting('bb_ecommerce_store_left_right_slider_content_space',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_left_right_slider_content_space',array(
		'label'	=> __('Left Right Slider Content Space','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_slidersettings',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	// SERVICES
	$wp_customize->add_section('bb_ecommerce_store_services',array(
		'title'	=> __('Services','bb-ecommerce-store'),
		'description'=> __('This section will appear below the slider.','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('bb_ecommerce_store_services_category',array(
	'default'	=> 'select',
	'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_services_category',array(
	'type'    => 'select',
	'choices' => $cat_post,
	'label' => __('Select Category to display post','bb-ecommerce-store'),
	'section' => 'bb_ecommerce_store_services',
	));

	//OUR PRODUCTS
	$wp_customize->add_section('bb_ecommerce_store_product',array(
		'title'	=> __('Products','bb-ecommerce-store'),
		'description'=> __('This section will appear below the services.','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));
	
	$wp_customize->add_setting('bb_ecommerce_store_sec1_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_sec1_title',array(
		'label'	=> __('Section Title','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_product',
		'setting'=> 'bb_ecommerce_store_sec1_title',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'bb_ecommerce_store_servicesettings', array(
		'default'           => '',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'bb_ecommerce_store_servicesettings', array(
		'label'    => __( 'Select Page', 'bb-ecommerce-store' ),
		'section'  => 'bb_ecommerce_store_product',
		'type'     => 'dropdown-pages'
	));

	//Blog Post
	$wp_customize->add_section('bb_ecommerce_store_blog_post',array(
		'title'	=> __('Blog Post Settings','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));	

	$wp_customize->add_setting('bb_ecommerce_store_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_date_icon',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_date_icon',array(
		'label'	=> __('Post Date Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('bb_ecommerce_store_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_author_icon',array(
		'label'	=> __('Author Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('bb_ecommerce_store_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_comment_icon',array(
		'label'	=> __('Comments Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('bb_ecommerce_store_time_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Time','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_time_icon',array(
		'label'	=> __('Time Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('bb_ecommerce_store_show_featured_image_post',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_show_featured_image_post',array(
       'type' => 'checkbox',
       'label' => __('Blog Post Image','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting( 'bb_ecommerce_store_featured_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_featured_img_border_radius', array(
		'label'       => esc_html__( 'Blog Post Image Border Radius','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_blog_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'bb_ecommerce_store_featured_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_featured_img_box_shadow',array(
		'label' => esc_html__( 'Blog Post Image Shadow','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_blog_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

    $wp_customize->add_setting('bb_ecommerce_store_blog_post_description_option',array(
    	'default'   => 'Excerpt Content',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_blog_post',
        'choices' => array(
            'No Content' => __('No Content','bb-ecommerce-store'),
            'Excerpt Content' => __('Excerpt Content','bb-ecommerce-store'),
            'Full Content' => __('Full Content','bb-ecommerce-store'),
        ),
	) );

    $wp_customize->add_setting( 'bb_ecommerce_store_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_blog_post',
		'type'        => 'number',
		'settings'    => 'bb_ecommerce_store_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'bb_ecommerce_store_post_suffix_option', array(
		'default'   => __('...','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_post_suffix_option', array(
		'label'       => esc_html__( 'Post Excerpt Indicator Option','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_blog_post',
		'type'        => 'text',
		'settings'    => 'bb_ecommerce_store_post_suffix_option',
	) );

	$wp_customize->add_setting('bb_ecommerce_store_button_text',array(
		'default'=> __('Read More','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_text',array(
		'label'	=> __('Add Button Text','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_font_size',array(
		'label'	=> __('Button Font Size','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_blog_post',
		'type'=> 'number'
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_text_transform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
 	));
 	$wp_customize->add_control('bb_ecommerce_store_button_text_transform',array(
		'type' => 'radio',
		'label' => __('Button Text Transform','bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_blog_post',
		'choices' => array(
		   'Uppercase' => __('Uppercase','bb-ecommerce-store'),
		   'Lowercase' => __('Lowercase','bb-ecommerce-store'),
		   'Capitalize' => __('Capitalize','bb-ecommerce-store'),
		),
	) );

	$wp_customize->add_setting( 'bb_ecommerce_store_metabox_separator_blog_post', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_metabox_separator_blog_post', array(
		'label'       => esc_html__( 'Meta Box Separator','bb-ecommerce-store' ),
		'input_attrs' => array(
            'placeholder' => __( 'Add Meta Separator. e.g.: "|", "/", etc.', 'bb-ecommerce-store' ),
        ),
		'section'     => 'bb_ecommerce_store_blog_post',
		'type'        => 'text',
		'settings'    => 'bb_ecommerce_store_metabox_separator_blog_post',
	) );

	$wp_customize->add_setting('bb_ecommerce_store_display_blog_page_post',array(
        'default' => 'In Box',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_display_blog_page_post',array(
        'type' => 'radio',
        'label' => __('Display Blog Page Post :','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_blog_post',
        'choices' => array(
            'In Box' => __('In Box','bb-ecommerce-store'),
            'Without Box' => __('Without Box','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_blog_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_blog_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Pagination in Blog Page','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

	$wp_customize->add_setting( 'bb_ecommerce_store_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_choices'
    ));
    $wp_customize->add_control( 'bb_ecommerce_store_pagination_settings', array(
        'section' => 'bb_ecommerce_store_blog_post',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'bb-ecommerce-store' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'bb-ecommerce-store' ),
            'next-prev' => __( 'Next / Previous', 'bb-ecommerce-store' ),
    )));

	// Button
	$wp_customize->add_section( 'bb_ecommerce_store_theme_button', array(
		'title' => __('Button Option','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_button_padding_top_bottom',array(
		'label'	=> __('Top and Bottom Padding','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_button_padding_left_right',array(
		'label'	=> __('Left and Right Padding','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_button_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_theme_button',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Single Post Settings
	$wp_customize->add_section('bb_ecommerce_store_single_post',array(
		'title'	=> __('Single Post Settings','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));	

	$wp_customize->add_setting('bb_ecommerce_store_single_post_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_single_post_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Date','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_single_post_date_icon',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_single_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('bb_ecommerce_store_single_post_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_single_post_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Author','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_single_post_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_single_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('bb_ecommerce_store_single_post_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_single_post_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Comments','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_single_post_comment_icon',array(
		'label'	=> __('Single Post Comments Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_single_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('bb_ecommerce_store_single_post_time_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_single_post_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Time','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_single_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('bb_ecommerce_store_category_show_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_category_show_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Category','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_show_featured_image_single_post',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_show_featured_image_single_post',array(
       'type' => 'checkbox',
       'label' => __('Single Post Image','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

    $wp_customize->add_setting( 'bb_ecommerce_store_single_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_single_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'bb_ecommerce_store_single_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_single_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

    $wp_customize->add_setting( 'bb_ecommerce_store_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
		) );
	$wp_customize->add_control('bb_ecommerce_store_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Single Post Comment Box','bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_single_post'
		));

	$wp_customize->add_setting( 'bb_ecommerce_store_single_post_breadcrumb',array(
		'default' => false,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_single_post'
    ));

    // show/hide single post pagination
    $wp_customize->add_setting('bb_ecommerce_store_show_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_show_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Pagination','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

    //Comment Textarea Width
    $wp_customize->add_setting( 'bb_ecommerce_store_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_comment_width', array(
		'label'  => __('Comment Textarea Width','bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_single_post',
		'description' => __('Measurement is in %.','bb-ecommerce-store'),
		'input_attrs' => array(
		   'step'=> 1,
		   'min' => 0,
		   'max' => 100,
		),
		'type'		=> 'number'
    ));

    $wp_customize->add_setting( 'bb_ecommerce_store_single_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_single_post',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','bb-ecommerce-store'),
		'type'        => 'text',
		'settings'    => 'bb_ecommerce_store_single_post_meta_seperator',
	) );

	$wp_customize->add_setting('bb_ecommerce_store_title_comment_form',array(
       'default' => __('Leave a Reply','bb-ecommerce-store'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_comment_form_button_content',array(
       'default' => __('Post Comment','bb-ecommerce-store'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_single_post'
    ));

    //Related Post Settings
	$wp_customize->add_section('bb_ecommerce_store_related_post',array(
		'title'	=> __('Related Post Settings','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));	

    $wp_customize->add_setting( 'bb_ecommerce_store_show_related_post',array(
		'default' => true,
      	'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_show_related_post',array(
    	'type' => 'checkbox',
        'label' => __( 'Related Post','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_related_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_related_posts_taxanomies_options',array(
        'default' => 'categories',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_related_posts_taxanomies_options',array(
        'type' => 'radio',
        'label' => __('Related Post Taxonomies','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_related_post',
        'choices' => array(
            'categories' => __('Categories','bb-ecommerce-store'),
            'tags' => __('Tags','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_related_post_title',array(
		'default'=> __('Related Posts','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_related_post_title',array(
		'label'	=> __('Related Post Title','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_related_post',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('bb_ecommerce_store_related_posts_number',array(
		'default'=> 3,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_related_posts_number',array(
		'label'	=> __('Related Post Number','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_related_post',
		'type'=> 'number',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting('bb_ecommerce_store_related_post_excerpt_number',array(
		'default'=> 20,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_related_post_excerpt_number',array(
		'label'	=> __('Related Post Content Limit','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_related_post',
		'type'=> 'number',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	//Layouts
	$wp_customize->add_section( 'bb_ecommerce_store_left_right', array(
    	'title'      => __( 'Layout Settings', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_width_theme_options',array(
        'default' => 'Default',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_width_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','bb-ecommerce-store'),
        'description' => __('Here you can change the Width layout. ','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_left_right',
        'choices' => array(
            'Default' => __('Default','bb-ecommerce-store'),
            'Container' => __('Container','bb-ecommerce-store'),
            'Box Container' => __('Box Container','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_preloader_option',array(
       'default' => false,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_preloader_option',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Preloader','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_left_right'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_preloader_type_options', array(
		'default'           => 'Preloader 1',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_preloader_type_options',array(
		'type'           => 'radio',
		'label'          => __('Preloader Type', 'bb-ecommerce-store'),
		'section'        => 'bb_ecommerce_store_left_right',
		'choices'        => array(
			'Preloader 1'  => __('Preloader 1', 'bb-ecommerce-store'),
			'Preloader 2' => __('Preloader 2', 'bb-ecommerce-store'),
		),
	));

    $wp_customize->add_setting( 'bb_ecommerce_store_loader_background_color_first', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_loader_background_color_first', array(
  		'label' => __('Background Color for Preloader', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_left_right',
	    'settings' => 'bb_ecommerce_store_loader_background_color_first',
  	)));

  	$wp_customize->add_setting( 'bb_ecommerce_store_breadcrumb_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_breadcrumb_color', array(
  		'label' => __('Breadcrumb Color', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_left_right',
	    'settings' => 'bb_ecommerce_store_breadcrumb_color',
  	)));

  	$wp_customize->add_setting( 'bb_ecommerce_store_breadcrumb_bg_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_breadcrumb_bg_color', array(
  		'label' => __('Breadcrumb Background Color', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_left_right',
	    'settings' => 'bb_ecommerce_store_breadcrumb_bg_color',
  	)));

    $wp_customize->add_setting( 'bb_ecommerce_store_single_page_breadcrumb',array(
		'default' => false,
      	'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_left_right'
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('bb_ecommerce_store_theme_options',array(
        'default' =>  'Right Sidebar', 
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'	        
	) );
	$wp_customize->add_control('bb_ecommerce_store_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Blog Post Layouts','bb-ecommerce-store'),
	        'section' => 'bb_ecommerce_store_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','bb-ecommerce-store'),
	            'Right Sidebar' => __('Right Sidebar','bb-ecommerce-store'),
	            'One Column' => __('One Column','bb-ecommerce-store'),
	            'Three Columns' => __('Three Columns','bb-ecommerce-store'),
	            'Four Columns' => __('Four Columns','bb-ecommerce-store'),
	            'Grid Layout' => __('Grid Layout','bb-ecommerce-store')
	        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_single_post_sidebar_layout', array(
		'default'           => 'Right Sidebar', 
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_single_post_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Post Layouts', 'bb-ecommerce-store'),
		'section'        => 'bb_ecommerce_store_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'bb-ecommerce-store'),
			'Right Sidebar' => __('Right Sidebar', 'bb-ecommerce-store'),
			'One Column'    => __('One Column', 'bb-ecommerce-store'),
		),
	));

	$wp_customize->add_setting('bb_ecommerce_store_single_page_sidebar_layout', array(
		'default'           => 'One Column',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'bb-ecommerce-store'),
		'section'        => 'bb_ecommerce_store_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'bb-ecommerce-store'),
			'Right Sidebar' => __('Right Sidebar', 'bb-ecommerce-store'),
			'One Column'    => __('One Column', 'bb-ecommerce-store'),
		),
	));

	//no Result Found
	$wp_customize->add_section('bb_ecommerce_store_noresult_found',array(
		'title'	=> __('No Result Found','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));	

	$wp_customize->add_setting('bb_ecommerce_store_nosearch_found_title',array(
		'default'=> __('Nothing Found','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_nosearch_found_title',array(
		'label'	=> __('No Result Found Title','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_nosearch_found_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_nosearch_found_content',array(
		'label'	=> __('No Result Found Content','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_show_noresult_search',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_show_noresult_search',array(
       'type' => 'checkbox',
       'label' => __('No Result search','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_noresult_found'
    ));

	//404 Page Setting
	$wp_customize->add_section('bb_ecommerce_store_404_page_setting',array(
		'title'	=> __('404 Page','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));	

	$wp_customize->add_setting('bb_ecommerce_store_title_404_page',array(
		'default'=> __('404 Not Found', 'bb-ecommerce-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_title_404_page',array(
		'label'	=> __('404 Page Title','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_content_404_page',array(
		'default'=> __('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','bb-ecommerce-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_content_404_page',array(
		'label'	=> __('404 Page Content','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_404_page',array(
		'default'=> __( 'Back to Home Page', 'bb-ecommerce-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_404_page',array(
		'label'	=> __('404 Page Button','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_404_page_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('bb_ecommerce_store_responsive_setting',array(
		'title'	=> __('Responsive Settings','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_alignment',array(
        'default' => 'Left',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_alignment',array(
        'type' => 'select',
        'label' => __('Menu Button Alignment','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_responsive_setting',
        'choices' => array(
            'Left' => __('Left','bb-ecommerce-store'),
            'Right' => __('Right','bb-ecommerce-store'),
            'Center' => __('Center','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting( 'bb_ecommerce_store_toggle_button_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_toggle_button_color_settings', array(
  		'label' => __('Toggle Button Color', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_responsive_setting',
	    'settings' => 'bb_ecommerce_store_toggle_button_color_settings',
  	)));

	$wp_customize->add_setting('bb_ecommerce_store_mobile_search_option',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_mobile_search_option',array(
       'type' => 'checkbox',
       'label' => __('Search','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_sticky_header',array(
       'default' => false,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Sticky Header','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_slider',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_slider',array(
       'type' => 'checkbox',
       'label' => __('Slider','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_scroll',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_scroll',array(
       'type' => 'checkbox',
       'label' => __('Scroll To Top','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Sidebar','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_preloader',array(
       'type' => 'checkbox',
       'label' => __('Preloader','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

	//footer
	$wp_customize->add_section('bb_ecommerce_store_footer_section',array(
		'title'	=> __('Footer Text','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_show_hide_footer',array(
		'default' => true,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
	));
	$wp_customize->add_control('bb_ecommerce_store_show_hide_footer',array(
     	'type' => 'checkbox',
        'label' => __('Show / Hide Footer','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section',
	));

	$wp_customize->add_setting('bb_ecommerce_store_footer_widget_areas',array(
        'default'           => 4,
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
    ));
    $wp_customize->add_control('bb_ecommerce_store_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'bb-ecommerce-store'),
        'section'     => 'bb_ecommerce_store_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'bb-ecommerce-store'),
        'choices' => array(
            '1'     => __('One', 'bb-ecommerce-store'),
            '2'     => __('Two', 'bb-ecommerce-store'),
            '3'     => __('Three', 'bb-ecommerce-store'),
            '4'     => __('Four', 'bb-ecommerce-store')
        ),
    ));

    $wp_customize->add_setting('bb_ecommerce_store_footer_widget_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_ecommerce_store_footer_widget_bg_color', array(
		'label'    => __('Footer Widget Background Color', 'bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_footer_section',
	)));

	$wp_customize->add_setting('bb_ecommerce_store_footer_widget_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'bb_ecommerce_store_footer_widget_bg_image',array(
        'label' => __('Footer Widget Background Image','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section'
	)));

	$wp_customize->add_setting('bb_ecommerce_store_show_hide_copyright',array(
		'default' => true,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
	));
	$wp_customize->add_control('bb_ecommerce_store_show_hide_copyright',array(
     	'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section',
	));
	
	$wp_customize->add_setting('bb_ecommerce_store_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('bb_ecommerce_store_footer_copy',array(
		'label'	=> __('Copyright Text','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_copyright_content_align',array(
        'default' => 'center',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_copyright_content_align',array(
        'type' => 'select',
        'label' => __('Copyright Text Alignment ','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section',
        'choices' => array(
            'left' => __('Left','bb-ecommerce-store'),
            'right' => __('Right','bb-ecommerce-store'),
            'center' => __('Center','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_footer_content_font_size',array(
		'default'=> 15,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_footer_content_font_size',array(
		'label' => esc_html__( 'Copyright Font Size','bb-ecommerce-store' ),
		'section'=> 'bb_ecommerce_store_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	));

	$wp_customize->add_setting('bb_ecommerce_store_copyright_padding',array(
		'default'=> 15,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_copyright_padding',array(
		'label'	=> __('Copyright Padding','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('bb_ecommerce_store_footer_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_ecommerce_store_footer_text_color', array(
		'label'    => __('Copyright Text Color', 'bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_footer_section',
	)));

	$wp_customize->add_setting('bb_ecommerce_store_footer_text_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_ecommerce_store_footer_text_bg_color', array(
		'label'    => __('Copyright Background Color', 'bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_footer_section',
	)));

	$wp_customize->add_setting('bb_ecommerce_store_enable_disable_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_checkbox'
	));
	$wp_customize->add_control('bb_ecommerce_store_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','bb-ecommerce-store'),
      	'section' => 'bb_ecommerce_store_footer_section',
	));

	$wp_customize->add_setting('bb_ecommerce_store_back_to_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new BB_Ecommerce_Store_Icon_Changer(
        $wp_customize,'bb_ecommerce_store_back_to_top_icon',array(
		'label'	=> __('Scroll Back to Top Icon','bb-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'bb_ecommerce_store_footer_section',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('bb_ecommerce_store_back_to_top_bg_color', array(
		'default'           => '#252525',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_ecommerce_store_back_to_top_bg_color', array(
		'label'    => __('Back to Top Background Color', 'bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_footer_section',
	)));

    $wp_customize->add_setting('bb_ecommerce_store_back_to_top_bg_hover_color', array(
		'default'           => '#252525',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_ecommerce_store_back_to_top_bg_hover_color', array(
		'label'    => __('Back to Top Background Hover Color', 'bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_footer_section',
	)));

	$wp_customize->add_setting('bb_ecommerce_store_scroll_setting',array(
        'default' => 'Right',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section',
        'choices' => array(
            'Left' => __('Left','bb-ecommerce-store'),
            'Right' => __('Right','bb-ecommerce-store'),
            'Center' => __('Center','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_scroll_font_size_icon',array(
		'default'=> 20,
		'sanitize_callback'	=> 'bb_ecommerce_store_sanitize_float',
	));
	$wp_customize->add_control('bb_ecommerce_store_scroll_font_size_icon',array(
		'label'	=> __('Scroll Icon Font Size','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	) );
		
}
add_action( 'customize_register', 'bb_ecommerce_store_customize_register' );	

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class BB_Ecommerce_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'BB_Ecommerce_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new BB_Ecommerce_Store_Customize_Section_Pro(
				$manager,
				'bb_ecommerce_store_example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'BB Ecommerce Pro', 'bb-ecommerce-store' ),
					'pro_text' => esc_html__( 'Get Pro','bb-ecommerce-store' ),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/ecommerce-store-wordpress-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'bb-ecommerce-store-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bb-ecommerce-store-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
BB_Ecommerce_Store_Customize::get_instance();