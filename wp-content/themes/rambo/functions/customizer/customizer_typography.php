<?php
if (!function_exists('rambo_local_google_font')) :
function rambo_local_google_font($wp_customize) {
	$selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';
     // Register Custom Slider Controls
    require_once RAMBO_TEMPLATE_DIR . '/inc/customizer/toggle/class-toggle-control.php';
    $wp_customize->register_control_type('Rambo_Toggle_Control');
	$wp_customize->add_panel( 'rambo_typography_setting', array(
				'priority'    => 1000,
				'capability'  => 'edit_theme_options',
				'title'       => esc_html__('Font Settings','rambo')
		) );
    $wp_customize->add_section('local_google_font', 
	      array(
	    'title' => esc_html__('Performance(Google Font)', 'rambo'),
	    'panel' => 'rambo_typography_setting',
	    'priority' => 0
	)); 
    /*     * *********************** enable google font******************************** */
    $wp_customize->add_setting('rambo_enable_local_google_font',
            array(
                'default' => true,
                'sanitize_callback' => 'rambo_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new Rambo_Toggle_Control($wp_customize, 'rambo_enable_local_google_font',
                    array(
                'label' => esc_html__('Load Google Fonts Locally?', 'rambo'),
                'type' => 'toggle',
                'section' => 'local_google_font',
                'priority' => 4,
                    )
    ));  
}
endif;
add_action('customize_register', 'rambo_local_google_font');
?>