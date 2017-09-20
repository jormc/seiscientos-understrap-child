<?php
    function understrap_remove_scripts() {
        wp_dequeue_style( 'understrap-styles' );
        wp_deregister_style( 'understrap-styles' );

        wp_dequeue_script( 'understrap-scripts' );
        wp_deregister_script( 'understrap-scripts' );

        // Removes the parent themes stylesheet and scripts from inc/enqueue.php
    }
    add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
    function theme_enqueue_styles() {

        // Get the theme data
        $the_theme = wp_get_theme();

        wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
        wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    }

    /**
    * Load ACF Utilities functions
    */
    require 'inc/seiscientos_acf_functions.php';

    /**
    * Load Seiscientos.org utilities functions
    */
    require 'inc/seiscientos_functions.php';

    /**
    * Load Seiscientos.org Clubs Utilities functions
    */
    require 'inc/seiscientos_club_functions.php';

    /**
    * Load Seiscientos.org Page Utilities functions
    */
    require 'inc/seiscientos_page_functions.php';

    /**
    * Load Seiscientos.org Post Utilities functions
    */
    require 'inc/seiscientos_post_functions.php';

    /**
    * Load Seiscientos.org Page Utilities functions
    */
    require 'inc/seiscientos_section_functions.php';

    /**
    * Load Seiscientos.org Theme Utilities functions
    */
    require 'inc/seiscientos_theme_functions.php';

    /**
    * Load Seiscientos.org Theme Customizer functions
    */
    require 'inc/seiscientos_theme_customizer_functions.php';
    new Seiscientos_Theme_Customizer();

    /**
    * Load Google specific scripts and functions
    */
    require 'inc/seiscientos_google_functions.php';

    /**
    * Load some alert functions
    */
    require 'inc/seiscientos_alert_functions.php';