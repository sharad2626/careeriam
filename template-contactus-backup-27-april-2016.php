<?php
/**
 * Template name: Contact us
 */
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
         <form id="contact" type="post" action="" >
                <h3 class="lable">Name</h3>
                <input  name="contactName" id="contactName" placeholder="Please enter your name" type="text" class="input">
				<label class="error" for="contactName" style="padding-top:27px;"></label>
                <h3 class="lable">Email</h3>
                <input name="email" id="email" placeholder="Please enter your email id" type="email" class="input">
				<label class="error" for="email" style="padding-top:27px;"></label>
                <h3 class="lable">Message</h3>
                <input name="message" id="message" rows="4" cols="50" placeholder="" type="textarea" class="input-textarea">
				<label class="error" for="message"></label>
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
             <input type="submit" class="gradient-btton" value="Send message">
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
						                   	jQuery('#contact :input').attr('disabled', 'disabled');
						                    jQuery('#contact').fadeTo( "slow", 0, function() {
						                    	jQuery('#contact').css('display','none');
						                        jQuery(this).find(':input').attr('disabled', 'disabled');
						                        jQuery(this).find('label').css('cursor','default');
						                        jQuery('#success').fadeIn();
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