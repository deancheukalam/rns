<?php

function enqueue_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );
    // 1. Styles.
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), null, 'all', true);
	wp_enqueue_style( 'style', get_theme_file_uri( 'style.css' ), array(), $theme_version, 'all' );

	// 2. Scripts.
    wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array(), null, true);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', array('popper-js'), null, true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );


?>