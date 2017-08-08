<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package dblogger
 */

get_header(); ?>
<section id="Blog-home">
  <div class="container">
    <div class="row"> 
      <!--blog posts container-->
      <div class="col-md-9 col-sm-8 " style="padding-left:0; padding-right:0;" > 

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'dblogger' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->

			<?php
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
      <aside class="col-md-3 col-sm-4" > 
        
        <!--Search-->
        <section class="widget widget_search">
           <?php get_search_form();?>
        </section>
        <!--/Search--> 
        
             <?php get_sidebar(); ?> 
      
        <!--Meta  end--> 
        
      </aside>
      <!--aside-->
      </div>
    </div>
</section>

<?php

get_footer();
