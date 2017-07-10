<?php
/**
 * Seiscientos.org Utilities
 *
 * @package seiscientos
 */

function seiscientos_return_to_parent_url() {
	if( is_page() ) { 
		global $post;
	        
		/* Get an array of Ancestors and Parents if they exist */
		$parents = get_post_ancestors( $post->ID );
	  /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
		$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
		/* Get the parent and set the $class with the page slug (post_name) */
	  $parent = get_post( $id );
		echo get_permalink($parent->ID);
	}
}

function seiscientos_return_to_parent_url_sortcode() {
	$button = '';
	if( is_page() ) { 
		global $post;
	        
		/* Get an array of Ancestors and Parents if they exist */
		$parents = get_post_ancestors( $post->ID );
	  /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
		$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
		/* Get the parent and set the $class with the page slug (post_name) */
	  $parent = get_post( $id );
		$button .= '<a class="card-link btn btn-primary" href="'.get_permalink($parent->ID).'">Volver</a>';
	}
	return $button;
}
add_shortcode( 'seiscientos_return_to_parent', 'seiscientos_return_to_parent_url_sortcode' );

?>