<?php

if ( ! function_exists( 'qm_setup' ) ) :
    /**
     * Setup theme support and functionality
     *
     * @return void
     */
    function qm_setup()
    {

        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
        load_theme_textdomain( 'qm', get_template_directory() . '/languages' );
        
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        
        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support( 'title-tag' );

        add_theme_support( 'post-formats', array('gallery', 'image', 'video', 'audio') );

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );

        // Adding support for core block visual styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for responsive embeds.
        add_theme_support( 'responsive-embeds' );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( '_qm_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
        ) ) );
        
        /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
        add_theme_support( 'custom-logo' );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support( 'html5', array( 
            'comment-list', 
            'comment-form', 
            'search-form', 
            'gallery', 
            'caption' 
        ) );

        // Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Strong Blue', 'qm' ),
				'slug'  => 'strong-blue',
				'color' => '#0073aa',
			),
			array(
				'name'  => __( 'Lighter Blue', 'qm' ),
				'slug'  => 'lighter-blue',
				'color' => '#229fd8',
			),
			array(
				'name'  => __( 'Very Light Gray', 'qm' ),
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => __( 'Very Dark Gray', 'qm' ),
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			),
		) );
    }
endif;
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


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function qm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qm_content_width', 640 );
}
add_action( 'after_setup_theme', 'qm_content_width', 0 );
