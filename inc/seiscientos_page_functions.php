<?php
/**
 * Seiscientos.org Pages Utilities
 *
 * @package seiscientos
 */

function seiscientos_list_child_pages() { 
	global $post; 
	
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
	
	if ( $childpages ) {
		$string = '<ul>' . $childpages . '</ul>';
	}

	return $string;
}
add_shortcode('seiscientos_childpages', 'seiscientos_list_child_pages');

function seiscientos_list_first_level_child_pages_as_image_sections($args = null) { 
	// This page
	global $post;

	$defaults = array( 
		'post_parent'				=> $post->ID,
		'post_type' 				=> 'page',
    'order'             => 'ASC',
    'orderby'           => 'menu_order',
    'posts_per_page'    => -1,
    'depth' 						=> 1
	);

	$args = wp_parse_args( $args, $defaults );
	$query = new WP_Query();
	$all_wp_pages = $query->query($args);
	$children = get_page_children( $post->ID, $all_wp_pages );
	wp_reset_query();

	$output = '';
	foreach ($children as $id => $page) {
		$output .= seiscientos_list_child_pages_as_image_sections(array('post_id' => $page->ID));
		$output .= '<br />';
	}
	return $output;
}
add_shortcode('seiscientos_list_first_level_child_pages_as_image_sections', 'seiscientos_list_first_level_child_pages_as_image_sections');

function seiscientos_list_child_pages_as_image_sections($args = null) { 

	// This page
	global $post;

	$post_id = (!empty($args['post_id'])) ? $args['post_id'] : $post->ID;
	$page = get_post($post_id);

	$defaults = array( 
		'post_type' 				=> 'page',
    'order'             => 'ASC',
    'orderby'           => 'menu_order',
    'posts_per_page'    => -1
	);

	$args = wp_parse_args( $args, $defaults );
	$query = new WP_Query();
	$all_wp_pages = $query->query($args);
	$children = get_page_children( $page->ID, $all_wp_pages );
	wp_reset_query();

	$output .= '<div class="card">';
  $output .= '	<div class="card-block">';
  $output .= '		<h4 class="card-title">'.$page->post_title.'</h4>';
  $output .= '		<h6 class="card-subtitle mb-2 text-muted">'.$page->post_excerpt.'</h6>';
  $output .= '		<p class="card-text">';
  $output .= '			<div class="container-fluid">';
	$output .= '				<div class="row">';
	foreach ($children as $child) {
		$thumbnail = get_the_post_thumbnail($child->ID);
		$output .= '				<div class="col-4">';
		$output .= '					<div class="section-thumb">';
		$output .= '						<a href="'.get_permalink($child->ID).'" title="'.$child->post_title.'" alt="'.$child->post_title.'">';
		$output .= 								$thumbnail;
		$output .= '							<p class="text-sm-center">'.$child->post_title.'</p>';
		$output .= '						</a>';
		$output .= '					</div>';
		$output .= '				</div>';
	}
	$output .= '				</div>';
	$output .= '			</div>';
	$output .= '		</p>';
  $output .= '	</div>';
	$output .= '</div>';

	return $output;

}
add_shortcode('seiscientos_list_child_pages_as_image_sections', 'seiscientos_list_child_pages_as_image_sections');

function seiscientos_list_child_pages_as_sections($args = null) { 

	// This page
	global $post;

	$defaults = array(
		'post_parent'       => $post->ID,                               
		'post_type' 				=> 'page',
    'order'             => 'ASC',
    'orderby'           => 'menu_order',
    'posts_per_page'    => -1
	);

	$args = wp_parse_args( $args, $defaults );
	$query = new WP_Query();
	$all_wp_pages = $query->query($args);
	$children = get_page_children( $post->ID, $all_wp_pages );
	wp_reset_query();

	$output .= seiscientos_generate_page_sections($children);

	// echo '<pre>' . print_r( $children, true ) . '</pre>';

	return $output;
}
add_shortcode('seiscientos_childpages_sections', 'seiscientos_list_child_pages_as_sections');

function seiscientos_generate_page_sections($pages) {
	$output = '';
	if ($pages) {
		foreach ( $pages as $page ) {
			$url = get_attachment_link( $page->ID );
			$permalink = get_permalink( $page->ID );
			$title = $page->post_title;
			$excerpt = $page->post_excerpt;
			$thumbnail = get_the_post_thumbnail($page->ID, array('class' => 'card-img-top rounded'));

			if (($count%2)==0) {
				$output .= '<div class="card-deck-wrapper">';
	  		$output .= '	<div class="card-deck">';
			}

			$output .= '		<div class="card section-card">';
			$output .= '			<div class="card-block">';
			$output .= '				<div class="row">';
			if ($showImages == 'true') {
				$output .= '					<div class="col-md-4">';
				$output .= '						<!-- Left image -->';
				$output .= '						<a href="' . $permalink . '">';
				$output .= 								$thumbnail;
				$output .= '						</a>';
				$output .= '					</div>';
				$output .= '					<div class="col-md-8">';
			} else {
				$output .= '					<div class="col-md-12">';
			}
			$output .= '						<!-- Right text -->';
			$output .= '						<a href="'.$permalink.'">';
			if ($showDescription == 'true') {
				$output .= '							<h4 class="card-title">' . $title . '</h4>';
				$output .= '							<p class="card-text">' . $excerpt . '</p>';
			} else {
				$output .= '							<h4 class="card-title" style="text-align: center;">' . $title . '</h4>';
			}
			$output .= '						</a>';
			$output .= '					</div>';
			$output .= '				</div>';
			$output .= '			</div>';
			$output .= '		</div>';
			
			if (($count%2)==1) {
				$output .= '	</div>';
				$output .= '</div>';
			}

			$count++;
		}	
	}
	
	// Ajustar en caso de número de secciones impar
	// La última sección siempre queda en grande ocupando dos posiciones
	if (($count%2)==1) {
		//$output .= '		<div class="card-deck-wrapper">';
		//$output .= '		</div>';
		$output .= '	</div>';
		$output .= '</div>';
	}

	return $output;
}

?>