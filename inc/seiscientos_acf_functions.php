<?php

	/**
	* Seiscientos.org ACF Plugin Utilities
	*
	* @package seiscientos
	*/
	function seiscientos_acf_google_map_api( $api ){
		$api['key'] = 'AIzaSyDDKFNjeKON7pJwxqka2br6tp8U-nzxHY4';
		$api['libraries'] = 'geometry,places';
		return $api;
	}
	add_filter('acf/fields/google_map/api', 'seiscientos_acf_google_map_api');



?>