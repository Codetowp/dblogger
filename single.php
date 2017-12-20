<?php
/**
 * The template for displaying all single posts..
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dblogger
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/content', 'single' ); ?>		
			<!--Sidebar-->
			<aside class="col-md-4 col-sm-4">
				<?php get_sidebar(); ?> 
			</aside>
			
			<div class="clearfix"></div>
			
		</div> <!--Row ends-->
		
	</div><!--Container ends-->
	
</div><!--Blog home ends-->

<?php endwhile; ?>
<?php
get_footer();
