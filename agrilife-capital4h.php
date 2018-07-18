<?php
/**
 * Plugin Name: AgriLife Capital 4-H
 * Plugin URI: https://github.com/AgriLife/agrilife-capital-4h
 * Description: Functionality for Capital 4-H
 * Version: 1.0.0
 * Author: Zach Watkins
 * Author URI: http://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * License: GPL2+
 */

define( 'AG_C4H_DIRNAME', 'agrilife-capital4h' );
define( 'AG_C4H_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AG_C4H_DIR_FILE', __FILE__ );
define( 'AG_C4H_DIR_URL', plugin_dir_url( __FILE__ ) );

add_filter( 'genesis_seo_title', 'ag_capital4h_title', 10, 3 );

function ag_capital4h_title( $title, $inside, $wrap ){

	$logo = sprintf(
		'<span class="americorp"><img src="%simg/americorps.jpg" alt="Americorps"></span>',
		AG_C4H_DIR_URL
	);

	$title = preg_replace('/(<div class="site-secondary-logo[^>]+>)/', '$1' . $logo, $title);

	return $title;

}

add_action( 'wp_enqueue_scripts', 'ag_capital4h_register_styles' );
add_action( 'wp_enqueue_scripts', 'ag_capital4h_enqueue_styles' );

function ag_capital4h_register_styles() {

	wp_register_style(
		'ag_capital4h_stylesheet',
		AG_C4H_DIR_URL . 'css/ag-capital4h.css',
		array(),
		filemtime(AG_C4H_DIR_PATH . 'css/ag-capital4h.css')
	);

}

function ag_capital4h_enqueue_styles() {

	wp_enqueue_style( 'ag_capital4h_stylesheet' );

}
