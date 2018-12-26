<?php

/**
 * Register and enqueue theme styles
 *
 * @return void
 */
function qm_styles()
{
    global $wp_styles;
    
    /* sets version number based on last edit to main.css */
    $version = filemtime(get_template_directory() . '/assets/css/main.css');
    
    // Add normalize.css
    wp_register_style(
        'normalize',
        get_template_directory_uri() . '/assets/css/normalize.css',
        array()
        $version
    );

    // Add main stylesheet file
    wp_register_style(
        'site_main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('normalize'),
        $version
    );

    if( ! is_admin() )
    {
        wp_enqueue_style( 'site_main' );
    }
}
add_action( 'wp_enqueue_scripts', 'qm_styles' );


/**
 * Register and enqueue theme scripts
 *
 * @return void
 */
function qm_scripts()
{
    /* sets version number based on last edit to main.css */
    $version = filemtime(get_template_directory() . '/assets/js/main.js');

    // Add global js file
    wp_register_script(
        'site_main'
        ,$dev ? get_template_directory_uri() . '/assets/js/main.js' : site_url() . '/dist/main.min.js'
        ,array('jquery', 'site_plugins')
        ,$version
        ,true
    );

    if( ! is_admin() )
    {
        wp_enqueue_script(  'site_main' );
        wp_localize_script( 'site_main', 'QM', array('ajaxurl' => admin_url( 'admin-ajax.php' ), 'siteurl' => site_url() ) );
    }
}
add_action( 'wp_enqueue_scripts', 'qm_scripts' );