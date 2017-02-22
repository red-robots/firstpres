<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides

	$labels = array(
		'name' => _x('Events', 'post type general name'),
		'singular_name' => _x('Event', 'post type singular name'),
		'add_new' => _x('Add New', 'Event'),
		'add_new_item' => __('Add New Event'),
		'edit_item' => __('Edit Events'),
		'new_item' => __('New Event'),
		'view_item' => __('View Event'),
		'search_items' => __('Search Events'),
		'not_found' =>  __('No Events found'),
		'not_found_in_trash' => __('No Events found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Events'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
		'menu_position' => 20,
		'supports' => array('title','editor','custom-fields','thumbnail'),

	);
	register_post_type('event',$args); // name used in query

	$labels = array(
		'name' => _x('Staff', 'post type general name'),
		'singular_name' => _x('Staff', 'post type singular name'),
		'add_new' => _x('Add New', 'Staff'),
		'add_new_item' => __('Add New Staff'),
		'edit_item' => __('Edit Staff'),
		'new_item' => __('New Staff'),
		'view_item' => __('View Staff'),
		'search_items' => __('Search Staff'),
		'not_found' =>  __('No Staff found'),
		'not_found_in_trash' => __('No Staff found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Staff'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
		'menu_position' => 20,
		'supports' => array('title','editor','custom-fields','thumbnail'),

	);
	register_post_type('staff',$args); // name used in query

  // Add more between here
  
  // and here
  
  } // close custom post type


/*##############################################
Custom Taxonomies     */
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
// custom tax
	register_taxonomy( 'staff_type', 'staff',
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Staff Department',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'department' ),
			'_builtin' => true
		) );

} // End build taxonomies