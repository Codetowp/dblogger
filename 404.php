<?php
	/**
	 * The template for displaying 404 pages (not found)
	 *
	 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
	 *
	 * @package dblogger
	 */
get_header(); ?>

<section id="page-banner" style="background-image: url( <?php header_image() ?> );">
    <div class="overlay-banner">
        <div class="content">
            <div class="container">
                <!--breadcrumb-->
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dblogger' ); ?></h1>
                </header><!-- .page-header -->
                <!--/breadcrumb-->
                <h1><?php the_title(); ?> </h1>
            </div>
        </div>
    </div>
</section>

<section id="Blog-home">
	<div class="container">
		<div class="row">
			<section class="error-404 not-found">
				<div class="page-content">
					<p>
						<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dblogger' );?> 
                  	</p>
					<?php get_search_form();?>
              	</div>
				<!-- .page-content -->
			</section>
			<!-- .error-404 -->
		</div>
	</div>
</section>

<?php
get_footer();
