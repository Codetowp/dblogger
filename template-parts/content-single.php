<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 */

?>
<div id="Blog-home">
	<div class="container">
		<div class="row">			
			<div class="col-md-8 col-sm-8 wow fadeInUp">
				<article class="single-post">
					<?php the_content();?>					
					<footer class="entry-footer entry-meta-bar">
						<div class="entry-meta"><i class="fa fa-tags"></i> 
							<?php dblogger_footer_tag(); ?>
						</div>
					</footer>
					<?php if ( get_edit_post_link() ) : ?>
						<?php
							edit_post_link(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Edit <span class="screen-reader-text">%s</span>', 'dblogger' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					<?php endif; ?>
				</article>
				<div class="clearfix"></div>
				<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
				<!--author box-->
				<div class="author-box wow fadeInLeft">
					<?php echo get_avatar( get_the_author_meta('ID'), '100', '' ); ?>
					<div class="author-box-title"><?php echo esc_html(get_the_author_meta('first_name')) . " " . esc_html(get_the_author_meta('last_name'));//esc_html_e('By', 'dblogger'); ?><?php the_author_posts_link(); ?></div>
					<div class="author-description">
						<?php the_author_meta('description'); ?>						
					</div>
					<?php if(get_the_author_meta('url')) { ?><div class="author_social"><a href="<?php echo esc_url( get_the_author_meta('url') ); ?>"><i class="fa fa-globe"></i></a></div><?php } ?>
				</div>

				<div class="clearfix"></div>
				<?php the_post_navigation(); ?>

				<div class="clearfix"></div>
				
				<!-- Related Posts-->
				<div class="also-like-block wow bounceIn">
					<h4><?php esc_html_e('YOU MAY ALSO LIKE', 'dblogger'); ?></h4>
					<?php dblogger_related_post(); ?>
				</div>						
				
				<!--Comments-->
				<div class="clearfix"></div>
				<div id="comments" class="comments-area text-left wow fadeInUp">
					<?php comments_template(); ?>
				</div>
			
			</div>