<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dblogger
 */

?>
<footer id="bottom-footer">
	<div class="container">
		<div class="row">
			<!-- Copyright -->
			<div class="col-md-4 wow fadeInLeft">
				<p class="copyright">&#169; <?php echo bloginfo('name'); ?>. <?php esc_html_e('All rights reserved', 'dblogger'); ?>.</p>
			</div>
			<!-- Footer Navigation Menu -->
			<div class="col-md-4 wow zoomIn">
				<nav class="bottom-nav">
					<ul>
						<?php
						wp_nav_menu( array(
								'theme_location'    => 'footer-menu',
								'menu_class'        => 'bottom-nav',
							)
						);
						?>
					</ul>
				</nav>
			</div>
			<!-- Theme Author Link -->
			<div class="col-md-4 wow fadeInRight">				
				<p class="powered-by">
					<?php printf( /* translators: 1: Heart icon, 2: Website. */
							esc_html__( 'Made with %1$s by %2$s', 'dblogger' ) , 
							'<i class="fa fa-heart"></i>', 
							'<a href="https://dcrazed.net/" target="_blank">Designscrazed</a>'
						);
					?>
				</p>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>