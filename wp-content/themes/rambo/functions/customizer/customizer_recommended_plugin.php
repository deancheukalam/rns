<?php
/* Notifications in customizer */


require get_template_directory() . '/functions/customizer-notify/rambo-customizer-notify.php';


$rambo_config_customizer = array(
	'recommended_plugins'       => array(
		'webriti-companion' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Webriti Companion</strong> plugin for taking full advantage of all the features this theme has to offer %s.','rambo'), 'rambo'),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'rambo' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'rambo' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'rambo' ),
	'activate_button_label'     => esc_html__( 'Activate', 'rambo' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'rambo' ),
);
Rambo_Customizer_Notify::init( apply_filters( 'rambo_customizer_notify_array', $rambo_config_customizer ) );