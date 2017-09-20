<?php
/**
 * Seiscientos.org Google Utilities
 *
 * @package seiscientos
 */

function seiscientos_google_add_scripts() {
    
    if (!get_theme_mod('google_analytics_code')) {
        seiscientos_show_error_google_analytics_code();
    }

    if (!get_theme_mod('google_maps_api_key')) {
        seiscientos_show_error_google_maps_api_key();
    } else {
        // Load Google Maps API v3

        $url = "https://maps.googleapis.com/maps/api/js?key=" . get_theme_mod('google_maps_api_key') ;
        
        wp_enqueue_script(
            'google-maps',  // script id
            $url,           // script src
            array(),        // script dependencies
            '3',            // script version
            true            // put in footer
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
}
add_action( 'wp_enqueue_scripts', 'seiscientos_google_add_scripts' );

function seiscientos_show_error_google_analytics_code() {
    print 
        '<div class="alert alert-danger" role="alert">
            <strong>Google credentials error</strong>
            <br />
            <span>Thre was an error loading Google credentials: ERR_PORT_GOG_001</span>
        </div>';
}

function seiscientos_show_error_google_maps_api_key() {
    print 
        '<div class="alert alert-danger" role="alert">
            <strong>Google credentials error</strong>
            <br />
            <span>Thre was an error loading Google credentials: ERR_PORT_GOG_002</span>
        </div>';
}