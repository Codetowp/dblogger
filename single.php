<?php
/**
 * The template for displaying all single posts..
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dblogger
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/content', 'single' ); ?>	
		</div>
			<div class="clearfix"></div>
			
			<!--author box-->
			<div class="author-box">
				<?php echo get_avatar( get_the_author_meta('user_email'), '100', '' ); ?>
				<div class="author-box-title"><?php echo esc_html_e('By', 'dblogger'); ?><?php esc_url(the_author_posts_link()); ?></a></div>
				<div class="author-description"><?php the_author_meta('description'); ?></div>
				<div class="author_social"><a href="<?php echo esc_url( get_the_author_meta('url') ); ?>"><i class="fa fa-globe"></i></a></div>
			</div>

			<div class="clearfix"></div>
			<?php the_post_navigation(); ?>

			<div class="clearfix"></div>
			
			<!-- Related Posts-->
			<div class="also-like-block">
				<h4><?php echo esc_html_e('YOU MAY ALSO LIKE', 'dblogger'); ?></h4>
				<?php dblogger_related_post(); ?>
			</div>						
			
			<!--Comments-->
			<div id="comments" class="comments-area text-left">
				<?php comments_template(); ?>
			</div>
			
			</div>
			
			<!--Sidebar-->
			<aside class="col-md-4 col-sm-4">
				<?php get_sidebar(); ?> 
			</aside>
			
			<div class="clearfix"></div>
			
		</div> <!--Row ends-->
		
	</div><!--Container ends-->
	
</div><!--Blog home ends-->

<?php endwhile; ?>
<?php
get_footer();
