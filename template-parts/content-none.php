<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fumetteria
 */

?>

<div class="no-results not-found">
	<h1 class="page-title"><?php esc_html_e( 'Nessun risultato', 'fumetteria' ); ?></h1>
	<div class="page-content">
		<?php
		if ( is_search() ) :
			?>
			<p><?php esc_html_e( 'La ricerca non ha prodotto nessun risultato. Per favore, riprova a cercare ciò che desideri con la ricerca.', 'fumetteria' ); ?></p>
			<?php
		else :
			?>
			<p><?php esc_html_e( 'Non siamo riusciti a trovare quello che ti serviva. Prova a cercare ciò che desideri con la ricerca.', 'fumetteria' ); ?></p>
			<?php
		endif;
		?>
	</div>
</div>
