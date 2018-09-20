<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * The template for displaying all singular posts
 *
 * Do not overload this file directly. Instead have a look at framework/templates/single.php: you should find all
 * the needed hooks there.
 */

// Get types which are set as display as posts
$cpt_as_posts = us_get_option( 'cpt_as_posts' );

// Prepend post and attachment which are always display as posts
$post_types = array_merge(
	array( 'post', 'attachment' ),
	$cpt_as_posts
);

// Load relevant template
if ( is_singular( $post_types ) ) {
	us_load_template( 'templates/single' );
} else {
	us_load_template( 'templates/page' );
}
