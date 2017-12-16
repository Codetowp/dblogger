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
			the_post_thumbnail('dblogger_homepage'); 
		} else {
			$single_img = get_template_directory_uri().'/assets/img/default.jpg';
		?>
			<img src="<?php echo esc_url( $single_img );?>" alt="" class="img-responsive">
		<?php }?>
	</a>
	<header class="entry-header">
		<a href="<?php the_permalink();?>">
			<h5><?php the_title();?></h5>
		</a> 
		<span class="date-article"><?php dblogger_days_ago(); ?><?php dblogger_entry_footer(); ?></span>
	</header>
	<p><?php the_excerpt(); ?></p>
</article>
<!--/blog post--> 