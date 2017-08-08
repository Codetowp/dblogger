<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 */

?>
<?php

         if(get_post_thumbnail_id(get_the_id()) !='')
        {
            $single_post= wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); 
        }
        else
        {
            $single_post=get_template_directory_uri()."/img/t-1.jpg";
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
