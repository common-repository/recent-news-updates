<?php
/*
Plugin Name: Recent News List
Plugin URI:
Description: This Plugin used to Post and display the News and Information list. Admin have option to upload the news and we can display the news in user side using short code.
Version: 1.1
Author: Rajmahendran P
Author URI: http://www.startwpnow.blogspot.in
License: GPL2
*/
include_once dirname( __FILE__ ).'/includes/global_function.php';

 add_action('init', 'raj_news_post_type_registration');
 add_action('init', 'raj_add_news_category');
 add_action( 'wp_enqueue_scripts', 'run_add_my_stylesheet' );

 function raj_news_post_type_registration() {

 	$labels = array(
 		'name' => _x('Recent Updates', 'post type general name'),
 		'singular_name' => _x('Recent Updates', 'post type singular name'),
 		'add_new' => _x('Add Recent Updates', 'RFP'),
 		'add_new_item' => __('Add New Recent Updates'),
 		'edit_item' => __('Edit Recent Updates'),
 		'new_item' => __('New Recent Updates'),
 		'all_items' => __('All Recent Updates'),
 		'view_item' => __('View Recent Updates'),
 		'search_items' => __('Search Recent Updates'),
 		'not_found' =>  __('No Recent Updates found'),
 		'not_found_in_trash' => __('No Recent Updates found in Trash'),
 		'parent_item_colon' => '',
 		'menu_name' => __('Recent Updates')

 	  );
 	$args = array(
 		'labels' => $labels,
 		'public' => true,
 		'publicly_queryable' => true,
 		'show_ui' => true,
 		'show_in_menu' => true,
 		'query_var' => true,
 		'rewrite' => true,
 		'capability_type' => 'post',
 		'has_archive' => true,
 		'hierarchical' => false,
 		'menu_position' => null,
 		'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
 	);

	register_post_type( 'recent_update_news', $args );
 }

 function raj_add_news_category() {

  // Add new taxonomy, make it hierarchical (like categories)
   $labels = array(
     'name' => _x( 'Categories', 'taxonomy general name' ),
     'singular_name' => _x( 'Categorie', 'taxonomy singular name' ),
     'search_items' =>  __( 'Search Categorie' ),
     'all_items' => __( 'All Categorie' ),
     'parent_item' => __( 'Parent Categorie' ),
     'parent_item_colon' => __( 'Parent Categorie:' ),
     'edit_item' => __( 'Edit Categorie' ),
     'update_item' => __( 'Update Categorie' ),
     'add_new_item' => __( 'Add New Categorie' ),
     'new_item_name' => __( 'New Categorie Name' ),
     'menu_name' => __( 'Categorie' ),
   );

   register_taxonomy('categorie',recent_update_news, array(
     'hierarchical' => true,
     'labels' => $labels,
     'show_ui' => true,
     'query_var' => true,
     'rewrite' => array( 'slug' => 'categorie' ),
  ));

 }


 function recent_news_updates_fun( $atts ){

		/* Cound will changed based on the short code*/
		if( $atts['count'] > 0) {
			$display_count = $atts['count'];
		} else {
			$display_count = 10;
		}

		/* Created the Custom post type array*/
		$args = array( 'post_type' => 'recent_update_news', 
					   'posts_per_page' => $display_count, 			  
					  );
		
		/* Categoty will added in the array based on the short code 'cat' variable*/
		if( $atts['cat'] != '' ) {
			$run_cat = explode(',',$atts['cat'] );
			
			for( $runi = 0; $runi < count($run_cat); $runi++ ) {			
						$run_cat_arr[] = $run_cat[$runi];													
			}
			$args['tax_query'] = array(
									array(
										'taxonomy' => 'categorie',
										'field' => 'slug',
										'terms' => $run_cat_arr
									)
								);			
		}

		
					  
		$loop = new WP_Query( $args );
		
		echo '<div class="run-list-page">';
		while ( $loop->have_posts() ) : $loop->the_post();
		

			echo '<div class="run_list_news"><h3 class="run-title">' . get_the_title() . '</h3>';
			echo '<div>'.get_the_date().'</div>';
			echo '<div>'.get_the_post_thumbnail($loop->ID,'thumbnail');
			
			$content_srt = get_the_content();
			
			echo run_get_counted_word($content_srt) . '</div>';
			echo '<div class="readmore"><a href='.get_permalink().'>Read More</a></div>';
			echo '<p>&nbsp;</p></div>';
			echo '<hr class="clearboth">';
		endwhile;
		echo '</div>';		

 }
 
 add_shortcode( 'recent_news_updates', 'recent_news_updates_fun' );
 
 
 

 
 /**
  * Enqueue plugin style-file
  */
 function run_add_my_stylesheet() {
	 // Respects SSL, Style.css is relative to the current file
	 wp_register_style( 'run-news-style', plugins_url('css/run-news-style.css',__FILE__) );
	 wp_enqueue_style( 'run-news-style' );
}


function run_custom_post_type_template($single_template) {
     global $post;

     if ($post->post_type == 'recent_update_news') {
          $single_template = dirname( __FILE__ ) . '/templates/recent_update_news-template.php';
     }
     return $single_template;
}

add_filter( "single_template", "run_custom_post_type_template" );