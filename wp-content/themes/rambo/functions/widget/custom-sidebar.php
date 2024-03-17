<?php	
add_action( 'widgets_init', 'rambo_widgets_init');
function rambo_widgets_init() {
$rambo_theme_options = rambo_theme_data_setup();
$rambo_current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_theme_options );
$site_intro_column_layout = 12 / $rambo_current_options['site_intro_column_layout'];	
$service_column_layout = 12 / $rambo_current_options['service_column_layout'];
$project_column_layout = 12 / $rambo_current_options['project_column_layout'];

/*sidebar*/
register_sidebar( array(
		'name' => esc_html__('Sidebar widget area', 'rambo' ),
		'id' => 'sidebar-1',
		'description' => esc_html__('Sidebar widget area', 'rambo' ),
		'before_widget' => '<div class="sidebar_widget widget %2$s" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar_widget_title"><h2>',
		'after_title' => '</h2></div>',
	) );
	
	
//Project Sidebar
	register_sidebar( array(
			'name' => esc_html__( 'Homepage project section - sidebar', 'rambo' ),
			'id' => 'sidebar-project',
			'description' => esc_html__('Use the Project Widget to add project type content','rambo'),
			'before_widget' => '<div id="%1$s" class="span'.$project_column_layout.' featured_port_projects widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
register_sidebar( array(
	'name' => esc_html__('Woocommerce sidebar widget area', 'rambo' ),
	'id' => 'woocommerce',
	'description' => esc_html__( 'Woocommerce sidebar widget area', 'rambo' ),
	'before_widget' => '<div class="sidebar-widget" >',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	

//Footer Sidebar	
register_sidebar( array(
		'name' => esc_html__('Footer widget area', 'rambo' ),
		'id' => 'footer-widget-area',
		'description' => esc_html__('Footer widget area', 'rambo' ),
		'before_widget' => '<div class="span4 footer_widget widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h2>',
		'after_title' => '</h2></div>',
	) );	
	
	//Footer social Sidebar 
register_sidebar( array(
		'name' => esc_html__('Footer social icon sidebar area', 'rambo' ),
		'id' => 'footer-social-icon-sidebar-area',
		'description' => esc_html__('Footer social icon sidebar area', 'rambo' ),
		'before_widget' => '<div id="%1$s"  class="pull-right %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h2>',
		'after_title' => '</h2></div>',
	) );
	
}