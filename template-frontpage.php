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
    // *************REMOVE THIS ************ Dont use this. Add a default image in customizer thats it. 
	
 $background_img   = esc_url( get_theme_mod( 'dblogger_back_img' ) );   
 $background_img_static   = get_template_directory_uri()."/img/b-1.jpg";
 $image = $background_img ? "$background_img" : "$background_img_static";      
//  $color=esc_attr(get_theme_mod( 'header_textcolor' ));
?>

<?php if(get_theme_mod( 'dblogger_header_check' )== 1){?>

<section id="home-banner" style="background-image: url(<?php echo $image; ?>);">
    <div class="content">
        <div class="container wow fdeInUp"  data-wow-duration="1s">
            <span>  
                <?php if(get_theme_mod( 'dblogger_tagline_text' )) {echo get_theme_mod( 'dblogger_tagline_text' ) ;} else {echo 'Section Title';} ?>
            </span>
            <h1> 
                <?php echo $dblogger_heder=( get_theme_mod( 'dblogger_heder_text' ) )?
                    ( get_theme_mod( 'dblogger_heder_text' ) ):'Section Description'; ?>
            </h1>
            
            <?php if((get_theme_mod( 'dblogger_button_url' ))!='' && (get_theme_mod( 'dblogger_button_text' ))!=''){?>
            
            <a class="btn btn-default" href=" <?php echo $dblogger_button_url=( get_theme_mod( 'dblogger_button_url' ) )?
                    ( get_theme_mod( 'dblogger_button_url' ) ):''; ?>">
                
              <?php echo $dblogger_button_text=( get_theme_mod( 'dblogger_button_text' ) )?
                    ( get_theme_mod( 'dblogger_button_text' ) ):''; ?>
          
            </a> 
            <?php }?>
        </div>
    </div>
</section>
<?php }?>
<!-- Guide Page
    ==========================================-->
<?php if( get_theme_mod( 'dblogger_guide_check' ) == 1 ) { ?>

<section id="guide-block"> 
  
  <!--section-title-->
  <div class="section-title text-center "> 
      <?php
      
        $background_img   = esc_url( get_theme_mod( 'dblogger_guide_icon' ) );   
        $background_img_static   = get_template_directory_uri()."/img/f-fa-book.png";
        $image = $background_img ? "$background_img" : "$background_img_static"; 
      ?>
      
        <img src="<?php echo $image;?>" class="img-responsive" style="width:65px;margin-left:48%">
      <!--<i class="fa fa-book "></i>-->
    <h2>
         <?php echo  $dblogger_guide_title=( get_theme_mod( 'dblogger_guide_title' ) )?
                    ( get_theme_mod( 'dblogger_guide_title' ) ):'Section Title'; ?>
    </h2>
    <p >
        <?php echo  $dblogger_guide_desc=( get_theme_mod( 'dblogger_guide_desc' ) )?
                    ( get_theme_mod( 'dblogger_guide_desc' ) ):''; ?>
    </p>
  </div>
  <!--/section-title--> 
  
  <!--guide-list-->
  <div class="guide-list wow fdeInUp">
    <div class="container">
      <div class="row  guide-block"> 
       
       
     <!-- guides tabs -->    
  <div>

  <ul class="nav nav-tabs" >
  <!-- guides tabs ul -->
      <?php
         $firstClass = 'active'; 
         $values=0;
        $count = get_theme_mod( 'dblogger_post_number' );
       $slidecat =get_option( 'dblogger_slide_categories' );

        $query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
    
    
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
        $values++;
    ?>
      
      
      <li role="presentation" class="<?php echo $firstClass; ?>"><a href="#<?php echo $values;?>" aria-controls="home" role="tab" data-toggle="tab"><h6><?php the_title();?></h6></a></li>
 
      <?php  $firstClass = ""; endwhile;endif;?>
  </ul>

  <!--  guides Tab panes -->
  <div class="tab-content">
   <?php
       $firstClass = 'active'; 
       $values=0;
       $count = get_theme_mod( 'dblogger_post_number' );
       $slidecat =get_option( 'dblogger_slide_categories' );

       $query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
       if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
        $values++;
    ?>
    <div role="tabpanel" class="tab-pane <?php echo $firstClass; ?>" id="<?php echo $values;?>"><?php
            if  ( get_the_post_thumbnail()!='')
            {?>
              <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
            <?php }else{?>
          <img src="<?php echo get_template_directory_uri()?>/img/p-1.jpg" class="img-responsive">
          <?php } ?>
    </div>
      <?php  $firstClass = ""; endwhile;endif;?>
  </div>
</div>
    <!-- /guides tabs -->    
      </div>
    </div>
  </div>
  <!--/guide-list--> 
</section>
<?php }?>
<!-- Theme Page
    ==========================================-->
