<?php

/**
 * Setup theme support and functionality
 *
 * @return void
 */
function qm_setup()
{
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-formats', array('gallery', 'image', 'video', 'audio') );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'qm_setup' );


/**
 * Register functionality, initilize plugin functionality
 *
 * @return void
 */
function qm_init()
{
    // Register Menu
    register_nav_menus(array(
        'top_menu'    => 'Navigation items above header.',
        'main_menu'   => 'Navigation items for the main menu.',
        'footer_menu' => 'Navigation items for the footer.'
    ));
}
add_action( 'init', 'qm_init' );


/**
 *  Register sidebars and widgets
 *
 *  @return  void
 */
function qm_widget_init()
{
    // Sidebar
    register_sidebar(array(
      'name' => __( 'Main Sidebar Widgets' ),
      'id' => 'sidebar',
      'description' => __( 'Widgets for the default sidebar' ),
      'before_title' => '<h3>',
      'after_title' => '</h3>',
      'before_widget' => '<div class="widget %2$s" id="%1$s" >',
      'after_widget'  => '</div>'
    ));
}
add_action( 'widgets_init', 'qm_widget_init' );

