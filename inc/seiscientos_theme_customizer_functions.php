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
        $wp_customize->add_section( 'site_alerts_settings', array(
            'title'    => __( 'Site alerts', 'seiscientos.org' ),
            'priority' => 101
        ) );

        $wp_customize->add_section( 'google_settings', array(
            'title'    => __( 'Google Settings', 'seiscientos.org' ),
            'priority' => 102
        ) );

        /////////////////////////////////////
        // Add settings to sections
        /////////////////////////////////////
        $this->site_alerts_settings_section( $wp_customize );
        $this->google_settings_section( $wp_customize );
    }

    /**
     * Section: Site Alerts Settings
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @access private
     * @since  1.0
     * @return void
    */
    private function site_alerts_settings_section( $wp_customize ) {

        /////////////////////////////////////
        // Activate Site SUCCESS Alert
        /////////////////////////////////////
        $wp_customize->add_setting( 'activate_site_success_alert', array(
            'default'           => false,
            'sanitize_callback' => array( $this, 'sanitize_checkbox' )
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_site_success_alert', array(
            'label'       => esc_html__( 'Activate SUCCESS Alert for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'activate_site_success_alert',
            'type'        => 'checkbox',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Site SUCCESS Alert title
        /////////////////////////////////////
        $wp_customize->add_setting( 'site_success_alert_title', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_success_alert_title', array(
            'label'       => esc_html__( 'The SUCCESS alert title for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'site_success_alert_title',
            'type'        => 'text',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Site SUCCESS Alert content
        /////////////////////////////////////
        $wp_customize->add_setting( 'site_success_alert_content', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_success_alert_content', array(
            'label'       => esc_html__( 'The SUCCESS alert content for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'site_success_alert_content',
            'type'        => 'textarea',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Activate Site INFO Alert
        /////////////////////////////////////
        $wp_customize->add_setting( 'activate_site_info_alert', array(
            'default'           => false,
            'sanitize_callback' => array( $this, 'sanitize_checkbox' )
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_site_info_alert', array(
            'label'       => esc_html__( 'Activate INFO Alert for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'activate_site_info_alert',
            'type'        => 'checkbox',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Site INFO Alert title
        /////////////////////////////////////
        $wp_customize->add_setting( 'site_info_alert_title', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_info_alert_title', array(
            'label'       => esc_html__( 'The INFO alert title for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'site_info_alert_title',
            'type'        => 'text',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Site INFO Alert content
        /////////////////////////////////////
        $wp_customize->add_setting( 'site_info_alert_content', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_info_alert_content', array(
            'label'       => esc_html__( 'The INFO alert content for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'site_info_alert_content',
            'type'        => 'textarea',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Activate Site WARN Alert
        /////////////////////////////////////
        $wp_customize->add_setting( 'activate_site_warn_alert', array(
            'default'           => false,
            'sanitize_callback' => array( $this, 'sanitize_checkbox' )
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_site_warn_alert', array(
            'label'       => esc_html__( 'Activate WARN Alert for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'activate_site_warn_alert',
            'type'        => 'checkbox',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Site WARN Alert title
        /////////////////////////////////////
        $wp_customize->add_setting( 'site_warn_alert_title', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_warn_alert_title', array(
            'label'       => esc_html__( 'The WARN alert title for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'site_warn_alert_title',
            'type'        => 'text',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Site WARN Alert content
        /////////////////////////////////////
        $wp_customize->add_setting( 'site_warn_alert_content', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_warn_alert_content', array(
            'label'       => esc_html__( 'The WARN alert content for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'site_warn_alert_content',
            'type'        => 'textarea',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Activate Site DANGER Alert
        /////////////////////////////////////
        $wp_customize->add_setting( 'activate_site_danger_alert', array(
            'default'           => false,
            'sanitize_callback' => array( $this, 'sanitize_checkbox' )
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_site_danger_alert', array(
            'label'       => esc_html__( 'Activate DANGER Alert for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'activate_site_danger_alert',
            'type'        => 'checkbox',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Site DANGER Alert title
        /////////////////////////////////////
        $wp_customize->add_setting( 'site_danger_alert_title', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_danger_alert_title', array(
            'label'       => esc_html__( 'The DANGER alert title for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'site_danger_alert_title',
            'type'        => 'text',
            'priority'    => 10
        ) ) );

        /////////////////////////////////////
        // Site DANGER Alert content
        /////////////////////////////////////
        $wp_customize->add_setting( 'site_danger_alert_content', array(
            'default'           => ''
        ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'site_danger_alert_content', array(
            'label'       => esc_html__( 'The DANGER alert content for this site', 'seiscientos.org' ),
            'section'     => 'site_alerts_settings',
            'settings'    => 'site_danger_alert_content',
            'type'        => 'textarea',
            'priority'    => 10
        ) ) );

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