<?php if( get_theme_mod( 'dblogger_theme_check' ) == 1 ) { ?>
    <section id="theme-block">
      <div class="container">
        <div class="row wow fdeInUp"> 
          <!--section-title-->
          <div class="section-title text-center">
            <h2><?php echo  $dblogger_theme_title=( get_theme_mod( 'dblogger_theme_title' ) )?
                ( get_theme_mod( 'dblogger_theme_title' ) ):'Pages'; ?></h2>
            <?php if(get_theme_mod( 'dblogger_theme_button_text' )!='' || get_theme_mod( 'dblogger_theme_button_url' )){?>
              
            <a class="btn btn-white" href="<?php echo $dblogger_theme_button_url=( get_theme_mod( 'dblogger_theme_button_url' ) )?
                ( get_theme_mod( 'dblogger_theme_button_url' ) ):'#';  ?>">
                
                <?php echo  $theme_button_text=( get_theme_mod( 'dblogger_theme_button_text' ) )?
                ( get_theme_mod( 'dblogger_theme_button_text' ) ):''; ?>
            </a>
              
            <?php }?>
            <hr>
          </div>
          <!--/section-title--> 
			<?php 
             $page_counts = get_theme_mod( 'dblogger_page_post_count' );
             $page_query = new WP_Query( array( 'post_type' => 'page', 'posts_per_page' => $page_counts ) ); ?>
			 <?php if ( $page_query->have_posts() ) : while ( $page_query->have_posts() ) : $page_query->the_post(); ?>
			  	 
			
			 
          <!--Theme-post-->
          <div class="col-md-4 theme-post "> 
              <?php 
                if(get_the_post_thumbnail()){
                 echo $img=get_the_post_thumbnail();
                }else{?>
                     <img src="<?php echo get_template_directory_uri()?>/img/b-1.jpg" class="img-responsive">
              <?php  }  ?>
             
            <div class="theme-post-caption eq-blocks">
              <h6><?php the_title(); ?> <span class="badge badge-info"><?php if( get_theme_mod( 'dblogger_theme_tag_check' ) == 1 ) { ?>
                  <?php echo  $dblogger_tag_title=( get_theme_mod( 'dblogger_tag_title' ) )?
                ( get_theme_mod( 'dblogger_tag_title' ) ):'';?>
                  <?php }?></span></h6>
              <!--view-payment-->
              <div class="view-payment"> <a href="<?php the_permalink();?>"><?php echo   $dblogger_theme_link_title=( get_theme_mod( 'dblogger_theme_link_title' ) )?
                ( get_theme_mod( 'dblogger_theme_link_title' ) ):'';  ?></a> </div>
              <!--/view-payment--> 
            </div>
          </div>
          <!--/Theme-post--> 
		<?php  endwhile;endif;?>
		
    
        </div>
      </div>
    </section>
<?php }?>

<!--From the blog
    ==========================================-->
<?php if( get_theme_mod( 'dblogger_blog_check' ) == 1 ) { ?>

<section id="from-blog">
  <div class="container">
    <div class="row wow fdeInUp"> 
      <!--section-title-->
      <div class="section-title text-center">
        <h2><?php echo  $dblogger_blog_title=( get_theme_mod( 'dblogger_blog_title' ) )?
                ( get_theme_mod( 'dblogger_blog_title' ) ):'Our Blog'; ?></h2>
          
          <?php if(get_theme_mod( 'dblogger_blog_button_text' )!=''){?>
          
           <a class="btn btn-white" href="<?php echo  esc_url( home_url( '/blog' ) ); ?>"><?php  echo get_theme_mod( 'dblogger_blog_button_text' )?></a>
          
          <?php }?>
          
      </div>
           <?php 
        
              $count_blog = get_theme_mod( 'dblogger_blog_post_count' );
              $query_post = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' =>$count_blog ) );    
        if ($query_post->have_posts()) :
          while ($query_post->have_posts()) : $query_post->the_post();
         
            get_template_part( 'template-parts/content', get_post_format() );
      
        endwhile;endif;?>
    
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php }?>
<!--Newsletter
    ==========================================-->
<?php if( get_theme_mod( 'dblogger_newsletter_disable' ) == 1 ) {
       
        $dblogger_newsletter_mailchimp = get_theme_mod('dblogger_newsletter_mailchimp');
 ?> 
<section id="newsletter-block">
  <div class="container">
    <div class="row wow fdeInUp"> 
      <!--section-title-->
      <div class="section-title text-center">
        <h3> 
            <?php echo  $dblogger_newsletter_title=( get_theme_mod( 'dblogger_newsletter_title' ) )?
                    ( get_theme_mod( 'dblogger_newsletter_title' ) ):'Subscribe to our newsletter'; ?>
         </h3>
      </div>
      <!--/section-title-->
      
      <div class="col-md-4 col-md-offset-4">
        
        <form action="<?php if ($dblogger_newsletter_mailchimp != '') echo $dblogger_newsletter_mailchimp; ?>" target="_blank">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Email Address..." value="<?php esc_attr_e('Subscribe', 'dblogger'); ?>">
            <span class="input-group-btn">
            <button  type="button"><i class="fa  fa-chevron-right"></i></button>
            </span></div>
        </form>
        <p> 
            <?php echo  $dblogger_newsletter_det=( get_theme_mod( 'dblogger_newsletter_det' ) )?
                    ( get_theme_mod( 'dblogger_newsletter_det' ) ):'We protect your privacy. We provide you with high quality updates.'; ?>
        </p>
      </div>
    </div>
  </div>
</section>
<?php }?>

<?php
get_footer();
