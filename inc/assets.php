<?php

/**
 * Register Google Fonts
 */
function qm_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Noto Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$notoserif = esc_html_x( 'on', 'Noto Serif font: on or off', 'qm' );

	if ( 'off' !== $notoserif ) {
		$font_families = array();
		$font_families[] = 'Noto Serif:400,400italic,700,700italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}


/**
 * Register and enqueue theme styles
 *
 * @return void
 */
function qm_styles()
{
    global $wp_styles;
    
    /* sets version number based on last edit to main.css */
    $version = filemtime(get_template_directory() . '/assets/css/_main.css');
    
    // Add normalize.css
    wp_register_style(
        'normalize',
        get_template_directory_uri() . '/assets/css/normalize.css',
        array(),
        $version
    );

    wp_enqueue_style( 'qm-base-style', get_stylesheet_uri() );

    wp_enqueue_style( 'gutenbergthemeblocks-style', get_template_directory_uri() . '/assets/css/blocks.css' );

    wp_enqueue_style( 'qm-fonts', qm_fonts_url() );

    // Add main stylesheet file
    wp_register_style(
        'site_main',
        get_template_directory_uri() . '/assets/css/_main.css',
        array('normalize'),
        $version
    );

    if( ! is_admin() ) {
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
    $version = filemtime(get_template_directory() . '/assets/js/_main.js');

    // Add global js file
    wp_register_script(
        'site_main',
        get_template_directory_uri() . '/assets/js/_main.js',
        array('jquery'),
        $version,
        true
    );

    wp_enqueue_script( 'qm-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'qm-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
    }
    
    if( ! is_admin() ) {
        wp_enqueue_script(  'site_main' );
        wp_localize_script( 'site_main', 'QM', array('ajaxurl' => admin_url( 'admin-ajax.php' ), 'siteurl' => site_url() ) );
    }
}
add_action( 'wp_enqueue_scripts', 'qm_scripts' );


