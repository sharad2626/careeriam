<?php
/**
 * Template name: Edit Company
 */

if ( !is_user_logged_in() ) { 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

} 

$page = get_page($post->ID);
$current_page_id = $page->ID;


$query = new WP_Query(array('post_type' => 'company', 'posts_per_page' =>'-1', 'post_status' => 'publish, draft, pending') );

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
	
if(isset($_GET['post'])) {
		
	if($_GET['post'] == $post->ID) {
		
		$current_post = $post->ID;

		$wpjobus_company_cover_image = esc_url(get_post_meta($post->ID, 'wpjobus_company_cover_image',true));
		$wpjobus_company_fullname = esc_attr(get_post_meta($post->ID, 'wpjobus_company_fullname',true));
		$wpjobus_company_tagline = esc_attr(get_post_meta($post->ID, 'wpjobus_company_tagline',true));
		$company_industry = esc_attr(get_post_meta($post->ID, 'company_industry',true));
		$company_team_size = esc_attr(get_post_meta($post->ID, 'company_team_size',true));
		$resume_about_me = html_entity_decode(get_post_meta($post->ID, htmlentities('company-about-me'),true));
		$wpjobus_company_foundyear = esc_attr(get_post_meta($post->ID, 'wpjobus_company_foundyear',true));
		$wpjobus_company_profile_picture = esc_attr(get_post_meta($post->ID, 'wpjobus_company_profile_picture',true));
		$company_location = esc_attr(get_post_meta($post->ID, 'company_location',true));

		$wpjobus_resume_prof_title = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_prof_title',true));
		$resume_career_level = esc_attr(get_post_meta($post->ID, 'resume_career_level',true));

		$wpjobus_resume_comm_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_comm_level',true));
		$wpjobus_resume_comm_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_comm_note',true));

		$wpjobus_resume_org_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_org_level',true));
		$wpjobus_resume_org_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_org_note',true));

		$wpjobus_resume_job_rel_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_rel_level',true));
		$wpjobus_resume_job_rel_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_rel_note',true));

		$wpjobus_company_services = get_post_meta($post->ID, 'wpjobus_company_services',true);
		$wpjobus_company_expertise = get_post_meta($post->ID, 'wpjobus_company_expertise',true);

		$wpjobus_resume_education = get_post_meta($post->ID, 'wpjobus_resume_education',true);
		$wpjobus_resume_award = get_post_meta($post->ID, 'wpjobus_resume_award',true);
		$wpjobus_company_clients = get_post_meta($post->ID, 'wpjobus_company_clients',true);
		$wpjobus_company_testimonials = get_post_meta($post->ID, 'wpjobus_company_testimonials',true);

		$wpjobus_resume_file = esc_url(get_post_meta($post->ID, 'wpjobus_resume_file',true));

		$wpjobus_resume_remuneration = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_remuneration',true));
		$wpjobus_resume_remuneration_per = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_remuneration_per',true));

		$wpjobus_resume_job_freelance = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_freelance',true));
		$wpjobus_resume_job_part_time = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_part_time',true));
		$wpjobus_resume_job_full_time = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_full_time',true));
		$wpjobus_resume_job_internship = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_internship',true));
		$wpjobus_resume_job_volunteer = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_volunteer',true));

		$wpjobus_company_portfolio = get_post_meta($post->ID, 'wpjobus_company_portfolio',true);


		$wpjobus_company_address = esc_attr(get_post_meta($post->ID, 'wpjobus_company_address',true));
		$wpjobus_company_phone = esc_attr(get_post_meta($post->ID, 'wpjobus_company_phone',true));
		$wpjobus_company_website = esc_url(get_post_meta($post->ID, 'wpjobus_company_website',true));
		$wpjobus_company_email = esc_attr(get_post_meta($post->ID, 'wpjobus_company_email',true));
		$wpjobus_company_publish_email = esc_attr(get_post_meta($post->ID, 'wpjobus_company_publish_email',true));
		$wpjobus_company_facebook = esc_url(get_post_meta($post->ID, 'wpjobus_company_facebook',true));
		$wpjobus_company_linkedin = esc_url(get_post_meta($post->ID, 'wpjobus_company_linkedin',true));
		$wpjobus_company_twitter = esc_url(get_post_meta($post->ID, 'wpjobus_company_twitter',true));
		$wpjobus_company_googleplus = esc_url(get_post_meta($post->ID, 'wpjobus_company_googleplus',true));

		$wpjobus_company_googleaddress = esc_attr(get_post_meta($post->ID, 'wpjobus_company_googleaddress',true));
		$wpjobus_company_longitude = esc_attr(get_post_meta($post->ID, 'wpjobus_company_longitude',true));
		$wpjobus_company_latitude = esc_attr(get_post_meta($post->ID, 'wpjobus_company_latitude',true));

		$wpjobus_company_longitude = esc_attr(get_post_meta($post->ID, 'wpjobus_company_longitude',true));
		if(empty($wpjobus_company_longitude)) {
			$wpjobus_company_longitude = 0;
		}

		$wpjobus_company_latitude = esc_attr(get_post_meta($post->ID, 'wpjobus_company_latitude',true));
		if(empty($wpjobus_company_latitude)) {
			$wpjobus_company_latitude = 0;
		}

	}

}

