<?php
function rambo_scripts()
{	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	/*Template Color Scheme CSs*/
	wp_enqueue_style('rambo-style', get_stylesheet_uri() );
	wp_enqueue_style ('bootstrap',RAMBO_TEMPLATE_DIR_URI.'/css/bootstrap.css');
	wp_enqueue_style('rambo-default', RAMBO_TEMPLATE_DIR_URI . '/css/default.css');
	wp_enqueue_style ('font-awesome',RAMBO_TEMPLATE_DIR_URI .'/css/font-awesome/css/all.min.css');
	wp_enqueue_style ('rambo-element',RAMBO_TEMPLATE_DIR_URI.'/css/element.css');
	wp_enqueue_style ('bootstrap-responsive',RAMBO_TEMPLATE_DIR_URI .'/css/bootstrap-responsive.css');
	wp_enqueue_style ('rambo-docs',RAMBO_TEMPLATE_DIR_URI .'/css/docs.css');
	
	/*Style Media Css*/
	wp_enqueue_style ('rambo-style-media',RAMBO_TEMPLATE_DIR_URI .'/css/style-media.css'); //Style-Media
			
	//Template Color Scheme Js	
	wp_enqueue_script('bootstrap',RAMBO_TEMPLATE_DIR_URI.'/js/bootstrap.min.js',array('jquery'));
	wp_enqueue_script('rambo-menu',RAMBO_TEMPLATE_DIR_URI.'/js/menu/menu.js');
	
	wp_enqueue_script('bootstrap-transtiton',RAMBO_TEMPLATE_DIR_URI.'/js/bootstrap-transition.js');
	/*Color Schemes*/
	
	
	/******* rambo theme tab js*********/
	}
	add_action( 'wp_enqueue_scripts', 'rambo_scripts' );
	
add_action( 'admin_enqueue_scripts', 'rambo_enqueue_script_function' );
	function rambo_enqueue_script_function()
	{
	wp_enqueue_style('rambo-drag-drop',RAMBO_TEMPLATE_DIR_URI.'/css/drag-drop.css');
	}
	
	add_action('wp_head','rambo_enqueue_custom_css');
	function rambo_enqueue_custom_css()
	{
	$rambo_theme_options = rambo_theme_data_setup();
	$rambo_current_options = wp_parse_args(  get_option( 'rambo_theme_options', array() ), $rambo_theme_options );
	if($rambo_current_options['rambo_custom_css']!='') {  ?>
	<style type="text/css">
	<?php echo htmlspecialchars_decode($rambo_current_options['rambo_custom_css']); ?>
	</style>
	<?php } ?>
	<style>
		.custom-logo{width: <?php echo intval(get_theme_mod('rambo_logo_length',154));?>px; height: auto;}
	</style>
	<?php }