<!DOCTYPE html>

<html <?php language_attributes(); ?>>



<head>



<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />

<title><?php hybrid_document_title(); ?></title>

<meta name="viewport" content="width=device-width,initial-scale=1" />

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- use favicon set in theme options -->
<link rel="Shortcut Icon" href="<?php echo esc_attr( hybrid_get_setting( 'favicon_upload' ) ) ; ?>" type="image/x-icon" />

<?php wp_head(); // wp_head ?>



</head>


<?php

$class = '' ;

if ( is_page_template( 'page/ac-testimonial-page.php' ) && !isset( $_GET[ 'testimonial_id'] ) )  {
	$class = 'testimonial-group' ;
}

if (isset( $_GET[ 'testimonial_id'] ) ) { 
		$class = 'testimonial-single' ;
}
?>

<body <?php body_class( $class ); hybrid_body_attributes(); ?>>

	<div id="container">
		
		<?php get_template_part( 'menu', 'test1' ); // Loads the menu-primary.php template. ?>

		<!-- pour voir les options
		-- http://0ac2015.atoutscuisines.com/wp-admin/options.php
		'theme_mods_clea-atouts-c'
		'theme_mods_clea-base'
		'theme_mods_unique'
		'theme_mods_unique-impact1'
		'unique_theme_settings'
		'clea-base_theme_settings'
		
		-->

		<?php
		$value = get_option( 'clea-base_theme_settings' );
		// var_dump( $value ); 
		?>

		<div class="ald-unique-logo">		
			<a href="<?php echo get_home_url() ; ?>" >
			<img class="logo-ac" src="<?php echo $value[ "logo_upload" ]; ?>" alt="logo" title="retour à l'accueil" width="<?php echo $value[ "logo_width" ]; ?>" height="<?php echo $value[ "logo_height" ]; ?>"/>
			</a>
		</div>	

		
		<header id="header">

			<div id="sidebar-header" class="sidebar">
				<a href="../contactez-nous/" class="bouton-contact" target="_self" title="prendre rendez-vous"><i class="fa fa-envelope-o"></i>Contactez-nous<i class="fa fa-envelope-o"></i></a>
			</div><!-- #sidebar-header -->
		
			<hgroup id="branding">
				<?php // do_atomic( 'open_header' ); // crée un "hook" "repertoire_open_header ?>
				<?php // hybrid_site_title(); ?>
				<?php // hybrid_site_description(); ?>
			</hgroup><!-- #branding -->

		</header><!-- #header -->		
		<svg id="BrokenLineHeader" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
			<path id="a" d="M0 0 L66.5 50 L100 0"></path>
			<path id="b" d="M0 105 L0 0 L66.5 50 L100 0 L100 105 Z"></path>
		</svg>
		<div id="main">


			<?php get_template_part( 'breadcrumbs' ); // Loads the breadcrumbs.php template. ?>