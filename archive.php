<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 */

get_header(); ?>

<!-- banner Page
==========================================-->

<section id="page-banner" style="background-image: url( <?php header_image() ?> );">
	<div class="overlay-banner">
		<div class="content">
			<div class="container">

				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<!--<h1>Category:Wordpress</h1>-->
			</div>
		</div>
	</div>
</section>

<!--blog body-->

<section id="Blog-home">
	<div class="container">
		<div class="row"> 
			<!--blog posts container-->
			<div class="col-md-9 col-sm-8 " style="padding-left:0; padding-right:0;" > 

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
			?>

					<!--blog post-->
					<?php get_template_part( 'template-parts/content', get_post_format() );?>
				
					<!--/blog post--> 

			<?php
				endwhile;
			endif;?>

				<div class="clearfix"></div>
				<nav class="navigation posts-navigation"  role="navigation">
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
							<?php wp_reset_postdata(); ?>
						</li>   

					</ul>
				</nav>
			</div>
			<!--blog posts container--> 
			<!--aside-->
			<aside class="col-md-3 col-sm-4" > 
				<?php get_sidebar(); ?> 
			</aside>
			<!--aside-->
		</div>
	</div>
</section>
<?php
get_sidebar();
get_footer();
