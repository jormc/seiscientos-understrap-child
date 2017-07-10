<?php
/**
 * Seiscientos.org Sections Utilities
 *
 * @package seiscientos
 */

function seiscientos_list_section_pages_shortcode_function( $atts ){
	return seiscientos_list_section_pages( $atts );
}
add_shortcode( 'seiscientos_sections', 'seiscientos_list_section_pages_shortcode_function' );

/** UTILIZAR LA FUNCION PARCIAL seiscientos_generate_page_sections() **/
function seiscientos_list_section_pages( $args = '' ) {

	// This page
	global $post;

	$numPages = count($pages);
	$count = 0;
	$output = '';

	$onlyFirstLevel = (!empty($args[only_first_level])) ? $args[only_first_level] : false;
	$menuId = (!empty($args[menu])) ? $args[menu] : $post->ID;
	$showImages = (!empty($args[show_images])) ? $args[show_images] : null;
	if (!$showImages) {
		$showImages = 'true';
	}
	$showTitle = (!empty($args[show_title])) ? $args[show_title] : null;
	if (!$showTitle) {
		$showTitle = 'true';
	}
	$showDescription = (!empty($args[show_description])) ? $args[show_description] : null;
	if (!$showDescription) {
		$showDescription = 'true';
	}

	$defaults = array(
		'numberposts' => 5,
		'category' => 0, 
		'orderby' => 'date',
		'order' => 'DESC', 
		'include' => array(),
		'exclude' => array(), 
		'meta_key' => '',
		'meta_value' =>'', 
		'post_type' => 'post',
		'suppress_filters' => true
  );

	$r = wp_parse_args( $args, $defaults );
	$menuItems = wp_get_nav_menu_items($menuId);
	if ($menuItems) {
		foreach ( (array) $menuItems as $key => $menuItem ) {
			$parentId = $menuItem->menu_item_parent;

			if (!$onlyFirstLevel || $onlyFirstLevel && $parentId == 0) {
				$pageId = get_post_meta( $menuItem->ID, '_menu_item_object_id', true );
				$page = get_page($pageId);
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