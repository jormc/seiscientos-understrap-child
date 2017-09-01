<?php

	/**
	* Seiscientos.org ACF Plugin Utilities
	*
	* @package seiscientos
	*/
	function seiscientos_acf_google_map_api( $api ){

		$apiKey = get_theme_mod('google_maps_api_key');

		if (!$apiKey) {
			seiscientos_show_error_google_maps_api_key();
		} else {
			$api['key'] = $apiKey;
			$api['libraries'] = 'geometry,places';
			return $api;
		}
	}
	add_filter('acf/fields/google_map/api', 'seiscientos_acf_google_map_api');

?>