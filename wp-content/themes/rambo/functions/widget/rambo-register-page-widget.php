<?php
/**
 * Feature Page Widget
 *
 */
add_action('widgets_init','rambo_feature_page_widget');
function rambo_feature_page_widget(){

	return register_widget('rambo_feature_page_widget');
}

class rambo_feature_page_widget extends WP_Widget{

	function __construct() {
		parent::__construct(
			'rambo_feature_page_widget', // Base ID
			esc_html__('WBR : Page Widget', 'rambo'), // Name
			array( 'description' => esc_html__( 'Feature Page item widget', 'rambo'), ) // Args
		);
	}


	public function widget( $args , $instance ) {

			$instance['selected_page'] = (isset($instance['selected_page'])?$instance['selected_page']:'');
			$instance['hide_image'] = (isset($instance['hide_image'])?$instance['hide_image']:'');
			$instance['above_title'] = (isset($instance['above_title'])?$instance['above_title']:'');

			echo $args['before_widget'];


			// Check for custom link


			// fetch page object
			$page= get_post($instance['selected_page']);

			$title = $page->post_title;

	if($instance['selected_page']!=''):

			if( $title != '' && $instance['above_title'] == true ):

						echo '<h2 class="widget-title">';

							echo esc_html($title);

						echo '</h2>';



				endif;

			endif;



	if($instance['selected_page']!=''):

				if( $instance['hide_image'] != true ):

						echo '<div class="featured-service-img ">';

							$attr= array('class' => 'img-responsive');
							echo get_the_post_thumbnail($page->ID, 'large', $attr);



						echo '</div>';

				endif;



				if( $title != '' && $instance['above_title']!=true ):



						echo '<h2 class="widget-title">';

							echo esc_html($title);


						echo '</h2>';

				endif;




				    if($page->post_content) {echo '<p>'.wp_kses_post($page->post_content). '</p>';}


	endif;




		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$instance['selected_page'] = isset($instance['selected_page']) ? $instance['selected_page'] : '';
		$instance['hide_image'] = isset($instance['hide_image']) ? $instance['hide_image'] : '';
		$instance['above_title'] = isset($instance['above_title']) ? $instance['above_title'] : '';



		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'selected_page' )); ?>"><?php esc_html_e('Select Pages','rambo' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'selected_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'selected_page' )); ?>">
			<option value>---<?php esc_html_e('Select','rambo');?>---</option>
				<?php
					$selected_page = $instance['selected_page'];
					$pages = get_pages($selected_page);
					foreach ( $pages as $page ) {
						$option = '<option value="' . $page->ID . '" ';
						$option .= ( $page->ID == $selected_page ) ? 'selected="selected"' : '';
						$option .= '>';
						$option .= $page->post_title;
						$option .= '</option>';
						echo $option;
					}
				?>

			</select>
			<br/>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php if($instance['hide_image']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'hide_image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'hide_image' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'hide_image' )); ?>"><?php esc_html_e('Hide featured image','rambo' ); ?></label>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php if($instance['above_title']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'above_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'above_title' )); ?>" />
		<label for="<?php echo esc_attr($this->get_field_id( 'above_title' )); ?>"><?php esc_html_e( 'Display image below title','rambo' ); ?></label>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['selected_page'] = ( ! empty( $new_instance['selected_page'] ) ) ? intval($new_instance['selected_page']) : '';
		$instance['hide_image'] = ( ! empty( $new_instance['hide_image'] ) ) ? rambo_sanitize_checkbox($new_instance['hide_image']) : '';
		$instance['above_title'] = ( ! empty( $new_instance['above_title'] ) ) ? rambo_sanitize_checkbox($new_instance['above_title']) : '';
		return $instance;
	}
}
