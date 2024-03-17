<?php	
add_action( 'widgets_init', 'workpress_widgets_init');
function workpress_widgets_init() {
// Service Widget Sidebar	
	register_sidebar( array(
		'name' => __('Homepage Service section - sidebar', 'workpress' ),
		'id' => 'workpress-sidebar-service',
		'description' => __('Use the Page/Service Widget to add service-type content.','workpress'),
		'before_widget' => '<div id="%1$s" class="span4 home_service widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
//Project Sidebar
	register_sidebar( array(
			'name' => __( 'Homepage Project section - sidebar', 'workpress' ),
			'id' => 'workpress-sidebar-project',
			'description' => __('Use the Project Widget to add project-type content.','workpress'),
			'before_widget' => '<div id="%1$s" class="span4 featured_port_projects widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
}	                     
?>