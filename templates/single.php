<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * The template for displaying all single posts and attachments
 */

$us_layout = US_Layout::instance();

get_header();

global $us_iframe;
if ( ! $us_iframe ) {
	us_load_template( 'templates/titlebar' );
}

$template_vars = array(
	'metas' => (array) us_get_option( 'post_meta', array() ),
	'show_tags' => in_array( 'tags', us_get_option( 'post_meta', array() ) ),
);

?>
<div class="l-main">
	<div class="l-main-h i-cf">

		<main class="l-content"<?php echo ( us_get_option( 'schema_markup' ) ) ? ' itemprop="mainContentOfPage"' : ''; ?>>

			<?php do_action( 'us_before_single' ) ?>

			<?php
			while ( have_posts() ) {
				the_post();

				us_load_template( 'templates/blog/single-post', $template_vars );
			}
			?>

			<?php do_action( 'us_after_single' ) ?>

		</main>

		<?php us_load_template( 'templates/sidebar' ) ?>

	</div>
</div>

<?php get_footer() ?>
