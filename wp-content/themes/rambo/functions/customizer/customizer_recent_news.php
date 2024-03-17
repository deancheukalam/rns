<?php
// customizer Recent News panel
function rambo_customizer_recent_news_panel( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;


	$wp_customize->add_panel( 'section_settings', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Homepage Section Settings', 'rambo'),
	) );

	//Recent News panel
	$wp_customize->add_section( 'news_settings' , array(
	'title'      => esc_html__('Latest News Settings', 'rambo'),
	'capability'     => 'edit_theme_options',
	'panel'  => 'section_settings',
	'priority'   => 519,
   	) );
	
			
	// enable Recent News section
	$wp_customize->add_setting('rambo_pro_theme_options[news_enable]',array(
	'default' => false,
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'rambo_sanitize_checkbox',
	'type' => 'option'
	) );
	
	$wp_customize->add_control('rambo_pro_theme_options[news_enable]',array(
	'label' => esc_html__('Hide news section','rambo'),
	'section' => 'news_settings',
	'type' => 'checkbox',
	) );
	
	//Project Title
	$wp_customize->add_setting(
	'rambo_pro_theme_options[latest_news_title]',
	array(
		'default' => esc_html__('Adminim Veniam','rambo'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'transport' => $selective_refresh ? 'postMessage' : 'refresh',
		)
	);	
	$wp_customize->add_control('rambo_pro_theme_options[latest_news_title]',array(
	'label'   => esc_html__('Title','rambo'),
	'section' => 'news_settings',
	 'type' => 'text',)  );
}
add_action( 'customize_register', 'rambo_customizer_recent_news_panel' );

/**
 * Add selective refresh for service title section controls.
 */
function rambo_register_latestnews_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[latest_news_title]', array(
		'selector'            => '.team_head_title h3',
		'settings'            => 'rambo_pro_theme_options[latest_news_title]',
	
	) );
	
}
add_action( 'customize_register', 'rambo_register_latestnews_section_partials' );

function rambo_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
