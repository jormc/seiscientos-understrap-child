<?php
/**
 * Seiscientos.org Theme Utilities
 *
 * @package seiscientos
 */

add_action( 'init', 'sesicientos_add_excerpts_to_pages' );
function sesicientos_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

function seiscientos_styles() {
    echo '<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">';
}
add_action('wp_head', 'seiscientos_styles');

function seiscientos_js() {
    
}
add_action('wp_head', 'seiscientos_js');

if ( ! function_exists( 'seiscientos_widgets_init' ) ) {
	function seiscientos_widgets_init() {
		register_sidebar( array(
			'name' => 'Footer Sidebar 1',
			'id' => 'footer-sidebar-1',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => 'Footer Sidebar 2',
			'id' => 'footer-sidebar-2',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => 'Footer Sidebar 3',
			'id' => 'footer-sidebar-3',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		register_sidebar( array(
			'name' => 'Footer Sidebar 4',
			'id' => 'footer-sidebar-4',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'seiscientos_widgets_init' );



function seiscientos_custom_logo() {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		echo $image[0];
}


function seiscientos_breadcrumbs() {

	// See: https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin

	$breadcrumb_id = 'breadcrumb';
	$breadcrumb_class = 'breadcrumb';
	$breadcrumb_home_class = 'breadcrumb-home';
	$breadcrumb_item_class = 'breadcrumb-item';
	$breadcrumb_item_page_class = 'breadcrumb-item-page';
	$breadcrumb_item_category_class = 'breadcrumb-item-cat';
	$breadcrumb_item_custom_post_class = 'breadcrumb-item-custom-post-';
	$breadcrumb_item_tag_class = 'breadcrumb-item-tag';
	$breadcrumb_item_year_class = 'breadcrumb-item-year';
	$breadcrumb_item_month_class = 'breadcrumb-item-month';
	$breadcrumb_item_day_class = 'breadcrumb-item-day';
	$breadcrumb_item_autor_class = 'breadcrumb-item-autor';
	$breadcrumb_item_active_class = 'breadcrumb-item active';
	$breadcrumb_item_parent_class = 'breadcrumb-item-parent';
	
	$home_title = 'Portal del 600';
	$archives_local_tag = 'Archivos';
	$author_local_tag = 'Autor';
	$search_result_local_tag = 'Resultados búsqueda';

	// Get the query & post information
	global $post,$wp_query;

	// Do not display on the homepage
	if ( !is_front_page() ) {

		// Build the breadcrums
		echo '<ol id="'.$breadcrumb_id.'" class="'.$breadcrumb_class.'">';

		// Place Home tag
		echo '<li class="'.$breadcrumb_item_class.' '.$breadcrumb_home_class.'"><a href="'.get_home_url().'" title="'.$home_title.'">'.$home_title.'</a></li>';

		// Switch by post type
		if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
			echo '<li class="'.$breadcrumb_item_active_class.'">'.post_type_archive_title($prefix, false).'</li>';
		} else if ( is_single() ) {
			// If post is a custom post type
			$post_type = get_post_type();
	      
	    // If it is a custom post type display name and link
	    if($post_type != 'post') {
				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);
				
				echo '<li class="'.$breadcrumb_item_category_class.' '.$breadcrumb_item_custom_post_class.$post_type.'">';
				echo '<a href="'.$post_type_archive.'" title="'.$post_type_object->labels->name.'">'.$post_type_object->labels->name.'</a>';
				echo '</li>';      
	    }
	      
	    // Get post category info
	    $category = get_the_category();
	     
	    if(!empty($category)) {
        // Get last category post is in
        $last_category = end(array_values($category));
          
        // Get parent any categories and create array
        $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
        $cat_parents = explode(',',$get_cat_parents);
          
        // Loop through parent categories and store in variable $cat_display
        $cat_display = '';
        foreach($cat_parents as $parents) {
            $cat_display .= '<li class="'.$breadcrumb_item_category_class.'">'.$parents.'</li>';
        }	     
	    }
	      
	    // If it's a custom post type within a custom taxonomy
	    $taxonomy_exists = taxonomy_exists($custom_taxonomy);
	    if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
        $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
        $cat_id         = $taxonomy_terms[0]->term_id;
        $cat_nicename   = $taxonomy_terms[0]->slug;
        $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
        $cat_name       = $taxonomy_terms[0]->name;
			}
	      
	    // Check if the post is in a category
	    if(!empty($last_category)) {
				echo $cat_display;
				echo '<li class="'.$breadcrumb_item_active_class.'">'.get_the_title().'</li>';
	    // Else if post is in a custom taxonomy
	    } else if(!empty($cat_id)) {
        echo '<li class="'.$breadcrumb_item_category_class.' '.$breadcrumb_item_category_class.'-'.$cat_id.' '.$breadcrumb_item_category_class.'-'.$cat_nicename.'">';
        echo '<a href="'.$cat_link.'" title="'.$cat_name.'">'.$cat_name.'</a>';
        echo '</li>';
        echo '<li class="'.$breadcrumb_item_active_class.'">'.get_the_title().'</li>';
	    } else {
				echo '<li class="'.$breadcrumb_item_active_class.'">'.get_the_title().'</li>';
	    }
	} else if ( is_category() ) {
			// Category page
      echo '<li class="'.$breadcrumb_item_active_class.' '.$breadcrumb_item_category_class.'">'.single_cat_title('', false).'</li>';
    } else if ( is_tag() ) {
      // Tag page
         
      // Get tag information
      $term_id        = get_query_var('tag_id');
      $taxonomy       = 'post_tag';
      $args           = 'include=' . $term_id;
      $terms          = get_terms( $taxonomy, $args );
      $get_term_id    = $terms[0]->term_id;
      $get_term_slug  = $terms[0]->slug;
      $get_term_name  = $terms[0]->name;
         
      // Display the tag name
      echo '<li class="'.$breadcrumb_item_active_class.' '.$breadcrumb_item_tag_class.'">'.$get_term_name.'</li>';
  } else if ( is_page() ) {
			// Standard page
			if( $post->post_parent ){
				// If child page, get parents 
				$anc = get_post_ancestors( $post->ID );
	             
				// Get parents in the right order
				$anc = array_reverse($anc);
	             
				// Parent page loop
				if ( !isset( $parents ) ) $parents = null;
					foreach ( $anc as $ancestor ) {
						$parents .= '<li class="'.$breadcrumb_item_class.' '.$breadcrumb_item_parent_class.'"><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
					}
	             
					// Display parent pages
					echo $parents;
	      } 

				// Current page
				echo '<li class="'.$breadcrumb_item_page_class.' '.$breadcrumb_item_active_class.'">'.get_the_title().'</li>';	         
	  } elseif ( is_day() ) {
      // Day archive
         
      // Year link
      echo '<li class="'.$breadcrumb_item_year_class.'"><a href="'.get_year_link( get_the_time('Y') ).'" title="'.get_the_time('Y').'">'.get_the_time('Y').' '.$archives_local_tag.'</a></li>';
         
      // Month link
      echo '<li class="'.$breadcrumb_item_month_class.'"><a href="'.get_month_link( get_the_time('Y'), get_the_time('m') ).'" title="'.get_the_time('M').'">'.get_the_time('M').' '.$archives_local_tag.'</a></li>';
         
      // Day display
      echo '<li class="'.$breadcrumb_item_day_class.' '.$breadcrumb_item_active_class.'">'.get_the_time('jS').' '.get_the_time('M').' '.$archives_local_tag.'</li>';
		} else if ( is_month() ) {
			// Month Archive
			// Year link
			echo '<li class="'.$breadcrumb_item_year_class.'"><a href="'.get_year_link( get_the_time('Y') ).'" title="'.get_the_time('Y').'">'.get_the_time('Y').' '.$archives_local_tag.'</a></li>';
           
			// Month display
			echo '<li class="'.$breadcrumb_item_month_class.'">'.get_the_time('M').' '.$archives_local_tag.'</li>';
    } else if ( is_year() ) {
			// Display year archive
			echo '<li class="'.$breadcrumb_item_year_class.' '.$breadcrumb_item_active_class.'">'.get_the_time('Y').' '.$archives_local_tag.'</li>';
		} else if ( is_author() ) {
			// Auhor archive
      // Get the author information
      global $author;
      $userdata = get_userdata( $author );
         
      // Display author name
      echo '<li class="'.$breadcrumb_item_active_class.' '.$breadcrumb_item_autor_class.'">'.$author_local_tag.': '.$userdata->display_name.'</li>';
  	} else if ( get_query_var('paged') ) {
			// Paginated archives
			echo '<li class="'.$breadcrumb_item_active_class.'">'.__('Page').' '.get_query_var('paged').'</li>';
		} else if ( is_search() ) {
			// Search results page
			echo '<li class="'.$breadcrumb_item_active_class.'">'.$search_result_local_tag.': '.get_search_query().'</li>';
           
		} elseif ( is_404() ) {
			// 404 page
			echo '<li class="'.$breadcrumb_item_class.'">'.'Error 404'.'</li>';
		}

		echo '</ol>';

	}

}

?>