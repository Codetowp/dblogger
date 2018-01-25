<?php
/**
 * The template for displaying all single posts..
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dblogger
 */

get_header(); ?>
	<!-- Banner -->
	<div id="single-banner" style="background-image: url(<?php echo the_post_thumbnail_url('dblogger_single_article'); ?>);">
		<div class="content wow fadeInUp">
			<div class="container">
				<!--breadcrumb-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><?php the_breadcrumb(); ?></li>
				</ol>
				<?php the_title( '<h1>', '</h1>' ); ?>
				<header class="entry-header">
					<span class="date-article">
						<?php dblogger_days_ago(); dblogger_category_list(); ?> 
					</span>
				</header>
			</div>
		</div>
	</div>
	<?php while ( have_posts() ) : the_post();
		// Content goes here
		get_template_part( 'template-parts/content', 'single' );
		
	?>		
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