<?php

   /**
	* Seiscientos.org Shortcode functions
	*
	* @package seiscientos
	*/

	// [sections foo="foo-value"]
	function sections_shortcode_function( $atts, $content = null ) {
        $a = shortcode_atts( array(
			'foo' => 'something',
			'bar' => 'something else',
		), $atts );
		
		

		return $output;

	}
	add_shortcode( 'seiscientos-sections', 'sections_shortcode_function' );

	function get_all_sections() {

		$the_query = new WP_Query(
			array(
				'post_type' 		=> 'page',
				'posts_per_page' 	=> -1,
				'meta_key' 			=> '_wp_page_template',
				'meta_value' 		=> 'page-templates/section-rightsidebar-page.php'
			)
		);

		if ( $the_query->have_posts() ) {
			$output .= '<ul>';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$output .= '<li>' . get_the_title() . '</li>';
			}
			$output .= '</ul>';
			wp_reset_postdata();
		} else {
			// no posts found
		}

		wp_reset_query();

	}

?>