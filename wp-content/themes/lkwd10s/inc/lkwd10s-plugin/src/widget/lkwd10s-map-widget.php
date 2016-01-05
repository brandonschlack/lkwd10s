<?php 
class Lkwd10s_Map_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'lkwd10s-map-widget', 

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
		$widget_id = $this->id;
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		echo '<div class=col-xs-12>';
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo __( 'Hello, World!', 'lkwd10s-google-map' );
		the_field('google_map', 'widget_' . $widget_id);
		echo '</div>';
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
        if( $instance ) {
             if (isset($instance['title'])) { $title = esc_attr($instance['title']); } else { $title = ""; }
        } else {
            $title = __( 'New title', 'lkwd10s-google-maps' );
        }
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
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