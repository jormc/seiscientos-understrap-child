<?php

   /**
	* Seiscientos.org Shortcodes functions
	*
	* @package seiscientos
	*/

	// [sections foo="foo-value"]
	function sections_shortcode_function( $atts, $content = null ) {
        $atts = shortcode_atts( array(
			'orderby' => 'title',
			'order' => 'ASC'
		), $atts );

		// See: https://wordpress.stackexchange.com/questions/9978/how-to-use-get-template-part
		
		ob_start();
		// Get the desired sections
		$sections = get_all_sections($atts);
		// Inject sections to the content template
		set_query_var( 'sections', $sections );
		// Inject the content template
		get_template_part( 'loop-templates/sections', 'content' );
		
		return ob_get_clean();
	}
	add_shortcode( 'seiscientos-sections', 'sections_shortcode_function' );

	function get_all_sections($args) {

		$args = wp_parse_args( $args, array(
			'post_type' 		=> 'page',
			'posts_per_page' 	=> -1,
			'meta_key' 			=> '_wp_page_template',
			'meta_value' 		=> 'page-templates/section-rightsidebar-page.php'
		) );

		$the_query = new WP_Query($args);

		$sections = [];

		if ( $the_query->have_posts() ) {
			
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$postId = get_the_ID();
				$section = array(
					'id' => $postId,
					'post_title' => get_the_title( $postId ),
					'title' => get_field('section_title', $postId),
					'excerpt' => get_field('section_excerpt', $postId),
					'thumbnail' => get_field('section_thumbnail', $postId),
					'link' => get_permalink($postId)
				);
				array_push($sections, $section);
			}
			wp_reset_postdata();
		} else {
			// no posts found
		}

		wp_reset_query();

		return $sections;
	}

	//create the shortcode [include] that accepts a filepath and query string
	//this function was modified from a post on www.amberpanther.com you can find it at the link below:
	//http://www.amberpanther.com/knowledge-base/using-the-wordpress-shortcode-api-to-include-an-external-file-in-the-post-content/
	//BEGIN amberpanther.com code
	function include_file($atts) {
		//if filepath was specified
		extract(
			shortcode_atts(
				array(
					'filepath' => 'NULL'
				), $atts
			)
		);

		//BEGIN modified portion of code to accept query strings
		//check for query string of variables after file path
		if(strpos($filepath,"?")) {
			$query_string_pos = strpos($filepath,"?");
			//create global variable for query string so we can access it in our included files if we need it
			//also parse it out from the clean file name which we will store in a new variable for including
			global $query_string;
			$query_string = substr($filepath,$query_string_pos + 1);
			$clean_file_path = substr($filepath,0,$query_string_pos);     
			//if there isn't a query string
		} else {
			$clean_file_path = $filepath;
		}
		//END modified portion of code

		//check if the filepath was specified and if the file exists
		if ($filepath != 'NULL' && file_exists(get_stylesheet_directory_uri() . "/" . $clean_file_path)){
			//turn on output buffering to capture script output
			ob_start();
			//include the specified file
			include(TEMPLATEPATH.$clean_file_path);
			//assign the file output to $content variable and clean buffer
			$content = ob_get_clean();
			//return the $content
			//return is important for the output to appear at the correct position
			//in the content
			return $content;
		}
	}
	//register the Shortcode handler
	add_shortcode('include', 'include_file');
	//END amberpanther.com code
	//shortcode with sample query string:
	//[include filepath="/get-posts.php?format=grid&taxonomy=testing&term=stuff&posttype=work"]

?>