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
		<div class="row wow fadeInUp">
			<div class="col-md-4">
				<!--copyright-->
				<p class="copyright">© 2017 Digital Blogger. All rights reserved</p>
				<!--/copyright--> 
			</div>
			<!--bottom nav-->
			<div class="col-md-4">
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
		<!--/bottom nav-->
		<!--powered by-->
		<div class="col-md-4">
		<!--copyright-->
		<p class="powered-by">Made with <i class="fa fa-heart"></i> by <a href="#">Dcrazed</a></p>
		</div>
		<!--/powered by--> 
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
<script>
	new WOW().init();
</script>

</body>
</html>
