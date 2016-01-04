<?php
/**
 * Plugin Name: Lakewood Tennis Center Plugin
 * Description: Site specific code changes for Lakewood Tennis Center
 * Version: 1.0.0
 * Author: Lakewood Tennis Center
 * Author URI: https://github.com/brandonschlack/lkwd10s
 */

// Add Lakewood Tennis Center Admin page
function register_lkwd10s_menu_page() {
	add_menu_page( 'Lakewood Tennis Center', 'Lakewood Tennis Center', 'manage_options', 'lkwd10s-plugin/lkwd10s-plugin-admin.php', '', plugins_url( 'lkwd10s-plugin/assets/tennisball.png' ), 79 );
} add_action( 'admin_menu', 'register_lkwd10s_menu_page' );


// Google Maps Widget
class Lkwd10s_Map_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'lkwd10s_map_widget', 

		// Widget name will appear in UI
		__('Google Maps Widget', 'lkwd10s-google-map'), 

		// Widget description
		array( 'description' => __( 'Simple widget to keep set a street address and display a Google Map', 'lkwd10s-google-map' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		echo '<div class=col-xs-12>';
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo __( 'Hello, World!', 'lkwd10s-google-map' );
		echo '</div>';
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
        if( $instance) {
             if (isset($instance['title'])) { $title = esc_attr($instance['title']); } else { $title = ""; }
             if (isset($instance['address'])) { $address = esc_attr($instance['address']); } else { $address = ""; }
        } else {
            $title = __( 'New title', 'lkwd10s-google-maps' );
            $address = __( 'New address', 'lkwd10s-google-maps' );
        }
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
		</p>
		<?php
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}
// Register and load the widget
function lkwd10s_map_load_widget() {
	register_widget( 'lkwd10s_map_widget' );
} add_action( 'widgets_init', 'lkwd10s_map_load_widget' );

?>