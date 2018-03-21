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
<article class="col-md-6 eq-blocks wow fadeInUp">
	<a href="<?php the_permalink();?>">
		<?php
		if  ( get_the_post_thumbnail()!=''){
			the_post_thumbnail('dblogger_homepage_article'); 
		} else {
			$single_img = get_template_directory_uri().'/assets/img/default.jpg';
		?>
		<img src="<?php echo esc_url( $single_img );?>" alt="<?php the_title_attribute(); ?>" class="img-responsive">
		<?php }?>
	</a>
	<header class="entry-header">
		<a href="<?php the_permalink();?>">
			<?php  if ( is_front_page() ) :
					the_title( '<h5>', '</h5>' );
					else :
					the_title( '<h2>', '</h2>' );
					endif; 
			?>
		</a> 
		<span class="date-article">
			<?php 	
				dblogger_days_ago(); 
				dblogger_category_list(); 
			?>
		</span>
	</header>
	<?php the_excerpt(); ?>
</article>
<!--/blog post--> 