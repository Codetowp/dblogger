<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dblogger
 */

if (  is_active_sidebar( 'sidebar-1' ) ) {
    dynamic_sidebar( 'sidebar-1' ); 
    
}else{
?>

        
        <!--Recent Comments-->
        
        <section class="widget widget_recent_comments  wow fdeInUp">
          <h2 class="widget-title">Recent Comments</h2>
          <ul >
            <li ><span class="comment-author-link"><a href="#">Steeve</a></span> on <a href="http://localhost/wordpress/potato-cakes-with-smoked-salmon-cream-cheese/comment-page-1/#comment-18">How to take photos 
              while traveling?</a></li>
            <li ><span class="comment-author-link"><a href="#">Steeve</a></span> on <a href="http://localhost/wordpress/potato-cakes-with-smoked-salmon-cream-cheese/comment-page-1/#comment-17">How to take photos 
              while traveling?</a></li>
            <li ><span class="comment-author-link"><a href="#">Steeve</a></span> on <a href="http://localhost/wordpress/potato-cakes-with-smoked-salmon-cream-cheese/comment-page-1/#comment-16">How to take photos 
              while traveling?</a></li>
          </ul>
        </section>
        
        <!--Recent Comments end--> 
        
        <!--Archives start-->
        
        <section class="widget widget_archive  wow fdeInUp">
          <h2 class="widget-title">Archives</h2>
          <ul >
            <li ><a href="#"> support <span >(01)</span> </a> </li>
            <li><a href="#"> DESIGN<span >(10)</span> </a></li>
            <li ><a href="#"> USER INTERFACE<span>(100)</span> </a> </li>
            <li><a href="#"> Wiki<span >(100)</span> </a></li>
          </ul>
        </section>
        
        <!--Archives end--> 
        
        <!--Archives start-->
        
        <section class="widget widget_categories  wow fdeInUp">
          <h2 class="widget-title">category</h2>
          <ul >
            <li ><a href="#"> classic <span >(01)</span> </a> </li>
            <li><a href="#"> Movie<span >(10)</span> </a></li>
            <li ><a href="#"> Retro<span>(100)</span> </a> </li>
            <li><a href="#"> Freebies<span >(100)</span> </a></li>
          </ul>
        </section>
        
        <!--Archives end--> 
        
        <!--Recent posts start-->
        
        <section  class="widget  widget_recent_entries  wow fdeInUp ">
          <h2 class="widget-title">Recent posts</h2>
          <ul class="media-list main-list">
            <li class="media"> <a class="" href="#"> <img class="media-object" src="<?php echo get_template_directory_uri();?>/img/t-1.jpg" alt="..."> </a>
              <div class="media-body">
                <p class="media-heading"><a href="#">How to take photos 
                  while traveling? </a> </p>
              </div>
            </li>
            <li class="media"> <a class="" href="#"> <img class="media-object" src="<?php echo get_template_directory_uri();?>/img/t-1.jpg" alt="..."> </a>
              <div class="media-body">
                <p class="media-heading"><a href="#"><span>Product Design</span>Hampton Oxford in Mohawk Blue</a></p>
              </div>
            </li>
            <li class="media"> <a class="" href="#"> <img class="media-object" src="<?php echo get_template_directory_uri();?>/img/t-1.jpg" alt="..."> </a>
              <div class="media-body">
                <p class="media-heading"> <a href="#"><span>Product Design</span>8 Ways Billionaires & Elite Athletes Perform </a></p>
              </div>
            </li>
          </ul>
        </section>
        
        <!--Recent posts end-->
        
        <section class="widget widget_social sidebar  wow fdeInUp">
          <h2 class="widget-title">Follow Us</h2>
          <ul >
            <li ><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
            <li ><a href="#" title="twitter"><i class="fa  fa-twitter"></i></a></li>
            <li ><a href="#" title="google-plus"><i class="fa  fa-google-plus"></i></a> </li>
            <li><a href="#" title="Rss Feed"><i class="fa  fa-rss"></i></a></li>
          </ul>
        </section>
        
        <!--Tags start-->
        
        <section id="tag_cloud-2" class="widget widget_tag_cloud  wow fdeInUp">
          <h2 class="widget-title">Tags</h2>
          <div class="tagcloud"><a href="#"  title="1 topic" style="font-size: 1em;">css</a> <a href="#" title="1 topic" style="font-size: 1em;">food</a> <a href="#"  title="1 topic" style="font-size: 1em;">html</a> <a href="#" title="1 topic" style="font-size: 1em;">login</a> <a href="#"  title="1 topic" style="font-size: 1em;">displays</a> <a href="#"  title="1 topic" style="font-size: 1em;">Design</a> <a href="#"  title="1 topic" style="font-size: 1em;">psd</a></div>
        </section>
        <!--Tags end--> 
        
        <!--Meta  start-->
        <section id="meta-2" class="widget widget_meta  wow fdeInUp">
          <h2 class="widget-title">Meta</h2>
          <ul >
            <li ><a href="#">Site Admin</a></li>
            <li><a href="#">Log out</a></li>
            <li ><a href="#">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li ><a href="#">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li ><a href="#" title="">WordPress.org</a></li>
          </ul>
        </section>
        
        <!--Meta  end--> 
        
        <!--Meta  start-->
        <section id="meta-2" class="widget widget_meta  wow fdeInUp">
          <h2 class="widget-title">Text</h2>
          <p>Subscribe to our free newsletter to be in touch with our new articles. Subscribe to our free newsletter to be in touch with our new articles. Subscribe to our free newsletter to be in touch with our new articles.</p>
        </section>
        
        <!--Meta  end--> 
        
        <!--Meta  start-->
        <section id="meta-2" class="widget  wow fdeInUp">
          <h2 class="widget-title">custom menu</h2>
          <ul>
            <li><a href="#">Magzine</a></li>
            <li><a href="#">Bootstrap</a></li>
            <li><a href="#">CSS3</a></li>
            <li><a href="#">HTML5</a></li>
          </ul>
        </section>
        
        <!--Meta  end--> 
        
<?php }?>