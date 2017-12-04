<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dblogger
 */

?>

<!-- banner Page
    ==========================================-->
<div id="single-banner" style="background-image: url(<?php echo esc_url(the_post_thumbnail_url('dblogger_single_article')); ?>);">
	<div class="content wow fadeInUp">
		<div class="container">
			<!--breadcrumb-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><?php the_breadcrumb(); ?></li>
			</ol>
			<!--/breadcrumb-->
			<h1><?php the_title(); ?></h1>
			<header class="entry-header">
				<span class="date-article">
					<?php dblogger_days_ago(); ?><?php dblogger_entry_footer(); ?> 
				</span>
			</header>
		</div>
	</div>
</div>

<div id="Blog-home">
	<div class="container">
		<div class="row wow fadeInUp">			
			<div class="col-md-8 col-sm-8">
				<article class="single-post">	
					<?php //if( get_theme_mod( 'dblogger_blogpage_disable' ) == 1 ) { ?>
						<ul class="single-post-share-ico">
							<li><a data-original-title="Facebook"  data-placement="left" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="<?php esc_html('Share this post on Facebook!', 'dblogger')?>"><i class="fa fa-facebook"></i></a> </li>
							<li><a data-original-title="Twitter" data-placement="left" target="_blank" href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>: <?php the_permalink(); ?>" title="<?php esc_html('Share this post on Twitter!', 'dblogger')?>"><i class="fa fa-twitter"></i></a> </li>
							<li><a data-original-title="Dribbble"  data-placement="left" target="_blank" href="https://dribbble.com?url=<?php the_permalink(); ?>&title=<?php urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&source=Dribbble" title="<?php esc_html('Share this post on Dribbble!', 'dblogger')?>"><i class="fa fa-dribbble"></i></a> </li>
							<li><a data-original-title="linkedin"  data-placement="left" target="_blank" href="https://www.linkedin.com/?hl=en?url=<?php the_permalink();?>&description=<?php the_title();?> on <?php bloginfo('name'); ?> <?php echo esc_url( site_url() );?>" class="pin-it-button" count-layout="horizontal" title="<?php esc_html('Share on linkedin','dblogger') ?>"><i class="fa fa-linkedin"></i></a> </li>
						</ul>
					<?php//}?>
					<?php echo the_content();?>
					<!--Tags-->
					<?php
						$categories = get_the_tags();
						if( $categories !='' ){
					?>		
					<footer class="entry-footer entry-meta-bar">
						<div class="entry-meta"><i class="fa fa-tags"></i> 
							<span class="tag-links clearfix"> 
								<?php
									foreach ( $categories as $category ) {
										echo '<a rel="tag" href="' . esc_html( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
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
			<div class="clearfix"></div>
			<div id="comments" class="comments-area text-left">
				<?php comments_template(); ?>
			</div>
			
			</div>