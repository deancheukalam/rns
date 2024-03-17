<?php

function theme_data_setup()
{
	
	return $rambo_pro_theme_options  = array(
			//Logo and Fevicon header			
			'rambopro_stylesheet'=>'default.css',			
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'150',
			'rambo_texttitle'=>true,
			'upload_image_favicon'=>'',
			'webrit_custom_css'=>'',
			'rambo_custom_css'=>'',
			
			//Home image section 	
			'home_banner_enabled'=>true,
			'home_custom_image' => '',								
			'home_image_title' => '',
			'home_image_description' => '',	
			'read_more_text' => '',
			'read_more_button_link' => '',
			'read_more_link_target' => true,
			
			// Site Intro Layout 
			'site_intro_column_layout' => 1,
			'site_intro_bottom_column_layout'=> 1,
			
			//Slide
			'home_slider_enabled'=>true,
			'slider_post' => RAMBO_TEMPLATE_DIR_URI .'/images/slider.png',
			'slider_title' => __('Responsive WP theme','rambo'),
			'slider_text' => __('We are a group of passionate designers and developers who really love creating awesome WordPress themes & giving support.','rambo'),
			'slider_readmore_text' => __('Read More','rambo'),
			'readmore_text_link' => '#',
			'readmore_target' => false,
			
			
			// service
			'home_service_enabled'=>false,
			'service_list' => 4,
			
			// project 
			'home_projects_enabled' => false,
			'project_protfolio_enabled'=>false,
			'project_heading_one'=> __('Featured Portfolio Projects','rambo'),
			'project_tagline'=>__('Maecenas sit amet tincidunt elit. Pellentesque habitant morbi tristique senectus et netus et Nulla facilisi.','rambo'),
			// home project 
			'project_list'=>4,
			
			//home latest news
			'post_display_count' => 3,
			'news_enable' => false,
			'home_slider_post_enable' => true,
			'blog_section_head' =>'',
			
			
			// site intro info 
			'site_info_enabled'=>true,
			'site_info_title'=>'',
			'site_info_descritpion' =>'',
			'site_info_button_text'=>'',
			'site_info_button_link'=>'#',
			'site_info_button_link_target' => true,
			
			
			// site intro info 			
			'site_intro_descritpion' => __('Rambo is a clean and fully responsive Template.','rambo'),
			'site_intro_button_text'=> __('Purchase Now','rambo'),
			'site_intro_button_link'=>'#',
			'intro_button_target'=>true,
			
			// Service section
			'service_section_title'=>'',
			'service_section_descritpion'=> __('Check out our Main Services which we offer to every client','rambo'),
			
			/** footer customization **/
			'footer_copyright' => sprintf(__('Copyright @ 2018 - RAMBO. Designed by <a href="http://webriti.com" rel="nofollow" target="_blank"> Webriti</a>','rambo')),

			/* Footer social media */
			'footer_social_media_enabled'=>false,
			
			// footer customization
			'footer_widgets_enabled'=>'on',
			'rambo_copy_rights_text'=>'',			
			'rambo_designed_by_head'=>'',
			'rambo_designed_by_text'=>'',
			'rambo_designed_by_link'=>'',
			
			
			//Social media links
			'social_media_twitter_link' =>"#",
			'social_media_facebook_link' =>"#",
			'social_media_linkedin_link' =>"#",
			'social_media_google_plus' =>"#",
			
			//Service Layout
			'service_section_title'=> __('Our Services','rambo'),
			'service_section_description' => __('Check out our Main Services which we offer to every client','rambo'),
			'service_column_layout'=> 4,
			
			//Project Layout
			'project_column_layout'  => 4,

			//News Column Layout
			'news_column_layout' => 3,
			'latest_news_title' => __('Latest News','rambo'),
			
			
			

		);
}
?>
<?php 
function rambo_page_menu_args1( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'rambo_page_menu_args1' );

 
function webriti_fallback_page_menu( $args = array() ) {

	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_args', $args );

	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home','rambo');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item"';
		$menu .= '<li ' . $class . '><a  href="' . esc_url(home_url( '/' )) . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$list_args['walker'] = new webriti_walker_page_menu;
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

	if ( $menu )
		$menu = '<ul class="'. esc_attr($args['menu_class']) .'">' . $menu . '</ul>';

	$menu = '<div class="' . esc_attr($args['container_class']) . '">' . $menu . "</div>\n";
	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}
class webriti_walker_page_menu extends Walker_Page{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='dropdown-menu'>\n";
	}
	function start_el( &$output, $page, $depth=0, $args = array(), $current_page = 0 ) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		else
			$indent = '';

		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);
		if ( !empty($current_page) ) {
			$_current_page = get_post( $current_page );
			if ( in_array( $page->ID, $_current_page->ancestors ) )
				$css_class[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$css_class[] = 'current_page_item';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$css_class[] = 'current_page_parent';
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . esc_url(get_permalink($page->ID)) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}
	}
}
?>
<?php
/** nav-menu-walker.php */
class webriti_nav_walker extends Walker_Nav_Menu {	
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		if ($args->has_children && $depth > 0) {
			$classes[] = 'dropdown-submenu';
		} else if($args->has_children && $depth === 0) {
			$classes[] = 'dropdown';
		}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		//$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';
			
		$item_output = $args->before;
		$item_output .= '<a class="dropdown-toggle" '. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($args->has_children && $depth == 0) ? '<b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'end_el'), $cb_args);
	}
}
function webriti_nav_menu_css_class( $classes ) {
	if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
		$classes[]	=	'active';

	return $classes;
}
add_filter( 'nav_menu_css_class', 'webriti_nav_menu_css_class' );