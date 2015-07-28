<!-- afficher contenu de la page avec témoignage complet -->

<!-- !!! le témoignage ne s'affiche avec sa mise en page que si on echo via
		la fonction wpautop - cf https://codex.wordpress.org/Function_Reference/wpautop 
		voir ligne 16 -->

	<?php
	// will get 7 if link is http://0ac2015.atoutscuisines.com/test-affichage-temoignages/?testimonial_id=7
	$id = $_GET['testimonial_id'];
	// echo "<p>id du témoignage : " . $id . "</p>";
	$testimonial_single = ac_testimonial_everything( $id );
	// var_dump( $testimonial_single );
	?>
	<section class="temoignage-individuel">
		<h2>Le témoignage de <?php echo $testimonial_single[ 'nom' ];?></h2>
		<p class="budget">Budget de cette cuisine : <?php echo $testimonial_single[ 'budget' ];?></p>
		<p><?php echo wpautop( $testimonial_single[ 'temoignage' ] );?></p>
		<section class="photo-temoin">
			<p><?php echo $testimonial_single[ 'nom' ];?></p>
			<img src="<?php echo $testimonial_single[ 'photo' ];?>" alt="<?php echo $testimonial_single[ 'nom' ];?>" >
		</section>
		<section class="liens">
		<?php
		// pour identifier le groupe auquel appartient ce témoignage
		$liste = ac_list_testimonial( 0 ) ; // liste de tous les témoignages 
		foreach ( $liste as $item ) {
			if ( $item[ "id" ] == $id ) {
				$groupe = $item[ "group_id" ] ;
				break ;
			} else {
				$groupe = "Pas de groupe défini..." ;
			}
			
		}
		// var_dump( $liste );
		?>

		</br>
			<a href="../nos-realisations/">Tous les témoignages</a>  |  
			<a href="../nos-realisations//?group_id=<?php echo $groupe ;?>"> Les témoignages du même groupe de prix</a>
		</section>
	</section>


	</div><!-- #content -->