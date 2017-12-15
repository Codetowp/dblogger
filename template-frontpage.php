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

<!-- banner Page
    ==========================================-->

<?php
$background_img   =  get_theme_mod( 'dblogger_back_img',  esc_url(get_template_directory_uri() . '/assets/img/b-1.jpg'));   
$disable    = get_theme_mod( 'dblogger_header_check' ) == 1 ? true : false ;
if ( dblogger_is_selective_refresh() ) {
	$disable = false;
}
if ( ! $disable) : ?>

<section id="home-banner" style="background-image: url(<?php echo esc_url( $background_img ); ?>);">
    <div class="content">
        <div class="container wow fdeInUp"  data-wow-duration="1s">
			<?php 
				$title  = get_theme_mod( 'dblogger_tagline_text', esc_html__('Section Title', 'dblogger' ));
				if ($title != '') echo '<span class="sub">  ' . wp_kses_post($title) . ' </span>'; 
					$desc  = get_theme_mod( 'dblogger_heder_text', esc_html__('Section Description', 'dblogger' ));
				if ($desc != '') echo '<h1>' . wp_kses_post($desc) . '</h1>';
					$dblogger_button_text  = get_theme_mod( 'dblogger_button_text', esc_html__('Read More', 'dblogger') );
					$dblogger_button_url  = get_theme_mod( 'dblogger_button_url', esc_url('#', 'dblogger') );

				if ($dblogger_button_text != '' && $dblogger_button_url != '') echo '<a href="' . esc_url($dblogger_button_url) . '" class="btn btn-default">' . wp_kses_post($dblogger_button_text) . '</a>'; 
			?>
		</div>
    </div>
</section>
<?php endif;?>
<!-- Category Section
    ==========================================-->
<?php
$disable1 =	get_theme_mod( 'dblogger_guide_check' ) == 1 ? true : false ;
if ( dblogger_is_selective_refresh() ) {
	$disable1 = false;
}
if ( ! $disable1) : ?>

	<section id="guide-block"> 

		<!--section-title-->
		<div class="section-title text-center "> 
			<?php

			$background_img   =  get_theme_mod( 'dblogger_guide_icon' );   
			$background_img_static   = get_template_directory_uri() . '/assets/img/f-fa-book.png';
			$image = $background_img ? "$background_img" : "$background_img_static"; 
			?>

			<img src="<?php echo esc_url( $image );?>" class="img-responsive" style="width:65px;margin-left:48%">
			<!--<i class="fa fa-book "></i>-->
			<?php 
			$dblogger_guide_title  = get_theme_mod( 'dblogger_guide_title', esc_html__('Section Title', 'dblogger' ));
			if ($dblogger_guide_title != '') echo '<h2>  ' . wp_kses_post($dblogger_guide_title) . ' </h2>'; 
			?>
			<?php 
			$dblogger_guide_desc  = get_theme_mod( 'dblogger_guide_desc', esc_html__('Section Description', 'dblogger' ));
			if ($dblogger_guide_desc != '') echo '<p>  ' . wp_kses_post($dblogger_guide_desc) . ' </p>'; 
			?>
		</div>
		<!--/section-title--> 

		<!--guide-list-->
		<div class="guide-list wow fadeInUp">
			<div class="container">
				<div class="row guide-block"> 
					<!-- guides tabs -->    
					<div>

						<ul class="nav nav-tabs" >
							<!-- guides tabs ul -->
							<?php
							$firstClass = 'active'; 
							$values=0;
							$count = get_theme_mod( 'dblogger_post_number',6);
							$slidecat = get_option( 'dblogger_slide_categories');
							$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count,'post__not_in' => get_option( 'sticky_posts' )) );
							if ($query->have_posts()) :
								while ($query->have_posts()) : $query->the_post();
									$values++;
								?>
									<li role="presentation" class="<?php echo esc_html( $firstClass ); ?>"><a href="#<?php echo esc_attr( $values );?>"  onclick="location.href='<?php the_permalink();?>'"  aria-controls="home" role="tab" data-toggle="tab"><h6><?php the_title();?></h6></a></li>
							<?php  
								$firstClass = "";
								endwhile;
							endif;?>
						</ul>

							<!--  guides Tab panes -->
						<div class="tab-content">
							<?php
							esc_url( $firstClass = 'active' ); 
							$values=0;
							$count = get_theme_mod( 'dblogger_post_number',6);
							$slidecat =get_option( 'dblogger_slide_categories' );
							$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count,'post__not_in' => get_option( 'sticky_posts' )) );
							if ($query->have_posts()) :
								while ($query->have_posts()) : $query->the_post();
								$values++;
							?>
								<div role="tabpanel" class="tab-pane <?php echo esc_html( $firstClass ); ?>" id="<?php echo esc_attr( $values );?>"><?php
									if  ( get_the_post_thumbnail()!='')
									{?>
										<a href="<?php the_permalink();?>"><?php the_post_thumbnail('dblogger_homepage'); ?></a>
									<?php }else{
										$default_img= get_template_directory_uri() . '/assets/img/default.jpg';
									?>
										<img src="<?php echo esc_url( $default_img );?>" class="img-responsive">
									<?php } ?>
								</div>
							<?php  $firstClass = ""; 
								endwhile;
							endif;?>
						</div>
					</div>
				<!-- /guides tabs -->    
				</div>
			</div>
		</div>
	<!--/guide-list--> 
	</section>
<?php endif;?>
<!-- Theme Page
    ==========================================-->
<?php

$disable1  = get_theme_mod( 'dblogger_theme_check' ) == 1 ? true : false ;

