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
					<!-- Tags List-->
					<?php
						$categories = get_the_tags();
						if( $categories !='' ){
					?>		
					<footer class="entry-footer entry-meta-bar">
						<div class="entry-meta"><i class="fa fa-tags"></i> 
							<span class="tag-links clearfix"> 
								<?php
									foreach ( $categories as $category ) {
										echo '<a rel="tag" href="' . get_category_link( $category->term_id ) . '">' .  $category->name . '</a> ';
									}
								?>
							</span> 
						</div>
					</footer>
					<?php } ?>
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
					<div class="author-box-title"><?php esc_html_e('By', 'dblogger'); ?><?php the_author_posts_link(); ?></div>
					<div class="author-description">
						<?php the_author_meta('description'); ?>						
					</div>
					<div class="author_social"><a href="<?php echo esc_url( get_the_author_meta('url') ); ?>"><i class="fa fa-globe"></i></a></div>
				</div>

				<div class="clearfix"></div>
				<?php the_post_navigation(); ?>

				<div class="clearfix"></div>
				
				<!-- Related Posts-->
				<div class="also-like-block wow bounceIn">
					<h4><?php echo esc_html_e('YOU MAY ALSO LIKE', 'dblogger'); ?></h4>
					<?php dblogger_related_post(); ?>
				</div>						
				
				<!--Comments-->
				<div class="clearfix"></div>
				<div id="comments" class="comments-area text-left wow fadeInUp">
					<?php comments_template(); ?>
				</div>
			
			</div>