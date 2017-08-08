<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 */

?>
 <!--blog post-->
      <article class="col-md-6">
          <a href="<?php the_permalink();?>">
               <?php
            if  ( get_the_post_thumbnail()!='')
            {
             the_post_thumbnail('dblogger_recent_post'); 
            }else{?>
            <img src="<?php echo get_template_directory_uri()?>/img/p-2.jpg" alt="" class="img-responsive">
            <?php }?>
          </a>
        <header class="entry-header"><a href="<?php the_permalink();?>">
          <h5><?php the_title();?></h5>
          </a> <span class="date-article"><?php get_option('d F Y');?></span><!-- in <span class="byline"><span class="author vcard"><a href="#">Wordpress . Blog</a></span></span> --></header>
        <p> <?php echo the_excerpt();?></p>
      </article>
      <!--/blog post--> 