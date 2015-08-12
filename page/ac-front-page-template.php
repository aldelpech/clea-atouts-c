<?php
/**
 * Template Name: Test magazine n°2
 */

$do_not_duplicate = array();

get_header( 'test1' ); // Loads the header.php template. ?>
	<!-- Begin partenaire-nolte. --->
	<section id="partenaire-nolte" class="clair">	
		<div class="bloc-left">
			<h3>Atouts Cuisines, premier cuisiniste Nolte en Île de France</h3>
		</div>
		<div class="bloc-right">
			<p><span><img class="nolte" src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/Logo_Nolte_Kuechen_transp_200x83.png" alt="Atouts Cuisines, Partenaire Nolte Kuechen" width="200" height="83"/></span></p>
		</div>
	</section>
	<!-- End partenaire-nolte. --->	
	<!-- Begin page slider area. --->
	<section id="page-slider" class="clair">	
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
						<div class="bouton-caption">
						<a href="<?php echo $link_value ?>" class="bouton-savoir" target="_self"><i class="fa fa-share"></i>Voir la suite</a>
						</div>
					</figcaption><!-- .slide-caption -->
				</a>
				</figure><!-- .slide -->

			<?php endwhile; ?>

			</div><!-- .slides -->

		</div><!-- .flexslider -->

	<?php endif; ?>
	</section>
	<!-- End page slider area. -->

<svg id="BrokenLineBefore" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
		<path d="M0 0 L66.5 50 L100 0"></path>
</svg>
<section id="testimonials" class="fonce">
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
				<p class="budget"><?php echo $full_testimonial[ 'budget' ] ;?></p>
				<p class="extrait"><?php echo $full_testimonial[ 'extrait' ] ;?></p>
				<a class="content-btn" href="<?php echo $read[ 'link' ] ; ?>?testimonial_id=<?php echo $full_testimonial[ 'id' ] ; ?>"><?php echo $read[ 'text' ] ?> de  <?php echo $full_testimonial[ 'nom' ] ;?></a>
				<img class="temoin" src="<?php echo $full_testimonial[ 'photo' ];?>" alt="<?php echo $full_testimonial[ 'nom' ];?>" >
			</div> <!-- end class="col wow bounceIn animated" -->
	<?php } // end foreach $groupes_display ?>
</div> <!-- end class="home-testimonial-boxes" -->
</br>
</section> <!-- End testimonials area. -->

	<svg id="BrokenLineAfter" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
		<path id="a" d="M0 0 L66.5 50 L100 0"></path>
		<path id="b" d="M0 105 L0 0 L66.5 50 L100 0 L100 105 Z"></path>
	</svg>
<section id="accompagnement" class="clair">	
<h2>Nous vous accompagnons de A à Z !</h2>

	<?php
 	// http://code.tutsplus.com/tutorials/creating-a-shortcode-for-responsive-video--wp-32469
	$your2_YouTube_url = '-vpBQ8MdSZM?rel=0&amp;showinfo=0'; // AC v0
 	?>
 	<div class="wptuts-video-container">	
	<iframe width="1280" height="720" src="https://www.youtube.com/embed/<?php echo $your2_YouTube_url; ?>" frameborder="0" allowfullscreen></iframe>
	</div>
	
</section><!-- accompagnement -->
<svg id="BrokenLineBefore" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
		<path d="M0 0 L66.5 50 L100 0"></path>
</svg>
<section id="partenaires" class="fonce">	
<h3>Les partenaires Atouts Cuisines</h3>
<p><span><img class="nolte" src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/Logo_Nolte_Kuechen_transp_200x83.png" alt="Atouts Cuisines, Partenaire Nolte Kuechen" width="200" height="83"/></span></p>
<p><span class="partenaire">
	<img src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/partenaires-001.jpg" alt="Silestone, partenaire d'Atouts Cuisines" width="192" height="56"/> 

	<img src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/BLANCO-transp.png" alt="Blanco, partenaire d'Atouts Cuisines" width="137" height="25"/> 
	<img src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/bosch-logo-fr.png" alt="Bosch, partenaire d'Atouts Cuisines" width="128" height="43"/>
	<img src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/corian-transp.png" alt="Corian, partenaire d'Atouts Cuisines" width="176" height="80"/> 
</span></p>
<p><span class="partenaire">
	<img src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/partenaires-005.jpg" alt="Franke, partenaire d'Atouts Cuisines" width="130" height="42"/> 
	<img src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/siemens-transp1.png" alt="Siemens, partenaire d'Atouts Cuisines" width="140" height="80"/>
	<img src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/neff-transp.png" alt="Neff, partenaire d'Atouts Cuisines" width="145" height="80"/> 
	<img src="<?php esc_attr( get_home_url() ) ; ?>/wp-content/uploads/2015/08/Roblin-transp.png" alt="Roblin, partenaire d'Atouts Cuisines" width="145" height="80"/> 
</span></p>
</section><!-- partenaires -->
	<svg id="BrokenLineAfter" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
		<path id="a" d="M0 0 L66.5 50 L100 0"></path>
		<path id="b" d="M0 105 L0 0 L66.5 50 L100 0 L100 105 Z"></path>
	</svg>
<?php get_footer(); // Loads the footer.php template. ?>