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
 * Template Name: Frontpage
 */

get_header(); ?>
<!-- // Header INTRO -->
<?php
$background_img   =  get_theme_mod( 'dblogger_back_img',  esc_url(get_template_directory_uri() . '/assets/img/b-1.jpg'));   
$disable    = get_theme_mod( 'dblogger_header_check' ) == 1 ? true : false ;
if ( dblogger_is_selective_refresh() ) {
	$disable = false;
}
if ( ! $disable) : ?>
<section id="home-banner" style="background-image: url(<?php echo esc_url( $background_img ); ?>);">
    <div class="content">
        <div class="container">
			<?php 
				$title  = get_theme_mod( 'dblogger_tagline_text', esc_html__('Section Title', 'dblogger' ));
				if ($title != '') echo '<span class="sub wow fadeInRight" data-wow-duration="1s">  ' . wp_kses_post($title) . ' </span>'; 
					$desc  = get_theme_mod( 'dblogger_header_text', esc_html__('Section Description', 'dblogger' ));
				if ($desc != '') echo '<h1 class="wow fadeInUp">' . wp_kses_post($desc) . '</h1>';
					$dblogger_button_text  = get_theme_mod( 'dblogger_button_text', esc_html__('Read More', 'dblogger') );
					$dblogger_button_url  = get_theme_mod( 'dblogger_button_url', esc_url('#') );
				if ($dblogger_button_text != '' && $dblogger_button_url != '') echo '<a href="' . esc_url($dblogger_button_url) . '" class="btn btn-default wow fadeInLeft">' . wp_kses_post($dblogger_button_text) . '</a>'; 
			?>
		</div>
    </div>
</section>
<?php endif;?>
<!-- // Category SECTION -->
<?php
$disable1 =	get_theme_mod( 'dblogger_guide_check' ) == 1 ? true : false ;
if ( dblogger_is_selective_refresh() ) {
	$disable1 = false;
}
if ( ! $disable1) : ?>
<section id="guide-block">
	<div class="section-title text-center wow fadeInUp"> 
		<?php
			$background_img   =  get_theme_mod( 'dblogger_guide_icon' );   
			$background_img_static   = get_template_directory_uri() . '/assets/img/f-fa-book.png';
			$image = $background_img ? "$background_img" : "$background_img_static"; 
		?>
		<img src="<?php echo esc_url( $image );?>" class="img-responsive" style="width:65px; margin-left:48%">
		<?php 
			$dblogger_guide_title  = get_theme_mod( 'dblogger_guide_title', esc_html__('Section Title', 'dblogger' ));
			if ($dblogger_guide_title != '') echo '<h2>  ' . esc_html($dblogger_guide_title) . ' </h2>'; 
		?>
		<?php 
			$dblogger_guide_desc  = get_theme_mod( 'dblogger_guide_desc', esc_html__('Section Description', 'dblogger' ));
			if ($dblogger_guide_desc != '') echo '<p>  ' . wp_kses_post($dblogger_guide_desc) . ' </p>'; 
		?>
	</div>
	<div class="guide-list wow fadeInUp">
		<div class="container">
			<div class="row guide-block"> 
				<div>
					<ul class="nav nav-tabs">
						<?php
							$firstClass = 'active'; 
							$values=0;
							$count = get_theme_mod( 'dblogger_post_number', 6 );
							$slidecat = get_option( 'dblogger_slide_categories' );
							$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count,'post__not_in' => get_option( 'sticky_posts' )) );
							if ($query->have_posts()) :
							while ($query->have_posts()) : $query->the_post();
							$values++;
						?>
							<li role="presentation" class="<?php echo esc_html( $firstClass ); ?>"><a href="#<?php echo esc_attr( $values );?>"  onclick="location.href='<?php the_permalink();?>'"  aria-controls="home" role="tab" data-toggle="tab"><h6><?php the_title();?></h6></a></li>
						<?php  
							$firstClass = "";
							endwhile;
							endif;
						?>
						<?php wp_reset_postdata(); ?>
					</ul>
					<div class="tab-content">
						<?php
						$firstClass = 'active' ; 
						$values=0;
						$count = get_theme_mod( 'dblogger_post_number', 6 );
						$slidecat =get_option( 'dblogger_slide_categories' );
						$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count,'post__not_in' => get_option( 'sticky_posts' )) );
						if ($query->have_posts()) :
							while ($query->have_posts()) : $query->the_post();
							$values++;
						?>
							<div role="tabpanel" class="tab-pane <?php echo esc_html( $firstClass ); ?>" id="<?php echo esc_attr( $values );?>"><?php
								if  ( get_the_post_thumbnail()!='')
								{?>
									<a href="<?php the_permalink();?>"><?php the_post_thumbnail('dblogger_homepage_article'); ?></a>
								<?php }else{
									$default_img= get_template_directory_uri() . '/assets/img/default.jpg';
								?>
									<img src="<?php echo esc_url( $default_img );?>" class="img-responsive">
								<?php } ?>
							</div>
						<?php  $firstClass = ""; 
							endwhile;
						endif;?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;?>
