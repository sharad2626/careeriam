

<?php
/**
 * Template name: Add Company
 */

if ( !is_user_logged_in() ) { 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

} 

$page = get_page($post->ID);
$current_page_id = $page->ID;

$wpjobus_company_longitude = esc_attr(get_post_meta($post->ID, 'wpjobus_company_longitude',true));
if(empty($wpjobus_company_longitude)) {
	$wpjobus_company_longitude = 0;
}

$wpjobus_company_latitude = esc_attr(get_post_meta($post->ID, 'wpjobus_company_latitude',true));
if(empty($wpjobus_company_latitude)) {
	$wpjobus_company_latitude = 0;
}

get_template_part('header-myaccount');

?>

<!-- 
 -->

<!-- Content START -->

	<div class="company-header sections">
      <div class="container">
          <!-- Breadcrumb START-->
          <div class="breadcrumbs-sec">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Edit Profile</a></li>
            </ul>
          </div>
          <!-- Breadcrumb END-->
          <!-- Edit Resume START-->
          <div class="edit-resume-wrap">
            <form id="wpjobus-add-company" type="post" action="" >
              <div class="resume-box acc-sec">
                <div class="resume-title acc-head">
                  <h4 class="acc-title">
                    <i class="fa fa-pencil-square-o"></i>
                    <div class="title-label">
                      <span class="main-title">Add Company Profile</span>
                      <span class="sub-desc">Hey. Its Easier than it looks. Take a deep breath and complete the fields below. You'll have a beautifull company pages!</span>
                    </div>
                  </h4>
                </div>
                <div class="resume-content acc-body">
                  <!-- First Block Start-->
                  <div class="full">
                    <div class="one-fourth">
                      <span class="full">
                        <span class="label">
                          <h3>Company Name</h3>
                        </span>
                        <span class="input">
                          <input type="text" name="fullName" id="fullName" value="" placeholder="John Deo"/>
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Tag Line</h3>
                        </span>
                        <span class="input">
                          <input type="text" id="wpjobus_company_tagline" name="wpjobus_company_tagline" value="" />
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Foundation Year</h3>
                        </span>
                        <span class="input">
                          <input type="text" name="wpjobus_company_foundyear" id="wpjobus_company_foundyear" value="" >
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Team Size</h3>
                        </span>
                        <span class="input">

							<select name="company_team_size" id="company_team_size" >
										<?php 

											global $company_team_size;

											echo $company_team_size;

											for ($i = 1; $i <= 50; $i++) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $company_team_size, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
										<option value='50+' <?php selected( $company_team_size, "50+" ); ?>>50+</option>
							</select>

                          <!-- <select name="company_team_size" id="company_team_size">
                            <option value="1">1</option>
                            <option value="2">2</option>
                           
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="50+">50+</option>
                          </select> -->
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Industry</h3>
                        </span>
                        <span class="input">

						 <input type="text" name="company_industry" id="company_industry" value="" />

                          <!-- <select name="company_industry" id="company_industry">
                            <?php 
											global $redux_demo, $resume_industry; 
											for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
										?>
										<option value='<?php echo $redux_demo['resume-industries'][$i]; ?>' <?php selected( $resume_industry, $redux_demo["resume-industries"][$i] ); ?>><?php echo $redux_demo['resume-industries'][$i]; ?></option>
										<?php 
											}
										?>
                          </select> -->
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Location</h3>
                        </span>
                        <span class="input">

						<input type="text" name="company_location" id="company_location" value="" />

                          <!-- <select name="company_location" id="company_location">
								
								<?php 
								global $redux_demo, $resume_location; 
								for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {
								?>
								<option value='<?php echo $redux_demo['resume-locations'][$i]; ?>' <?php selected( $resume_location, $redux_demo["resume-locations"][$i] ); ?>><?php echo $redux_demo['resume-locations'][$i]; ?></option>
								<?php 
								}
								?>

                          </select> -->
                        </span>
                      </span>
					   <!-- <span class="full">
                        <span class="label">
                          <h3>Logo</h3>
                        </span>
                        <span class="input">
                         
								<img class="criteria-image" id="your_image_url_img" src="<?php if (!empty($wpjobus_company_profile_picture)) echo $wpjobus_company_profile_picture; ?>" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 340px;" /> 

								<input class="criteria-image-url" id="your_image_url" type="text" size="36" name="wpjobus_company_profile_picture" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_company_profile_picture)) echo $wpjobus_company_profile_picture; ?>" />
					            <input class="criteria-image-id" id="your_image_id" type="text" size="36" name="wpjobus_company_profile_picture_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_company_profile_picture_id)) echo $wpjobus_company_profile_picture_id; ?>" />
					            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove" type="button" value="Delete Image" /> </br>
					            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button" type="button" value="Upload Image" />

								<script type="text/javascript">

									var image_custom_uploader;
									var $thisItem = '';

									jQuery(document).on('click','.criteria-image-button', function(e) {
									    e.preventDefault();

									    $thisItem = jQuery(this);

									    //If the uploader object has already been created, reopen the dialog
									    if (image_custom_uploader) {
									        image_custom_uploader.open();
									        return;
									    }

									    //Extend the wp.media object
									    image_custom_uploader = wp.media.frames.file_frame = wp.media({
									        title: 'Choose Image',
									        button: {
									            text: 'Choose Image'
									        },
									        multiple: false
									    });

									    //When a file is selected, grab the URL and set it as the text field's value
									    image_custom_uploader.on('select', function() {
									        attachment = image_custom_uploader.state().get('selection').first().toJSON();
									        var url = '';
									        url = attachment['url'];
									        var attachId = '';
									        attachId = attachment['id'];
									        $thisItem.parent().find('.criteria-image-id').val(attachId);
									        $thisItem.parent().find('.criteria-image-url').val(url);
									        $thisItem.parent().find( "img.criteria-image" ).attr({
									            src: url
									        });
									        $thisItem.parent().find(".criteria-image-button").css("display", "none");
									        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
									        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
									        $thisItem.parent().find(".fa-trash-o").css("display", "block");
									    });

									    //Open the uploader dialog
									    image_custom_uploader.open();
									});

									jQuery(document).on('click','.criteria-image-button-remove', function(e) {
									    jQuery(this).parent().find('.criteria-image-url').val('');
									    jQuery(this).parent().find( "img.criteria-image" ).attr({
									        src: ''
									    });
									    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
									    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
									    jQuery(this).css("display", "none");
									    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
									});
								</script>


                        </span>
                      </span> -->
                    </div>
                    <div class="three-fourth">
                      <span class="full">
                        <span class="label">
                          <h3>About Me</h3>
                        </span>
                        <span class="input">
                          <div class="code-editor wp-core-ui wp-editor-wrap tmce-active">
                            <!-- <textarea class="wp-editor-area" rows="12" autocomplete="off" cols="40" name="postContent" id="postContent"> -->

							<?php 

								global $postContent;
									
								$settings = array(
										'wpautop' => true,
										'postContent' => 'content',
										'media_buttons' => false,
										'editor_css' => '<style>.mceToolba { background-color: #faf9f4; padding: 5px; }</style>',
										'tinymce' => array(
											'theme_advanced_buttons1' => 'bold,italic,underline,blockquote,separator,strikethrough,bullist,numlist,justifyleft,justifycenter,justifyright,undo,redo,link,unlink,fullscreen',
											'theme_advanced_buttons2' => 'pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo',
											'theme_advanced_buttons3' => '',
											'theme_advanced_buttons4' => ''
										),
										'quicktags' => false
								);
											
								wp_editor( $postContent, 'postContent', $settings );

							?>

                            </textarea>
                          </div>
                        </span>
                      </span>
                       <span class="full">
                        <h3>Cover Image</h3> 
                        <div class="up-cover up-photo">
						<!-- (Please upload image of dimension 1024 * 385 ) -->
                          <div class="default-img">
                            <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/image-placeholder.png" alt="Image Placeholder" /> -->
								
							<img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_company_cover_image)){ echo $wpjobus_company_cover_image; }else{
							
							$default_profile_image = get_stylesheet_directory_uri()."/img/image-placeholder.png";
							echo $default_profile_image;
							
							} ?>"  />
							<!-- 
                            <span class="drag-photo">Drag a Photo</span>
                            <span class="or">or</span>
                            <span class="select-photo">
                              <input type="file" value="Select a Photo from computer">
                            </span> -->

							<input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_company_cover_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_company_cover_image)) echo $wpjobus_company_cover_image; ?>" />
					            <input class="criteria-image-id" id="your_cover_id" type="text" size="36" name="wpjobus_company_cover_image_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_company_cover_image_id)) echo $wpjobus_company_cover_image_id; ?>" />
					           <input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image"  /> 
					           <input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image 1024 * 385 px" />

					            <script type="text/javascript">
									var image_custom_uploader;
									var $thisItem = '';

									jQuery(document).on('click','.criteria-image-button', function(e) {
									    e.preventDefault();

									    $thisItem = jQuery(this);

									    //If the uploader object has already been created, reopen the dialog
									    if (image_custom_uploader) {
									        image_custom_uploader.open();
									        return;
									    }

									    //Extend the wp.media object
									    image_custom_uploader = wp.media.frames.file_frame = wp.media({
									        title: 'Choose Image',
									        button: {
									            text: 'Choose Image'
									        },
									        multiple: false
									    });

									    //When a file is selected, grab the URL and set it as the text field's value
									    image_custom_uploader.on('select', function() {
									        attachment = image_custom_uploader.state().get('selection').first().toJSON();
									        var url = '';
									        url = attachment['url'];
									        var attachId = '';
									        attachId = attachment['id'];
									        $thisItem.parent().find('.criteria-image-id').val(attachId);
									        $thisItem.parent().find('.criteria-image-url').val(url);
									        $thisItem.parent().find( "img.criteria-image" ).attr({
									            src: url
									        });
									        $thisItem.parent().find(".criteria-image-button").css("display", "none");
									        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
									        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
									        $thisItem.parent().find(".fa-trash-o").css("display", "block");
									    });

									    //Open the uploader dialog
									    image_custom_uploader.open();
									});

									jQuery(document).on('click','.criteria-image-button-remove', function(e) {

										var x = confirm("Are you sure you want to delete?");
										
										if (x)
										{

											jQuery(this).parent().find('.criteria-image-url').val('');
											jQuery(this).parent().find( "img.criteria-image" ).attr({
												src: ''
											});
											jQuery(this).parent().find(".criteria-image-button").css("display", "block");
											jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
											jQuery(this).css("display", "none");
											jQuery(this).parent().find(".fa-trash-o").css("display", "none");

										}
										else
										{
											 $thisItem.parent().find('.criteria-image-url').val(url);
                                             return false;
										}



									});
								</script>



                          </div>
                        </div>
                      </span>
                    </div>
                    <div class="submit-row">
                      <!-- <input type="submit" class="gradient-btn" value="Update" /> -->
                    </div>
                  </div>
                  <!-- First Block End-->
                </div>
              </div>
              <div class="four-sec-form">
                <div class="full">
                  <div class="one-half">
                    <div class="resume-box acc-sec">
                      <div class="resume-title acc-head">
                        <h4 class="acc-title">
                          <i class="fa fa-cogs"></i>
                          <div class="title-label">
                            <span class="main-title">Service</span>
                            <span class="sub-desc">Describe your service and Expertise</span>
                          </div>
                        </h4>
                      </div>
                      <div class="resume-content acc-body" >
                        <div class="full">
                        
						<div  id="resume_service" >
						<!-- Loop start  -->
						<?php 

						$wpjobus_company_services = get_post_meta($post->ID, 'wpjobus_company_services',true);

						for ($i = 0; $i < (count($wpjobus_company_services)); $i++) {

						?>
						
						 <div class="option_item">	
						 

						 <span class="full">
                            <span class="label">
                              <h3>Service Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_services[<?php echo $i; ?>][0]" id="wpjobus_company_services[<?php echo $i; ?>][0]" value="<?php if (!empty($wpjobus_company_services[$i][0])) echo $wpjobus_company_services[$i][0]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Icon Code</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_services[<?php echo $i; ?>][1]" id="wpjobus_company_services[<?php echo $i; ?>][1]" value="<?php if (!empty($wpjobus_company_services[$i][0])) echo $wpjobus_company_services[$i][0]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Content</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_company_services[<?php echo $i; ?>][2]" id="wpjobus_company_services[<?php echo $i; ?>][2]" value="<?php if (!empty($wpjobus_company_services[$i][0])) echo $wpjobus_company_services[$i][0]; ?>" />
                              </textarea>
                            </span>
                          </span>

						  <!-- <button name="button_del_service" type="button" class="button-secondary button_del_service"><i class="fa fa-trash-o"></i><?php _e( 'Delete1', 'agrg' ); ?></button> -->
						
						</div>		
						<?php 
								}
							?>
						<!-- Loop ends  -->	
						</div>
                      
						<!-- html to bear more services elemetns  -->
						<!-- This html is appened via custom.js javascript file at line no 1007 at custom.js file  -->
						
						<div id="template_service">

						 <div class="option_item">	
						 
								 <span class="full">
									<span class="label">
									  <h3>Service Name</h3>
									</span>
									<span class="input">
									  <input type="text" name="" id="" value="" />
									</span>
								  </span>
								  <span class="full">
									<span class="label">
									  <h3>Icon Code</h3>
									</span>
									<span class="input">
									  <input type="text" name="" id="" value="" />
									</span>
								  </span>
								  <span class="full">
									<span class="label">
									  <h3>Content</h3>
									</span>
									<span class="input">
									  <textarea rows="4" cols="40" name="" id="" value="" />
									  </textarea>
									</span>
								  </span>

								  <!-- <button name="button_del_service" type="button" class="button-secondary button_del_service"><i class="fa fa-trash-o"></i><?php _e( 'Delete1', 'agrg' ); ?></button> -->
								
								</div>
								
						</div>

						<!-- <div class="option_item">
							<button type="button" name="submit_add_service" id='submit_add_service' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e('Add new service', 'agrg'); ?></button>
						</div> -->

						<!-- html to bear more services elements  -->
	
                          <span class="full">
                            <span class="label">
                              <h3>Expertise</h3>
                            </span>
                            <span class="input">
                              <input type="text" name='wpjobus_company_expertise' id="review-name" value="<?php global $wpjobus_company_expertise; echo $wpjobus_company_expertise; ?>" />
                            </span>
                          </span>
                          <span class="full submit-row">
								<!-- <input type="submit" class="gradient-btn" value="Submit" /> -->
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="one-half">
                    <div class="resume-box acc-sec">
                      <div class="resume-title acc-head">
                        <h4 class="acc-title">
                          <i class="fa fa-users"></i>
                          <div class="title-label">
                            <span class="main-title">Clients</span>
                            <span class="sub-desc">Name a few relevant clients from your portfolio and describe what your company was contracted for</span>
                          </div>
                        </h4>
                      </div>
                      <div class="resume-content acc-body">
                        <div class="full">

						<?php 

						$wpjobus_company_clients = get_post_meta($post->ID, 'wpjobus_company_clients',true);
						for ($i = 0; $i < (count($wpjobus_company_clients)); $i++) {

						?>
                          
						  <!-- Loop start  -->

						  <span class="full">
                            <span class="label">
                              <h3>Client Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_clients[<?php echo $i; ?>][0]" id="wpjobus_company_clients[0][0]" value="" />
                            </span>
                          </span>
                           <span class="full period-row">
                            <span class="label">
                              <h3>Period</h3>
                            </span>
                            <span class="input">
                              <input type="text"  id="wpjobus_company_clients[<?php echo $i; ?>][2]" name="wpjobus_company_clients[<?php echo $i; ?>][2]" class="left-input" value="<?php if (!empty($wpjobus_company_clients[$i][2])) echo $wpjobus_company_clients[$i][2]; ?>" />
                              <span class="dashed"> - </span>
                              <input type="text" id="wpjobus_company_clients[<?php echo $i; ?>][3]" name="wpjobus_company_clients[<?php echo $i; ?>][3]" class="right-input" value="<?php if (!empty($wpjobus_company_clients[$i][3])) echo $wpjobus_company_clients[$i][3]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Clients Website</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_clients[<?php echo $i; ?>][4]" id="wpjobus_company_clients[<?php echo $i; ?>][4]" value="" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Contracted for doing</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_clients[<?php echo $i; ?>][1]" id="wpjobus_company_clients[<?php echo $i; ?>][1]" value="" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_company_clients[<?php echo $i; ?>][5]" id="wpjobus_company_clients[<?php echo $i; ?>][5]"><?php if (!empty($wpjobus_company_clients[$i][5])) echo $wpjobus_company_clients[$i][5]; ?></textarea>
                            </span>
                          </span>
                          <span class="full submit-row">
                            <!-- <input type="submit" class="gradient-btn" value="Submit" /> -->
                          </span>
						
						<!-- Loop End  -->

						<!-- <button name="button_del_client" type="button" class="button-secondary button_del_client"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button> -->

						<?php } ?>

						<!-- container div to append extra element -->

							<div id="template_clients">
							</div>

						<!-- container div to add extra element  -->

						<!-- <div class="option_item">
							<button type="button" name="submit_add_client" id='submit_add_client' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new client', 'agrg' ); ?></button>
						</div> -->

										
			
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="full">
                  <div class="one-half">
                    <div class="resume-box acc-sec">
                      <div class="resume-title acc-head">
                        <h4 class="acc-title">
                          <i class="fa fa-comments-o"></i>
                          <div class="title-label">
                            <span class="main-title">Testimonial</span>
                            <span class="sub-desc">Let's see what are people saying about you</span>
                          </div>
                        </h4>
                      </div>
                      <div class="resume-content acc-body">
                        <div class="full">
                        
						<?php 

						$wpjobus_company_testimonials = get_post_meta($post->ID, 'wpjobus_company_testimonials',true);

						for ($i = 0; $i < (count($wpjobus_company_testimonials)); $i++) {

						?>  

						  <!-- loop starts  -->

						  <span class="full">
                            <span class="label">
                              <h3>Full Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_testimonials[<?php echo $i; ?>][0]" id="wpjobus_company_testimonials[<?php echo $i; ?>][0]" value="" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Organisation</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_testimonials[<?php echo $i; ?>][1]" id="wpjobus_company_testimonials[<?php echo $i; ?>][1]" value="" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Testimonial</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_company_testimonials[<?php echo $i; ?>][2]" id="wpjobus_company_testimonials[<?php echo $i; ?>][2]">
                              </textarea>
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Upload your image</h3>
                            </span>
                            <span class="input">
                                <div class="default-img">

                                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/image-placeholder.png" alt="Image Placeholder" /> -->
								  
								  <img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_company_testimonials[$i][3])){ echo $wpjobus_company_testimonials[$i][3]; 
								  }else{

								  $default_profile_image = get_stylesheet_directory_uri()."/img/image-placeholder.png";
								  echo $default_profile_image;

								  }
								  
								  
								  
								  ?>"  />

								  <!-- <span class="drag-photo">Drag a Photo</span>
                                  <span class="or">or</span> -->


                                  <!-- <span class="select-photo"> -->
                                    <!-- <input type="file" value="Select a Photo from computer"> -->
                                  
									<input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_company_testimonials[<?php echo $i; ?>][3]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" />
							          </i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image"  /> 
							           <input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" />

							            <script type="text/javascript">

											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    //If the uploader object has already been created, reopen the dialog
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											    //Extend the wp.media object
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											    //When a file is selected, grab the URL and set it as the text field's value
											    image_custom_uploader.on('select', function() {
											        attachment = image_custom_uploader.state().get('selection').first().toJSON();
											        var url = '';
											        url = attachment['url'];
											        var attachId = '';
											        attachId = attachment['id'];
											        $thisItem.parent().find('.criteria-image-url').val(url);
											        $thisItem.parent().find( "img.criteria-image" ).attr({
											            src: url
											        });
											        $thisItem.parent().find(".criteria-image-button").css("display", "none");
											        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
											        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
											        $thisItem.parent().find(".fa-trash-o").css("display", "block");
											    });

											    //Open the uploader dialog
											    image_custom_uploader.open();
											});

											jQuery(document).on('click','.criteria-image-button-remove', function(e) {
											    jQuery(this).parent().find('.criteria-image-url').val('');
											    jQuery(this).parent().find( "img.criteria-image" ).attr({
											        src: ''
											    });
											    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
											    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
											    jQuery(this).css("display", "none");
											    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
											});

										</script>								  
								  
								  <!-- </span> -->
                                </div>
                            </span>
                          </span>
                          <span class="full submit-row">
                            <!-- <input type="submit" class="gradient-btn" value="Submit" /> -->
                          </span>
						<!-- loop ends  -->

						<!-- <button name="button_del_comp_testimonial" type="button" class="button-secondary button_del_comp_testimonial"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button> -->
						
						<?php } ?>
								
						<div id="template_comp_testimonials">
						</div>

						
						<!-- <div class="option_item">
							<button type="button" name="submit_add_comp_testimonial" id='submit_add_comp_testimonial' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new testimonial', 'agrg' ); ?></button>
						</div> -->

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="one-half">
                    <div class="resume-box acc-sec">
                      <div class="resume-title acc-head">
                        <h4 class="acc-title">
                          <i class="fa fa-picture-o"></i>
                          <div class="title-label">
                            <span class="main-title">Portfolio</span>
                            <span class="sub-desc">Upload your finest and brilliant work!</span>
                          </div>
                        </h4>
                      </div>
                      <div class="resume-content acc-body">
                        <div class="full">
                         
						

						<?php 

						global $wpjobus_company_portfolio;

						for ($i = 0; $i <1 ; $i++) {

						?>
							
						  
						  <!-- loop starts  -->

						  <span class="full">
                            <span class="label">
                              <h3>Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_portfolio[<?php echo $i; ?>][0]" id="wpjobus_company_portfolio[<?php echo $i; ?>][0]" value="" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Category</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_portfolio[<?php echo $i; ?>][1]" id="wpjobus_company_portfolio[<?php echo $i; ?>][1]" value="" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_company_portfolio[<?php echo $i; ?>][2]" id='wpjobus_company_portfolio[<?php echo $i; ?>][2]' ><?php if (!empty($pjobus_resume_portfolio[$i][2])) echo $pjobus_resume_portfolio[$i][2]; ?>
                              </textarea>
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Upload your image</h3>
                            </span>
                            <span class="input">
                                <div class="default-img">
                                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/image-placeholder.png" alt="Image Placeholder" /> -->
								
									<img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_company_portfolio[$i][3])){ echo $pjobus_resume_portfolio[$i][3]; }else{ 
									
									$default_profile_image = get_stylesheet_directory_uri()."/img/image-placeholder.png";
									echo $default_profile_image;


									} ?>"  />
                                 
								  <!-- <span class="drag-photo">Drag a Photo....</span>
                                  <span class="or">or</span> -->
                                  <!-- <span class="select-photo"> -->
                                    <!-- <input type="file" value="Select a Photo from computer"> -->

									<input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_company_portfolio[<?php echo $i; ?>][3]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" />
							           <input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image"  /> 
							          <input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" />

							            <script type="text/javascript">

											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    //If the uploader object has already been created, reopen the dialog
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											    //Extend the wp.media object
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											    //When a file is selected, grab the URL and set it as the text field's value
											    image_custom_uploader.on('select', function() {
											        attachment = image_custom_uploader.state().get('selection').first().toJSON();
											        var url = '';
											        url = attachment['url'];
											        var attachId = '';
											        attachId = attachment['id'];
											        $thisItem.parent().find('.criteria-image-url').val(url);
											        $thisItem.parent().find( "img.criteria-image" ).attr({
											            src: url
											        });
											        $thisItem.parent().find(".criteria-image-button").css("display", "none");
											        $thisItem.parent().find(".fa-cloud-upload").css("display", "none");
											        $thisItem.parent().find(".criteria-image-button-remove").css("display", "block");
											        $thisItem.parent().find(".fa-trash-o").css("display", "block");
											    });

											    //Open the uploader dialog
											    image_custom_uploader.open();
											});

											jQuery(document).on('click','.criteria-image-button-remove', function(e) {
											    jQuery(this).parent().find('.criteria-image-url').val('');
											    jQuery(this).parent().find( "img.criteria-image" ).attr({
											        src: ''
											    });
											    jQuery(this).parent().find(".criteria-image-button").css("display", "block");
											    jQuery(this).parent().find(".fa-cloud-upload").css("display", "block");
											    jQuery(this).css("display", "none");
											    jQuery(this).parent().find(".fa-trash-o").css("display", "none");
											});

										</script>

                                  <!-- </span> -->
                                </div>
                            </span>
                          </span>

						<!-- <button name="button_del_comp_portfolio" type="button" class="button-secondary button_del_comp_portfolio"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button> -->
                        
						<!-- Loop ends  -->
						<?php 
						}
						?>
						
						<!-- container div to handle extra appended html -->
						<div id="template_comp_portfolio">
						
						</div >
						<!-- container div to handle extra appended html -->

						<!-- <div class="option_item">
							<button type="button" name="submit_add_comp_portfolio" id='submit_add_comp_portfolio' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new project', 'agrg' ); ?></button>
						</div> -->

                          <span class="full submit-row">

						  
								<input type="hidden" name="action" value="wpjobusSubmitCompanyForm" />
								<?php wp_nonce_field( 'wpjobusSubmitCompany_html', 'wpjobusSubmitCompany_nonce' ); ?>

                            <input type="submit" class="gradient-btn input-submit" value="Submit Company Profile" />
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
							
				<!--  Original theme HTML to show error/success  messages start  -->

					<div id="success">
						<span>
							<h3><?php _e( 'Company Profile Saved Successful.', 'agrg' ); ?></h3>
						</span>
						<div class="divider"></div>
					</div>
								 
					<div id="error">
						<span>
							<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?></h3>
						</span>
						<div class="divider"></div>
					</div>


				<!--  Original theme HTML to show error message end      -->
            
			  </div>
            
			<input type="hidden" id="postStatus" name="postStatus" value="">

			</form>
			
			<script type="text/javascript">

				jQuery(function($) {
					jQuery('#wpjobus-add-company').validate({
						rules: {
						    fullName: {
						        required: true,
						        minlength: 3
						    }
							
							/* ,
						    wpjobus_company_email: {
						        required: true,
						        email: true
						    }
							*/

						},
						messages:{
							fullName: {
							    required: "<?php _e( 'Please provide your full name', 'agrg' ); ?>",
							    minlength: "<?php _e( 'Your name must be at least 3 characters long', 'agrg' ); ?>"
							}
							
							/*
							,
							wpjobus_company_email: {
							    required: "<?php _e( 'Please provide an email address', 'agrg' ); ?>",
							    email: "<?php _e( 'Please enter a valid email address', 'agrg' ); ?>"
							}
							*/

						},
						submitHandler: function(form) {
							
							tinyMCE.triggerSave();
						    jQuery('#wpjobus-add-company .input-submit').css('display','none');
						    jQuery('#wpjobus-add-company .submit-loading').css('display','block');
						    jQuery(form).ajaxSubmit({
						        type: "POST",
								data: jQuery(form).serialize(),
								url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						        success: function(data) { //alert(data); 
						            if(data != 0) {
						        		jQuery('#wpjobus-add-company .submit-loading').css('display','none');
						        		jQuery('#success').fadeIn(); 

      									<?php $redirect_link = home_url()."/my-account"; ?>

      									var delay = 5;
      									setTimeout(function(){ window.location = '<?php echo $redirect_link; ?>';}, delay);
      									 
						            } else {
						            	jQuery('#wpjobus-add-company .input-submit').css('display','block');
							        	jQuery('#wpjobus-add-company .submit-loading').css('display','none');

							            jQuery('#error').fadeIn();
						            }
						        },
						        error: function(data) {
						        	jQuery('#wpjobus-add-company .input-submit').css('display','block');
						        	jQuery('#wpjobus-add-company .submit-loading').css('display','none');

						            jQuery('#error').fadeIn();
						        }
						    });
						}
					});
				});
				</script>
          </div>
          <!-- Edit Resume END-->
      </div>
    </div>

 <!-- Content END-->


<?php 

//get_footer(); 
get_footer("add-company");

?>
