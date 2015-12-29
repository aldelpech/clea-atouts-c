<?php
/**
 * 
 * this file is designed to provide specific functions for the child theme
 *
 * @package    clea-base
 * @subpackage Functions
 * @version    0.1.0
 * @since      0.1.0
 * @author     Anne-Laure Delpech <ald.kerity@gmail.com>  
 * @copyright  Copyright (c) 2015 Anne-Laure Delpech
 * @link       
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// enregistrer les styles liés aux témoignages
 
add_action( 'wp_enqueue_scripts', 'clea_ac_testimonial_styles', 4 ); 

function clea_ac_testimonial_styles() {
	
		wp_register_style( 
			'ac-testimonials', 
			get_stylesheet_directory_uri() . '/css/testimonials.css',
			array(),  // no dependencies
			null, // no version number
			'screen'	// CSS media type
		);
		
		wp_enqueue_style( 'ac-testimonials' );
} 
 
/* liste des témoignages d'un groupe */
function ac_list_testimonial( $group ){
	global $wpdb ;
	
	if( $group == 0 )  {
		$groupe = '' ;
	} else {
		$groupe = 'WHERE group_id = ' . (int)$group ;
	}

	$liste_groupe = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."hms_testimonials_group_meta` " . $groupe . " ORDER BY `testimonial_id` DESC", ARRAY_A); 

	return $liste_groupe ;
}

// fait la liste des groupes existants et leurs noms
function ac_list_testimonial_groups() { 
	global $wpdb ;
	$liste_id = $wpdb->get_results("SELECT group_id FROM `".$wpdb->prefix."hms_testimonials_group_meta` " , ARRAY_A); 

	foreach ( $liste_id as $id ) {
		$groupe = 'WHERE id = ' . (int)$id[ "group_id" ] ;
		$nom_groupe = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."hms_testimonials_groups` " . $groupe, ARRAY_A);

		$liste[] = $nom_groupe ; // ajoute chaque ligne trouvée

	}

	// retourne un array avec seulement id et name des groupes
	$deno[ 0 ] = 'Toutes les cuisines' ;
	foreach ( $liste as $group ) {
		$deno[ $group[ 0 ][ 'id' ] ] = $group[ 0 ][ 'name' ] ;
	}
	
	return $deno ;
}

/* get each testimonial content by id */ 
function ac_testimonial_everything( $Id ) {
	global $wpdb ;
	
	$extrait = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."hms_testimonials_cf_meta` WHERE testimonial_id = ". (int)$Id ." AND `key_id` = 1" , ARRAY_A);
	$budget = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."hms_testimonials_cf_meta` WHERE testimonial_id = ". (int)$Id ." AND `key_id` = 2", ARRAY_A);

	$value_extrait = $extrait[ 0 ][ 'value'] ;
	if ( !is_null( $budget ) ) {
		$value_budget = $budget[ 0 ][ 'value'] ;
	} else {
		$value_budget = "Non communiqué" ;
	}

	
	$tout = ac_testimonial_full( $Id ) ;
	if( !( $tout[ 'display' ] == '1' )  ) {
		return ;
	}
	$temoignage = ac_without_caption( $tout[ 'testimonial'] ) ;
	
	if ( ! empty( $tout[ 'image'] ) ) {
		$photo_temoin = ac_get_uploaded_picture( $tout[ 'image'] ) ;
	} else {
		$photo_temoin = get_stylesheet_directory_uri() . '/images/testimonial-default2.png' ;
		
	}
	
	$nom_temoin = ac_extract_name( $tout[ 'name'] ) ;
	$image_mise_en_avant = ac_extract_featured_image( $tout[ 'name'] ) ;

	// reste à mettre tout ça dans un array
	$result = array(
		'id'		=> $Id,					// OK
		'nom'		=> $nom_temoin,
		'extrait' 	=> $value_extrait,			// OK
		'budget'	=> $value_budget,
		'photo'		=> $photo_temoin,
		'nom'		=> $nom_temoin,
		'photo-1'	=> $image_mise_en_avant,
		'temoignage'=> $temoignage ,		
		'date'		=> $tout[ 'testimonial_date']
	) ;

	return $result ;


} 

// récupère tout le contenu d'un témoignage
function ac_testimonial_full( $Id ) {
	global $wpdb ;
	
	$get = $wpdb->get_row("SELECT * FROM `".$wpdb->prefix."hms_testimonials` WHERE `id` = ".(int)$Id." LIMIT 1", ARRAY_A);
	return $get ;
}

// récupère l'image uploadée (photo du témoin)
function ac_get_uploaded_picture( $idImage ) {
	$image_url = wp_get_attachment_url( $idImage );
	return $image_url ;
}

// récupère uniquement le texte du champ 'nom'
function ac_extract_name( $name ) {
	// http://bavotasan.com/2009/removing-images-from-a-wordpress-post/
	$result = preg_replace(array('{<a[^>]*><img}','{/></a>}'), array('<img','/>'), $name );
	$result = preg_replace( '/<img[^>]+./','', $result ); ;
	$result = preg_replace("/\[caption.*\[\/caption\]/", '', $result );
	$result = preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", "", $result);
	$result = preg_replace("/<p[^>]*?>/", "", $result);
	$result = preg_replace("/<\/p[^>]*?>/", "", $result);
	$result = trim( $result, " \t\n\r\0\x0B\xC2\xA0" ); // remove beginning and end white space and nbsp

	return $result ;
}

// récupère les images  d'un champ
function ac_extract_featured_image( $name ) {
	// http://www.wprecipes.com/how-to-retrieve-images-in-post-content
	
	$SearchPattern = '~<img [^\>]*\ />~';
	// Run preg_match_all to grab all the images and save the results in $aPics
	preg_match_all( $SearchPattern, $name , $aPics );	
	// Check to see if we have at least 1 image
	$iNumberOfPics = count($aPics[0]);
	if ( $iNumberOfPics > 0 ) {
		 for ( $i=0; $i < $iNumberOfPics ; $i++ ) {
			  // echo $aPics[0][$i];
			  $result = $aPics[0] ;
		 };
	} else {
		$result = "PAS d'IMAGE MISE EN AVANT" ;
	}
	return $result ;
}

function ac_read_full_link() {
	$settings = get_option('hms_testimonials');
	// var_dump( $settings ) ;
	$readmore_link = $settings[ 'readmore_link' ];

	$result = array(
		'link'		=> $readmore_link,				
		'text'		=> $settings[ 'readmore_text' ]
	) ;

	return $result ;
}

function ac_without_caption( $test ) {
	// http://stackoverflow.com/questions/18908216/wordpress-php-replace-caption-tag-with-div

	$search_for = '/\[caption.*\](.*?)\[\/caption\]/is';
	$replace_with = 'H$1I';
	$result = preg_replace($search_for, $replace_with, $test);

	return $result ;
}