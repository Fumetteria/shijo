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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'fumetteria-content' ); ?>>
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
				fumetteria_posted_by(); ?>
				•
				<?php
				fumetteria_posted_on();
				?>
			</div>
		<?php endif; ?>
	</div>

	<div class="post-wrapper">
		<?php fumetteria_post_thumbnail(); ?>
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
			); ?>
		</div>
		<?php
			$categories_list = get_the_category_list();
			if ( $categories_list ) { ?>
				<div class="post-tags">
					<?php /* translators: 1: list of tags. */
					printf( esc_html__( 'Categorie: %1$s', 'fumetteria' ), $categories_list ); // phpcs:ignore WordPress
					//.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
		<?php } ?>
		<?php
			$tags_list = get_the_tag_list();
			if ( $tags_list ) { ?>
				<div class="post-tags">
					<?php /* translators: 1: list of tags. */
					printf( esc_html__( 'Tag: %1$s', 'fumetteria' ), $tags_list ); // phpcs:ignore WordPress
					//.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
		<?php } ?>
	</div>
	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
</article>
