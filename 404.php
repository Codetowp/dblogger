<?php
	/**
	 * The template for displaying 404 pages (not found)
	 *
	 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
	 *
	 * @package dblogger
	 */
get_header(); ?>
<!-- Banner -->
<section id="page-banner" style="background-image: url( <?php header_image(); ?> );">
    <div class="overlay-banner">
        <div class="content">
            <div class="container">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dblogger' ); ?></h1>
                </header>
            </div>
        </div>
    </div>
</section>
<!-- Search Form -->
<section id="Blog-home">
	<div class="container">
		<div class="row">
			<section class="error-404 not-found">
				<div class="page-content">
					<p>
						<?php esc_html_e( 'Maybe try another search?', 'dblogger' );?> 
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
