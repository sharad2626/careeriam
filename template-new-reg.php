<?php
/**
 * Template name: new register
 */

if ( is_user_logged_in() ) { 
  
	$profile = home_url()."/my-account";
	wp_redirect( $profile ); exit;

} 

$page = get_page($post->ID);
$current_page_id = $page->ID;

//get_header();

get_template_part('header-login');

?>

<!-- old working code start   -->

	<!--  -->
<!-- old working code end  -->

<!-- new design html code start  -->

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
            <h2 class="reg">Register an account</h2>
            <span class="para">You'll be able to connect with professionals, follow companies, and apply for jobs, Explore with confidence!</span>
            <form id="wpjobus-register" type="post" action="" >
                <div class="login-form">
                  <div class="row">
                    <div class="label-row">
                      First Name
                    </div>
                    <div class="input-row">
                      <!-- <input type="text" name="username" value="" placeholder="jonh1234doe"> -->
						<input type="text" name="userName" id="userName" value="" class="input-textarea" placeholder="" />
						<label for="userName" class="error userNameError"></label>
                    </div>
                  </div>
                   <div class="row">
                    <div class="label-row">
                     Last Name
                    </div>
                    <div class="input-row">
                      <!-- <input type="text" name="username" value="" placeholder="jonh1234doe"> -->
						<input type="text" name="lastName" id="lastName" value="" class="input-textarea" placeholder="" />
						<label for="lastName" class="error lastNameError"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="label-row">
                      Email
                    </div>
                    <div class="input-row">
                      <!-- <input type="email" name="email" value="" placeholder="jonh1234doe@gmail.com"> -->
						<input type="text" name="userEmail" id="userEmail" value="" class="input-textarea" placeholder="" />
						<label for="userEmail" class="error userEmailError"></label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="label-row">
                      Password
                    </div>
                    <div class="input-row">
                      <!-- <input type="password" name="password" value="" placeholder="****"> -->
					  <input type="password" name="userPassword" id="userPassword" value="" class="input-textarea" placeholder="" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="label-row">
                      Repeat Password
                    </div>
                    <div class="input-row">
                      <!-- <input type="password" name="repeat-pass" value="" placeholder="****"> -->
					  <input type="password" name="userConfirmPassword" id="userConfirmPassword" value="" class="input-textarea" placeholder="" />
                    </div>
                  </div>
                  <div class="row captcha-row">
                    <div class="label-row">
                      <!-- Please complete the CAPTHCA -->
					  <?php if( function_exists( 'cptch_check_custom_form' ) && cptch_check_custom_form() !== true ) echo "<br />Please complete the CAPTCHA." ?>
                    </div>
                    <div class="input-row">
                      <div class="left">
                        <label class="cptch_label">
                          <!-- <input class="cptch_input" type="text" autocomplete="off" name="cptch_number" value="" maxlength="1" size="1"> + four =  7 -->
						  <?php if( function_exists( 'cptch_display_captcha_custom' ) ) { echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; echo cptch_display_captcha_custom(); } ?>	
						</label>
						<label for="usercaptchanew" class="error usercaptchanewError"></label>
                      </div>
                      <div class="right">
                        <!-- <input type="submit" value="Register"> -->
							
							<input type="hidden" name="action" value="wpjobusRegisterForm" />
							<?php wp_nonce_field( 'wpjobusRegister_html', 'wpjobusRegister_nonce' ); ?>
							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Register', 'agrg' ); ?>" class="input-submit">	 
							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>

                      </div>
                    </div>
                  </div>
                </form>  
				<div id="success">
					<span>
							<h3><?php _e( 'Registration successful. A welcome email send to your email. You can find your details, IF you do not found email please check your spam.', 'agrg' ); ?></h3>
					</span>
				</div>

				<div id="error">
					<span>
						<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?></h3>
					</span>
					</div>
                </div> 
                 <div class="row social-row">
                  <!--   <div class="label-row">
                      Social Account Register
                    </div> -->

					<?php
						/**
						 * Detect plugin. For use on Front End only.
						 */
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

						// check for plugin using plugin name
						if ( is_plugin_active( "nextend-facebook-connect/nextend-facebook-connect.php" ) ) {
						  //plugin is activated
						
						?>

                    <div class="input-row">
                      <?php if ( is_plugin_active( "nextend-facebook-connect/nextend-facebook-connect.php" ) ) {
						  //plugin is activated
						?>

					  <a href="#" class="social-btn fb-btn" href="<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1"  onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;" >Facebook</a>
                      
					  <?php } ?>

					  <?php 
					  	// check for plugin using plugin name
						if ( is_plugin_active( "nextend-twitter-connect/nextend-twitter-connect.php" ) ) {
						  //plugin is activated  ?>

							<a href="<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1" class="social-btn tw-btn" onclick="window.location = '<?php echo get_site_url(); ?>/wp-login.php?loginTwitter=1&redirect='+window.location.href; return false;" >Twitter</a>

					  <?php } ?>
                    
					<?php
					 						// check for plugin using plugin name
						if(is_plugin_active( "nextend-google-connect/nextend-google-connect.php" ) ) {
						  //plugin is activated
		             ?>

					  <a href="<?php echo get_site_url(); ?>/login/?loginGoogle=1" class="social-btn gmail-btn" onclick="window.location = '<?php echo get_site_url(); ?>/login/?loginGoogle=1&redirect='+window.location.href; return false;" >Gmail</a>
                    
						<?php } ?>
					
					</div>


					<?php } ?>

                  </div>
            
          </div>
        </div>
      </div>
      <!-- Right half col End-->
    </section>

	<script type="text/javascript">

						jQuery(function($) {
							jQuery('#wpjobus-register').validate({
						        rules: {
						            userName: {
						                required: true,
						                minlength: 3
						            },
						            userEmail: {
						                required: true,
						                email: true
						            },
						            userPassword: {
						                required: true,
						                minlength: 6,
						            },
						            userConfirmPassword: {
						                required: true,
						                minlength: 6,
						                equalTo: "#userPassword"
						            },
                                   cptch_number:{
                                       required: true
                                      	},
                              	 lastName:{
                              	 	    required: true,
						                minlength: 3
                              	 }
						        },
						        messages: {
							        userName: {
							            required: "<?php _e( 'Please provide a username', 'agrg' ); ?>",
							            minlength: "<?php _e( 'Your username must be at least 3 characters long', 'agrg' ); ?>"
							        },
							        userEmail: {
							            required: "<?php _e( 'Please provide an email address', 'agrg' ); ?>",
							            email: "<?php _e( 'Please enter a valid email address', 'agrg' ); ?>"
							        },
							        userPassword: {
							            required: "<?php _e( 'Please provide a password', 'agrg' ); ?>",
							            minlength: "<?php _e( 'Your password must be at least 6 characters long', 'agrg' ); ?>"
							        },
							        userConfirmPassword: {
							            required: "<?php _e( 'Please provide a password', 'agrg' ); ?>",
							            minlength: "<?php _e( 'Your password must be at least 6 characters long', 'agrg' ); ?>",
							            equalTo: "<?php _e( 'Please enter the same password as above', 'agrg' ); ?>"
							        },
                                    cptch_number:{
                                       required: "<?php _e( 'Please enter the captcha value', 'agrg' ); ?>"
                                    },
                                    lastName: {
							            required: "<?php _e( 'Please provide a last name', 'agrg' ); ?>",
							            minlength: "<?php _e( 'Your last name must be at least 3 characters long', 'agrg' ); ?>"
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
						                		jQuery("#userName").addClass("error");
						                		jQuery(".userNameError").text("<?php _e( 'Username exists. Please try another one.', 'agrg' ); ?>");
						                		jQuery('.userNameError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	if(data == 2) {
						                		jQuery("#userEmail").addClass("error");
						                		jQuery(".userEmailError").text("<?php _e( 'Email exists. Please try another one.', 'agrg' ); ?>");
						                		jQuery('.userEmailError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

											if(data == 6) {
						                		jQuery(".cptch_input").addClass("error");
						                		jQuery(".usercaptchanewError").text("<?php _e( 'Enter valid captcha.', 'agrg' ); ?>");
						                		jQuery('.usercaptchanewError').css('display','block');

						                		jQuery('#wpjobus-register .input-submit').css('display','block');
						        				jQuery('#wpjobus-register .submit-loading').css('display','none');
						                	}

						                	if(data == 3) {
						                		jQuery("#userName").addClass("error");
						                		jQuery(".userNameError").text("<?php _e( 'Username exists. Please try another one.', 'agrg' ); ?>");
						                		jQuery('.userNameError').css('display','block');

						                		jQuery("#userEmail").addClass("error");
						                		jQuery(".userEmailError").text("<?php _e( 'Email exists. Please try another one.', 'agrg' ); ?>");
						                		jQuery('.userEmailError').css('display','block');

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

							                        <?php 
														$profile = home_url()."/my-account";
                                                       ?>
													 
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

    <!-- Content END-->
   
<!-- new design html code end  -->

<?php 

//get_footer(); 
get_footer('login');

?>