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
<Section id="page-banner" style="background-image: url(<?php echo get_template_directory_uri();?>/img/b-1.jpg);">
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
</Section>

<!--blog body-->

<section id="Blog-home">
  <div class="container">
    <div class="row"> 
      <!--blog posts container-->
      <div class="col-md-9 col-sm-8 " style="padding-left:0; padding-right:0;" > 
        
         <?php
          if(have_posts()):
          
			while ( have_posts() ) : the_post();

         if(get_post_thumbnail_id(get_the_id()) !='')
        {
            $single_post= wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); 
        }
        else
        {
            $single_post=get_template_directory_uri()."/img/p-2.jpeg";
        }
?>
          
        <!--blog post-->
        <article class="col-md-6 eq-blocks"> <a href="<?php the_permalink();?>"><img src="<?php echo $single_post;?>" class="img-responsive"></a>
          <header class="entry-header"><a href="<?php the_permalink();?>">
            <h5><?php the_title(); ?></h5>
            </a> <span class="date-article"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span> <!--in <span class="byline"><span class="author vcard"><a href="#">Wordpress . Blog</a></span></span>--> </header>
          <p><?php echo the_excerpt();?></p>
        </article>
        <!--/blog post--> 

<?php endwhile;endif;?>        
   
        <div class="clearfix"></div>
        <nav class="navigation posts-navigation"  role="navigation">
          <ul>
              
              
          <?php 	
		the_posts_pagination( array(
	        'prev_text' => '<i class="pull-left"></i> ' . __( 'Newer posts', 'dblogger' ),
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
get_sidebar();
get_footer();
