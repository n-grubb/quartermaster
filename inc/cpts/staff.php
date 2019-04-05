<?php 
/**
 * Register Testimonial Post Type
 * 
 */

function register_cpt_staff () {

    $labels = array(
		'name'               => 'Staff and Leaders',
		'singular_name'      => 'Staff',
		'menu_name'          => 'Staff',
		'name_admin_bar'     => 'Staff and Leaders',
		'add_new'            => 'Add Staff Member',
		'add_new_item'       => 'Add Staff Member',
		'all_items'          => 'Staff and Leaders'
    );
    
    $args = array(
		'public' => true,
		'label'  => 'Staff Member',
		'labels' => $labels
	);

    register_post_type( 'staff', $args );

}
add_action( 'init', 'register_cpt_staff' );


function register_staff_tax() {

    $labels = array(
        'name'              => 'Roles',
        'singular_name'     => 'Role',
        'search_items'      => 'Search Roles',
        'all_items'         => 'All Roles',
        'parent_item'       => 'Parent Role',
        'parent_item_colon' => 'Parent Role:',
        'edit_item'         => 'Edit Role',
        'update_item'       => 'Update Role',
        'add_new_item'      => 'Add New Role',
        'new_item_name'     => 'New Role',
        'menu_name'         => 'Role',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'role' ),
    );

    register_taxonomy( 'role', array( 'staff' ), $args );

}
add_action('init', 'register_staff_tax' );
