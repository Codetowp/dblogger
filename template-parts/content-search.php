<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 */

?>
<!--blog post-->
<article class="col-md-6 eq-blocks">
	<a href="<?php the_permalink();?>">
		<?php
		if  ( get_the_post_thumbnail()!=''){
			the_post_thumbnail('dblogger_theme'); 
		} else {
			$single_img = get_template_directory_uri().'/img/default.jpg';
		?>
			<img src="<?php echo esc_url( $single_img );?>" alt="" class="img-responsive">
		<?php }?>
	</a>
	<header class="entry-header">
		<a href="<?php the_permalink();?>">
			<h5><?php the_title();?></h5>
		</a> 
		<span class="date-article"><?php dblogger_posted_on();?></span>
	</header>
	<p><?php echo the_excerpt();?></p>
</article>
<!--/blog post--> 
