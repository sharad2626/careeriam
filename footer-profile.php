<?php global $redux_demo;
$contact_email = get_post_meta($this_post_id, 'wpjobus_resume_email',true);
$wpcrown_contact_email_error = $redux_demo['contact-email-error'];
$wpcrown_contact_name_error = $redux_demo['contact-name-error'];
$wpcrown_contact_message_error = $redux_demo['contact-message-error'];
$wpcrown_contact_thankyou = $redux_demo['contact-thankyou-message'];
$wpcrown_contact_test_error = $redux_demo['contact-test-error']; ?>
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
  
  <!-- Slidebars -->
    <script src="<?php echo get_stylesheet_directory_uri().'/js/slidebars.js'; ?>"></script>
    <script>
      (function($) {
        $(document).ready(function() {
          $.slidebars();
        });
      }) (jQuery);
    </script>
    <script>
  jQuery(function($){
   
    $(".filter").on("click", function () {
      var $this = $(this);
      // if we click the active tab, do nothing
      if (!$this.hasClass("active")) {
        $(".filter").removeClass("active");
        $this.addClass("active"); // set the active tab
        var $filter = $this.data("rel"); // get the data-rel value from selected tab and set as filter
        $filter == 'all' ? // if we select "view all", return to initial settings and show all
          $(".fancybox").attr("data-fancybox-group", "gallery").not(":visible").fadeIn() 
          : // otherwise
          $(".fancybox").fadeOut(0).filter(function () { 
            return $(this).data("filter") == $filter; // set data-filter value as the data-rel value of selected tab
          }).attr("data-fancybox-group", $filter).fadeIn(1000); // set data-fancybox-group and show filtered elements
      } // if
    }); // on
  }); // ready
</script>
    <script src="<?php echo get_stylesheet_directory_uri().'/js/jquery.mCustomScrollbar.concat.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/plugins.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/js/scripts.js' ?>"></script>
    <script src="<?php echo get_stylesheet_directory_uri().'/js/carousel.js'; ?>"></script>
    <script src="<?php echo get_stylesheet_directory_uri().'/js/carousel2.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.js?v=2.1.5"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
	jQuery(document).ready(function() {
            jQuery(".users_message").click(function(){
		  //  var getId = jQuery(this).attr('id');
                    jQuery(this).parent('.mainin').children('.messagecontent').toggle();                   
            });	
            jQuery(".fancybox").fancybox({"width":400,"height":300});
		        jQuery('#contact').validate({
        rules: {
                                            contactName: { required: true },
                                            receiverEmail: { required: true, email: true},
                                            message: { required: true },
                                            answer: { required: true, answercheck: true }
          },
        messages: {
                                            name: { required: "<?php echo esc_attr( $wpcrown_contact_name_error ); ?>" },
                                            receiverEmail:{ required: "<?php echo esc_attr( $wpcrown_contact_email_error ); ?>" },
                                            message: {required: "<?php echo esc_attr( $wpcrown_contact_message_error ); ?>"},
                                            answer: {required: "<?php echo esc_attr( $wpcrown_contact_test_error ); ?>" }
                                        },
       submitHandler: function(form) {
            jQuery('#contact .input-submit').css('display','none');
            jQuery('#contact .submit-loading').css('display','block');
            jQuery.ajax({
                    type: "POST",
              data: jQuery(form).serialize(),
              url: '<?php echo admin_url('admin-ajax.php'); ?>', 
                    success: function(data) {  alert(data);
                        jQuery('#contact :input').attr('disabled', 'disabled');
                        jQuery('#contact').fadeTo( "slow", 0, function() {
                                                                jQuery('#contact').css('display','none');
                                                                jQuery(this).find(':input').attr('disabled', 'disabled');
                                                                jQuery(this).find('label').css('cursor','default');
                                                                jQuery('#success').fadeIn();

																window.location.reload();
                                                            });
                    },
                    error: function(data) {
                                jQuery('#contact').fadeTo( "slow", 0, function() {
                                    jQuery('#error').fadeIn();
                                });
                            }
            });
          } 
        });
                                
				
				});

					jQuery('#success').css('display','none');
				jQuery('#error').css('display','none');
				jQuery('.submit-loading').css('display','none');
                                
                 jQuery("#sendmessage").click(function(){ 
		var order = jQuery("#contact").serialize();
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		jQuery.ajax ({
				type: "POST",
				url: ajaxurl,
				data: order + "&action=send_message",
				cache: false,
			success: function(data)
					{  //alert('first2'); alert(data);
					if(data1 == 1)
						{
					jQuery('#submit-loading').css('display','none');
					jQuery('#success').fadeIn();
					jQuery('#success').css('display','block');
						}
						else if(data1 == 0)
						{
							   jQuery('#success').css('display','none');
							   jQuery('#error').css('display','block');
						}
					}
                            }); 
								 
            }); 
                   
						</script> 

<!-- arrow chat code start  -->

<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=js" charset="utf-8"></script>

<!-- arrow chat code end -->
        

</body>
</html>