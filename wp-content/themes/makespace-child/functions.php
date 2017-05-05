<?php

class MakespaceChild {

	function __construct(){
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
		add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length' ), 999 );
		add_filter( 'excerpt_more', array( $this, 'new_excerpt_more' ) );
		add_action( 'pre_get_posts', array( $this, 'archive_sort_order' ) ); 
		//add_action( 'pre_get_posts', array( $this, 'archive_posts_per_page' ) ); 
	}

	function wp_enqueue_scripts(){
		$msw_object = array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'google_map_data' => get_google_map_data(),
			'home_url' => home_url(),
			'show_dashboard_link' => current_user_can( 'manage_options' ) ? 1 : 0,
			'site_url' => site_url(),
			'stylesheet_directory' => get_stylesheet_directory_uri()
		);
		$google_api_key = get_field( 'msw_google_map_api_key', 'option' );
		wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=' . $google_api_key . '&callback=createGoogleMap', array( 'theme' ), null, true );
		wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/scripts.min.js' );
		wp_localize_script( 'theme', 'MSWObject', $msw_object );

		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Cinzel|Work+Sans:300,400,500,700|Yanone+Kaffeesatz:300,400' );
		wp_enqueue_style( 'theme', get_stylesheet_uri() );
	}
	
	function custom_excerpt_length( $length ) {
		global $post;
		if ($post->post_type == 'jobs'){
			return 12;
		}
		else{
			return 50;
		}
	}
	
	function new_excerpt_more($more) {
		return '...';
	}
	
	function archive_sort_order($query){
		if(is_archive() && is_post_type_archive( 'services' )):
			$query->set( 'order', 'ASC' );
			$query->set( 'orderby', 'menu_order' );
		endif;    
	}
	
	/*function archive_posts_per_page($query){
		if( is_post_type_archive( 'staff' )):
			$query->set( 'posts_per_page', 1 );
		endif;    
	}*/

}

$MakespaceChild = new MakespaceChild();