<!-- // Pages SECTION -->
<?php
$disable1  = get_theme_mod( 'dblogger_theme_check' ) == 1 ? true : false ;
if ( dblogger_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<section id="theme-block">
	<div class="container">
		<div class="row"> 
			<div class="section-title text-center wow fadeInUp">
				<?php 
				$dblogger_theme_title  = get_theme_mod( 'dblogger_theme_title', esc_html__('Pages', 'dblogger' ));
				?>
				<h2><?php echo esc_html($dblogger_theme_title); ?></h2>
				<?php 
					$dblogger_theme_button_text  = get_theme_mod( 'dblogger_theme_button_text', esc_html__('Read More', 'dblogger') );
					$dblogger_theme_button_url = get_theme_mod( 'dblogger_theme_button_url', esc_url('#') );
					if ($dblogger_theme_button_text != '' && $dblogger_theme_button_url != '') { 
						echo '<a class="btn btn-white" href="' . esc_url($dblogger_theme_button_url) . '" >' . esc_html($dblogger_theme_button_text) . '</a>'; 
					}
				?>     
				<hr>
			</div>
			<!-- first page -->
			<?php 
			$post_id= get_option('dblogger_first_page','0');
			
			if($post_id !== '0'):
				
			
			 $image_url= get_the_post_thumbnail_url($post_id);
           while($image_url == ''){
           	$image_url=get_template_directory_uri() . '/assets/img/default.jpg' ;
           }
			?>
			<div class="col-md-4 col-sm-6 col-xs-6 theme-post wow fadeInUp"> 				
				
				<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
				<img src="<?php echo esc_url($image_url); ?>" class="img-responsive">
				</a>
				
				<div class="theme-post-caption eq-blocks">
					<h6>
					</h6>
					<div class="view-payment"> 
						<?php 
						$dblogger_theme_link_title = get_theme_mod( 'dblogger_theme_link_title', esc_html__('Read More', 'dblogger' ));?>
						<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>"> 
						<?php if ($dblogger_theme_link_title != '') echo wp_kses_post($dblogger_theme_link_title);?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- second page -->
			<?php 
			$post_id= get_option('dblogger_second_page','0');
			
			if($post_id !== '0'):
			
           $image_url= get_the_post_thumbnail_url($post_id);
           while($image_url == ''){
           	$image_url=get_template_directory_uri() . '/assets/img/default.jpg' ;
           }
           /* $image_url=get_template_directory_uri() . '/assets/img/default.jpg' ;	*/		 ?>
			<div class="col-md-4 col-sm-6 col-xs-6 theme-post wow fadeInUp"> 				
				
				<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
				<img src="<?php echo esc_url($image_url); ?>" class="img-responsive">
				</a>
				
				<div class="theme-post-caption eq-blocks">
					<h6>
					</h6>
					<div class="view-payment"> 
						<?php 
						$dblogger_theme_link_title = get_theme_mod( 'dblogger_theme_link_title', esc_html__('Read More', 'dblogger' ));?>
						<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>"> 
						<?php if ($dblogger_theme_link_title != '') echo wp_kses_post($dblogger_theme_link_title);?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- third page -->
			<?php 
			$post_id= get_option('dblogger_third_page','0');
		
			if($post_id !== '0'):
			
			
			 $image_url= get_the_post_thumbnail_url($post_id);
           while($image_url == ''){
           	$image_url=get_template_directory_uri() . '/assets/img/default.jpg' ;
           }
			?>
			<div class="col-md-4 col-sm-6 col-xs-6 theme-post wow fadeInUp"> 				
				
				<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
				<img src="<?php echo esc_url($image_url); ?>" class="img-responsive">
				</a>
				
				<div class="theme-post-caption eq-blocks">
					<h6>
					</h6>
					<div class="view-payment"> 
						<?php 
						$dblogger_theme_link_title = get_theme_mod( 'dblogger_theme_link_title', esc_html__('Read More', 'dblogger' ));?>
						<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>"> 
						<?php if ($dblogger_theme_link_title != '') echo wp_kses_post($dblogger_theme_link_title);?><?php echo $post_id; ?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- fourth page -->
			<?php 
			$post_id= get_option('dblogger_fourth_page','0');
			
			if($post_id !== '0'):
			
			 $image_url= get_the_post_thumbnail_url($post_id);
           while($image_url == ''){
           	$image_url=get_template_directory_uri() . '/assets/img/default.jpg' ;
           }
			?>
			<div class="col-md-4 col-sm-6 col-xs-6 theme-post wow fadeInUp"> 				
				
				<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
				<img src="<?php echo esc_url($image_url); ?>" class="img-responsive">
				</a>
				
				<div class="theme-post-caption eq-blocks">
					<h6>
					</h6>
					<div class="view-payment"> 
						<?php 
						$dblogger_theme_link_title = get_theme_mod( 'dblogger_theme_link_title', esc_html__('Read More', 'dblogger' ));?>
						<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>"> 
						<?php if ($dblogger_theme_link_title != '') echo wp_kses_post($dblogger_theme_link_title);?><?php echo $post_id; ?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- fifth page -->
			<?php 
			$post_id= get_option('dblogger_fifth_page','0');
			
			if($post_id !== '0'):
			
			 $image_url= get_the_post_thumbnail_url($post_id);
           while($image_url == ''){
           	$image_url=get_template_directory_uri() . '/assets/img/default.jpg' ;
           }
			
			
 ?>
			<div class="col-md-4 col-sm-6 col-xs-6 theme-post wow fadeInUp"> 				
				
				<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
				<img src="<?php echo esc_url($image_url); ?>" class="img-responsive">
				</a>
				
				<div class="theme-post-caption eq-blocks">
					<h6>
					</h6>
					<div class="view-payment"> 
						<?php 
						$dblogger_theme_link_title = get_theme_mod( 'dblogger_theme_link_title', esc_html__('Read More', 'dblogger' ));?>
						<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>"> 
						<?php if ($dblogger_theme_link_title != '') echo wp_kses_post($dblogger_theme_link_title);?><?php echo $post_id; ?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- sixth page -->
			<?php 
			$post_id= get_option('dblogger_sixth_page','0');
			
			if($post_id !== '0'):

			 $image_url= get_the_post_thumbnail_url($post_id);
           while($image_url == ''){
           	$image_url=get_template_directory_uri() . '/assets/img/default.jpg' ;
           }
			?>
			<div class="col-md-4 col-sm-6 col-xs-6 theme-post wow fadeInUp"> 				
				
				<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>">
				<img src="<?php echo esc_url($image_url); ?>" class="img-responsive">
				</a>
				
				<div class="theme-post-caption eq-blocks">
					<h6>
					</h6>
					<div class="view-payment"> 
						<?php 
						$dblogger_theme_link_title = get_theme_mod( 'dblogger_theme_link_title', esc_html__('Read More', 'dblogger' ));?>
						<a href="<?php echo esc_url(get_the_permalink($post_id)); ?>"> 
						<?php if ($dblogger_theme_link_title != '') echo wp_kses_post($dblogger_theme_link_title);?><?php echo $post_id; ?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>
<?php endif;?>
<!-- // Our Blog SECTION -->
<?php
$disable1  = get_theme_mod( 'dblogger_blog_check' ) == 1 ? true : false ;
if ( dblogger_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<section id="from-blog">
	<div class="container">
		<div class="row"> 
			<div class="section-title text-center">
				<?php 
				$dblogger_blog_title  = get_theme_mod( 'dblogger_blog_title', esc_html__('Our Blog', 'dblogger' ));
				if ($dblogger_blog_title != '') echo '<h2>' . wp_kses_post($dblogger_blog_title) . '</h2>'; ?>
				<?php 
				$dblogger_blog_button_text  = get_theme_mod( 'dblogger_blog_button_text', esc_html__('Read More', 'dblogger' ));
				$dblogger_blog_button_url   = get_theme_mod('dblogger_blog_button_url',esc_url('#') );
				if ($dblogger_blog_button_text != '') echo '<a class="btn btn-white" href="'. esc_url($dblogger_blog_button_url ) .'">' . wp_kses_post($dblogger_blog_button_text) . '</a>'; 
				?>
			</div>
			<?php
			$count_blog = get_theme_mod( 'dblogger_blog_post_count' , 2 );
			$query_post = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' =>$count_blog ) );    
			if ($query_post->have_posts()) :
				while ($query_post->have_posts()) : $query_post->the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
			endif;?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif;?>
<!-- // Subscribe SETTINGS -->
<?php
$disable1  = get_theme_mod( 'dblogger_newsletter_disable' ) == 0 ? true : false ;
if ( dblogger_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
<?php
$dblogger_newsletter_mailchimp = get_theme_mod('dblogger_newsletter_mailchimp');
 ?> 
<section id="newsletter-block">
	<div class="container">
		<div class="row wow fadeInUp">
			<div class="section-title text-center">
				<?php 
				$dblogger_newsletter_title  = get_theme_mod( 'dblogger_newsletter_title', esc_html__('Subscribe to our newsletter', 'dblogger' ));
				if ($dblogger_newsletter_title != '') echo '<h3>  ' . wp_kses_post($dblogger_newsletter_title) . ' </h3>'; 
				?>  
			</div>
			<div class="col-md-4 col-md-offset-4">
				<form>
					<div class="input-group">
						<a target="_blank" class="btn btn-danger form-newsletter" href="<?php if ($dblogger_newsletter_mailchimp != '') echo esc_url($dblogger_newsletter_mailchimp); ?>"><?php esc_attr_e('Click Here', 'dblogger'); ?></a>
					</div>
				</form>
				<p> 
					<?php echo  $dblogger_newsletter_det=( get_theme_mod( 'dblogger_newsletter_det' ) )? esc_html( get_theme_mod( 'dblogger_newsletter_det' ) ): esc_html__('We protect your privacy. We provide you with high quality updates.', 'dblogger'); ?>
				</p>
			</div>
		</div>
	</div>
</section>
<?php endif;?>
<?php
get_footer();
