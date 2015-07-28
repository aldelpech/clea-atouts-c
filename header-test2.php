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

$class = 'TEST-2' ;
?>

<body <?php body_class( $class ); hybrid_body_attributes(); ?>>

	<div class="container">
		
		<?php get_template_part( 'menu', 'test1' ); // Loads the menu-primary.php template. ?>

		<header id="header">

			<div id="sidebar-header" class="sidebar">
			<a href="../contactez-nous/" class="bouton-contact" target="_self"><i class="fa fa-envelope-o"></i>Contactez-nous<i class="fa fa-envelope-o"></i></a>
			</div><!-- #sidebar-header -->
			
			<hgroup id="branding">
				<?php do_atomic( 'open_header' ); // crée un "hook" "repertoire_open_header ?>
				<?php hybrid_site_title(); ?>
				<?php // hybrid_site_description(); ?>
			</hgroup><!-- #branding -->

		</header><!-- #header -->		


