<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 */

get_header(); ?>

<!-- Banner with title -->
<section id="page-banner" style="background-image: url( <?php header_image(); ?> );">
	<div class="overlay-banner">
		<div class="content">
			<div class="container">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div>
		</div>
	</div>
</section>
<!-- Post Loop -->
<section id="Blog-home">
	<div class="container">
		<div class="row"> 			
			<div class="col-md-8 col-sm-8" style="padding-left:0; padding-right:0;" > 
				<?php if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
					
				endwhile;
				?>
				<div class="clearfix"></div>
				<nav class="navigation posts-navigation" role="navigation">
					<ul>
						<li>
							<?php
							the_posts_pagination(
								array(
									'prev_text' => '<i class="fa fa-chevron-left"></i>' . __( 'Newer posts', 'dblogger' ),
									'next_text' => __( 'Older posts', 'dblogger' ) . '<i class="fa fa-chevron-right"></i>',
								)
							);
							?>							
						</li>   

					</ul>
				</nav>
				<?php else :
				
					get_template_part( 'template-parts/content', 'none' );
					
				endif; ?>

			</div>
			<!--blog posts container--> 
			<!--aside-->
			<aside class="col-md-4 col-sm-4"> 
				<?php get_sidebar(); ?> 
			</aside>
			<!--aside-->
		</div>
	</div>
</section>
<?php
get_sidebar();
get_footer();
