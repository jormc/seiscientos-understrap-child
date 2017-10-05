<?php

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
    
    require 'inc/seiscientos-shortcodes.php';

?>