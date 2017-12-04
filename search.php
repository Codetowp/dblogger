<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package dblogger
 */

get_header(); ?>

<section id="page-banner" style="background-image: url(<?php header_image() ?>);">
	<div class="overlay-banner">
		<div class="content">
		  <div class="container"> 
			<header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'dblogger' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->
		  </div>
		</div>
	</div>
</section>

<section id="Blog-home">
	<div class="container">
		<div class="row"> 
			<!--blog posts container-->
			<div class="col-md-8 col-sm-8" style="padding-left:0; padding-right:0;"> 

				<?php
				if ( have_posts() ) : 
				  
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</div>        
        
			<!--aside-->
			<aside class="col-md-4 col-sm-4"> 
        
				<?php get_sidebar(); ?>  
        
			</aside>
			
		</div>
    </div>
</section>

<?php
get_footer();
