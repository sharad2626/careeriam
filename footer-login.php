<?php
/**
 * The template for displaying the footer.
 */

?>


<!-- designer footer html start -->

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
				</ul>
			-->

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


<!-- designer footer html end  -->


	<!-- <footer>

		<div class="container">
					
			<div class="full" style="margin-bottom: 0;">
				
				<div class="one_fourth first" style="margin-bottom: 0;"><?php get_sidebar( 'footer-one' ); ?></div>

				<div class="one_fourth" style="margin-bottom: 0;"><?php get_sidebar( 'footer-two' ); ?></div>

				<div class="one_fourth" style="margin-bottom: 0;"><?php get_sidebar( 'footer-three' ); ?></div>

				<div class="one_fourth" style="margin-bottom: 0;"><?php get_sidebar( 'footer-four' ); ?></div>

			</div>

			

		</div>
					
	</footer> -->

	<!-- <section class="socket">

		<div class="container">

			<div class="site-info">
				<?php 

					//global $redux_demo; 
					//$footer_copyright = $redux_demo['footer_copyright'];

				?>

				<?php //if(!empty($footer_copyright)) { 
						//echo $footer_copyright;
					//} else {
				?>
				
				<?php  ?>
				
			</div>

			<div class="full" style="margin-bottom: 0;">
				<a class="logo" href="<?php echo home_url(); ?>">
				
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""/>
					
				</a>
            </div>
			
			<div class="footer_menu">
				<?php wp_nav_menu(array('theme_location' => 'third', 'container' => 'false')); ?>
			</div>
			
		      <?php  echo do_shortcode('[wp_social_icons]')?>
		   
           
			<div class="backtop">
				<a href="#backtop"><i class="fa fa-chevron-up"></i></a>
			</div>
            
			
		</div>
		
	
		 

<script type="text/javascript">var ac_max_results = 0;</script>
<script type="text/javascript" src="/forum software/arrowchat/public/list/js/list_core.js" charset="utf-8"></script>
<div id="arrowchat_public_list"></div> 
	</section>
 -->
	<?php wp_footer(); ?>
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

<!-- Slidebars -->
    
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slidebars.js"></script>
<script>
  (function($) {
	$(document).ready(function() {
	  $.slidebars();
	});
  }) (jQuery);
</script> 

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/icheck.js"></script>

<script>
      (function($) {
        $(document).ready(function() {
           $('input').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal',
            increaseArea: '20%' // optional
          });
        });
      }) (jQuery);

</script>

<!-- <script type="text/javascript" src="/forum software/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/forum software/arrowchat/external.php?type=js" charset="utf-8"></script>
<link type="text/css" rel="stylesheet" media="all" href="/forum software/arrowchat/public/list/css/style.css" charset="utf-8" />  
-->

</body>
</html>