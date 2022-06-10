<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fumetteria
 */

get_header();
?>

	<div id="content-wrapper" class="main-content">
		<div class="fumetteria-post">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; // End of the loop.
			?>
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #main -->

<?php
get_footer();
