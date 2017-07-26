<?php
/**
 * Seiscientos.org Google Utilities
 *
 * @package seiscientos
 */

function seiscientos_google_add_scripts() {
    
    // Load Google Maps API v3
    wp_enqueue_script(
        'google-maps',                                                                                          // script id
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyDDKFNjeKON7pJwxqka2br6tp8U-nzxHY4&sensor=true',      // script src
        array(),                                                                                                // script dependencies
        '3',                                                                                                    // script version
        true                                                                                                    // put in footer
    );

    // Load own Google Maps Utils
    wp_enqueue_script(
		'clubs-google-map-utils-js', 									// script name
		get_stylesheet_directory_uri() . '/js/google-maps-utils.js',	// script location
		array('jquery', 'google-maps'), 								// script dependencies
		'0.1', 															// script version
		true 															// script in footer
	);
}
add_action( 'wp_enqueue_scripts', 'seiscientos_google_add_scripts' );