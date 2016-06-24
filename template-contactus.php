<?php
/**
 * Template name: Contact us
 */
global $redux_demo, $wpcrown_contact_test_error; 

$contact_email = esc_attr($redux_demo['contact-email']);
$wpcrown_contact_email_error = esc_attr($redux_demo['contact-email-error']);
$wpcrown_contact_name_error = esc_attr($redux_demo['contact-name-error']);
$wpcrown_contact_message_error = esc_attr($redux_demo['contact-message-error']);
$wpcrown_contact_thankyou = esc_attr($redux_demo['contact-thankyou-message']);

$wpcrown_contact_latitude = esc_attr($redux_demo['contact-latitude']);
$wpcrown_contact_longitude = esc_attr($redux_demo['contact-longitude']);
$wpcrown_contact_zoomLevel = esc_attr($redux_demo['contact-zoom']);

$contact_address = esc_attr($redux_demo['contact-address']);
$contact_phone = esc_attr($redux_demo['contact-phone']);
$contact_linkedin = esc_url($redux_demo['contact-linkedin']);
$contact_twitter = esc_url($redux_demo['contact-twitter']);
$contact_googleplus = esc_url($redux_demo['contact-googleplus']);
$contact_facebook = esc_url($redux_demo['contact-facebook']);

get_template_part('header-login');
?>
<div class="contact-us-main sections">
	<div class="container">
		 <div class="breadcrumbs-sec">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">contact us</a></li>
            </ul>
         </div>
    </div>
 <div class="contact-us sections">
    <div class="container">
         <div class="contact_left_content">
         <h4>Contact Us</h4>
         <p>Use this contact form to send us an email.</p>
		 <span id="success">
			<h3 style="color:#008000;font-size:17px;"><?php echo $wpcrown_contact_thankyou; ?></h3>
		</span>
		<span id="error">
		<h3  style="color:#c0392b;font-size:17px;">Something went wrong, try refreshing and submitting the form again.</h3>
		</span>
         <form id="contact" type="post" action="" >
                <h3 class="lable">Name</h3>
                <input  name="contactName" id="contactName" placeholder="Please enter your name" type="text" class="input">
				<label class="error" for="contactName" style="padding-top:42px;color:#c0392b;font-size:12px;"></label>
                <h3 class="lable">Email</h3>
                <input name="email" id="email" placeholder="Please enter your email id" type="email" class="input">
				<label class="error" for="email" style="padding-top:42px;color:#c0392b;font-size:12px;"></label>
                <h3 class="lable">Message</h3>
                <input name="message" id="message" rows="4" cols="50" placeholder="" type="textarea" class="input-textarea">
				<label class="error" for="message" style="color:#c0392b;font-size:12px;"></label>
               <!-- <div><h3 class="lable">Human test. Please input the result of 5+3=?</h3>
                <input name="text" id="text" placeholder="" type="text" class="input-test"></div>
				-->
				<div class="row captcha-row">
                    <div class="label-row">
                      <!-- Please complete the CAPTHCA -->

					  <?php if ( ( function_exists( 'cptch_check_custom_form' ) && cptch_check_custom_form() !== true ) || ( function_exists( 'cptchpr_check_custom_form' ) && cptchpr_check_custom_form() !== true ) ) echo "<br />Please complete the CAPTCHA." ?>
                    </div>
                    <div class="input-row">
                      <div class="left">
                        <label class="cptch_label">
                          <!-- <input class="cptch_input" type="text" autocomplete="off" name="cptch_number" value="" maxlength="1" size="1"> + four =  7 -->
                        
							<?php //if( function_exists( 'cptch_display_captcha_custom' ) ) { echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; echo cptch_display_captcha_custom(); } ?>
						<?php if( function_exists( 'cptch_display_captcha_custom' ) ) { echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; echo cptch_display_captcha_custom(); } if( function_exists( 'cptchpr_display_captcha_custom' ) ) { echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; echo cptchpr_display_captcha_custom(); } ?>
						</label>
						<label for="usercaptcha" class="error usercaptchaError"></label>
                      </div>
					   <div class="right">
						<input type="hidden" name="action" value="wpjobContactForm" />
						<?php wp_nonce_field( 'scf_html', 'scf_nonce' ); ?>	
						
                </div>
                      </div>

                  </div>
             <div class="submit-row">
			  <input type="submit" class="gradient-btn" value="Send message">
			 </div>
			
			 <span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
         </form>
		 
				<script type="text/javascript">


						jQuery(function($) {
							jQuery('#contact').validate({
								
						        rules: {
						            contactName: {
						                required: true
						            },
						            email: {
						                required: true,
						                email: true
						            },
						            message: {
						                required: true
						            },
						            cptch_number:{
                                       required: true
                                        
									}
						        },
						        messages: {
						            name: {
						                //required: "<?php echo $wpcrown_contact_name_error; ?>"
										   required: "This field is required."
						            },
						            email: {
						              // required: "<?php echo $wpcrown_contact_email_error; ?>"
										 required: "No email, no message."
						            },
						            message: {
						               // required: "<?php echo $wpcrown_contact_message_error; ?>"
									      required: "You have to write something to send this form."
						            },
						            cptch_number: {
						                //required: "<?php echo $wpcrown_contact_test_error; ?>"
										 required: "This field is required."
						            }
						        },
						        submitHandler: function(form) {
						        	jQuery('#contact .input-submit').css('display','none');
						        	jQuery('#contact .submit-loading').css('display','block');
						            jQuery(form).ajaxSubmit({
						            	type: "POST",
								        data: jQuery(form).serialize(),
								        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						                success: function(data) {
											// alert(data);
                                           if(data == 1)
											{
											   //alert("hi");
											  //alert(data);
						                        jQuery('#contact :input').attr('disabled', 'disabled');
						                        jQuery('#contact').fadeTo( "slow", 0, function() {
						                    	jQuery('#contact').css('display','none');
						                        jQuery(this).find(':input').attr('disabled', 'disabled');
						                        jQuery(this).find('label').css('cursor','default');
						                        jQuery('#success').fadeIn();
												jQuery('#error').css('display','none');
						                    });
											}
											if(data == 0)
											{
                                                    //alert("error mid");
													//alert(data);
													// jQuery('#contact').fadeTo( "slow", 0, function() {
						                             jQuery('#error').fadeIn();
													// });

													 $('#contact').css({ opacity: 1 });
                                               
											    jQuery('#contact :input').attr('enabled', 'enabled');
												 jQuery(".cptch_input").addClass("error");
						                		jQuery(".usercaptchaError").text("Enter valid captcha.");
						                		jQuery('.usercaptchaError').css('display','block');

						                		jQuery('#contact .input-submit').css('display','block');
						        	           jQuery('#contact .submit-loading').css('display','none');
											    jQuery(this).find(':input').attr('enabled', 'enabled');
												jQuery('#success').css('display','none');

											}
						                },
						                error: function(data) {
											//alert("error");
											 //alert(data);
						                    jQuery('#contact').fadeTo( "slow", 0, function() {
						                        jQuery('#error').fadeIn();
						                    });
						                }
						            });
						        }
						    });
						});
				</script>

         </div>
         <div class="contact_right_content">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57168.228604998214!2d-81.83509820942356!3d26.42301550056689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88db11dab201734d%3A0xb394cd8f1c700fa4!2sEstero%2C+FL%2C+USA!5e0!3m2!1sen!2sin!4v1461154800555" width="500" height="335" frameborder="0" style="border:0" allowfullscreen></iframe>
         <h5>Address</h5>
         <p>21301 S. Tamiami Trail Suite 320 PMB 105   
Estero, FL 33928</p>
         </div>	
    </div>    
 </div>
</div>

<?php 

//get_footer(); 
get_footer('login');

?>