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
 * Template Name: blog
 */

get_header(); ?>

<section id="Blog-home">
  <div class="container">
    <div class="row"> 
      <!--blog posts container-->
      <div class="col-md-9 col-sm-8 " style="padding-left:0; padding-right:0;" > 
        
        <?php 
        
              $query_post = new WP_Query( array( 'post_type' => 'post',  ) );
       
    
    
        if ($query_post->have_posts()) :
          while ($query_post->have_posts()) : $query_post->the_post();	
             
          
                    get_template_part( 'template-parts/content', get_post_format() );
          
             endwhile; ?>
        <!--/article grid--> 
        
		<?php endif; ?>
        
        <div class="clearfix"></div>
        <nav class="navigation posts-navigation"  role="navigation">
          <ul>
            
       <?php 	
		the_posts_pagination( array(
	        'prev_text' => '<i class="fa fa-chevron-left"></i> ' . __( 'Newer posts', 'dblogger' ),
	        'next_text' => __( 'Older posts', 'dblogger' ) . ' <i class="fa fa-chevron-right"></i>' ,
	    ) );
		?>
              
		<?php wp_reset_postdata(); ?>
          </ul>
        </nav>
      </div>
      <!--blog posts container--> 
      
      <!--aside-->
      <aside class="col-md-3 col-sm-4" > 
        
          <?php get_sidebar(); ?> 
        
        
        
      </aside>
      <!--aside-->
      
      <div class="clearfix"></div>

    </div>
  </div>
</section>
<?php get_footer();?>