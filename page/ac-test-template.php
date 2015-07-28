<?php
/**
 * Template Name: Test slider de pages
 */

$do_not_duplicate = array();

get_header(); // Loads the header.php template. ?>

<!-- Begin page slider area. --->
<section id="page-slider">	
	<h3>Atouts Cuisines, premier cuisiniste Nolte en Île de France</h3>
	<?php
	// generated with http://generatewp.com/wp_query/
	$args = array (
		'post_type'              => array( 'page' ),
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
		'meta_query'             => array(
			array(
				'key'       => 'inclure-slider-accueil',
				'value'     => 'yes',
				'compare'   => '=',
			),
		),
	);
	
	$page_slider = new WP_Query( $args );
 ?>

	<?php if ( $page_slider->have_posts() ) : ?>
		<div class="flexslider">
			<div class="slides">

			<?php while ( $page_slider->have_posts() ) : $page_slider->the_post(); $do_not_duplicate[] = get_the_ID(); 
			$link_value = get_permalink() ;
			?>
				<figure class="slide">
				<a href="<?php echo $link_value ?>">
				<?php 					
					the_post_thumbnail( 'unique-slider', array( 	
						'class' => 'clea-ac-slider', 
						'alt'   => 'the alt here' ,
						'title' => get_the_title() 
					) ) ; ?>

					<figcaption class="slide-caption">

						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->

					</figcaption><!-- .slide-caption -->
				</a>
				</figure><!-- .slide -->

			<?php endwhile; ?>

			</div><!-- .slides -->

		</div><!-- .flexslider -->

	<?php endif; ?>
</section>
<!-- End page slider area. -->
<hr />

<section id="testimonials">
<h2>Les derniers témoignages de nos clients</h2>
<div class="home-testimonial-boxes">
	<?php 
	// rechercher le lien vers les témoignages 
	$read = ac_read_full_link() ;  
	
	$groupes_display = array( 1, 2, 3 ) ; // les trois groupes à afficher
	foreach( $groupes_display as $group ) {

		$liste = ac_list_testimonial( $group ) ;
		// var_dump( $liste ) ;

		foreach ( $liste as $item ) {
			/* récupère toutes les données du témoignage
				la fonction n'affiche que les témoignages pour lesquels display = 1*/
			$full = ac_testimonial_everything( $item[ 'testimonial_id' ] ) ;

			if( isset( $full ) ) {
				// it's what we want to display
				$full_testimonial = $full ;
				break; // sort du foreach
			} 
		} // end foreach $liste
		// var_dump( $full_testimonial ) ;
		?>

		<div class="testimonial-col col wow bounceIn animated" style="visibility: visible; -webkit-animation: bounceIn 0.2s;" data-wow-delay="0.2s">
				<?php echo $full_testimonial[ 'photo-1' ][ 0 ] ; ?>
				<h5><?php echo $full_testimonial[ 'nom' ] ;?></h5>
				<p class="extrait"><?php echo $full_testimonial[ 'extrait' ] ;?></p>
				<a class="content-btn" href="<?php echo $read[ 'link' ] ; ?>?testimonial_id=<?php echo $full_testimonial[ 'id' ] ; ?>"><?php echo $read[ 'text' ] ; ?></a>
			</div> <!-- end class="col wow bounceIn animated" -->
	<?php } // end foreach $groupes_display ?>
</div> <!-- end class="home-testimonial-boxes" -->
</br>
</section> <!-- End testimonials area. -->
<hr> 	
<section id="accompagnement">
<!-- Begin excerpts area. -->

	<?php $loop = new WP_Query(
		array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'page_id' => 923
		)
	); ?>

	<?php if ( $loop->have_posts() ) : ?>

		<div class="content-secondary">

			<?php while ( $loop->have_posts() ) : $loop->the_post(); $do_not_duplicate[] = get_the_ID();  ?>

				<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'thumbnail' ) ); ?>

						<header class="entry-header">
							<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title tag="h2"]' ); ?>
							<?php echo apply_atomic_shortcode( 'entry_byline', '<div class="entry-byline">' . __( 'Published on [entry-published] [entry-edit-link before=" | "]', 'unique' ) . '</div>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->

				</article><!-- .hentry -->

			<?php endwhile; ?>

		</div><!-- .content-secondary -->

	<?php endif; ?>
	<!-- End excerpts area. --->


	<?php wp_reset_query(); ?>

</section><!-- accompagnement -->

<?php get_footer(); // Loads the footer.php template. ?>