<?php 
/**
 * Register Testimonial Post Type
 * 
 */

function register_cpt_testimonial () {

    $labels = array(
		'name'               => 'Testimonials',
		'singular_name'      => 'Testimonial',
		'menu_name'          => 'Testimonials',
		'name_admin_bar'     => 'Testimonials',
		'add_new'            => 'Add Testimonial',
		'add_new_item'       => 'Add Testimonial',
		'all_items'          => 'Testimonials'
    );
    
    $args = array(
		'public' => true,
		'label'  => 'Testimonial',
		'labels' => $labels
	);

    register_post_type( 'testimonial', $args );

}
add_action( 'init', 'register_cpt_testimonial' );


/*
function register_cpt_taxonomy() {

    $labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Genres', 'textdomain' ),
        'all_items'         => __( 'All Genres', 'textdomain' ),
        'parent_item'       => __( 'Parent Genre', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
        'edit_item'         => __( 'Edit Genre', 'textdomain' ),
        'update_item'       => __( 'Update Genre', 'textdomain' ),
        'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
        'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
        'menu_name'         => __( 'Genre', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );

    register_taxonomy( 'taxslug', array( 'testimonial' ), $args );

}
add_action('init', 'register_cpt_taxonomy' );
*/