if ( dblogger_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>
    <section id="theme-block">
      <div class="container">
        <div class="row wow fadeInUp"> 
          <!--section-title-->
			<div class="section-title text-center">
				<?php 
				$dblogger_theme_title  = get_theme_mod( 'dblogger_theme_title', esc_html__('Pages', 'dblogger' ));
				if ($dblogger_theme_title != '') echo '<h2>' . wp_kses_post($dblogger_theme_title) . '</h2>'; 
				
					$dblogger_theme_button_text  = get_theme_mod( 'dblogger_theme_button_text', esc_html__('Read More', 'dblogger') );

					$dblogger_theme_button_url = get_theme_mod( 'dblogger_theme_button_url', esc_url('#', 'dblogger') );

				if ($dblogger_theme_button_text != '' && $dblogger_theme_button_url != '') echo '<a  class="btn btn-white" href="' . esc_url($dblogger_theme_button_url) . '" >' . wp_kses_post($dblogger_theme_button_text) . '</a>'; ?>     
				<hr>
			</div>
			<!--/section-title--> 
			<?php 
			$page_counts = get_theme_mod( 'dblogger_page_post_count', esc_attr(6, 'dblogger' ) );
			$page_query = new WP_Query( array( 'post_type' => 'page', 'posts_per_page' => $page_counts, 'orderby' => 'date', 'order' => 'DESC', ) ); ?>
			<?php if ( $page_query->have_posts() ) : while ( $page_query->have_posts() ) : $page_query->the_post(); ?>

				<!--Theme-post-->
				<div class="col-md-4 theme-post "> 
					<?php 
					if(get_the_post_thumbnail()){
						the_post_thumbnail('dblogger_theme');
						?>
						
						<?php 
					}else{
						$page_post_img= get_template_directory_uri() . '/assets/img/default.jpg' ;
						?>
						<img src="<?php echo esc_url( $page_post_img );?>" class="img-responsive">
					<?php  }  ?>

					<div class="theme-post-caption eq-blocks">
						<h6><?php the_title(); ?> 
							<?php 
							$dblogger_tag_title  = get_theme_mod( 'dblogger_tag_title', esc_html__('Tag', 'dblogger' ));
							if ($dblogger_tag_title != '') echo '<span class="badge badge-info">' . wp_kses_post($dblogger_tag_title) . '</span>'; 
							?>
						</h6>
						<!--view-payment-->
						<div class="view-payment"> 

							<?php 
							$dblogger_theme_link_title  = get_theme_mod( 'dblogger_theme_link_title', esc_html__('Read More', 'dblogger' ));?>
							<a  href="<?php  echo the_permalink();?>"> 
								<?php if ($dblogger_theme_link_title != '') echo wp_kses_post($dblogger_theme_link_title);?>
							</a>
						</div>
						<!--/view-payment--> 
					</div>
				</div>
			 <!--/Theme-post--> 
			<?php  endwhile;endif;?>
		
    
        </div>
      </div>
    </section>

<?php endif;?>

<!--From the blog
    ==========================================-->
<?php
$disable1  = get_theme_mod( 'dblogger_blog_check' ) == 1 ? true : false ;
if ( dblogger_is_selective_refresh() ) {
    $disable1 = false;
}
if ( ! $disable1) : ?>

	<section id="from-blog">
		<div class="container">
			<div class="row wow fadeInUp"> 
			<!--section-title-->
				<div class="section-title text-center">
					<?php 
					$dblogger_blog_title  = get_theme_mod( 'dblogger_blog_title', esc_html__('Our Blog', 'dblogger' ));
					if ($dblogger_blog_title != '') echo '<h2>' . wp_kses_post($dblogger_blog_title) . '</h2>'; ?>
					<?php 
					$dblogger_blog_button_text  = get_theme_mod( 'dblogger_blog_button_text', esc_html__('Read More', 'dblogger' ));
					$dblogger_blog_button_url   = get_theme_mod('dblogger_blog_button_url',esc_url('#', 'dblogger') );
					if ($dblogger_blog_button_text != '') echo '<a class="btn btn-white" href="'. esc_url($dblogger_blog_button_url ) .'">' . wp_kses_post($dblogger_blog_button_text) . '</a>'; 
					?>
				</div>
				<?php 

				$count_blog = get_theme_mod( 'dblogger_blog_post_count' , esc_attr(2, 'dblogger' ));
				$count_blog = $count_blog-1;
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
<!--Newsletter
    ==========================================-->
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
			<!--section-title-->
				<div class="section-title text-center">
					<?php 
					$dblogger_newsletter_title  = get_theme_mod( 'dblogger_newsletter_title', esc_html__('Subscribe to our newsletter', 'dblogger' ));
					if ($dblogger_newsletter_title != '') echo '<h3>  ' . wp_kses_post($dblogger_newsletter_title) . ' </h3>'; 
					?>  
				</div>
				<!--/section-title-->

				<div class="col-md-4 col-md-offset-4">

					<form action="<?php if ($dblogger_newsletter_mailchimp != '') echo esc_url($dblogger_newsletter_mailchimp); ?>" target="_blank">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Email Address..." value="<?php esc_attr_e('Subscribe', 'dblogger'); ?>">
							<span class="input-group-btn">
								<button  type="submit"><i class="fa  fa-chevron-right"></i></button>
							</span>
						</div>
					</form>
					<p> 
						<?php echo  $dblogger_newsletter_det=( get_theme_mod( 'dblogger_newsletter_det' ) )?
						esc_html( get_theme_mod( 'dblogger_newsletter_det' ) ):esc_html('We protect your privacy. We provide you with high quality updates.'); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
<?php endif;?>
<?php
get_footer();
