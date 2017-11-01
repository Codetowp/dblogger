<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<?php get_header(); ?>
<section id="Blog-home">
	<div class="container">
		<div class="row">
			<div id="main-content" class="container">
				<div class="content">
				<?php
				if ( ! have_posts() ) :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
				<?php while ( have_posts() ) : the_post();?>
					<article <?php post_class( 'post-listing' ); ?>>
						<div class="post-inner">
							<h1 class="name post-title entry-title" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing"><span itemprop="name"><?php the_title(); ?></span></h1>
							<div class="entry">
								<?php the_content(); ?>
							</div><!-- .entry /-->
						</div><!-- .post-inner -->
					</article><!-- .post-listing -->
				<?php endwhile;?>
				</div><!-- .content -->
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>
