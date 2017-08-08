<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>




<!-- banner Page
    ==========================================-->
<Section id="single-banner" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>);">
  <div class="overlay-banner">
    <div class="content">
      <div class="container "> 
        <!--breadcrumb-->
        <ol class="breadcrumb">
            <?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
        </ol>
        <!--/breadcrumb-->
        <h1><?php the_title(); ?></h1>
        <header class="entry-header"><a href="#"> </a><span class="date-article"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span> <!--in <span class="byline"><span class="author vcard"><a href="#">WORDPRESS</a> ,<a href="#"> BLOG</a></span></span>--> </header>
      </div>
    </div>
  </div>
</Section>

<!--woocommerce body-->

<section id="woocommerce-page">
  <div class="container">
    <div class="row">
      <div id="container">
        <div id="content" role="main">
         
          <div id="product-37" class="post-37 product type-product status-publish has-post-thumbnail product_cat-clothing product_cat-t-shirts first instock shipping-taxable purchasable product-type-simple">
            
              
              
              <?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
              
              
             
            <!-- .summary -->
            <?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

           
          </div>
          <!-- #product-37 --> 
          
        </div>
      </div>
    </div>
  </div>
</section>



<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
