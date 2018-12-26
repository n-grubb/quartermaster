<?php

/**
 * Functions.php: Theme Boostrapping
 * This file is used only to load in the necessary files for the theme
 * There shouldn't be any functions added in here!
 *
 */

 // Remove unnecessary items from head
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );

// Grab path for includes
$theme_path = get_stylesheet_directory();

/**
 * Include the theme support file
 * Contains logic for setting up theme support items
 */
include_once $theme_path . '/inc/support.php';

/**
 * Include the theme assets file
 * Contains logic for enqueueing styles and scripts
 */
include_once $theme_path . '/inc/assets.php';

/**
 * Include the theme customizer file
 * Contains logic for adding functionality to the theme Customizer
 */
include_once $theme_path . '/inc/customizer.php';

/**
 * Include the whitelabel file
 * Contains logic for whitelabeling site away from WordPress
 */
include_once $theme_path . '/inc/whitelabel.php';


