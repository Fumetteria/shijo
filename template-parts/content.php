<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fumetteria
 */

$post_excerpt = get_the_excerpt(); // Get post excerpt.
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-meta">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="post-title">', '</h1>' );
		else :
			the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( has_excerpt() ) { ?>
			<p class="post-excerpt"><?php echo esc_html( $post_excerpt ) ?></p>
			<?php
		}

		if ( 'post' === get_post_type() ) :
			?>
			<div class="post-byline">
				<?php
				fumetteria_posted_on();
				fumetteria_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-header -->

	<div class="post-wrapper">
		<div class="post-thumbnail">
		<?php fumetteria_post_thumbnail(); ?>
		</div>
		<div class="post-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fumetteria' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fumetteria' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div>

	<div class="post-footer">
		<?php fumetteria_entry_footer(); ?>
		</div><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
