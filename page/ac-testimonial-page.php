<?php
/**
 * Template Name: testimonial display ALD V0
 */

	
get_header(); // Loads the header.php template. 
?>
	<div id="content" class="hfeed">
		<?php 
		// get_template_part( 'loop-meta' );  // Loads the loop-meta.php template. 
		
		if (isset($_GET['testimonial_id'])) {
			get_template_part( 'ac-realisations-id' ); 
		} else {
			get_template_part( 'ac-realisations-content' );
		}	
		?>

	</div><!-- #content -->
	
<?php get_footer(); // Loads the footer.php template. ?>	