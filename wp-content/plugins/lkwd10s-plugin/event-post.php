<?php
/**
 * Event Post Type and Taxonomy
 *
 */
class Lkwd10s_Event_Post_Type {
	function __construct () {
		add_action( 'init', array( $this, 'event_post_type' ) );
		add_action( 'init', array( $this, 'event_type_taxonomy' ) );
	}

	// Register Custom Post Type
	function event_post_type() {
		$labels = array(
			'name'                  => 'Events',
			'singular_name'         => 'Event',
			'menu_name'             => 'Events',
			'name_admin_bar'        => 'Events',
			'archives'              => 'Event Archives ',
			'parent_item_colon'     => 'Parent Event:',
			'all_items'             => 'All Events',
			'add_new_item'          => 'Add New Event',
			'add_new'               => 'Add New Event',
			'new_item'              => 'New Event',
			'edit_item'             => 'Edit Event',
			'update_item'           => 'Update Event',
			'view_item'             => 'View Event',
			'search_items'          => 'Search Event',
			'not_found'             => 'No events found',
			'not_found_in_trash'    => 'No events found in Trash',
			'featured_image'        => 'Featured Image',
			'set_featured_image'    => 'Set featured image',
			'remove_featured_image' => 'Remove featured image',
			'use_featured_image'    => 'Use as featured image',
			'insert_into_item'      => 'Insert into event',
			'uploaded_to_this_item' => 'Uploaded to this event',
			'items_list'            => 'Events list',
			'items_list_navigation' => 'Events list navigation',
			'filter_items_list'     => 'Filter events list',
		);
		$args = array(
			'label'                 => 'Event',
			'description'           => 'An upcoming event',
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-calendar',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'event', $args );
	}

	// Register Custom Taxonomy
	function event_type_taxonomy() {

		$labels = array(
			'name'                       => 'Event Types',
			'singular_name'              => 'Event Type',
			'menu_name'                  => 'Event Type',
			'all_items'                  => 'All Event Types',
			'parent_item'                => 'Parent Event Type',
			'parent_item_colon'          => 'Parent Event Type:',
			'new_item_name'              => 'New Event Type',
			'add_new_item'               => 'Add New Event Type',
			'edit_item'                  => 'Edit Event Type',
			'update_item'                => 'Update Event Type',
			'view_item'                  => 'View Event Type',
			'separate_items_with_commas' => 'Separate items with commas',
			'add_or_remove_items'        => 'Add or remove event types',
			'choose_from_most_used'      => 'Choose from the most used',
			'popular_items'              => 'Popular Event Types',
			'search_items'               => 'Search Event Types',
			'not_found'                  => 'No event types found',
			'no_terms'                   => 'No event types',
			'items_list'                 => 'Event Types list',
			'items_list_navigation'      => 'Event Types list navigation',
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'meta_box_cb'                => false,
		);
		register_taxonomy( 'event_type', array( 'event' ), $args );
	}
}
