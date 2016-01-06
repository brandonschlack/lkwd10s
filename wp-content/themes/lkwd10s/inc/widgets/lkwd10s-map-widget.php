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
		// Display Output
		echo $args['before_widget'];
		// Title
		?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title']; ?>
				</div>
			</div>
		</div>
		<?php
		// Google Map
		$location = get_field('google_map', 'widget_' . $widget_id);
		if( !empty($location) ):
		?>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>		
		<?php
		endif;
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