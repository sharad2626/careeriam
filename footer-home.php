<footer>
      <div class="top-footer">
        <div class="footer-logo">
          <img src="<?php echo get_stylesheet_directory_uri().'/css/images/footer-logo.png'; ?>" alt="Career I Am">
        </div>
        <div class="footer-menu">
          
           <?php wp_nav_menu(array('theme_location' => 'third', 'container' => 'false', 'menu_class' => '')); ?>
          
        </div>
        <div class="footer-social">
            <?php 
		global $redux_demo; 
		$facebook_link = $redux_demo['facebook-link'];
		$twitter_link = $redux_demo['twitter-link'];
		$google_plus_link = $redux_demo['google-plus-link'];
            ?>
          <ul>
            <li><a href="<?php echo $facebook_link; ?>" class="facebook"> </a></li>
            <li><a href="<?php echo $twitter_link; ?>" class="twitter"> </a></li>
            <li><a href="<?php echo $google_plus_link; ?>" class="google"> </a></li>
          </ul>
        </div>
      </div>
      <div class="bottom-footer">
        <span>www.careeriam.com - Copyright 2015</span>
      </div>
    </footer>
		
  </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri().'/js/pxgradient.js'; ?>"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.1/jquery.magnific-popup.min.js"></script>
 
  <script>
    $(".section-title h3").pxgradient({ 
      step: 10, 
      colors: ["#2ca8cb","#42c1ab","#46c99d"], 
      dir: "x" 
    });
  </script>
  <!-- Slidebars -->
    <script src="<?php echo get_stylesheet_directory_uri().'/js/slidebars.js'; ?>"></script>
    <script>
      (function($) {
        $(document).ready(function() {
          $.slidebars();
        });
      }) (jQuery);
    </script>
<?php wp_footer(); ?>
</body>
</html>
