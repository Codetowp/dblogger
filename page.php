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
 */

get_header(); ?>

<!-- banner Page
    ==========================================-->
<section id="theme-banner" style="background-image: url(<?php the_post_thumbnail_url('dblogger_single_article'); ?>);">
	<div class="content wow fadeInUp">
		<div class="container text-center"> 
			<h1><?php the_title(); ?></h1>
			<header class="entry-header">
				<?php dblogger_days_ago(); ?><?php dblogger_category_list(); ?>
			</header>
		</div>
	</div>
</section>

<section id="theme-details">
	<div class="container">
		<div class="row wow fadeInUp">
			<div class="col-md-10 col-md-offset-1">
				<?php if(have_posts()): while ( have_posts() ) : the_post(); ?>
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
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
