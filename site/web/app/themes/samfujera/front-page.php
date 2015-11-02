<?php
/**
 * Front Page template for Sam Fujera theme. Adds widget areas to be used in addition
 * to a static home page.
 *
 *
 * @author  Pavel Suba
 * @license GPL-2.0+
 * @link    http://pavelsuba.com/
 */
add_action( 'genesis_meta', 'samfujera_front_page_meta' );
function samfujera_front_page_meta() {
	if ( is_active_sidebar( 'home-left' ) || ( ( is_active_sidebar( 'home-middle' ) && is_active_sidebar( 'home-right' ) ) ) ) { // check for active home widgets. if using r/left, both must have content. for balance.
		if ( is_singular() ) { // check if the home page is a static page
			//remove_action( 'genesis_entry_header', 'genesis_do_post_title' ); // if it is, remove the page title.
			//add_action( 'genesis_entry_header', 'robin_works_home_featured_image' ); // if it is, display the featured image in the page header
		}
		else {
			remove_action( 'genesis_loop', 'genesis_do_loop' ); // if it's not a static page and widget areas are active, remove the loop (latest posts)
		}
		add_action( 'genesis_loop', 'samfujera_home_widgets' ); // regardless, show the widgets.
	}
}
function samfujera_home_featured_image() { // display the featured image for the front page. Large, please.
	global $post;
	$image = get_the_post_thumbnail( $post->ID, 'original', array( 'alt' => the_title_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) ) );
	echo $image;
}
function samfujera_home_widgets() {
	if ( is_active_sidebar( 'home-left' ) ) {
		echo '<div class="home-left one-third first">';
			genesis_widget_area( 'home-left' );
		echo '</div>';
	}
	if ( is_active_sidebar( 'home-middle' ) ) {
		echo '<div class="home-middle one-third">';
			genesis_widget_area( 'home-middle' );
		echo '</div>';
	}
	if ( is_active_sidebar( 'home-right' ) ) {
		echo '<div class="home-right one-third">';
			genesis_widget_area( 'home-right' );
		echo '</div>';
	}
}
genesis();
