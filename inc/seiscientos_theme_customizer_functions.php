<?php
/**
 * Implements Customizer functionality.
 * 
 * See: https://www.nosegraze.com/customizer-settings-wordpress-theme/
 *
 * Add custom sections and settings to the Customizer.
 *
 * @package   seiscientos.org
 */
class Seiscientos_Theme_Customizer {

    /**
	 * Seiscientos_Theme_Customizer constructor.
	 *
	 * @access public
	 * @since  1.0
	 * @return void
	 */
	public function __construct() {
	    add_action( 'customize_register', array( $this, 'register_customize_sections' ) );
    }

    /**
     * Add all sections and panels to the Customizer
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @access public
     * @since  1.0
     * @return void
     */
    public function register_customize_sections( $wp_customize ) {

        /////////////////////////////////////
        // Add Panels
        /////////////////////////////////////
        $wp_customize->add_section( 'google_settings', array(
            'title'    => __( 'Google Settings', 'seiscientos.org' ),
            'priority' => 101
        ) );

        /////////////////////////////////////
        // Add settings to sections
        /////////////////////////////////////
        $this->google_settings_section( $wp_customize );
    }

    /**
     * Section: Google Settings
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @access private
     * @since  1.0
     * @return void
    */
    private function google_settings_section( $wp_customize ) {

        /*
        /////////////////////////////////////
        // Activate Google Analytics Code
        /////////////////////////////////////
        $wp_customize->add_setting( 'activate_google_analytics', array(
            'default'           => false,
            'sanitize_callback' => array( $this, 'sanitize_checkbox' )
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_google_analytics', array(
            'label'       => esc_html__( 'Activate Google Analytics for this site', 'seiscientos.org' ),
            'description' => esc_html__( 'Check this on to activate Google Analytics feature for this site.', 'seiscientos.org' ),
            'section'     => 'google_settings',
            'settings'    => 'activate_google_analytics',
            'type'        => 'checkbox',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Google Analytics Code
        /////////////////////////////////////
        $wp_customize->add_setting( 'google_analytics_code', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google_analytics_code', array(
            'label'       => esc_html__( 'Google Analytics code for this site', 'seiscientos.org' ),
            'description' => esc_html__( 'Put your own Google Analytics code to activate the feature for this site.', 'seiscientos.org' ),
            'section'     => 'google_settings',
            'settings'    => 'google_analytics_code',
            'type'        => 'text',
            'priority'    => 10
        ) ) );
        */

        /////////////////////////////////////
        // Activate Google Maps API
        /////////////////////////////////////
        $wp_customize->add_setting( 'activate_google_maps', array(
            'default'           => false,
            'sanitize_callback' => array( $this, 'sanitize_checkbox' )
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_google_maps', array(
            'label'       => esc_html__( 'Activate Google Maps API for this site', 'seiscientos.org' ),
            'description' => esc_html__( 'Check this on to activate Google Maps API feature for this site.', 'seiscientos.org' ),
            'section'     => 'google_settings',
            'settings'    => 'activate_google_maps',
            'type'        => 'checkbox',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Google Maps API Key
        /////////////////////////////////////
        $wp_customize->add_setting( 'google_maps_api_key', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google_maps_api_key', array(
            'label'       => esc_html__( 'Google Maps API Key for this site', 'seiscientos.org' ),
            'description' => esc_html__( 'Put your own Google Maps API Key to activate the feature for this site.', 'seiscientos.org' ),
            'section'     => 'google_settings',
            'settings'    => 'google_maps_api_key',
            'type'        => 'text',
            'priority'    => 10
        ) ) );

    }

    /**
     * Sanitize Checkbox
     * 
     * Accepts only "true" or "false" as possible values.
     *
     * @param $input
     *
     * @access public
     * @since  1.0
     * @return bool
     */
    public function sanitize_checkbox( $input ) {
        return ( $input === true ) ? true : false;
    }
}