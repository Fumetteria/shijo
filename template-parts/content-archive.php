<?php
/**
 * Template part for displaying posts in archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fumetteria
 */

$post_excerpt = get_the_excerpt(); // Get post excerpt.
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'fumetteria-archive-post' ); ?>>
    <?php fumetteria_post_thumbnail(); ?>
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
                ・
                <?php
                fumetteria_posted_on();
                ?>
            </div>
        <?php endif;
        $post_tags = get_the_tags();
        if ( ! empty( $post_tags ) ) {
            foreach( $post_tags as $post_tag ) {
                echo '<span class="post-tag"><a href="' . get_tag_link( $post_tag ) . '">' . $post_tag->name . '</a></span>';
            }
        }
        ?>
    </div>
</article>