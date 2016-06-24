<?php
/**
 * Template name: Login Page
 */

if ( is_user_logged_in() ) { 

	$profile = home_url()."/my-account";
	wp_redirect( $profile ); exit;

} 

$info_text = $_GET['info'];
global $redux_demo; 
$access_state_text = $redux_demo['access-state-text'];

$page = get_page($post->ID);
$current_page_id = $page->ID;

//get_header(); 

get_template_part('header-login');

?>

	<!--  -->

	<!-- new phase2 html starts  -->
	<!-- Content START-->
    <section class="login-sec sections">
      <!-- Left half col START-->
      <div class="half-col">
      </div>
      <!-- Left half col End-->
      <!-- Right half col START-->
      <div class="half-col">
        <div class="login-wrap">
          <div class="login-container">
            <h2>Login</h2>
            <span>You'll be able to connect with professionals, follow companies, and apply for jobs, Explore with confidence!</span>
           
			<form id="wpjobus-register" type="post" action="" novalidate="novalidate" >
           
				<div class="login-form">
                  <div class="row">
                    <div class="label-row">
                      Email
                    </div>
                    <div class="input-row">
                      <!-- <input type="text" name="username" value="" placeholder="jonh1234doe"> -->
							<input type="text" name="userEmail" id="userEmail" value="" class="input-textarea" placeholder="" />
							<label for="userEmail" class="error userEmailError"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="label-row">
                      Password
                      <a  href="<?php $reset = home_url()."/reset"; echo $reset; ?>" class="forgot-pass">Forgot Password</a>
                    </div>
                    <div class="input-row">
                      <!-- <input type="password" name="password" value="" placeholder="****"> -->
							<input type="password" name="userPassword" id="userPassword" value="" class="input-textarea" placeholder="" />
							<label for="userPassword" class="error userPasswordError"></label>
                    </div>
                  </div>
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
                        <!-- <input type="submit" value="Login"> -->
							<input type="hidden" name="action" value="wpjobusLoginForm" />
							<?php wp_nonce_field( 'wpjobusLogin_html', 'wpjobusLogin_nonce' ); ?>
							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Login', 'agrg' ); ?>" class="input-submit">
							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
                      
					  </div>
                    </div>
                  </div>
                  <div class="row remember_me">
                    <input name="rememberme" type="checkbox" value="">
                    <span>Remember</span>
                  </div>
                </div> 
				
				</form>

				<div id="success">
					<span>
						<h3><?php _e( 'Login successful.', 'agrg' ); ?></h3>
					</span>
				</div>
					 
				<div id="error">
					<span>
						<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?></h3>
					</span>
				</div>

                 <div class="row social-row">
                    <div class="label-row">
                     <!--  Social Account Register -->
                    </div>
                    <div class="input-row">
                    
					<?php 					
							if(get_option('users_can_register')) { //Check whether user registration is enabled by the administrator
						?>
					  
					  <?php
						/**
						 * Detect plugin. For use on Front End only.
						 */
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>


                    <?php  if( is_plugin_active("nextend-facebook-connect/nextend-facebook-connect.php" ) ) {
						  //plugin is activated
						
						?>   
					  
					  <a href="<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1"  class="social-btn fb-btn" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"  >Facebook</a>

					<?php } ?>
					
				
								
					<?php 
							// check for plugin using plugin name
						if ( is_plugin_active( "nextend-twitter-connect/nextend-twitter-connect.php" ) ) {
						  //plugin is activated 
						  ?>

                      <a href="<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1" class="social-btn tw-btn" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;" >Twitter</a>
                      
					<?php } ?>  
					 
					  
					<?php 	if(is_plugin_active("nextend-google-connect/nextend-google-connect.php" ) ) {
						  //plugin is activated
						
						?>
					  
					  <a href="<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1" class="social-btn gmail-btn" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginGoogle=1&redirect='+window.location.href; return false;" >Gmail</a>
                    
					

					 <?php } ?>


					
					<?php } ?>

					</div>
                  </div>
            
          </div>
        </div>
      </div>
      <!-- Right half col End-->
    </section>
    <!-- Content END-->


							<script type="text/javascript">

						jQuery(function($) {
							jQuery('#wpjobus-register').validate({
						        rules: {
						          userEmail: {
						                required: true,
						                email: true
						            },
						            userPassword: {
						                required: true,
						                minlength: 1,
						            },
									cptch_number:{
                                       required: true
                                        
									}
						        },
						        messages: {
							       userEmail: {
							            required: "<?php _e( 'Please provide an email address', 'agrg' ); ?>",
							            email: "<?php _e( 'Please enter a valid email address', 'agrg' ); ?>"
							        },
							        userPassword: {
							            required: "<?php _e( 'Please provide a password', 'agrg' ); ?>",
							            minlength: "<?php _e( 'Your password must be at least 6 characters long', 'agrg' ); ?>"
							        }
							    },
						        submitHandler: function(form) {
						        	jQuery('#wpjobus-register .input-submit').css('display','none');
						        	jQuery('#wpjobus-register .submit-loading').css('display','block');
						            jQuery(form).ajaxSubmit({
						            	type: "POST",
								        data: jQuery(form).serialize(),
								        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						                success: function(data) { //alert(data);
						                	if(data == 1) {
						                		jQuery("#userEmail").addClass("error");
						                		jQuery(".userEmailError").text("<?php _e( 'userEmail doesn’t exists. Please try another one.', 'agrg' ); ?>");
						                		jQuery('.userEmailError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	if(data == 2) {
						                		jQuery("#userPassword").addClass("error");
						                		jQuery(".userPasswordError").text("<?php _e( 'Password doesn’t exists. Please try another one.', 'agrg' ); ?>");
						                		jQuery('.userPasswordError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}


											if(data == 6) {
						                		jQuery(".cptch_input").addClass("error");
						                		jQuery(".usercaptchaError").text("<?php _e( 'Enter valid captcha.', 'agrg' ); ?>");
						                		jQuery('.usercaptchaError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	if(data == 3) {
						                		jQuery("#userEmail").addClass("error");
						                		jQuery(".userEmailError").text("<?php _e( 'Username doesn’t exists. Please try another one.', 'agrg' ); ?>");
						                		jQuery('.userEmailError').css('display','block');

						                		jQuery("#userPassword").addClass("error");
						                		jQuery(".userPasswordError").text("<?php _e( 'Password doesn’t exists. Please try another one.', 'agrg' ); ?>");
						                		jQuery('.userPasswordError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	if(data == 4) {

						                		 
						                		jQuery('#wpjobus-register :input').attr('disabled', 'disabled');
							                    jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
							                    	jQuery('#wpjobus-register').css('display','none');
							                        jQuery(this).find(':input').attr('disabled', 'disabled');
							                        jQuery(this).find('label').css('cursor','default');
							                        jQuery('#success').fadeIn();

							                        <?php $profile = home_url()."/my-account"; ?>
      												var delay = 1000;
      												setTimeout(function(){ window.location = '<?php echo $profile; ?>';}, delay); 
							                    });
						                	}

						                	if(data == 5) {
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

	<!-- new phase2 html starts  -->


<?php 

//get_footer(); 

get_footer('login');


?>