<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package claroads
 */


$facebook = get_field('footer_facbook', 'option');
$footer_copy = get_field('footer_copy', 'option');
$footer_text = get_field('footer_text', 'option');

?>
<!-- </main> -->
<footer class="footer" id="footercontact">
	<div class="fblueline"></div>
	<div class="container-ca">
		<div class="row">
			<div class="col-lg-6">
				<div class="footer__text">
					<?php echo $footer_text; ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="footer__nav">
					<?php
						if( has_nav_menu( 'footer_menu' ) ) {
							wp_nav_menu(array(
								'menu' => 'footer_menu',
								'theme_location' => 'footer_menu',
								'container' => 'ul',
							));
						}						
					?>
					<!-- <ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Order</a></li>
						<li><a href="#">Traffic Statistics</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
					</ul> -->
					<?php if( $facebook ): ?>
						<a href="<?php echo $facebook; ?>" class="footer__fb">FACEBOOK</a>
						
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<p class="reservedtext"><?php echo $footer_copy; ?></p>
	</div>
</footer>	
<?php wp_footer(); ?>

</body>
</html>
