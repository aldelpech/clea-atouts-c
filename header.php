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

if ( is_page_template( 'ac-testimonial-page.php' && !isset( $_GET[ 'testimonial_id'] ) ) ) {
	$class = 'testimonial-group' ;
}
	
if (isset( $_GET[ 'testimonial_id'] ) ) { 
		$class = 'testimonial-single' ;
}
?>

<body <?php body_class( $class ); hybrid_body_attributes(); ?>>

	<div id="container">
		
		<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>
		<?php clea_base_add_html_to_header() ; // loads social media and search form from ald-custom-header.php ?>
		<header id="header">

			<div id="sidebar-header" class="sidebar">
			<a href="../contactez-nous/" class="bouton-contact" target="_self" title="prendre rendez-vous"><i class="fa fa-envelope-o"></i>Contactez-nous<i class="fa fa-envelope-o"></i></a>
			</div><!-- #sidebar-header -->
			
			<hgroup id="branding">
				<?php do_atomic( 'open_header' ); // crée un "hook" "repertoire_open_header ?>
				<?php hybrid_site_title(); ?>
				<?php // hybrid_site_description(); ?>
			</hgroup><!-- #branding -->

		</header><!-- #header -->
		
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-primary.php template. ?>
	
		
		<?php if ( get_header_image() ) echo '<img class="header-image" src="' . esc_url( get_header_image() ) . '" alt="" />'; ?>
		
		<div id="main">

			<?php get_template_part( 'breadcrumbs' ); // Loads the breadcrumbs.php template. ?>