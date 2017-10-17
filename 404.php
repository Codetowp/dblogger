<?php
	/**
	 * The template for displaying 404 pages (not found)
	 *
	 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
	 *
	 * @package dblogger
	 */
get_header(); ?>
<?php
$background_img   = get_theme_mod( 'dblogger_custom_img' );
$background_img_static   = get_template_directory_uri() . '/img/b-1.jpg';
$image = $background_img ? "$background_img" : "$background_img_static";
?>
<section id="page-banner" style="background-image: url( <?php echo esc_url( $image ); ?> );">
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
