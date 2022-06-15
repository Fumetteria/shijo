<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fumetteria
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'fumetteria-content' ); ?>>
	<div class="post-meta">
		<?php
		the_title( '<h1 class="post-title">', '</h1>' );
		if ( has_excerpt() ) { ?>
			<p class="post-excerpt"><?php echo esc_html( $post_excerpt ) ?></p>
			<?php
		}
		if ( 'post' === get_post_type() ) :
			?>
			<div class="post-byline">
				<?php
				fumetteria_posted_by(); ?>
				・
				<?php
				fumetteria_posted_on();
				?>
			</div>
		<?php endif; ?>
	</div>

	<?php fumetteria_post_thumbnail(); ?>

	<div class="post-content">
		<?php
		the_content();
		?>
	</div>
</article>
