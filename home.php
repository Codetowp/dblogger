<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 */
get_header(); ?>
<section id="Blog-home">
	<div class="container">
		<div class="row"> 
			<!--blog posts-->
			<div class="col-md-8 col-sm-8" style="padding-left:0; padding-right:0;"> 
				<?php if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
				
					get_template_part( 'template-parts/content', get_post_format() );
					
				endwhile; ?>
				<div class="clearfix"></div>
				<nav class="navigation posts-navigation"  role="navigation">
					<ul>
						<li>  
							<?php 	
							the_posts_pagination( array(
							'mid_size' => 3,
							'prev_text' => '<i class="fa fa-chevron-left"></i> ' . __( 'Newer posts', 'dblogger' ),
							'next_text' => __( 'Older posts', 'dblogger' ) . ' <i class="fa fa-chevron-right"></i>' ,
							) );
							?>
						</li>  
					</ul>
				</nav>
				<?php else :
				
					get_template_part( 'template-parts/content', 'none' );
					
				endif; ?>
			</div>
			<!--blog posts--> 
			<!--Sidebar-->
			<aside class="col-md-4 col-sm-4"> 
				<?php get_sidebar(); ?> 
			</aside>
			<!--Sidebar ends-->
			<div class="clearfix"></div>
		</div>
	</div>
</section>
<?php get_footer();?>
