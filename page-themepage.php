<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 * Template Name: Theme Page
 */

get_header(); ?>



<!-- banner Page
    ==========================================-->
<?php
          if(have_posts()):
			while ( have_posts() ) : the_post();

?>  
<section id="theme-banner" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>);">
  <div class="content wow fdeInUp">
    <div class="container text-center"> 
      <!--breadcrumb-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><?php the_breadcrumb(); ?></li>
        <!--<li class="breadcrumb-item active">Themes</li>-->
      </ol>
      <!--/breadcrumb-->
      <h1><?php the_title(); ?>  </h1>
      <header class="entry-header"><a href="#"> </a><span class="date-article"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span><!-- in <span class="byline"><span class="author vcard"><a href="#">WORDPRESS</a> ,<a href="#"> BLOG</a></span></span>--> </header>
    </div>
  </div>
</section>

<?php endwhile;endif;?>

<section id="theme-details">
  <div class="container">
    <div class="row wow fdeInUp">
      <div class="col-md-8 col-md-offset-2">
          <?php
          if(have_posts()):
			while ( have_posts() ) : the_post();

          ?>
        <?php the_content();?>
        
       <?php endwhile;endif;?>
      
        
       
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
