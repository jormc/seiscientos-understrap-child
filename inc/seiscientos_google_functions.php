<?php
/**
 * Seiscientos.org Google Utilities
 *
 * @package seiscientos
 */

function seiscientos_google_add_scripts() {
    
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

function seiscientos_show_error_google_maps_api_key() {
    print 
        '<div class="alert alert-danger" role="alert">
            <strong>Google Maps API Key Error</strong>
            <br />
            <span>The Google Maps API Key has not been setted in the theme properties.</span>
        </div>';
}