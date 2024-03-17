<?php

	require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function bb_ecommerce_store_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Ibtana - WordPress Website Builder', 'bb-ecommerce-store' ),
			'slug'             => 'ibtana-visual-editor',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Ibtana - Ecommerce Product Addons', 'bb-ecommerce-store' ),
			'slug'             => 'ibtana-ecommerce-product-addons',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'bb_ecommerce_store_register_recommended_plugins' );