<?php

function dblogger_related_post() {

	$args = '';
    $count = get_theme_mod( 'dblogger_post_related_post_count' );
      
	$args = wp_parse_args( $args, array(
		'category__in'   => wp_get_post_categories( get_the_ID() ),
		'posts_per_page' => $count,
		'post__not_in'   => array( get_the_ID() )
	) );
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) {
	?>
		
			<?php
            $num = 0;
			while ( $related->have_posts() ) {
				$related->the_post();
                
                
                if  ( get_the_post_thumbnail()=='')
                {
                    $background_img_relatedpost   = get_template_directory_uri()."/img/t-1.jpg";
                    
                    $post_thumbnail= '<img src="'.$background_img_relatedpost.'" class="img-responsive">';
                }
                else
                {
                    $post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'img-responsive' );
                }
                
				$class_format = '';
                
				if  ( get_the_post_thumbnail() !='' )
				$class_format = 'fa-format-' . get_post_format( get_the_ID() );
                
                 $title=get_the_title();
                
                global $post;
                $categories = get_the_category($post->ID);
                $cat_link = get_category_link($categories[0]->cat_ID);
                
				printf(
					'<div class="col-md-4 theme-post">%s 
                        <div class="theme-post-caption">
                            <h6><span class="badge badge-info">%s</span></h6>
                            <div class="view-payment"> <a href="%s">View Theme</a></div>
                        </div>
                    </div> 
                   ',
					$post_thumbnail,
                    $title,
                    esc_url( get_permalink() ),
                    $class_format
				);
				?>
			<?php
			}
			?>
		
	<?php
	}
	wp_reset_postdata();
}

?>