<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fumetteria
 */

get_header();
?>

<div id="content-wrapper" class="main-content">
	<div class="fumetteria-archive">
		<div class="fumetteria-content">

		<?php if ( have_posts() ) :
			the_archive_title( '<h1 class="page-title">', '</h1>' );
		?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive' );

			endwhile;

			the_posts_navigation(
				array(
					'prev_text' => __('Older posts', 'theme_textdomain'),
					'next_text' => __('Newer posts', 'theme_textdomain'),
					'screen_reader_text' => __('Posts navigation', 'theme_textdomain')
				)
			);

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
		<?php 
			get_sidebar();
		?>
	</div>
</div>
<?php
get_footer();
