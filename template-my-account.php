<?php
/**
 * Template name: My Account Page
 */

if(!is_user_logged_in()){ 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

} 

global $redux_demo; 
$gateway_type = $redux_demo['payment-gateway-type'];

if($gateway_type == 1)
{
	get_template_part( 'template-my-account-paypal', 'my-account' );
    exit;
}

global $current_user, $user_id, $user_info;
get_currentuserinfo();
$user_id = $current_user->ID; // You can set $user_id to any users, but this gets the current users ID.
$user_info = get_userdata($user_id);

$page = get_page($post->ID);
$current_page_id = $page->ID;

if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
	$delete_post_id = esc_attr(strip_tags($_POST['deletepostid']));
	wp_delete_post( $delete_post_id, true );  /* delete the post we choosed   */
};

//get_header(); 

get_template_part('header-myaccount');

?>

	<!-- -->

<!-- New html middle content starts  -->

<!-- Content START-->


	<?php 

		global $result;

		$resume_id = $wpdb->get_results( "SELECT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and post_status = 'publish' and post_author = '".$user_id."' ");

		foreach ($resume_id as $key => $value) {
			$result[] = $value->ID;
		}

		$wpjobus_resume_profile_picture = esc_url(get_post_meta($result[0], 'wpjobus_resume_profile_picture',true));
		$wpjobus_resume_fullname = esc_attr(get_post_meta($result[0], 'wpjobus_resume_fullname',true));

		$wpjobus_resume_prof_title = esc_attr(get_post_meta($result[0], 'wpjobus_resume_prof_title',true));
		
		$resume_location= get_post_meta($result[0],'resume_location',true);

		$resume_industry = get_post_meta($result[0],'resume_industry',true);

		$wpjobus_resume_cover_image = esc_url(get_post_meta($result[0],'wpjobus_resume_cover_image',true));
		$wpjobus_resume_cover_image_default = get_stylesheet_directory_uri().'/images/default-cover.jpg';
		
		
		if(!empty($wpjobus_resume_profile_picture)) {
			$my_avatar = $wpjobus_resume_profile_picture;
		}

		global $current_user;
		$userid = $current_user->ID;
		$userresume = $wpdb->get_var( "SELECT DISTINCT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$userid."' ");	



	?>

	<div class="profile-header sections">
      <div class="container">
          <div class="breadcrumbs-sec">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Profile</a></li>
              <li><a href="<?php echo esc_url( home_url( '/' ) )."resume/".$userresume; ?>" class="active"><?php echo $wpjobus_resume_fullname; ?></a></li>
            </ul>
          </div>


          <div class="profile-banner" style="background:url('<?php if($wpjobus_resume_cover_image!=''){ echo $wpjobus_resume_cover_image; }else{ echo $wpjobus_resume_cover_image_default; } ?>' )no-repeat 0 0 / cover">
            <div class="profile-details">
              <div class="user-icon">
                <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/user-details_03.png" alt="User Profile"> -->
				


				<?php require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); ?>
							
				<?php  

				 //echo $my_avatar;

                    $pos=false; 
					$mystring = $my_avatar;
					$findme   = 'user-default.png';
					$pos = strpos($mystring, $findme);

                    if($pos){
				
						$my_avatar= get_stylesheet_directory_uri()."/images/user-default.png";
					
					} 


					if(!empty($my_avatar)){  

						$params = array( 'width' => 85, 'height' => 85, 'crop' => true );

						echo "<img  src='" . bfi_thumb( "$my_avatar", $params ) . "' alt='' />";

					} else {  

				?>

					<?php



					//$my_avatar  = WPJobus_get_avatar_url ( get_the_author_meta('user_email', $user_id), $size = '100' ); 
					//$my_avatar  ='http://careeriam.com/wp-content/themes/careeriam/images/user-default.png';
					$my_avatar  = get_stylesheet_directory_uri()."/images/user-default.png";
					
					?>
					<img src="<?php echo $my_avatar; ?>" alt="" />

				<?php } ?>

			  
			  </div>
              <h3><?php if(!empty($wpjobus_resume_fullname)) { echo $wpjobus_resume_fullname; } else { echo $user_identity; } ?></h3>
              <div class="add-details">


			   <div class="list address"><span class="text" title="<?php echo $wpjobus_resume_prof_title; ?>"><?php 
				 $wpjobus_resume_prof_title = substr($wpjobus_resume_prof_title,0,20);
				echo esc_attr($wpjobus_resume_prof_title); ?></span></div>
                <div class="list address">
				<?php if($resume_location!='') { ?><span class="icon" ></span> <?php } ?>
				<span class="text" title="<?php echo $resume_location; ?>"><?php echo esc_attr($resume_location); ?></span></div>
                <div class="list designation">
				<?php if($resume_industry!='') { ?><span class="icon"></span>  <?php } ?>
				<span class="text" title="<?php echo $resume_industry; ?>" ><?php echo esc_attr($resume_industry); ?></span></div>
                 <div class="list settings my-account-header-settings-link">
                  <i class="fa fa-cog"></i>
                  <span class="text">Account Settings</span>
                </div>
                <!-- <div class="list email my-account-header-subscriptions-link">
                  <i class="fa fa-envelope"></i>
                  <span class="text">Manage Email Subscription</span>
                </div>  -->
              </div>
              <a href="<?php $edit_resume = home_url()."/edit-profile/?post=".$userresume; echo $edit_resume; ?>" class="edit-pro gradient-btn">Edit Profile</a>
            </div>
          </div>
          <!-- Account Settings start -->
          <div class="acc-sec my-account-settings">
            <div class="acc-head">
              <h4 class="acc-title"><i class="fa fa-cogs"></i>Account Settings</h4>
            </div>
          
            <div class="acc-body">
              <form id="wpjobus-register" >
                  <span class="full">
                    <span class="label">
                      <h3>Email</h3>
                    </span>
                    <span class="input">
                      <input type="text" name="userEmail" id="userEmail" autocomplete="off">
                    </span>
                  </span>
                  <span class="full">
                    <span class="label">
                      <h3>Password</h3>
                    </span>
                    <span class="input">
                      <input type="password" name="userPassword" id="userPassword" >
                    </span>
                  </span>
                  <span class="full">
                    <span class="label">
                      <h3>Repeat Password</h3>
                    </span>
                    <span class="input">
                      <input type="password" name="userConfirmPassword" id="userConfirmPassword">
                    </span>
                  </span>
                  <div class="submit-row">
						
						<input type="hidden" name="userID" value="<?php echo get_current_user_id(); ?>" />
						<input type="hidden" name="action" value="wpjobusUpdateAccountForm" />
						<?php wp_nonce_field( 'wpjobusUpdateAccount_html', 'wpjobusUpdateAccount_nonce' ); ?>
                        <input type="submit" class="input-submit gradient-btn submit-sec" value="Edit Profile" />
						
						<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>

                  </form>
				  
				  <form method="post" action="" >
						<input type="hidden" name="act" id="act" value="del">
						<input type="submit" class="gradient-btn submit-sec" value="Delete Account"  onclick="return confirm('Are you sure you want to Delete Account? ')" />
				  </form>
				   
						
                  </div>
            
			  
			  <!-- handling messages -->
					
					<div id="success">
						<span>
							<h3><?php _e( 'Account updated successful.', 'agrg' ); ?></h3>
						</span>
					</div>
						 
					<div id="error">
						<span>
							<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?></h3>
						</span>
					</div>

			  <!-- handling messages -->

			  <!-- account deletion code start  -->

					<?php 
							
					if(isset($_POST['act']) && $_POST['act']=='del' ){

						$user_id = get_current_user_id();
						global $wpdb;
						$delete_query=$wpdb->delete( 'wp_users', array( 'ID' => $user_id) );
						//wp_redirect(home_url()); ?>
						<script type="text/javascript">
							window.location = "http://careeriam.com/login/";
						</script>
					<?php
					}  
					?>

			  <!--  account deletion code end  -->
			  
			  <!-- Javascript function for edit profile  -->

			  			<script type="text/javascript">

							jQuery(function($) { 
							

								jQuery('#wpjobus-register').validate({ 
							        rules: {
							            userEmail: {
							                email: true
							            },
							            userPassword: {
							                minlength: 6,
							            },
							            userConfirmPassword: {
							                minlength: 6,
							                equalTo: "#userPassword"
							            }
							        },
							        messages: {
								        userEmail: {
								            email: "<?php _e( 'Please enter a valid email address', 'agrg' ); ?>"
								        },
								        userPassword: {
								            minlength: "<?php _e( 'Your password must be at least 6 characters long', 'agrg' ); ?>"
								        },
								        userConfirmPassword: {
								            minlength: "<?php _e( 'Your password must be at least 6 characters long', 'agrg' ); ?>",
								            equalTo: "<?php _e( 'Please enter the same password as above', 'agrg' ); ?>"
								        }
								    },

                                    
							        submitHandler: function(form) {
									
										/* above jquery is not performing validation so I have have put custom validation */ 
									    /* userEmail  userPassword  userConfirmPassword */ 
                                          
										 var userEmail			 = $("#userEmail").val();
										 var userPassword		 = $("#userPassword").val();
										 var userConfirmPassword = $("#userConfirmPassword").val();
			
										 if(userPassword==''){
										   alert("Please fill Email field");
										   return false;
										 }

										 if(userPassword==''){
										   alert("Please fill User Password field");
										   return false;	
										 }

										 if(userConfirmPassword==''){
										   alert("Please fill User Password field");
										   return false;	
										 }

										 if(userConfirmPassword!=userPassword){
										   alert("Password and Confirm Password is not matching");
										   return false;
										 }	

										/* custom validation end */

                                         
							        	jQuery('#wpjobus-register .input-submit').css('display','none');
							        	jQuery('#wpjobus-register .submit-loading').css('display','block');
							            jQuery(form).ajaxSubmit({
							            	type: "POST",
									        data: jQuery(form).serialize(),
									        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
							                success: function(data) { //alert(data);

							                	if(data == 1) {
							                		jQuery('#wpjobus-register :input').attr('disabled', 'disabled');
								                    jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
								                    	jQuery('#wpjobus-register').css('display','none');
								                        jQuery(this).find(':input').attr('disabled', 'disabled');
								                        jQuery(this).find('label').css('cursor','default');
								                        jQuery('#success').fadeIn();
								                        jQuery('#success span h3').html("<?php _e( 'Password updated successful.', 'agrg' ); ?>");

								                        <?php $profile = home_url()."/login"; ?>
	      												var delay = 500;
	      												setTimeout(function(){ window.location = '<?php echo $profile; ?>';}, delay);

								                    });
							                	}

							                	if(data == 2) {
							                		jQuery('#wpjobus-register :input').attr('disabled', 'disabled');
								                    jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
								                    	jQuery('#wpjobus-register').css('display','none');
								                        jQuery(this).find(':input').attr('disabled', 'disabled');
								                        jQuery(this).find('label').css('cursor','default');
								                        jQuery('#success').fadeIn();
								                        jQuery('#success span h3').html("<?php _e( 'E-mail updated successful.', 'agrg' ); ?>");

								                    });
							                	}

							                	if(data == 3) {
							                		jQuery('#wpjobus-register :input').attr('disabled', 'disabled');
								                    jQuery('#wpjobus-register').fadeTo( "slow", 0, function() {
								                    	jQuery('#wpjobus-register').css('display','none');
								                        jQuery(this).find(':input').attr('disabled', 'disabled');
								                        jQuery(this).find('label').css('cursor','default');
								                        jQuery('#success').fadeIn();
								                        jQuery('#success span h3').html("<?php _e( 'Password and E-mail updated successful.', 'agrg' ); ?>");

								                        <?php $profile = home_url()."/login"; ?>
	      												var delay = 500;
	      												setTimeout(function(){ window.location = '<?php echo $profile; ?>';}, delay);

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

			  <!-- Javascript function fir updating edit profile  -->

            </div>
          </div>
          <!-- Account Settings end -->
          <!-- Manage Email Subscription start -->
          <div class="acc-sec my-account-subscriptions">
            <div class="full">
              <form id="wpjobus-save-subscriptions" type="post" action="" >
				<div id="tabs" class="my-acc-tabs">
                  <ul>
                    <li class="acc-head active">
                      <a class="acc-title" href="#job-offers"><i class="fa fa-cogs"></i>Job Offers Subscriptions</a>
                    </li>
                    <li class="acc-head">
                      <a class="acc-title" href="#resume-sub"><i class="fa fa-file"></i>Resumes Subscriptions</a>
                    </li>
                    <li class="acc-head">
                      <a class="acc-title" href="#comp-sub"><i class="fa fa-briefcase"></i>Companies Subscriptions</a>
                    </li>
                  </ul>
                  <div id="job-offers" class="acc-body pane">
                    <!-- <div class="one-half"> -->
                       <span class="full">
                        <span class="label">
                          <h3>Categories1</h3>
                        </span>
                        
						<!-- <span class="input">
                          <input type="checkbox" name="category" />
                        </span>
						-->
						<span class="input">
							<?php 
								$user_job_categories = get_user_meta( $user_id, 'user_job_categories_subcriptions' );
								global $redux_demo, $job_industry; 
								for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
							?>
						
							<div class="one_fourth <?php if( $i%4 == 0 ) { echo 'first'; } ?>" style="margin-bottom: 0;">

								<input type="checkbox" name="job-categories[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume-industries'][$i]; ?>" style="float: left; width: auto;" <?php if(!empty($user_job_categories)) { if (in_array($redux_demo['resume-industries'][$i], $user_job_categories[0])) { ?> checked="checked" <?php } } ?> ><?php echo $redux_demo['resume-industries'][$i]; ?>

							</div>

							<?php 
								}
							?>
						</span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Locations</h3>
                        </span>
                        
						<!-- <span class="input">
                          <input type="text" name="location" />
                        </span>
						-->
						<span class="input">
									<?php 
										$user_job_locations = get_user_meta( $user_id, 'user_job_locations_subcriptions' );
										global $redux_demo, $job_location; 
										for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {
									?>

									<div class="one_fourth <?php if( $i%4 == 0 ) { echo 'first'; } ?>" style="margin-bottom: 0;">

										<input type="checkbox" name="job-locations[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume-locations'][$i]; ?>" style="float: left; width: auto;" <?php if(!empty($user_job_locations)) { if (in_array($redux_demo['resume-locations'][$i], $user_job_locations[0])) { ?> checked="checked" <?php } } ?> ><?php echo $redux_demo['resume-locations'][$i]; ?>

									</div>

									<?php 
										}
									?>
                      	</span>
                      </span>
                    <!-- </div> -->
                  </div>
                  <div id="resume-sub" class="acc-body pane">
                    <!-- <div class="one-half"> -->
                       <span class="full">
                        <span class="label">
                          <h3>Categories2</h3>
                        </span>
                        
						<!-- <span class="input">
                          <input type="text" name="category" />
                        </span>
						-->
						<span class="input">
								<?php 
										$user_resume_categories = get_user_meta( $user_id, 'user_resume_categories_subcriptions' );
										global $redux_demo, $job_industry; 
										for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
									?>

									<div class="one_fourth <?php if( $i%4 == 0 ) { echo 'first'; } ?>" style="margin-bottom: 0;">

										<input type="checkbox" name="resume-categories[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume-industries'][$i]; ?>" style="float: left; width: auto;" <?php if(!empty($user_resume_categories)) { if (in_array($redux_demo['resume-industries'][$i], $user_resume_categories[0])) { ?> checked="checked" <?php } } ?> ><?php echo $redux_demo['resume-industries'][$i]; ?>

									</div>

									<?php 
										}
									?>
                      	</span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Locations</h3>
                        </span>
                        
						<!-- <span class="input">
                          <input type="text" name="location" />
                        </span>
                        -->
                        <span class="input">
							<?php 
								$user_resume_locations = get_user_meta( $user_id, 'user_resume_locations_subcriptions' );
								global $redux_demo, $job_location; 
								for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {
							?>

							<div class="one_fourth <?php if( $i%4 == 0 ) { echo 'first'; } ?>" style="margin-bottom: 0;">

								<input type="checkbox" name="resume-locations[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume-locations'][$i]; ?>" style="float: left; width: auto;" <?php if(!empty($user_resume_locations)) { if (in_array($redux_demo['resume-locations'][$i], $user_resume_locations[0])) { ?> checked="checked" <?php } } ?> ><?php echo $redux_demo['resume-locations'][$i]; ?>

							</div>

							<?php 
								}
							?>
                      	</span>
                      </span>
                    <!-- </div> -->
                  </div>
                  <div id="comp-sub" class="acc-body pane">
                   <!--  <div class="one-half"> -->
                       <span class="full">
                        <span class="label">
                          <h3>Categories3</h3>
                        </span>
                        
						<!-- <span class="input">
                          <input type="text" name="category" />
                        </span>
						-->
						<span class="input">
							<?php 
									$user_company_categories = get_user_meta( $user_id, 'user_company_categories_subcriptions' );
									global $redux_demo, $job_industry; 
									for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
								?>

								<div class="one_fourth <?php if( $i%4 == 0 ) { echo 'first'; } ?>" style="margin-bottom: 0;">

									<input type="checkbox" name="company-categories[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume-industries'][$i]; ?>" style="float: left; width: auto;" <?php if(!empty($user_company_categories)) { if (in_array($redux_demo['resume-industries'][$i], $user_company_categories[0])) { ?> checked="checked" <?php } } ?> ><?php echo $redux_demo['resume-industries'][$i]; ?>

								</div>

								<?php 
									}
								?>
                      	</span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Locations</h3>
                        </span>
                        <!-- <span class="input">
                          <input type="text" name="location" />
                        </span>
							-->

							<span class="input">
								<?php 
									$user_company_locations = get_user_meta( $user_id, 'user_company_locations_subcriptions' );
									global $redux_demo, $job_location; 
									for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {
								?>

								<div class="one_fourth <?php if( $i%4 == 0 ) { echo 'first'; } ?>" style="margin-bottom: 0;">

									<input type="checkbox" name="company-locations[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume-locations'][$i]; ?>" style="float: left; width: auto;" <?php if(!empty($user_company_locations)) { if (in_array($redux_demo['resume-locations'][$i], $user_company_locations[0])) { ?> checked="checked" <?php } } ?> ><?php echo $redux_demo['resume-locations'][$i]; ?>

								</div>

								<?php 
									}
								?>
                      		</span>	
                      </span>
                    <!-- </div> -->
                  </div>
                  <div class="full submit-row">
                   <!--  <div class="one-half"> -->
                      <div class="one-half">
                        <span class="close-subscriptions-block">Close</span>
                      </div>
                      <div class="one-half">
                        <input name="submit" type="submit" value="Save Subscription" class="gradient-btn submit-sec save-subscriptions-block">
						<span class="submit-loading" style="float: right;"><i class="fa fa-refresh fa-spin"></i></span>
                      </div>
                    <!-- </div> -->
                  </div>
                </div>
				
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
					<input type="hidden" name="action" value="wpjobusSaveSubscriptionsForm" />
					<?php wp_nonce_field( 'wpjobusSaveSubscriptions_html', 'wpjobusSaveSubscriptions_nonce' ); ?>
                </form>

					<script type="text/javascript">

						jQuery(function($) {

							jQuery(document).on("click","#wpjobus-save-subscriptions .save-subscriptions-block",function(e){

								$.fn.wpjobusSaveSubscriptionsFunction();

								e.preventDefault();
								return false;

							});

							$.fn.wpjobusSaveSubscriptionsFunction = function() {

								jQuery('#wpjobus-save-subscriptions').ajaxSubmit({
									type: "POST",
									data: jQuery('#wpjobus-save-subscriptions').serialize(),
									url: '<?php echo admin_url('admin-ajax.php'); ?>',
									beforeSend: function() { 
									    jQuery('#wpjobus-save-subscriptions .save-subscriptions-block').css('display','none');
									    jQuery('#wpjobus-save-subscriptions .submit-loading').css('display','block');
									},	 
									success: function(data) {
									    jQuery('#wpjobus-save-subscriptions .submit-loading').css('display','none');
									    jQuery('#wpjobus-save-subscriptions .save-subscriptions-block').css('display','block');

									    jQuery('#success-subscriptions').fadeIn();

									    var delay = 20;
      									setTimeout(function(){ 
      										jQuery('#success-subscriptions').fadeOut();
      									}, delay);
									},
									error: function(data) {
									    jQuery('#wpjobus-save-subscriptions .save-subscriptions-block').css('display','block');
									    jQuery('#wpjobus-save-subscriptions .submit-loading').css('display','none');

									    jQuery('#error-subscriptions').fadeIn();
									}
								});

							}
						});
				   </script>
            </div>
          </div>
          <!-- Manage Email Subscription end -->
          <!-- Account section start -->
          <div class="acc-sec my-account-companies">
            <div class="acc-head">
              <h4 class="acc-title">
              	<i class="fa fa-briefcase"></i>
              	Company Profile</h4>
              <a href="<?php $new_company = home_url()."/add-company"; echo $new_company; ?>" class="add-co-prof-btn add-btns">Add Company Profile <span> + </span></a>
            </div>
          
            <div class="acc-body">
              <div class="add-row">
                <div class="col col1">
                  <div class="label">
                    <span>Title</span>
                  </div>
                 
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Added</span>
                  </div>
                  
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Status</span>
                  </div>
                  
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Views</span>
                  </div>
                 
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Edit</span>
                  </div>
                  
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Delete</span>
                  </div>
                 
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Visibility</span>
                  </div>
                  
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Features</span>
                  </div>
                  
                </div>
              </div> 

			<?php 

				$company_id = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$user_id."' ORDER BY `ID` DESC");

				foreach ($company_id as $key => $value) {
					$result_company[] = $value->ID;
					$result_company_date[] = $value->post_date;
					$result_company_status[] = $value->post_status;

					$wpjobus_company_fullname = esc_attr(get_post_meta($result_company[$key], 'wpjobus_company_fullname',true));

					$company_id = $result_company[$key];

				   ?>


              <!--Results Row START-->
              <div class="results-content">
                <div class="results-row">
	                <div class="col col1">
	                  <div class="label">
	                    <span>
								<?php if(get_post_status($result_company[$key]) == 'pending') { ?>

									<a href="#"><?php echo $wpjobus_company_fullname; ?> (<?php _e( 'Pending review', 'agrg' ); ?>)</a>

								<?php } else { ?>

									<a href="<?php if(get_post_status($result_company[$key]) == 'draft') { $companylink = "#"; } else { $companylink = home_url()."/company/".$result_company[$key]; } echo $companylink; ?>"><?php echo $wpjobus_company_fullname; ?></a>

								<?php } ?>
						
						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>
								<?php echo human_time_diff( strtotime($result_company_date[$key]), current_time('timestamp') ) . ' '; _e( 'ago', 'agrg' ); ?>
						
						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>
								<?php if($result_company_status[$key] == 'publish') { echo _e( 'Published', 'agrg' ); } else { echo $result_company_status[$key]; } ?>
						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>
								<?php $postid = $result_company[$key]; echo wpb_get_post_views($postid); ?>

						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>
							
							<a href="<?php $edit_comp = home_url()."/edit-company/?post=".$result_company[$key]; echo $edit_comp; ?>"><i class="fa fa-pencil-square-o"></i></a>

						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>
								<?php 

									$total_jobs = 0;

									$company_jobs = $wpdb->get_results( "SELECT p.ID
																		FROM  `{$wpdb->prefix}posts` p
																		LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id
																		WHERE p.post_type = 'job'
																		AND (p.post_status = 'publish' or p.post_status = 'draft' or p.post_status = 'pending')
																		AND m.meta_key = 'job_company' AND m.meta_value = '".$result_company[$key]."'
																		");
			  
									foreach($company_jobs as $job) { 
										$total_jobs++;
									}	

									if($total_jobs > 0) {

									?>

									<a data-rel="tooltip" rel="top" title="Please first remove jobs asigned to this company!" onclick='return confirm("Please first remove jobs asigned to this company!")' href='#'><i class="fa fa-trash-o"></i></a>

									<?php } else { ?>

									<form id="theForm<?php echo $result_company[$key]; ?>" name="theForm<?php echo $result_company[$key]; ?>" class="delete-listing" action="" method="post">

										<input type="hidden" name="deletepostid" value="<?php echo $result_company[$key]; ?>" />

										<a onclick='return confirm("Are you sure you want to delete this?")' href='javascript:document.theForm<?php echo $result_company[$key]; ?>.submit();'><i class="fa fa-trash-o"></i></a>

									</form>

									<?php } ?>


																    	<?php if(get_post_status($result_company[$key]) != 'pending') { ?>

								    		

								    		<?php 

								    			global $redux_demo; $logo = $redux_demo['stripe-logo']['url']; $comp_reg_price = $redux_demo['company-regular-price']; $dec = sprintf('%.2f', $comp_reg_price / 100); $price_symbol = $redux_demo['job-price-symbol'];

								    			$wpjobus_post_reg_status = esc_attr(get_post_meta($result_company[$key], 'wpjobus_featured_post_status',true));

								    			if(($wpjobus_post_reg_status == "featured") || ($wpjobus_post_reg_status == "regular") or (empty($comp_reg_price))) {

								    		?>

								    			<span id="publish-<?php echo $result_company[$key]; ?>" data-rel="tooltip" rel="top" title="<?php _e( "Publish", "agrg" ); ?>" class="my-account-company-single-publish" <?php if($result_company_status[$key] == "publish") { ?>style="display: none;"<?php } ?>><i class="fa fa-eye"></i></span>

								    		<?php } else { ?>

								    			<span id="publish-payed-<?php echo $result_company[$key]; ?>" data-rel="tooltip" rel="top" title="<?php echo "Publish for ".$price_symbol.$dec; ?>" class="my-account-company-single-publish" <?php if($result_company_status[$key] == "publish") { ?>style="display: none;"<?php } ?>><i class="fa fa-eye"></i></span>

								    		<?php } ?>

								    		<span id="loading-poststatus-<?php echo $result_company[$key]; ?>" class="my-account-company-single-publish" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>

									    	<form id="postStatusForm<?php echo $result_company[$key]; ?>" type="post" action="" >

											    <input type="hidden" id="postId" name="postId" value="<?php echo $result_company[$key]; ?>">
											    <input type="hidden" id="postStatus" name="postStatus" value="">

											    <input type="hidden" name="action" value="wpjobusSubmitPostStatus" />
												<?php wp_nonce_field( 'wpjobusSubmitPostStatus_html', 'wpjobusSubmitPostStatus_nonce' ); ?>

										   	</form>

										   	<form id="postPayedStatusForm<?php echo $result_company[$key]; ?>" type="post" action="" >

											    <input type="hidden" id="postId" name="postId" value="<?php echo $result_company[$key]; ?>">

											    <input type="hidden" name="action" value="wpjobusSubmitPayedPostStatus" />
												<?php wp_nonce_field( 'wpjobusSubmitPayedPostStatus_html', 'wpjobusSubmitPayedPostStatus_nonce' ); ?>

										   	</form>

								    		<script type="text/javascript">

												jQuery(function($) {

													jQuery(document).on("click","#unpublish-<?php echo $result_company[$key]; ?>",function(e){

														jQuery('#postStatusForm<?php echo $result_company[$key]; ?> #postStatus').val('unpublish');

													    $.fn.wpjobusSubmitPostStatusUnpublishFunction<?php echo $result_company[$key]; ?>();

														e.preventDefault();
														return false;

													});

													jQuery("#unpublish-<?php echo $result_company[$key]; ?>").click(function(e){

														jQuery('#postStatusForm<?php echo $result_company[$key]; ?> #postStatus').val('unpublish');

														$.fn.wpjobusSubmitPostStatusUnpublishFunction<?php echo $result_company[$key]; ?>();

														e.preventDefault();
														return false;

													});

													$.fn.wpjobusSubmitPostStatusUnpublishFunction<?php echo $result_company[$key]; ?> = function() {

														jQuery('#postStatusForm<?php echo $result_company[$key]; ?>').ajaxSubmit({
														    type: "POST",
															data: jQuery('postStatusForm<?php echo $result_company[$key]; ?>').serialize(),
															url: '<?php echo admin_url('admin-ajax.php'); ?>',
															beforeSend: function() { 
													        	jQuery('#loading-poststatus-<?php echo $result_company[$key]; ?>').css('display', 'block');
													        	jQuery('#unpublish-<?php echo $result_company[$key]; ?>').css('display', 'none');
													        },	 
														    success: function(response) {
														    	jQuery('#loading-poststatus-<?php echo $result_company[$key]; ?>').css('display', 'none');
																jQuery('#publish-<?php echo $result_company[$key]; ?>').css('display', 'block');
																jQuery('#unpublish-<?php echo $result_company[$key]; ?>').css('display', 'none');
																jQuery('#poststatus-<?php echo $result_company[$key]; ?>').html('draft');
																jQuery('#my-account-job-single-title-<?php echo $result_company[$key]; ?> a').attr('href', '#');
														        return false;
														    }
														});
													}


													jQuery(document).on("click","#publish-<?php echo $result_company[$key]; ?>",function(e){

														jQuery('#postStatusForm<?php echo $result_company[$key]; ?> #postStatus').val('publish');

												     	$.fn.wpjobusSubmitPostStatusPublishFunction<?php echo $result_company[$key]; ?>();

												     	e.preventDefault();
														return false;

													});

													jQuery("#publish-<?php echo $result_company[$key]; ?>").click(function(e){

														jQuery('#postStatusForm<?php echo $result_company[$key]; ?> #postStatus').val('publish');

												     	$.fn.wpjobusSubmitPostStatusPublishFunction<?php echo $result_company[$key]; ?>();

												     	e.preventDefault();
														return false;

													});

													$.fn.wpjobusSubmitPostStatusPublishFunction<?php echo $result_company[$key]; ?> = function() {

														jQuery('#postStatusForm<?php echo $result_company[$key]; ?>').ajaxSubmit({
														    type: "POST",
															data: jQuery('postStatusForm<?php echo $result_company[$key]; ?>').serialize(),
															url: '<?php echo admin_url('admin-ajax.php'); ?>',
															beforeSend: function() { 
													        	jQuery('#loading-poststatus-<?php echo $result_company[$key]; ?>').css('display', 'block');
													        	jQuery('#publish-<?php echo $result_company[$key]; ?>').css('display', 'none'); 
													        },	 
														    success: function(response) {
														    	jQuery('#loading-poststatus-<?php echo $result_company[$key]; ?>').css('display', 'none');
																jQuery('#unpublish-<?php echo $result_company[$key]; ?>').css('display', 'block');
																jQuery('#publish-<?php echo $result_company[$key]; ?>').css('display', 'none');
																jQuery('#poststatus-<?php echo $result_company[$key]; ?>').html('publish');
																jQuery('#my-account-job-single-title-<?php echo $result_company[$key]; ?> a').attr('href', '<?php $companylink = home_url()."/company/".$result_company[$key]; echo $companylink; ?>');
														        return false;
														    }
														});
													}

													<?php 

													if(($wpjobus_post_reg_status == "featured") || ($wpjobus_post_reg_status == "regular") or (empty($comp_reg_price))) {

													} else {

										    			global $redux_demo;
										    			$stripe_test = $redux_demo['stripe-state'];

										    			if($stripe_test == 2) {
										    				$test_key = $redux_demo['stripe-test-publishable-key'];
										    			} elseif($stripe_test == 1){
										    				$test_key = $redux_demo['stripe-live-publishable-key'];
										    			}

										    		?>

													var handler<?php echo $result_company[$key]; ?> = StripeCheckout.configure({
														    key: '<?php echo $test_key; ?>',
														    image: '<?php echo $logo; ?>',
														    token: function(token) {
														      	// Use the token to create the charge with a server-side script.
														     	// You can access the token ID with `token.id`
														      	var options = {
													                success: jQuery('#postPayedStatusForm<?php echo $result_company[$key]; ?>').ajaxSubmit({
																            	type: "POST",
																		        data: jQuery('#postPayedStatusForm<?php echo $result_company[$key]; ?>').serialize(),
																		        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
																		        beforeSend: function() { 
																		        	jQuery('#loading-poststatus-<?php echo $result_company[$key]; ?>').css('display', 'block');
													        						jQuery('#publish-payed-<?php echo $result_company[$key]; ?>').css('display', 'none'); 
																		        },	
																                success: function(response) {
																                	window.location.reload(true);
																                }
																    		}),
													            };
														    }
													});

													document.getElementById('publish-payed-<?php echo $result_company[$key]; ?>').addEventListener('click', function(e) {
														    // Open Checkout with further options
														    handler<?php echo $result_company[$key]; ?>.open({
														      	name: '<?php _e( "Activate Company", "agrg" ); ?>',
														      	amount: <?php echo $comp_reg_price; ?>
														    });
														    e.preventDefault();
													});

													<?php } ?>

												});

											</script>

								    	<?php } ?>

								    	<?php if(get_post_status($result_company[$key]) != 'pending') { ?>

									    	<span class="my-account-job-single-feature">

									    		<?php global $redux_demo; $logo = $redux_demo['stripe-logo']['url']; $comp_valid = $redux_demo['company-featured-validity']; $comp_price = $redux_demo['company-featured-price']; $price_symbol = $redux_demo['job-price-symbol']; $dec = sprintf('%.2f', $comp_price / 100); 

									    		if(!empty($comp_price)) { 

									    			$featured_post_status = esc_attr(get_post_meta($result_company[$key], 'wpjobus_featured_post_status',true)); 

									    			if($featured_post_status == "featured" ) { 

									    				$featured_expiration_date = esc_attr(get_post_meta($result_company[$key], 'wpjobus_featured_expiration_date',true)); 
									    				$currentDate = current_time('timestamp');

									    				$timeStampCleanDate = date( "m/d/Y", $featured_expiration_date);

									    				if($featured_expiration_date >= $currentDate) {

									    		?>

									    		<span data-rel="tooltip" rel="top" title="<?php _e( "Featured until", "agrg" ); ?> <?php echo $timeStampCleanDate; ?>" id="featured" class="make-featured"><i class="fa fa-star"></i></span>

												<?php 

														} else {

															update_post_meta($result_company[$key], 'wpjobus_featured_post_status', 'regular');

														}

													} else { 

													?>

													<script src="https://checkout.stripe.com/checkout.js"></script>

										    		

										    		<span id="loading-featured-<?php echo $result_company[$key]; ?>" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>

										    		<form id="featForm<?php echo $result_company[$key]; ?>" type="post" action="" >

										    			<input type="hidden" id="featPostId" name="featPostId" value="<?php echo $result_company[$key]; ?>">
										    			<input type="hidden" id="featPostStatus" name="featPostStatus" value="featured">
										    			<input type="hidden" id="featPostValid" name="featPostValid" value="<?php echo $comp_valid; ?>">

										    			<input type="hidden" name="action" value="wpjobusSubmitFeaturedPost" />
														<?php wp_nonce_field( 'wpjobusSubmitFeaturedPost_html', 'wpjobusSubmitFeaturedPost_nonce' ); ?>

										    		</form>

										    		<script type="text/javascript">

										    		<?php 

										    			global $redux_demo;
										    			$stripe_test = $redux_demo['stripe-state'];

										    			if($stripe_test == 2) {
										    				$test_key = $redux_demo['stripe-test-publishable-key'];
										    			} elseif($stripe_test == 1){
										    				$test_key = $redux_demo['stripe-live-publishable-key'];
										    			}

										    		?>

													  	var handler<?php echo $result_company[$key]; ?> = StripeCheckout.configure({
														    key: '<?php echo $test_key; ?>',
														    image: '<?php echo $logo; ?>',
														    token: function(token) {
														      	// Use the token to create the charge with a server-side script.
														     	// You can access the token ID with `token.id`
														      	var options = {
													                success: jQuery('#featForm<?php echo $result_company[$key]; ?>').ajaxSubmit({
																            	type: "POST",
																		        data: jQuery('#featForm<?php echo $result_company[$key]; ?>').serialize(),
																		        url: '<?php echo admin_url('admin-ajax.php'); ?>', 
																		        beforeSend: function() { 
																		        	jQuery('#make-featured-<?php echo $result_company[$key]; ?>').css('display','none');
									    											jQuery('#loading-featured-<?php echo $result_company[$key]; ?>').css('display','block');
																		        },	
																                success: function(response) {
																                	window.location.reload(true);
																                }
																    		}),
													            };
														    }
													  	});

													  	document.getElementById('make-featured-<?php echo $result_company[$key]; ?>').addEventListener('click', function(e) {
														    // Open Checkout with further options
														    handler<?php echo $result_company[$key]; ?>.open({
														      	name: '<?php _e( "Company", "agrg" ); ?>',
														      	description: '<?php _e( "Featured for", "agrg" ); ?> <?php echo $comp_valid; ?> <?php _e( "days", "agrg" ); ?>',
														      	amount: <?php echo $comp_price; ?>
														    });
														    e.preventDefault();
													  	});

													</script>

												<?php

													}

												}

												$featured_post_status = esc_attr(get_post_meta($result_company[$key], 'wpjobus_featured_post_status',true));

												if($featured_post_status == "featured" and empty($comp_price)) { 

													$featured_expiration_date = esc_attr(get_post_meta($result_company[$key], 'wpjobus_featured_expiration_date',true)); 
									    			$currentDate = current_time('timestamp');

									    			$timeStampCleanDate = date( "m/d/Y", $featured_expiration_date);

									    			if($featured_expiration_date >= $currentDate) {

												?>

												<span data-rel="tooltip" rel="top" title="<?php _e( "Featured until", "agrg" ); ?> <?php echo $timeStampCleanDate; ?>" id="featured" class="make-featured"><i class="fa fa-star"></i></span>

												<?php } } ?>

									    	</span>

								    	<?php } ?>
						
						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>-</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>-</span>
	                  </div>
	                </div>
                </div>
              </div>
              <!--Results Row END-->

			  <?php } ?>
			
			  <!-- result second row start -->

			   <!-- <div class="results-content">
		                <div class="results-row">
		                  <div class="col col1">
		                  <div class="label">
		                    <span>Sigma Telecom</span>
		                  </div>
		                </div>
		                <div class="col col2">
		                  <div class="label">
		                    <span>2 days ago</span>
		                  </div>
		                </div>
		                <div class="col col2">
		                  <div class="label">
		                    <span>Working</span>
		                  </div>
		                </div>
		                <div class="col col2">
		                  <div class="label">
		                    <span>45</span>
		                  </div>
		                </div>
		                <div class="col col2">
		                  <div class="label">
		                    <span>n/a</span>
		                  </div>
		                </div>
		                <div class="col col2">
		                  <div class="label">
		                    <span>no</span>
		                  </div>
		                </div>
		                <div class="col col2">
		                  <div class="label">
		                    <span>yes</span>
		                  </div>
		                </div>
		                <div class="col col2">
		                  <div class="label">
		                    <span>n/a</span>
		                  </div>
		                </div>
		                </div>
              </div> -->

			  <!-- result second row end -->
            
			</div>
          </div>
          <!-- Account section end -->
           <!-- Account section start -->
          <div class="acc-sec my-account-jobs">
            <div class="acc-head">
              <h4 class="acc-title">
              	<i class="fa fa-volume-off fa-lg"></i>
              	Job Offers</h4>
              <a href="<?php $new_job = home_url()."/add-job"; echo $new_job; ?>" class="add-co-prof-btn add-btns">Post a Job<span> + </span></a>
            </div>
          
            <div class="acc-body">
              <div class="add-row">
                <div class="col col1">
                  <div class="label">
                    <span>Title</span>
                  </div>
                  <!-- <div class="input">
                    <input type="text" value="" placeholder="World Technology" />
                  </div> -->
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Added</span>
                  </div>
                  <!-- <div class="input">
                    <input type="text" value="" />
                  </div> -->
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Status</span>
                  </div>
                  <!-- <div class="input">
                    <input type="text" value="" />
                  </div> -->
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Views</span>
                  </div>
                  <!-- <div class="input">
                    <input type="text" value="" />
                  </div> -->
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Edit</span>
                  </div>
                  <!-- <div class="input">
                    <input type="text" value="" />
                  </div> -->
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Delete</span>
                  </div>
                  <!-- <div class="input">
                    <input type="text" value="" />
                  </div> -->
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Visibility</span>
                  </div>
                  <!-- <div class="input">
                    <input type="text" value="" />
                  </div> -->
                </div>
                <div class="col col2">
                  <div class="label">
                    <span>Features</span>
                  </div>
                  <!-- <div class="input">
                    <input type="text" value="" />
                  </div> -->
                </div>
              </div> 
            
			
			<?php 

				$job_id = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'job' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$user_id."' ORDER BY `ID` DESC");

				foreach ($job_id as $key => $value) {
				$result_job[] = $value->ID;
				$result_job_date[] = $value->post_date;
				$result_job_status[] = $value->post_status;

				$wpjobus_job_fullname = esc_attr(get_post_meta($result_job[$key], 'wpjobus_job_fullname',true));

				$job_company = esc_attr(get_post_meta($result_job[$key], 'job_company',true));

				$wpjobus_company_fullname = esc_attr(get_post_meta($job_company, 'wpjobus_company_fullname',true));

				$job_id = $result_job[$key];

			?>
			<!--Results Row START-->
              <div class="results-content">
				<div class="results-row">
                  	<div class="col col1">
	                  <div class="label">
	                    <span>
								
								<?php if(get_post_status($result_job[$key]) == 'pending') { ?>

								<a href="#"><?php echo $wpjobus_job_fullname; ?> (<?php _e( 'Pending review', 'agrg' ); ?>)</a>

								<?php } else { ?>

								<a href="<?php if(get_post_status($result_job[$key]) == 'draft') { $joblink = "#"; } else { $joblink = home_url()."/job-details/?post=".$result_job[$key]; } echo $joblink; ?>"><?php echo $wpjobus_job_fullname; ?></a>

								<?php } ?>
								
						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>
								<?php echo human_time_diff( strtotime($result_job_date[$key]), current_time('timestamp') ) . ' '; _e( 'ago', 'agrg' ); ?>

						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span><?php if($result_job_status[$key] == 'publish') { echo _e( 'Published', 'agrg' ); } else { echo $result_job_status[$key]; } ?></span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span><?php $postid = $result_job[$key]; echo wpb_get_post_views($postid); ?></span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span><a href="<?php $edit_job = home_url()."/edit-job/?post=".$result_job[$key]; echo $edit_job; ?>"><i class="fa fa-pencil-square-o"></i></a></span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>
							<form name="theForm<?php echo $result_job[$key]; ?>" class="delete-listing" action="" method="post">

								<input type="hidden" name="deletepostid" value="<?php echo $result_job[$key]; ?>" />

								<a onclick='return confirm("Are you sure you want to delete this?")' href='javascript:document.theForm<?php echo $result_job[$key]; ?>.submit();'><i class="fa fa-trash-o"></i></a>
							</form>
						</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>yes</span>
	                  </div>
	                </div>
	                <div class="col col2">
	                  <div class="label">
	                    <span>n/a</span>
	                  </div>
	                </div>
                </div>
              </div>
			
			<?php } ?> 

              <!--Results Row END-->


			  <!-- New result row start  -->

			<!--  -->

              <!--Results Row END-->

			  <!-- New result row end  -->

            </div>
          </div>
          <!-- Account section end -->
      </div>
    </div>
    <!-- Content END-->
    
<!-- New html middle content ends -->

<?php //get_footer(); 

get_footer("myaccount");

?>