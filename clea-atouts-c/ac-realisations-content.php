<!-- afficher contenu de la page -->

	<?php 
	
	// rechercher le lien vers les témoignages 
	$read = ac_read_full_link() ;  
	// liste de tous les groupes : id et nom
	$deno = '' ;
	$deno = ac_list_testimonial_groups() ;
	// var_dump( $deno ) ;	

	// quel groupe représenter ?
	if (isset( $_GET[ 'group_id'] ) ) { 
		$group = $_GET['group_id'] ;
	} else {
		$group = 0 ;	// pas de sélection de groupe		
	}
	
	// rechercher la liste de tous les témoignages concernés
	$liste = ac_list_testimonial( $group ) ;
	// var_dump( $liste ) ;
	?>

	<h2>Témoignages de clients d'Atouts Cuisines</h2>
	<section class="choix-groupe" id="testnnn">	
	<p class="categorie">catégorie sélectionnée : <?php echo $deno[ $group ] ?></p>
		<?php foreach ($deno as $key => $value) {
			if ( $key == $group ) {
				$checked = "checked" ;
				$input_value = "1";
			} else {
				$checked = "" ;
				$input_value = "0";
			} ?>

	
		<input type="radio" name="groupAC" id="G<?php echo $key; ?>" value="<?php echo $input_value; ?>" onclick='functionCalled( <?php echo $key; ?> )' <?php echo $checked; ?> >	
		<label for="G<?php echo $key; ?>"><?php echo $value ?></label>
		<script>
			 function functionCalled( t ) {
				  var val = "<?php echo $read[ 'link' ] ; ?>";  // the testimonial page link
				  val = val + "?group_id=";  
				  var link = val + t;
				  // alert( link ); // pour afficher le résultat (deboguage)
				  window.location = link; //if you want to redirect
			 }
		</script>
		<?php } // end foreach ?>
	</section>	

	<div class="testimonial-content-boxes">
	<?php
	$count = 1 ; // pour compter les témoignages affichés
	foreach ( $liste as $item ) {
		/* récupère toutes les données du témoignage */
		$full_testimonial = ac_testimonial_everything( $item[ 'testimonial_id' ] ) ;  
		
		if( !empty( $full_testimonial ) ) { 
			if ($count % 3 == 1){ ?>
				<div class="testimonial-row">
			<?php } ?>
			<div class="testimonial-col col wow bounceIn animated" style="visibility: visible; -webkit-animation: bounceIn 0.2s;" data-wow-delay="0.2s">
			<?php echo $full_testimonial[ 'photo-1' ][ 0 ] ; ?>
			<p class="budget"><?php echo $full_testimonial[ 'budget' ] ;?></p>
			<p class="extrait"><?php echo $full_testimonial[ 'extrait' ] ;?></p>
			<a class="content-btn" href="<?php echo $read[ 'link' ] ; ?>?testimonial_id=<?php echo $full_testimonial[ 'id' ] ; ?>"><?php echo $read[ 'text' ] ?> de  <?php echo $full_testimonial[ 'nom' ] ;?></a>
			<img class="temoin" src="<?php echo $full_testimonial[ 'photo' ];?>" alt="<?php echo $full_testimonial[ 'nom' ];?>" >
			</div> <!-- end class="col wow bounceIn animated" -->
			<?php if ($count % 3 == 0) { ?>
				</div> <!-- end class="testimonial-col" -->
			<?php } 
			$count++ ;
		} // endif
	} // end foreach ?>
	</div> <!-- end class="testimonial-content-boxes" -->
	</br>



