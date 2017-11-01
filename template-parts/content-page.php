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
<section id="theme-banner" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url('full') ); ?>);">
	<div class="content wow fadeInUp">
		<div class="container text-center">
			<!--breadcrumb-->
			<?php the_breadcrumb(); ?>
			<!--/breadcrumb-->
			<h1><?php the_title(); ?></h1>
			<!--<header class="entry-header"><a href="#"> </a><span class="date-article">
			<?php dblogger_posted_on(); ?></span> in <span class="byline"><span class="author vcard"><a href="#">WORDPRESS</a> ,<a href="#"> BLOG</a></span></span> </header>-->
		</div>
	</div>
</section>

<section id="theme-details">
	<div class="container">
		<div class="row wow fadeInUp">
			<div class="col-md-12">			
				<?php the_content(); ?>
				<?php if ( get_edit_post_link() ) : ?>
					<div class="entry-footer">
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
					</div><!-- .entry-footer -->
				<?php endif; ?>
			</div>
		</div>		
	</div>
</section>