 <!-- Footer START-->
    <footer>
      <div class="top-footer">
        <div class="footer-logo">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-logo.png" alt="Career I Am">
        </div>
        <div class="footer-menu">
          <!-- <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Members</a></li>
            <li><a href="#">Companies</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul> -->
		 
		  <?php wp_nav_menu(array('theme_location' => 'third', 'container' => 'false', 'menu_class' => '')); ?>
			

        </div>
        <div class="footer-social">
          <ul>
            <li><a href="#" class="facebook"> </a></li>
            <li><a href="#" class="twitter"> </a></li>
            <li><a href="#" class="google"> </a></li>
          </ul>
        </div>
      </div>
      <div class="bottom-footer">
        <span>www.careeriam.com - Copyright 2015</span>
      </div>
    </footer>
    <!-- Footer END -->
  </div>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
  
  <!-- Slidebars -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slidebars.js"></script>
     <!-- Social wall Masonry style  --> 
     <script src="<?php echo get_stylesheet_directory_uri().'/js/masonry.pkgd.min.js'; ?>"></script>
    <script>
      (function($) {
        $(document).ready(function() {
          $.slidebars();

           $('.item-list').masonry({
                    gutter: 20,
                    itemSelector: '.activity-item'
                  });
        });
      })(jQuery);
    </script>
    <!-- custom scrollbar plugin -->
		
		    <!-- wp footer included files   -->
			<?php wp_footer(); ?>
		    <!-- wp footer included files  -->

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>

     
       
<!-- add company footer -->

<!-- arrow chat code start  -->

<?php if(is_user_logged_in()){ ?>

<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=js" charset="utf-8"></script>

<?php } ?>

<!-- arrow chat code end -->

<script>

jQuery(document).ready(function(){
		
		console.log("test ... ");
		jQuery(".rtm-upload-button-wrapper").css({"display":"block !important"});
		jQuery("#rtmedia-add-media-button-post-update").css({"display":"block !important"});
	
});

</script>


 

</body>
</html>
