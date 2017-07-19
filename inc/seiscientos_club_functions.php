<?php
/**
 * Seiscientos.org Clubs Utilities
 *
 * @package seiscientos
 */

function seiscientos_clubs_add_scripts() {
  if (is_page('clubes')) {
    wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCczx5e4FsAb_hECwVTRCdB1_YYeww_FLk', array(), '3', true );
    wp_enqueue_script( 'google-map-init', get_stylesheet_directory_uri() . '/js/acf-google-maps.js', array('google-map', 'jquery'), '0.1', true );
    $translation_array = array( 'context' => get_stylesheet_directory_uri() );
	wp_localize_script( 'google-map-init', 'theme_vars', $translation_array );
  }
}
//add_action( 'wp_enqueue_scripts', 'seiscientos_clubs_add_scripts' );

function seiscientos_get_club_object($id) {

	if ( get_post_thumbnail_id($id) ) { 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image_url = $image[0];
	} 

	$club = array ( 
		'name'								=> get_field('name', $id),
		'headquarters'				=> get_field('headquarters', $id),
		'address'							=> get_field('address', $id),
		'gmap_location' 			=> get_field('gmap_location', $id),
		'foundation_date'			=> get_field('foundation_date', $id),
		'is_multimarc'				=> get_field('is_multimarc', $id),
		'president' 					=> get_field('president', $id),
		'president_phone' 		=> get_field('president_phone', $id),
		'president_email' 		=> get_field('president_email', $id),
		'vicepresident' 			=> get_field('vicepresident', $id),
		'vicepresident_phone' => get_field('vicepresident_phone', $id),
		'vicepresident_email' => get_field('vicepresident_email', $id),
		'secretary' 					=> get_field('secretary', $id),
		'secretary_phone' 		=> get_field('secretary_phone', $id),
		'secretary_email' 		=> get_field('secretary_email', $id),
		'treasurer' 					=> get_field('treasurer', $id),
		'treasurer_phone' 		=> get_field('treasurer_phone', $id),
		'treasurer_email' 		=> get_field('treasurer_email', $id),
		'vocal' 							=> get_field('vocal', $id),
		'vocal_phone' 				=> get_field('vocal_phone', $id),
		'vocal_email' 				=> get_field('vocal_email', $id),
		'contact_phone_1'			=> get_field('contact_phone_1', $id),
		'contact_phone_2' 		=> get_field('contact_phone_2', $id),
		'contact_phone_3' 		=> get_field('contact_phone_3', $id),
		'fax' 								=> get_field('fax', $id),
		'email' 							=> get_field('email', $id),
		'webpage' 						=> get_field('webpage', $id),
		'description' 				=> get_field('description', $id),
		'verified'		 				=> get_field('verified', $id),
		'update_date' 				=> get_field('update_date', $id),
		'image'								=> $image_url
	);

	return $club;
}

function seiscientos_clubs_list_pages($args = null) { 
		global $post; 
		
		$defaults = array( 
			'child_of' 		=> $post->ID,
			'title_li'		=> null,
			'order'      	=> 'ASC',
    	'orderby'    	=> 'title',
			'sort_column' => 'post_title',
			'echo' 				=> 0
		);
		$args = wp_parse_args( $args, $defaults );

		$clubs_list = '';
		
		$clubs = get_pages( $args );
		if ( $clubs ) {
			$clubs_list = '<ul class="club-list">';
			foreach ($clubs as $club) {
				$verified = 'verified';
				$clubs_list .= '<li class="club-item '.$verified.'"><a href="'.get_permalink($club->ID).'">'.$club->post_title.'</a></li>';
			}
			$clubs_list .= '</ul>';
		}

		if (!empty($args['accordion']) && $args['accordion'] == 'true') {
			$accordion = '';
			$accordion_title = (!empty($args['title'])) ?  $args['title'] : 'Listado de clubes';
			$accordion .= '<div id="accordion" role="tablist" aria-multiselectable="true" class="club-list-accordion">';
			$accordion .= '	<div class="card">';
    	$accordion .= '		<div class="card-header" role="tab" id="headingOne">';
      $accordion .= '			<h5 class="mb-0">';
      $accordion .= '				<a data-toggle="collapse" data-parent="#accordion" href="#collapseClubsList" aria-expanded="true" aria-controls="collapseOne">';
      $accordion .= 					$accordion_title;
      $accordion .= '				</a>';
      $accordion .= '			</h5>';
    	$accordion .= '		</div>';
    	$accordion .= '		<div id="collapseClubsList" class="collapse" role="tabpanel" aria-labelledby="headingOne">';
      $accordion .= '			<div class="card-block">';
      $accordion .= 					$clubs_list;
      $accordion .= '			</div>';
    	$accordion .= '		</div>';
    	$accordion .= '	</div>';
    	$accordion .= '</div>';
    	return $accordion;
		} else {
			return $clubs_list;	
		}
}
add_shortcode('seiscientos_clubs_list_pages', 'seiscientos_clubs_list_pages');

function seiscientos_clubs_map($args = null) {

	$output = '<ul>';

	$query = new WP_Query(array(
    'post_type'  			=> 'page',
    'posts_per_page' 	=> -1,
    'post_parent'    	=> $post->ID,
    'order'          	=> 'ASC',
    'orderby'        	=> 'title',
    'meta_key'   			=> '_wp_page_template',
    'meta_value' 			=> 'page-templates/club-sidebarpage.php'
	));

	$output = '<div class="acf-map">';

	if ( $query->have_posts() ) {
 		while ( $query->have_posts() ) : $query->the_post();
 			$club = seiscientos_get_club_object($post->ID);
			$name = $club['name'];
			$address = $club['address'];
			$headquarters = $club['headquarters'];
			$verified = !empty($club['verified']) && $club['verified'];
			$lat = $club['gmap_location']['lat'];
			$lng = $club['gmap_location']['lng'];

			$output .= '<div class="marker" data-lat="'.$lat.'" data-lng="'.$lng.'" verified="'.$verified.'">';
			$output .= '	<div class="club-infowindow">';
			$output .= '		<h6 class="title">'.$name.'</h6>';
			$output .= '		<p class="address">';
			$output .= '			<span>' . $address . '</span>';
			$output .= '		</p>';
			$output .= '		<div class="pull-right">';
			$output .= '			<a href="'.get_the_permalink().'" class="btn btn-primary btn-sm">Ficha del club</a>';
			$output .= '			<a href="https://www.google.com/maps/dir/Current+Location/'.$lat.','.$lng.'" class="btn btn-primary btn-sm" target="_blank">Cómo llegar</a>';
			$output .= '		</div>';
			$output .= '	</div>';
			$output .= '</div>';

 		endwhile;
 	}
	$output .= '</div>';
	return $output;

}
add_shortcode('seiscientos_clubs_map', 'seiscientos_clubs_map');

?>