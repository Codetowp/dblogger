<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dblogger
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<div class="row flex-dblogger-logo"> 
				<div class="col-md-4"> 
					<?php
					$custom_logo = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo , 'full' );
					if ( has_custom_logo() ) {
						echo '<a class="navbar-brand" href="' . esc_url( home_url( '/' ) ) . '"><img src="' . esc_url( $logo[0] ) . '"></a>';
					}
					else{
						echo '<a class="navbar-brand" href="'.esc_url( home_url( '/' ) ).'"><h3>'. esc_html( get_bloginfo( 'name' ) ) .'</h3></a>';
					}				
					?>
				</div>
				
			</div>
		</div>
	</header>
	<!-- // Navigation -->
	<nav id="top-menu" class="navbar navbar-default navbar-fixed-top">
		<div class="container"> 
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only"><?php esc_html_e('Toggle navigation' , 'dblogger'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
					<?php
						wp_nav_menu( array( 
						'theme_location'    => 'header-menu', 
						'menu_class'        => 'nav navbar-nav navbar-left' ) );
					?>
				<?php else : ?>
					<ul class="nav navbar-nav navbar-left"><li class="menu-item"><a href="<?php echo esc_url(admin_url( 'nav-menus.php' ));?>"><?php esc_html_e( 'Add a Primary Menu', 'dblogger' );?></a></li></ul>
				<?php endif; ?>
				<ul class="navbar-right social-links-top">
					<?php
					if ( $socials = get_theme_mod( 'dblogger_social_links' ) ) 
					{
						$socials = $socials ? array_filter( $socials ) : array();
						foreach ( $socials as $social => $name ) 
						{
						printf(' <li> <a href="%s" ><i class="fa fa-%s"></i></a></li>', esc_url( $name ), esc_html($social) );
						}
					}?>
					<li> <!--search form-->
						<?php get_search_form(); ?>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse --> 
		</div>
	<!-- /.container-fluid --> 
	</nav>