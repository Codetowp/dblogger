<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dblogger
 */

get_header(); ?>

<!-- banner Page
    ==========================================-->

<?php
          if(have_posts()):		  
			while ( have_posts() ) : the_post();
?>

<div id="single-banner" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>);">
     <div class="content wow fdeInUp">
      <div class="container "> 
        <!--breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><?php the_breadcrumb(); ?></li>
        </ol>
        <!--/breadcrumb-->
        <h1><?php the_title(); ?> </h1>
        <header class="entry-header"><a href="#"> </a><span class="date-article"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span> <!--in <span class="byline"><span class="author vcard"><a href="#">WORDPRESS</a> ,<a href="#"> BLOG</a></span></span>--> </header>
      </div>
    </div>
</div>

<?php endwhile;endif;?>

<div id="Blog-home">
  <div class="container">
    <div class="row wow fdeInUp"> 
      <!--blog posts container-->
      <div class="col-md-8 col-sm-8 single-post">
          
          
        <?php if(have_posts() ) : while(have_posts() ) : the_post();
          
          if( get_theme_mod( 'dblogger_blogpage_disable' ) == 1 ) { 
          
          ?>
          
          
        <ul class="single-post-share-ico">
          <li><a data-original-title="Facebook"  data-placement="left" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="<?php _e('Share this post on Facebook!', 'cryst4l')?>"><i class="fa fa-facebook"></i></a> </li>
          <li><a data-original-title="Twitter" data-placement="left" target="_blank" href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>: <?php the_permalink(); ?>" title="<?php _e('Share this post on Twitter!', 'cryst4l')?>"><i class="fa fa-twitter"></i></a> </li>
          <li><a data-original-title="Dribbble"  data-placement="left" target="_blank" href="https://dribbble.com?url=<?php the_permalink(); ?>&title=<?php urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&source=Dribbble" title="<?php _e('Share this post on Dribbble!', 'cryst4l')?>"><i class="fa fa-dribbble"></i></a> </li>
          <li><a data-original-title="linkedin"  data-placement="left" target="_blank" href="https://www.linkedin.com/?hl=en?url=<?php the_permalink();?>&description=<?php the_title();?> on <?php bloginfo('name'); ?> <?php echo site_url()?>" class="pin-it-button" count-layout="horizontal" title="<?php _e('Share on linkedin','cryst4l') ?>"><i class="fa fa-linkedin"></i></a> </li>
        </ul>
          <?php }?>
          
        <?php echo the_content();?>
       
        
        <!--footer tags-->
        
        <footer class="entry-footer entry-meta-bar">
          <div class="entry-meta"> <i class="fa fa-tags"></i> 
              <span class="tag-links clearfix"> 
                  
                  
           <?php
               $args = array(
                    'orderby' => 'name',
                    'parent' => 0
                    );
              $categories = get_categories( $args );
              if($categories!='')
              {
              foreach ( $categories as $category ) {
                echo '<a rel="tag" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a> ';
              }
              }
             /* else
              {
              ?>
                  <a href="#" rel="tag">wordpress</a> 
                  <a href="#" rel="tag">themes</a> 
                 <?php }*/?>
              </span> 
            </div>
        </footer>
        <!--/footer tags-->
         <?php endwhile;endif;?>
        <div class="clearfix"></div>
        
        <!--author box-->
        <div class="author-box"><?php echo get_avatar( get_the_author_meta('user_email'), '100', '' ); ?> <!--<img alt="" src="img/a-1.jpg"  class="avatar " height="100" width="100">-->
          <div class="author-box-title"> Authored By <a href="#" rel="author"><?php the_author_link(); ?> </a> </div>
          <div class="author-description"><?php the_author_meta('description'); ?></div>
          <div class="author_social"> </div>
        </div>
        <!--/author box-->
        
        <div class="clearfix"></div>
        
        <!--posts navigation-->
        <nav class="navigation posts-navigation"  role="navigation">
            
          <?php  //the_post_navigation(); ?>
            
         <!-- <ul>
            <li class="pull-left">
              <div class="nav-previous"><a href="http://localhost/wordpress/page/2/"><i class="fa fa-chevron-left"></i> Previous post</a></div>
            </li>
            <li class="pull-right">
              <div class="nav-next"><a href="http://localhost/wordpress/page/2/">Next post <i class="fa fa-chevron-right"></i></a></div>
            </li>
          </ul>-->
        </nav>
        <!--/posts navigation-->
        
        <div class="clearfix"></div>
        <!--Also like-->
        <div class="also-like-block">
          <h4>YOU MAY ALSO LIKE</h4>
            
              <?php dblogger_related_post(); ?>
            
        </div>
        <!--/Also like-->
        
        <div class="clearfix"></div>
        <!--comment-->
        
        <div id="comments" class="comments-area text-left">
             <?php comments_template();?>
        </div>
        <!--/comment--> 
        
      </div>
      <!--blog posts container--> 
      
      <!--aside-->
      <aside class="col-md-4 col-sm-4" > 
       
           <?php get_sidebar(); ?> 
        
      </aside>
      <!--aside-->
      
      <div class="clearfix"></div>
    </div>
  </div>
</div>


<?php
//get_sidebar();
get_footer();
