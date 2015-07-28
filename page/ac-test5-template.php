<?php
/**
 * Template Name: arrières plans
 */



get_header( 'test4' ); // Loads the header.php template. ?>

<?php
// pour chaque couleur, son nom, son code hexa puis R,G, B
$colors = array(
	array( 'snow', '#FFFAFA', 255,250,250),
	array( 'whitesmoke', '#F5F5F5', 245,245,245),
	array( 'thistle', '#D8BFD8', 216,191,216),
	array( 'oldlace', '#FDF5E6', 253,245,230),
	array( 'mistyrose', '#FFE4E1', 255,228,225),
	array( 'linen', '#FAF0E6', 250,240,230),
	array( 'lavender', '#E6E6FA', 230,230,250),
	array( 'lavenderblush', '#FFF0F5', 255,240,245),
	array( 'ivory', '#FFFFF0', 255,255,240),
	array( 'ghostwhite', '#F8F8FF', 248,248,255),
	array( 'floralwhite', '#FFFAF0', 255,250,240),
	array( 'azure', '#F0FFFF', 240,255,255),
	array( 'beige', '#F5F5DC', 245,245,220),
	array( 'aliceblue', '#F0F8FF', 240,248,255),
	array( 'antiquewhite', '#FAEBD7', 250,235,215),
);

$backgrounds = array(
	array( 'pattern-016', 'pattern-016.png' ),
	array( 'wood-021', 'wood-021.png' ),
	array( 'pattern-022', 'pattern-022.png' ),
	array( 'pattern-024', 'pattern-024.png' ),
	array( 'pattern-026', 'pattern-026.png' ),
	array( 'pattern-027', 'pattern-027.png' ),
	array( 'pattern-029', 'pattern-029.png' ),
	array( 'lines-60', 'lines-60.png' ),
	array( 'arabesque', 'arabesque.png' ),
	array( 'black-felt', 'black-felt.png' ),
	array( 'black-linen', 'black-linen.png' ),
	array( 'black-thread-light', 'black-thread-light.png' ),
	array( 'bright-squares', 'bright-squares.png' ),
	array( 'brushed-alum-dark', 'brushed-alum-dark.png' ),
	array( 'cartographer', 'cartographer.png' ),
	array( 'checkered-pattern', 'checkered-pattern.png' ),
	array( 'climpek', 'climpek.png' ),
	array( 'corrugation', 'corrugation.png' ),
	array( 'cubes', 'cubes.png' ),
	array( 'dark-denim', 'dark-denim.png' ),
	array( 'dark-matter', 'dark-matter.png' ),
	array( ' dark-mosaic', ' dark-mosaic.png' ),
	array( 'diagmonds-light', 'diagmonds-light.png' ),
	array( 'diagonal-striped-brick', 'diagonal-striped-brick.png' ),
	array( 'dimension', 'dimension.png' ),
	array( 'gplay', 'gplay.png' ),
	array( 'graphy-dark', 'graphy-dark.png' ),
	array( 'graphy', 'graphy.png' ),
	array( 'light-wool', 'light-wool.png' ),
	array( ' low-contrast-linen', ' low-contrast-linen.png' ),
	array( '09 purty-wood', '09 purty-wood.png' ),
	array( 'random-grey-variations', 'random-grey-variations.png' ),
	array( 'retina-wood', 'retina-wood.png' ),
	array( 'rough-cloth-light', 'rough-cloth-light.png' ),
	array( 'simple-dashed', 'simple-dashed.png' ),
	array( 'stressed-linen', 'stressed-linen.png' ),
	array( 'transparent-square-tiles', 'transparent-square-tiles.png' ),
	array( 'woven-light', 'woven-light.png' )
);

foreach ( $backgrounds as $back ) {
	// var_dump( $back );
?>	

	<section class="background <?php echo $back[ 0 ] ;?>">
	<h2>background = <?php echo $back[ 0 ] ;?></h2>
	<?php foreach ( $colors as $color ) {
?>
		<section class="col-3 <?php echo $color[ 0 ] ;?>">
			<div class="column <?php echo $back[ 0 ] ;?> <?php echo $color[ 0 ] ;?>-20">
				<span class="icon icon-home"></span>
				<h6>couleur = <?php echo $color[ 0 ] ;?> opacité 20%</h6>
				<p>----------------------------------------</p>
				<p>bg = <?php echo $back[ 0 ] ;?></p>
			</div>
			<div class="column <?php echo $back[ 0 ] ;?> <?php echo $color[ 0 ] ;?>-60">
				<span class="icon icon-home"></span>
				<h6>couleur = <?php echo $color[ 0 ] ;?> opacité 60%</h6>
				<p>----------------------------------------</p>
				<p>bg = <?php echo $back[ 0 ] ;?></p>
			</div>
			<div class="column <?php echo $back[ 0 ] ;?> <?php echo $color[ 0 ] ;?>-100">
				<span class="icon icon-home"></span>
				<h6>couleur = <?php echo $color[ 0 ] ;?> opacité 100%</h6>
				<p>----------------------------------------</p>
				<p>bg = <?php echo $back[ 0 ] ;?></p>
			</div>
		</section>
		<?php
		}
		?>
	</section>
	<hr />
	<?php
	}
	?>

<?php get_footer(); // Loads the footer.php template. ?>