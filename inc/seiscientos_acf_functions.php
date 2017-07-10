<?php
/**
 * Seiscientos.org ACF Plugin Utilities
 *
 * @package seiscientos
 */
function seiscientos_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyCczx5e4FsAb_hECwVTRCdB1_YYeww_FLk';
	return $api;	
}
add_filter('acf/fields/google_map/api', 'seiscientos_acf_google_map_api');
?>