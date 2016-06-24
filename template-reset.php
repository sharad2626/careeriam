<?php
/**
 * Template name: Reset Password Page
 */

if ( is_user_logged_in() ) { 

	global $redux_demo; 
	$profile = $redux_demo['profile'];
	wp_redirect( $profile ); exit;

}

$page = get_page($post->ID);
$current_page_id = $page->ID;

//get_header(); 

get_template_part('header-login');

?>

	<section  class="profile-header sections reset-pass">

		<div class="container">
			<div class="breadcrumbs-sec">
	            <ul>
	              <li><a href="#">Home</a></li>
	              <li><a href="#" class="active">Reset Password</a></li>
	            </ul>
	          </div>

			<div class="acc-sec">
				<div class="acc-head">
	              <h4 class="acc-title">
	              	<i class="fa fa-check"></i>
	              	<?php _e( 'Reset Password', 'agrg' ); ?></h4>
	            </div>

				<div class="full acc-body">

					<div class="one_half first">

						<form id="wpjobus-register" type="post" action="" >

							<span class="full" style="margin-bottom: 0;">  
						  	
							  	<span class="label">
									<h3><?php _e( 'Email:', 'agrg' ); ?></h3>
								</span>

								<span class="input">
									<input type="text" name="userEmail" id="userEmail" value="" class="input-textarea" placeholder="" />
									<label for="userEmail" class="error userEmailError"></label>
					                  <div class="full captcha-cont">

											<?php if( function_exists( 'cptch_display_captcha_custom' ) ) { echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; echo cptch_display_captcha_custom(); } ?>
											<?php if( function_exists( 'cptch_check_custom_form' ) && cptch_check_custom_form() !== true ) echo "<span class='captcha-msg'>&nbsp;Please complete the CAPTCHA. </span>" ?>
											<label for="usercaptcha" class="error usercaptchaError"></label>
										</div>
								</span>

							</span>
							
							<input type="hidden" name="action" value="wpjobusResetForm" />
							<?php wp_nonce_field( 'wpjobusReset_html', 'wpjobusReset_nonce' ); ?>

							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Submit', 'agrg' ); ?>" class="input-submit gradient-btn submit-sec">	 

							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
						  	  
						</form>

						<div id="success">
							<span>
							   	<h3><?php _e( 'Check your email for new password.', 'agrg' ); ?></h3>
							</span>
						</div>
							 
						<div id="error">
							<span>
							   	<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?></h3>
							</span>
						</div>

						<script type="text/javascript">

						jQuery(function($) {
							jQuery('#wpjobus-register').validate({
						        rules: {
						            userEmail: {
						                required: true,
						                email: true
						            }
						        },
						        messages: {
							        userEmail: {
							            required: "<?php _e( 'Please provide an email address', 'agrg' ); ?>",
							            email: "<?php _e( 'Please enter a valid email address', 'agrg' ); ?>"
							        }
							    },
						        submitHandler: function(form) {
						        	jQuery('#wpjobus-register .input-submit').css('display','none');
						        	jQuery('#wpjobus-register .submit-loading').css('display','block');
						            jQuery(form).ajaxSubmit({
						            	type: "POST",
								        data: jQuery(form).serialize(),
								        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						                success: function(data) {
						                	//alert(data);
						                	if(data == 2) {
						                		jQuery("#userEmail").addClass("error");
						                		jQuery(".userEmailError").text("<?php _e( 'There is no user available for this email.', 'agrg' ); ?>");
						                		jQuery('.userEmailError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	
						                	if(data == 'sent1') {
						                		//alert('success');
						                		jQuery('#wpjobus-register :input').attr('disabled', 'disabled');
							                    jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
							                    	jQuery('#wpjobus-register').css('display','none');
							                        jQuery(this).find(':input').attr('disabled', 'disabled');
							                        jQuery(this).find('label').css('cursor','default');
							                        jQuery('#success').fadeIn();
							                    });
						                	}
						                	if(data == '') {
						                		//alert('failed');
						                		jQuery(".usercaptchaError").text("<?php _e( 'Enter valid captcha.', 'agrg' ); ?>");
						                		jQuery('.usercaptchaError').css('display','block');
						                		jQuery('.captcha-msg').css('display','none');
						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                		
						                	}


						                	if(data == 3) {
						                		jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
							                        jQuery('#error').fadeIn();
							                    });
						                	}
						                },
						                error: function(data) {
						                    jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
						                        jQuery('#error').fadeIn();
						                    });
						                }
						            });
						        }
						    });
						});
						</script>

					</div>

					<div class="one_half">



					</div>

				</div>

			</div>

		</div>

	</section>

<?php //get_footer(); 

  get_footer('login');

?>