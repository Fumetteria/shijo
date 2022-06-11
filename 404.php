<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fumetteria
 */

get_header();
?>

<div id="content-wrapper" class="main-content">
	<div class="fumetteria-post">
		<div class="fumetteria-content">
		<h1 class="page-title"><?php esc_html_e( 'Oops! Questa pagina non è stata trovata.', 'fumetteria' ); ?></h1>
			<div class="page-content">
				<p><?php esc_html_e( 'Questa pagina non esiste. Torna alla pagina principale o usa la ricerca.', 'fumetteria' ); ?></p>
			</div>
		</div>
		<?php
		get_sidebar();
		?>
	</div>
</div>
<?php
get_footer();
