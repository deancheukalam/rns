<?php
function rambo_header_customizer( $wp_customize ) {
	
	$wp_customize->add_setting( 'rambo_logo_length',
            array(
                'default' => 154,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );

    $wp_customize->add_control( new Rambo_Slider_Custom_Control( $wp_customize, 'rambo_logo_length',
        array(
            'label' => esc_html__( 'Logo Width', 'rambo'  ),
            'priority' => 50,
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 0,
                'max' => 500,
                'step' => 1,
            ),
        )
    ) );
	
}
add_action( 'customize_register', 'rambo_header_customizer' );