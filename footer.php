<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dblogger
 */

?>
<footer id="bottom-footer">
  <div class="container">
    <div class="row wow fdeInUp">
      <div class="col-md-4"> 
        <!--copyright-->
        <p class="copyright">© 2017 Digital Blogger. All rights reserved</p>
        <!--/copyright--> 
      </div>
      <!--bottom nav-->
      <div class="col-md-4">
        <nav class="bottom-nav">
          <ul>
            <li><a href="#">terms</a></li>
            <li><a href="#">privacy</a></li>
            <li><a href="#">copyright</a></li>
            <li><a href="#">cookies</a></li>
          </ul>
        </nav>
      </div>
      <!--/bottom nav--> 
      
      <!--powered by-->
      <div class="col-md-4"> 
        
        <!--copyright-->
        <p class="powered-by">Maid with <i class="fa fa-heart"></i> by <a href="#">Dcrazed</a></p>
      </div>
      <!--/powered by--> 
      
    </div>
  </div>
</footer>
<?php wp_footer(); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
 Include all compiled plugins (below), or include individual files as needed  
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script src="js/owl.carousel.js"></script> -->

<!-- Javascripts
    ================================================== --> 
<!--<script type="text/javascript" src="js/main.js"></script> 
<script src="js/wow.min.js"></script> -->
<script>
              new WOW().init();
              </script>

</body>
</html>