endwhile; endif;
wp_reset_query();

global $current_post;

//get_header(); 

get_template_part('header-myaccount');


?>
<!-- 
 -->

	 <!-- Content START-->
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
            <form id="wpjobus-add-company" type="post" action=""  >
              <div class="resume-box acc-sec">
                <div class="resume-title acc-head">
                  <h4 class="acc-title">
                    <i class="fa fa-pencil-square-o"></i>
                    <div class="title-label">
                      <span class="main-title">Edit Company Profile</span>
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
                          <input type="text" name="fullName" id="fullName" value="<?php echo $wpjobus_company_fullname; ?>" />
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Tag Line</h3>
                        </span>
                        <span class="input">
                          <input type="text" id="wpjobus_company_tagline" name="wpjobus_company_tagline" value="<?php echo $wpjobus_company_tagline; ?>" />
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Foundation Year</h3>
                        </span>
                        <span class="input">
                          <input type="text" name="wpjobus_company_foundyear" id="wpjobus_company_foundyear" value="<?php echo $wpjobus_company_foundyear; ?>" >
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Team Size</h3>
                        </span>
                        <span class="input">
                          <select name="company_team_size" id="company_team_size">
							<?php 

								echo $company_team_size;
								for($i = 1; $i <= 50; $i++) {
								?>
									<option value='<?php echo $i; ?>' <?php selected( $company_team_size, $i ); ?>><?php echo $i; ?></option>
								<?php 
								}
								?>
								<option value='50+' <?php selected( $company_team_size, "50+" ); ?>>50+</option>

                    
                          </select>
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Industry</h3>
                        </span>
                        <span class="input">
						 <input type="text" name="company_industry" id="company_industry" value="<?php echo $company_industry; ?>" />

                           <!-- <select name="company_industry" id="company_industry">
								
							<?php 	global $redux_demo, $resume_industry; 
 //echo $company_industry;
                                                        //echo '<pre>';
                                                       // print_r($redux_demo['resume-industries']);
                                                       // die();
								for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
							?>
								<option value='<?php echo $redux_demo['resume-industries'][$i]; ?>' <?php selected( $company_industry,	$redux_demo["resume-industries"][$i] ); ?>><?php echo $redux_demo['resume-industries'][$i]; ?></option>
							<?php 
							}
							?>

                          </select>  -->
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Location</h3>
                        </span>
                        <span class="input">

						<input type="text" name="company_location" id="company_location" value="<?php echo $company_location; ?>" />

                          <!-- <select name="company_location" id="company_location">
								<?php 
									global $redux_demo, $resume_location; 
									for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {
								?>
								<option value='<?php echo $redux_demo['resume-locations'][$i]; ?>' <?php selected($company_location, $redux_demo["resume-locations"][$i] ); ?>><?php echo $redux_demo['resume-locations'][$i]; ?></option>
								<?php 
									}
								?>	
                          </select> -->

                        </span>
                      </span>
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
											
								wp_editor( $resume_about_me, 'postContent', $settings );

							?>

                            </textarea>
                          </div>
                        </span>
                      </span>
                       <span class="full">
                        <h3>Upload Image</h3>
                        <div class="up-cover up-photo">
                          <div class="default-img">
                            
							<!-- <img src="images/image-placeholder.png" alt="Image Placeholder" />
                             -->
						
							<img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_company_cover_image)) echo $wpjobus_company_cover_image; ?>"  /> 


							<!-- <span class="drag-photo">Drag a Photo</span>
                            <span class="or">or</span> -->
                            <!-- <span class="select-photo"> -->
                              <!-- <input type="file" value="Select a Photo from computer"> -->
								<!-- theme innermost element  -->

								<!-- theme innermost element  -->
                            <!-- </span> -->
							
							<input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_company_cover_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_company_cover_image)) echo $wpjobus_company_cover_image; ?>" />
					            <input class="criteria-image-id" id="your_cover_id" type="text" size="36" name="wpjobus_company_cover_image_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_company_cover_image_id)) echo $wpjobus_company_cover_image_id; ?>" />
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

											return true;

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
                      <input type="submit" class="gradient-btn" value="Update" />
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
                      <div class="resume-content acc-body">
                        <div class="full">
                          
						  <?php 

								if(!empty($wpjobus_company_services)) {

								for ($i = 0; $i < (count($wpjobus_company_services)); $i++) {

							?>


						  <!-- loop starts  -->

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
                              <input type="text" name="wpjobus_company_services[<?php echo $i; ?>][1]" id="wpjobus_company_services[<?php echo $i; ?>][1]" value="<?php if (!empty($wpjobus_company_services[$i][1])) echo $wpjobus_company_services[$i][1]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Content</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_company_services[<?php echo $i; ?>][2]" id="wpjobus_company_services[<?php echo $i; ?>][2]"><?php if (!empty($wpjobus_company_services[$i][2])) echo $wpjobus_company_services[$i][2]; ?>
                              </textarea>
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Expertise</h3>
                            </span>
                            <span class="input">
                              <input type="text" id="review-name" class='' name='wpjobus_company_expertise' value="<?php echo $wpjobus_company_expertise; ?>" />
                            </span>
                          </span>
                          <span class="full submit-row">
                            <input type="submit" class="gradient-btn" value="Update" />
                          </span>

						<!-- Loop ends  -->

							<?php 
								} }
							?>

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

						if(!empty($wpjobus_company_clients)) {

						for ($i = 0; $i < (count($wpjobus_company_clients)); $i++) {

						?>	
						<!-- loop start  -->

                          <span class="full">
                            <span class="label">
                              <h3>Client Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_clients[<?php echo $i; ?>][0]" id="wpjobus_company_clients[<?php echo $i; ?>][0]" value="<?php if (!empty($wpjobus_company_clients[$i][0])) echo $wpjobus_company_clients[$i][0]; ?>" />
                            </span>
                          </span>
                           <span class="full period-row">
                            <span class="label">
                              <h3>Period</h3>
                            </span>
                            <span class="input">
                              <input type="text" id='wpjobus_company_clients[<?php echo $i; ?>][2]' name='wpjobus_company_clients[<?php echo $i; ?>][2]' class="left-input" value="<?php if (!empty($wpjobus_company_clients[$i][2])) echo $wpjobus_company_clients[$i][2]; ?>" />
                              <span class="dashed"> - </span>
                              <input type="text" id='wpjobus_company_clients[<?php echo $i; ?>][3]' name='wpjobus_company_clients[<?php echo $i; ?>][3]' class="right-input" value="<?php if (!empty($wpjobus_company_clients[$i][3])) echo $wpjobus_company_clients[$i][3]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Clients Website</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_clients[<?php echo $i; ?>][4]" id="wpjobus_company_clients[<?php echo $i; ?>][4]" value="<?php if (!empty($wpjobus_company_clients[$i][4])) echo $wpjobus_company_clients[$i][4]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Contracted for doing</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_clients[<?php echo $i; ?>][1]" id="wpjobus_company_clients[<?php echo $i; ?>][1]" value="<?php if (!empty($wpjobus_company_clients[$i][1])) echo $wpjobus_company_clients[$i][1]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_company_clients[<?php echo $i; ?>][5]" id="wpjobus_company_clients[<?php echo $i; ?>][5]"><?php echo $wpjobus_company_clients[$i][5]; ?>
                              </textarea>
                            </span>
                          </span>
                          <span class="full submit-row">
                            <input type="submit" class="gradient-btn" value="Update" />
                          </span>

						  <!-- loop end  -->

						  <?php 
								} }
							?>

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
								//echo $wpjobus_company_testimonials[0][3]; 

								if(!empty($wpjobus_company_testimonials)) {

								for ($i = 0; $i < (count($wpjobus_company_testimonials)); $i++) {

							?>

						  <!-- loop starts  -->
						  <span class="full">
                            <span class="label">
                              <h3>Full Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_testimonials[<?php echo $i; ?>][0]" id="wpjobus_company_testimonials[<?php echo $i; ?>][0]" value="<?php if (!empty($wpjobus_company_testimonials[$i][0])) echo $wpjobus_company_testimonials[$i][0]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Organisation</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_testimonials[<?php echo $i; ?>][1]" id="wpjobus_company_testimonials[<?php echo $i; ?>][1]" value="<?php if (!empty($wpjobus_company_testimonials[$i][1])) echo $wpjobus_company_testimonials[$i][1]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Testimonial</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_company_testimonials[<?php echo $i; ?>][2]" id="wpjobus_company_testimonials[<?php echo $i; ?>][2]"><?php if (!empty($wpjobus_company_testimonials[$i][2])) echo $wpjobus_company_testimonials[$i][2]; ?>
                              </textarea>
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Upload your image</h3>
                            </span>
                            <span class="input">
                                <div class="default-img">
                                  <!-- <img src="images/image-placeholder.png" alt="Image Placeholder" />
                                 
								  <span class="drag-photo">Drag a Photo</span>
                                  <span class="or">or</span>
                                  <span class="select-photo">
                                    <input type="file" value="Select a Photo from computer">
                                  </span> -->
								  <img class="criteria-image" id="your_cover_url_img" src="<?php echo $wpjobus_company_testimonials[$i][3]; ?>"  /> 

								  <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_company_testimonials[<?php echo $i; ?>][3]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php echo $wpjobus_company_testimonials[$i][3]; ?>" />
							           <input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image"   /> 
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


                                </div>
                            </span>
                          </span>

						  <?php 
								} }
							?>

						  <!-- loop ends  -->
                          <span class="full submit-row">
                            <input type="submit" class="gradient-btn" value="Update" />
                          </span>
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
                             $c=1;
							if(!empty($c)) {

							for ($i = 0; $i < $c ; $i++) {

						?>
						  <!-- Loop starts  -->
						  <span class="full">
                            <span class="label">
                              <h3>Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_portfolio[<?php echo $i; ?>][0]" id="wpjobus_company_portfolio[<?php echo $i; ?>][0]" value="<?php echo $wpjobus_company_portfolio[$i][0]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Category</h3>
                            </span>
                            <span class="input">
                              <input type="text" name="wpjobus_company_portfolio[<?php echo $i; ?>][1]" id="wpjobus_company_portfolio[<?php echo $i; ?>][1]" value="<?php echo $wpjobus_company_portfolio[$i][1]; ?>" />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_company_portfolio[<?php echo $i; ?>][2]" id='wpjobus_company_portfolio[<?php echo $i; ?>][2]' ><?php echo $wpjobus_company_portfolio[$i][2]; ?>
                              </textarea>
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Upload your image</h3>
                            </span>
                            <span class="input">
                                <div class="default-img">
                                  
								  <!-- <img src="images/image-placeholder.png" alt="Image Placeholder" />
                                  <span class="drag-photo">Drag a Photo</span>
                                  <span class="or">or</span>
                                  <span class="select-photo">
                                    <input type="file" value="Select a Photo from computer">
                                  </span>
								 -->
								
								<img class="criteria-image" id="your_cover_url_img" src="<?php echo $wpjobus_company_portfolio[$i][3]; ?>"  /> 

								<input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_company_portfolio[<?php echo $i; ?>][3]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php echo $wpjobus_company_portfolio[$i][3]; ?>"/>
							            <input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image"<?php if (!empty($wpjobus_company_portfolio[$i][3])) { ?>style="display: block;"<?php  } ?>   /> 
							            <input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" <?php if (!empty($wpjobus_company_portfolio[$i][3])) { ?>style="display: none;"<?php  } ?>/>

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


                                </div>
                            </span>
                          </span>
						  <!-- loop ends   -->

						    <?php 
								} }
							?>

                          <span class="full submit-row">
							<input type="hidden" id="postID" name="postID" value="<?php echo $current_post; ?>">
							<input type="hidden" name="action" value="wpjobusEditCompanyForm" />
							<?php wp_nonce_field( 'wpjobusEditCompany_html', 'wpjobusEditCompany_nonce' ); ?>	
	                      
							 <input type="submit" class="gradient-btn" value="Update" />
    
						  </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>

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


			<script type="text/javascript">

				jQuery(function($) {
					jQuery('#wpjobus-add-company').validate({
						rules: {
						    fullName: {
						        required: true,
						        minlength: 3
						    },
						    wpjobus_company_email: {
						        required: true,
						        email: true
						    }
						},
						messages: {
							fullName: {
							    required: "<?php _e( 'Please provide a name', 'agrg' ); ?>",
							    minlength: "<?php _e( 'Name must be at least 3 characters long', 'agrg' ); ?>"
							},
							wpjobus_company_email: {
							    required: "<?php _e( 'Please provide an email address', 'agrg' ); ?>",
							    email: "<?php _e( 'Please enter a valid email address', 'agrg' ); ?>"
							}
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
