<?php
/**
 * Template name: Edit Profile
 */
if ( !is_user_logged_in() ) { 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

} 
 
$page = get_page($post->ID);
$current_page_id = $page->ID;
 $query = new WP_Query(array('post_type' => 'resume', 'posts_per_page' =>'-1', 'post_status' => 'publish, draft, pending') );

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
	
if(isset($_GET['post'])) {
		
	if($_GET['post'] == $post->ID) {
		
		$current_post = $post->ID;
        $resume_location = esc_url(get_post_meta($post->ID, 'resume_location',true));
		$wpjobus_resume_cover_image = esc_url(get_post_meta($post->ID, 'wpjobus_resume_cover_image',true));
		$wpjobus_resume_fullname = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_fullname',true));
		$resume_gender = esc_attr(get_post_meta($post->ID, 'resume_gender',true));
		$resume_month_birth = esc_attr(get_post_meta($post->ID, 'resume_month_birth',true));
		$resume_day_birth = esc_attr(get_post_meta($post->ID, 'resume_day_birth',true));
		$resume_year_birth = esc_attr(get_post_meta($post->ID, 'resume_year_birth',true));
		$resume_location = esc_attr(get_post_meta($post->ID, 'resume_location',true));
		$resume_industry = esc_attr(get_post_meta($post->ID, 'resume_industry',true));
		$resume_about_me = html_entity_decode(get_post_meta($post->ID, htmlentities('resume-about-me'),true));
		$resume_careerpitch = esc_attr(get_post_meta($post->ID, 'resume_careerpitch',true));
		$resume_careerpitch_video = esc_attr(get_post_meta($post->ID, 'resume_careerpitch_video',true));
		
		$resume_careerpitch_radio = esc_attr(get_post_meta($post->ID, 'resume_careerpitch_radio',true));
		
		
		$resume_years_of_exp = esc_attr(get_post_meta($post->ID, 'resume_years_of_exp',true));
		$wpjobus_resume_profile_picture = esc_url(get_post_meta($post->ID, 'wpjobus_resume_profile_picture',true));

		$wpjobus_resume_prof_title = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_prof_title',true));
		/*$resume_career_level = esc_attr(get_post_meta($post->ID, 'resume_career_level',true));*/

		$wpjobus_resume_comm_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_comm_level',true));
		$wpjobus_resume_comm_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_comm_note',true));

		$wpjobus_resume_org_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_org_level',true));
		$wpjobus_resume_org_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_org_note',true));

		$wpjobus_resume_job_rel_level = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_rel_level',true));
		$wpjobus_resume_job_rel_note = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_rel_note',true));

		$wpjobus_resume_skills = get_post_meta($post->ID, 'wpjobus_resume_skills',true);
		$wpjobus_resume_native_language = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_native_language',true));
		$wpjobus_resume_languages = get_post_meta($post->ID, 'wpjobus_resume_languages',true);

		$wpjobus_resume_hobbies = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_hobbies',true));

		$wpjobus_resume_education = get_post_meta($post->ID, 'wpjobus_resume_education',true);
		$wpjobus_resume_award = get_post_meta($post->ID, 'wpjobus_resume_award',true);
		$wpjobus_resume_work = get_post_meta($post->ID, 'wpjobus_resume_work',true);
		$wpjobus_resume_testimonials = get_post_meta($post->ID, 'wpjobus_resume_testimonials',true);

		$wpjobus_resume_file = esc_url(get_post_meta($post->ID, 'wpjobus_resume_file',true));
		$wpjobus_resume_file_name = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_file_name',true));

		$wpjobus_resume_remuneration = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_remuneration',true));
		$wpjobus_resume_remuneration_per = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_remuneration_per',true));

		$wpjobus_resume_job_type = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_type',true));

		$wpjobus_resume_job_freelance = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_freelance',true));
		$wpjobus_resume_job_part_time = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_part_time',true));
		$wpjobus_resume_job_full_time = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_full_time',true));
		$wpjobus_resume_job_internship = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_internship',true));
		$wpjobus_resume_job_volunteer = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_job_volunteer',true));

		$wpjobus_resume_portfolio = get_post_meta($post->ID, 'wpjobus_resume_portfolio',true);


		$wpjobus_resume_address = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_address',true));
		$wpjobus_resume_phone = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_phone',true));
		$wpjobus_resume_website = esc_url(get_post_meta($post->ID, 'wpjobus_resume_website',true));
		$wpjobus_resume_email = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_email',true));
		$wpjobus_resume_publish_email = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_publish_email',true));
		$wpjobus_resume_facebook = esc_url(get_post_meta($post->ID, 'wpjobus_resume_facebook',true));
		$wpjobus_resume_linkedin = esc_url(get_post_meta($post->ID, 'wpjobus_resume_linkedin',true));
		$wpjobus_resume_twitter = esc_url(get_post_meta($post->ID, 'wpjobus_resume_twitter',true));
		$wpjobus_resume_googleplus = esc_url(get_post_meta($post->ID, 'wpjobus_resume_googleplus',true));

		$wpjobus_resume_googleaddress = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_googleaddress',true));

		$wpjobus_resume_longitude = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_longitude',true));
		if(empty($wpjobus_resume_longitude)) {
			$wpjobus_resume_longitude = 0;
		}

		$wpjobus_resume_latitude = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_latitude',true));
		if(empty($wpjobus_resume_latitude)) {
			$wpjobus_resume_latitude = 0;
		}

	}

}

endwhile; endif;
wp_reset_query();

global $current_post;

 //get_header();
get_template_part( 'header-editprofile' );
 ?>

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
		  <?php     //  echo "<pre>";
		 // print_r($wpjobus_resume_portfolio);
		  ?>
          <!-- Breadcrumb END-->
          <!-- Edit Resume START-->
          <div class="edit-resume-wrap">
            <form id="wpjobus-add-resume" name="wpjobus-add-resume" type="post" action="" >
			<input type="hidden" id="postID" name="postID" value="<?php echo $current_post; ?>">
			 <div class="resume-box acc-sec">
                <div class="resume-title acc-head">
                  <h4 class="acc-title">
                    <i class="fa fa-user"></i>
                    About Me
                  </h4> 
                </div>
                <div class="resume-content acc-body">
                  <!-- First Block Start-->
                  <div class="full">
                    <div class="one-fourth">
                      <span class="full">
                        <span class="label">
                          <h3>Full Name</h3>
                        </span>
                        <span class="input">
                          <input type="text" name="fullName" id="fullName" value="<?php if(!empty($wpjobus_resume_fullname)) { echo $wpjobus_resume_fullname; } ?>" />
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Career Headline</h3>
                        </span>
                        <span class="input">
                          <input type="text" id="review-name" name="wpjobus_resume_prof_title" value="<?php echo $wpjobus_resume_prof_title; ?>" maxlength="20" />
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Location</h3>
                        </span>
                        <span class="input">
                          <input type="text" name="resume_location" placeholder="USA" value="<?php echo $resume_location;?>" >
                        </span>
                      </span>
                      <span class="full">
                        <span class="label">
                          <h3>Industry</h3>
                        </span>
                        <span class="input">
                        	 <input type="text" name="resume_industry" placeholder="Industry Name" value="<?php echo $resume_industry;?>" >
                         	<!-- <select name="resume_industry" id="resume_industry" style="width: 100%; margin-right: 10px;">
										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
										?>
										<option value='<?php echo $redux_demo['resume-industries'][$i]; ?>' <?php selected( $resume_industry, $redux_demo["resume-industries"][$i] ); ?>><?php echo $redux_demo['resume-industries'][$i]; ?></option>
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
                         <!--    <textarea class="wp-editor-area" rows="12" autocomplete="off" cols="40" name="postContent" id="postContent">
                            </textarea> -->

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
										'quicktags' => false,
										'textarea_rows' => 10
								);
											
								wp_editor( $resume_about_me, 'postContent', $settings );

							?>
							 
						 </div>
                        </span>
                      </span>
                    </div>
                    <div class="submit-row">
                      <input type="submit" class="gradient-btn" value="Update" />
					   
                    </div>
                  </div>
                  <!-- First Block End-->
                  <div class="photos-sec">
                    <!-- Second Block Start-->
                 <div class="full">
                      <span class="full">
                        <h3>Upload your Cover Photo</h3>
                        <div class="up-cover up-photo">
                          <div class="default-img">
                            
							<?php if (empty($wpjobus_resume_cover_image)){  
							
							$default_profile_image = get_stylesheet_directory_uri()."/img/image-placeholder.png";
							
							?>
							
							<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/image-placeholder.png" alt="Image Placeholder" /> -->
                            	<img class="criteria-image" id="your_cover_url_img" src="<?php  echo $default_profile_image; ?>"  />

							<?php }else { ?> 
							
							<img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_cover_image)) echo $wpjobus_resume_cover_image; ?>"  />

                            <?php } ?>

                            <!-- <span class="drag-photo">Drag a Photo</span>
                            <span class="or">or</span>
                          
							<span class="select-photo">
                             -->  
							 
							 <!-- <input type="file" value="Select a Photo from computer"> -->

						<input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_resume_cover_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_cover_image)) echo $wpjobus_resume_cover_image; ?>" />
					            <input class="criteria-image-id" id="your_cover_id" type="text" size="36" name="wpjobus_resume_cover_image_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_cover_image_id)) echo $wpjobus_resume_cover_image_id; ?>" />
					      
					            <input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" />
					       
					            <input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image 1024 * 385 px" />
					        

                               <!-- <h6>Please upload an image of 1600*1000 dimensions</h6> -->
					        
							<script type="text/javascript">
									var image_custom_uploader;
									var video_custom_uploader
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
										
										if(x)
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

                           
							
							<!-- </span> -->
                        
						  </div>
                        </div>
                      </span>
                      <div class="submit-row">
                        <input type="submit" class="gradient-btn" value="Upload" />
                      </div>
                    </div>
				                     
                    <!-- Second Block End-->
                    <!-- Third Block Start-->
                    <div class="full">
                      <div class="one-half">
                        <span class="full">
                          <h3>Upload your Profile Photo</h3>
                          <div class="up-profile up-photo">
                            <div class="default-img">
                             <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/image-placeholder.png" alt="Image Placeholder" />-->
							  
									<img class="criteria-image" id="your_image_url_img" src="<?php if (!empty($wpjobus_resume_profile_picture)){ echo $wpjobus_resume_profile_picture;}else{
									
									$default_profile_image = get_stylesheet_directory_uri()."/img/image-placeholder.png";
                                    echo $default_profile_image; 

									} ?>" style="width: 100px; margin-bottom: 20px; margin-top: 10px; max-height: 100px;" /> 
								 
                             <!--<span class="drag-photo">Drag a Photo</span>
                              <span class="or">or</span> -->
                              <span class="select-photo1">
							  </span>
                                 <input class="criteria-image-url" id="your_image_url" type="text" size="36" name="wpjobus_resume_profile_picture" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_profile_picture)) echo $wpjobus_resume_profile_picture; ?>" />
					            <input class="criteria-image-id" id="your_image_id" type="text" size="36" name="wpjobus_resume_profile_picture_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_profile_picture_id)) echo $wpjobus_resume_profile_picture_id; ?>" />
					           
					            	<input class="criteria-image-button-remove button" id="your_image_url_button_remove" type="button" value="Delete Image" /> 
					           
					            	<input class="criteria-image-button button" id="your_image_url_button" type="button" value="Upload Image 105 * 104 px" />
					           

								<script>


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
									
									// video upload 
									jQuery(document).on('click','.criteria-video-button', function(e) {
									    e.preventDefault();

									    $thisItem = jQuery(this);

									    //If the uploader object has already been created, reopen the dialog
									    if (video_custom_uploader) {
									        video_custom_uploader.open();
									        return;
									    }

									    //Extend the wp.media object
									    video_custom_uploader = wp.media.frames.file_frame = wp.media({
									        title: 'Choose video',
									        button: {
									            text: 'Choose video'
									        },
									        multiple: false
									    });

									    //When a file is selected, grab the URL and set it as the text field's value
									    video_custom_uploader.on('select', function() {
									        attachment = video_custom_uploader.state().get('selection').first().toJSON();
									        var url = '';
									        url = attachment['url'];
									        $thisItem.parent().find('.criteria-video-url').val(url);
									    });

									    //Open the uploader dialog
									    video_custom_uploader.open();
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
                          </div>
                        </span>
                      </div>
                      <div class="one-half">
                        <span class="full">
                          <h3>Upload your Career Network video</h3>
                          <div class="up-video up-photo">
                            <div class="default-img">
                              <img src="<?php echo get_template_directory_uri(); ?>/images/video-placeholder.png" alt="Video Placeholder" />
                              <!--<span class="drag-photo">Drag a Video</span>
                              <span class="or">or</span>
                              <span class="select-photo">
                                <input type="file" value="Select a Video from computer">
                              </span>-->
							  <input type="text" name="resume_careerpitch" value="<?php if(!empty($resume_careerpitch)) { echo $resume_careerpitch; } ?>" class="criteria-image-url" placeholder="" style="margin-bottom: 0;"/>

                   <span class="full" style="margin-bottom: 0; margin: 10px 0px;">

                   <i class="fa fa-trash-o" <?php if(!empty($resume_careerpitch)) { ?>style="display: none;"<?php } ?>></i>
                   <input class="criteria-video-remove button" id="wpjobus_resume_video" type="button" value="Remove" <?php if(!empty($resume_careerpitch)) { ?>style="display:block; width:auto;"<?php } ?>/>
<i class="fa fa-cloud-upload" <?php if(!empty($resume_careerpitch)) { ?>style="display: none;"<?php } ?>></i>
<input class="criteria-video button" id="your_image_url_button" type="button" value="Upload Video" <?php if(!empty($resume_careerpitch)) { ?>style="display: block;"<?php } ?>/>
					
					<!-- <script>
						            var image_custom_uploader_video;
						            var $thisItem = '';

						            jQuery(document).on('click','.criteria-video', function(e) {
						                e.preventDefault();

						                $thisItem = jQuery(this);

						                //If the uploader object has already been created, reopen the dialog
						                if (image_custom_uploader) {
						                    image_custom_uploader.open();
						                    return;
						                }

						                //Extend the wp.media object
						                image_custom_uploader_video = wp.media.frames.file_frame = wp.media({
						                    title: 'Choose video',
						                    button: {
						                        text: 'Choose video'
						                    },
						                    multiple: false
						                });

						                //When a video is selected, grab the URL and set it as the text field's value
						                image_custom_uploader_video.on('select', function() {
						                    attachment = image_custom_uploader_video.state().get('selection').first().toJSON();
						                    var url = '';
						                    url = attachment['url'];
						                    var videoname ='';
						                    filename = attachment['filename'];
						                    $thisItem.parent().parent().parent().find('.criteria-image-url').val(url);
						                    
						                    $thisItem.parent().parent().parent().find('.criteria-video').css("display", "none");
						                    $thisItem.parent().parent().parent().find('.criteria-video-remove').css("display", "block");
						                    $thisItem.parent().parent().parent().find(".fa-cloud-upload").css("display", "none");
									        $thisItem.parent().parent().parent().find(".fa-trash-o").css("display", "block");
						                });

						                //Open the uploader dialog
						                image_custom_uploader_video.open();
						             });

						             jQuery(document).on('click','.criteria-video-remove', function(e) {
						                jQuery(this).parent().parent().parent().find('.criteria-image-url').val('');
						                jQuery(this).parent().parent().parent().find('.criteria-image-url-name').val('');
						               
						                jQuery(this).parent().parent().parent().find('.criteria-video').css("display", "block");
						                jQuery(this).parent().parent().parent().find(".fa-cloud-upload").css("display", "block");
									    jQuery(this).parent().parent().parent().find(".fa-trash-o").css("display", "none");
						                jQuery(this).css("display", "none");
										
						             });
									 
								</script> -->

								<script>
						            var image_custom_uploader_video;
						            var $thisItem = '';

						            jQuery(document).on('click','.criteria-video', function(e) {
						                e.preventDefault();

						                $thisItem = jQuery(this);

						                //If the uploader object has already been created, reopen the dialog
						                if (image_custom_uploader) {
						                    image_custom_uploader.open();
						                    return;
						                }

						                //Extend the wp.media object
						                image_custom_uploader_video = wp.media.frames.file_frame = wp.media({
						                    title: 'Choose video',
						                    button: {
						                        text: 'Choose video'
						                    },
						                    multiple: false
						                });

						                //When a video is selected, grab the URL and set it as the text field's value
						                image_custom_uploader_video.on('select', function() {
						                    attachment = image_custom_uploader_video.state().get('selection').first().toJSON();
						                    var url = '';
						                    url = attachment['url'];
						                    var videoname ='';
						                    filename = attachment['filename'];
						                    $thisItem.parent().parent().parent().find('.criteria-image-url').val(url);
						                    
						                    $thisItem.parent().parent().parent().find('.criteria-video').css("display", "none");
						                    $thisItem.parent().parent().parent().find('.criteria-video-remove').css("display", "block");
						                    $thisItem.parent().parent().parent().find(".fa-cloud-upload").css("display", "none");
									        $thisItem.parent().parent().parent().find(".fa-trash-o").css("display", "block");
						                });

						                //Open the uploader dialog
						                image_custom_uploader_video.open();
						             });

						             jQuery(document).on('click','.criteria-video-remove', function(e) {
						                jQuery(this).parent().parent().parent().find('.criteria-image-url').val('');
						                jQuery(this).parent().parent().parent().find('.criteria-image-url-name').val('');
						               
						                jQuery(this).parent().parent().parent().find('.criteria-video').css("display", "block");
						                jQuery(this).parent().parent().parent().find(".fa-cloud-upload").css("display", "block");
									    jQuery(this).parent().parent().parent().find(".fa-trash-o").css("display", "none");
						                jQuery(this).css("display", "none");
										
						             });
									 


								</script>

                            </div>
                          </div>
                        </span>
                      </div>
                      <div class="submit-row">
                        <input type="submit" class="gradient-btn" value="Upload" />
                      </div>
                    </div>
                    <!-- Third Block End-->
                  </div>
                </div>
              </div>
              <div class="four-sec-form">
                <div class="full">
                  <div class="one-half">
                    <div class="resume-box acc-sec">
                      <div class="resume-title acc-head">
                        <h4 class="acc-title">
                          <i class="fa fa-graduation-cap"></i>
                          <div class="title-label">
                            <span class="main-title">Education</span>
                            <span class="sub-desc">Fill in the education related info using the fields</span>
                          </div>
                        </h4>
                      </div>
                      <div class="resume-content acc-body" id="education">
                      	<?php 
                                
								 //print_r($wpjobus_resume_education);
									//echo count($wpjobus_resume_education);
								for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {

							?>
                        <div class="full divider" id="<?php echo $i;?>">
                        	<span class="full">
                            <span class="label">
                        	<h3 class="skill-item-title"><?php _e( 'Education Qualification', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
                        </span></span>
                          <span class="full">
                            <span class="label">
                              <h3>Institution Name</h3>
                            </span>
							
                            <span class="input">
                              <input type="text"  id="wpjobus_resume_education[<?php echo $i; ?>][0]" class="criteria_name" name='wpjobus_resume_education[<?php echo $i; ?>][0]'  value="<?php if (!empty($wpjobus_resume_education[$i][0])) echo $wpjobus_resume_education[$i][0]; ?>" />
							  
                            </span>
                          </span>
                          <span class="full period-row">
                            <span class="label">
                              <h3>Period</h3>
                            </span>
                            <span class="input">
                              <input type="text"  id='wpjobus_resume_education[<?php echo $i; ?>][2]' name='wpjobus_resume_education[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_education[$i][2])) echo $wpjobus_resume_education[$i][2]; ?>'  />
                              <span class="dashed"> - </span>
                              <input type="text" id='wpjobus_resume_education[<?php echo $i; ?>][3]' name='wpjobus_resume_education[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_education[$i][3])) echo $wpjobus_resume_education[$i][3]; ?>' />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Location</h3>
                            </span>
                            <span class="input">
                              <input type="text"  id='wpjobus_resume_education[<?php echo $i; ?>][4]' name='wpjobus_resume_education[<?php echo $i; ?>][4]' value='<?php if (!empty($wpjobus_resume_education[$i][4])) echo $wpjobus_resume_education[$i][4]; ?>' />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Diploma</h3>
                            </span>
                            <span class="input">
                              <input type="text" id='wpjobus_resume_education[<?php echo $i; ?>][1]' name='wpjobus_resume_education[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_education[$i][1])) echo $wpjobus_resume_education[$i][1]; ?>' />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_resume_education[<?php echo $i; ?>][5]" id='wpjobus_resume_education[<?php echo $i; ?>][5]' >
							 <?php if (!empty($wpjobus_resume_education[$i][5])) echo $wpjobus_resume_education[$i][5]; ?>
                              </textarea>
                            </span>
                          </span>
						 
                         
                        </div>
                         <?php } //} ?>
                      </div>
                      <div class="resume_education" id="resume_education">

                      		<div class="full divider" id="<?php echo $i;?>">
                        	<span class="full">
                            <span class="label">
                        	<h3 class="skill-item-title"><?php _e( 'Education Qualification', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
                        </span></span>
                          <span class="full">
                            <span class="label">
                              <h3>Institution Name</h3>
                            </span>
							
                            <span class="input">
                              <input type="text"  id="" class="criteria_name" name=''  value="" />
							  
                            </span>
                          </span>
                          <span class="full period-row">
                            <span class="label">
                              <h3>Period</h3>
                            </span>
                            <span class="input">
                              <input type="text" class="criteria_period"  id='' name='' value=''  />
                              <span class="dashed"> - </span>
                              <input type="text" class="criteria_period2"  id='' name='' value='' />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Location</h3>
                            </span>
                            <span class="input">
                              <input type="text" class="criteria_location" id='' name='' value='' />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Diploma</h3>
                            </span>
                            <span class="input">
                              <input type="text" class="criteria_qualification" id='' name='' value='' />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" class="criteria_des" cols="40" name="" id='' >
							
                              </textarea>
                            </span>
                          </span>
						 
                           <button name="button_del_service" type="button" class="button-secondary button_del_service"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
                        </div>
                      </div>
                       <div class="resume-content acc-body">
                       <span class="full">
                          <!--   <span class="label">
                              <h3>Add Education Qualification</h3>
                            </span> -->
                             <span class="input">
                              <button type="button" name="submit_add_education" id='submit_add_education' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new Education', 'agrg' ); ?></button>
                            </span>
                            </span>
                           
                             <span class="full submit-row">
                            <input type="submit" class="gradient-btn" value="Submit" />
                          </span>
                      </div>
                    </div>
                  </div>
                  <div class="one-half">
                    <div class="resume-box acc-sec">
                      <div class="resume-title acc-head">
                        <h4 class="acc-title">
                          <i class="fa fa-trophy"></i>
                          <div class="title-label">
                            <span class="main-title">Awards</span>
                            <span class="sub-desc">Let everybody know how good you are</span>
                          </div>
                        </h4>
                      </div>
					   
                      <div class="resume-content acc-body" id="awards">
                      	 <?php 

								//if(!empty($wpjobus_resume_award)) {
						  
								for ($i = 0; $i < (count($wpjobus_resume_award)); $i++) {

							?>
                          <div class="full divider" id="<?php echo $i;?>">
                        	<span class="full">
                            <span class="label">
                        	<h3 class="skill-item-title"><?php _e( 'Awards', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
                            </span>
                            </span>
                          <span class="full">
						 
                            <span class="label">
                              <h3>Award</h3>
                            </span>
							
                            <span class="input">
                              <input type="text"  id="wpjobus_resume_award[<?php echo $i; ?>][0]" class="criteria_name" name='wpjobus_resume_award[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_award[$i][0])) echo $wpjobus_resume_award[$i][0]; ?>' />
                            </span> 
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Year</h3>
                            </span>
                            <span class="input">
                              <input type="text"  id='wpjobus_resume_award[<?php echo $i; ?>][2]' name='wpjobus_resume_award[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_award[$i][2])) echo $wpjobus_resume_award[$i][2]; ?>'  />
                            </span>
                          </span>
                          <!--  <span class="full">
                            <span class="label">
                              <h3>Competition Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" id='wpjobus_resume_award[<?php echo $i; ?>][1]' name='wpjobus_resume_award[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_award[$i][1])) echo $wpjobus_resume_award[$i][1]; ?>' />
                            </span>
                          </span>  -->
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" id='wpjobus_resume_award[<?php echo $i; ?>][3]' name='wpjobus_resume_award[<?php echo $i; ?>][3]' >
                              <?php if (!empty($wpjobus_resume_award[$i][3])) echo $wpjobus_resume_award[$i][3]; ?>
							  </textarea>
                            </span>
                          </span>
						
                        
                        </div>
                         <?php } //} ?>
                      </div>
                      	<div class="resume_awards" id="resume_awards">
                      		 <div class="full" id="<?php echo $i;?>">
                        	<span class="full">
                            <span class="label">
                        	<h3 class="skill-item-title"><?php _e( 'Awards', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
                            </span>
                            </span>
                          <span class="full">
						 
                            <span class="label">
                              <h3>Award</h3>
                            </span>
							
                            <span class="input">
                              <input type="text"  id="" class="award" name='' style="width: 100%; float: left;" value='' />
                            </span> 
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Year</h3>
                            </span>
                            <span class="input">
                              <input type="text"  id='' name='' class="year" value=''  />
                            </span>
                          </span>
                          <!--  <span class="full">
                            <span class="label">
                              <h3>Competition Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" id='' name='' class="competition_name" value='' />
                            </span>
                          </span>  -->
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" id='' name='' class="description" >
                              <?php if (!empty($wpjobus_resume_award[$i][3])) echo $wpjobus_resume_award[$i][3]; ?>
							  </textarea>
                            </span>
                          </span>
						
                          <button name="button_del_service" type="button" class="button-secondary button_del_service"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
                        </div>

                      	</div>
                      	<div class="resume-content acc-body">
                       <span class="full">
                           
                             <span class="input">
                              <button type="button" name="submit_add_awards" id='submit_add_awards' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new Awards', 'agrg' ); ?></button>
                            </span>
                            </span>
                           
                             <span class="full submit-row">
                            <input type="submit" class="gradient-btn" value="Submit" />
                          </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="full">
                  <div class="one-half">
                    <div class="resume-box acc-sec">
                      <div class="resume-title acc-head">
                        <h4 class="acc-title">
                          <i class="fa fa-graduation-cap"></i>
                          <div class="title-label">
                            <span class="main-title">Experience</span>
                            <span class="sub-desc">Name the organization in which you gained your precious experience and professional expertise</span>
                          </div>
                        </h4>
                      </div>

                      <div class="resume-content acc-body" id="experience">
                      						  <?php 

							
									
									
					for ($i = 0; $i < (count($wpjobus_resume_work)); $i++) {

							  	

								

							?>
                        <div class="full divider" id="<?php echo $i; ?>">
                        	<span class="full">
                            <span class="label">
                        	<h3 class="skill-item-title"><?php _e( 'Experience', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
                        </span></span>
                          <span class="full">
                            <span class="label">
                              <h3>Organization Name</h3>
                            </span>
                            <span class="input">
                              <input type="text"  id='wpjobus_resume_work[<?php echo $i; ?>][0]' name='wpjobus_resume_work[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_work[$i][0])) echo $wpjobus_resume_work[$i][0]; ?>' />
                            </span>
                          </span>
						  	
                          <span class="full period-row">
                            <span class="label">
                              <h3>Period</h3>
                            </span>
                            <span class="input">
                              <input type="text"  id='wpjobus_resume_work[<?php echo $i; ?>][2]' name='wpjobus_resume_work[<?php echo $i; ?>][2]' 
                              value='<?php  if (!empty($wpjobus_resume_work[$i][2]))   echo $wpjobus_resume_work[$i][2]; ?>' />
                              <span class="dashed"> - </span>
                              <input type="text"  id='wpjobus_resume_work[<?php echo $i; ?>][3]' name='wpjobus_resume_work[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_work[$i][3])) echo $wpjobus_resume_work[$i][3]; ?>' />
                            </span>
                          </span>
                          <!-- <span class="full">
                            <span class="label">
                              <h3>Job Type</h3>
                            </span>
                            <span class="input">
                            	<?php //count($redux_demo['job-type']);?>
                             <select class="resume_work_job_type" name="wpjobus_resume_work[<?php echo $i; ?>][4]" id="wpjobus_resume_work[<?php echo $i; ?>][4]" style="width: 100%; margin-right: 10px;">
												<?php 
													global $redux_demo; 
													for ($q = 0; $q < count($redux_demo['job-type']); $q++) {
												?>
													<option value='<?php echo $redux_demo['job-type'][$q]; ?>' <?php if(!empty($wpjobus_resume_work[$i][4])) { selected( $wpjobus_resume_work[$i][4], $redux_demo["job-type"][$q] ); } ?>><?php echo $redux_demo['job-type'][$q]; ?></option>
												<?php 
													}
												?>
											</select>
                            </span>
                          </span> -->
                          <span class="full">
                            <span class="label">
                              <h3>Position</h3>
                            </span>
                            <span class="input">
                              <input type="text" id='wpjobus_resume_work[<?php echo $i; ?>][1]' name='wpjobus_resume_work[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_work[$i][1])) echo $wpjobus_resume_work[$i][1]; ?>' />
                            </span>
                          </span>
                            <span class="full">
                            <span class="label">
                              <h3>Upload your company logo</h3>
							 </span>
                            <span class="input">
                                <div class="default-img">
                                 
                                 <img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_work[$i][6])){ echo $wpjobus_resume_work[$i][6]; }else{  
								 
								 $default_profile_image	 = get_stylesheet_directory_uri()."/img/image-placeholder.png";
                                 echo $default_profile_image;
								 
								 }  ?>" />
                                
                                  <span class="select-photo1">
                                  </span>
                                <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_resume_work[<?php echo $i; ?>][6]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_work[$i][6])) echo $wpjobus_resume_work[$i][6]; ?>"/>

							          
							    
										
							            <input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php  echo $j; ?>2" type="button" value="Delete Image" <?php if (!empty($wpjobus_resume_work[$i][6])) { ?>style="display: block;"<?php  } ?>/> 
							        	
							            
							           
							            <input class="criteria-image-button button" id="your_image_url_button<?php echo $j; ?>2" type="button" value="Upload Image"  <?php if (!empty($wpjobus_resume_work[$i][6])) { ?>style="display: none;"<?php  } ?>/>
							        
							            <script>
											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											   
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											    
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
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40" name="wpjobus_resume_work[<?php echo $i; ?>][5]" id='wpjobus_resume_work[<?php echo $i; ?>][5]'>
							<?php if (!empty($wpjobus_resume_work[$i][5])) echo $wpjobus_resume_work[$i][5]; ?>
                              </textarea>
                            </span>
                          </span>
					  
                          
                        </div>
                        <?php }  ?>
                      </div>
                      <div id="resume_service" class="resume_service">
                              <div class="full divider" id="<?php echo $i; ?>">
                        	   <span class="full">
                            <span class="label">
                        	<h3 class="skill-item-title"><?php _e( 'Experience', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
                            </span>
                    		</span>
                          <span class="full">
                            <span class="label">
                              <h3>Organization Name</h3>
                            </span>
                            <span class="input">
                              <input type="text" class="resume_work_organization_name" id='' name='' value='' />
                            </span>
                          </span>
						  	
                          <span class="full period-row">
                            <span class="label">
                              <h3>Period</h3>
                            </span>
                            <span class="input">
                              <input type="text"  class="resume_work_period_1" id='' name='' value='' />
                              <span class="dashed"> - </span>
                              <input type="text" class="resume_work_period_2" id='' name='' value='' />
                            </span>
                          </span>
                          <!-- <span class="full">
                            <span class="label">
                              <h3>Job Type</h3>
                            </span>
                            <span class="input">
                             <select class="resume_work_job_type" name="" id="" style="width: 100%; margin-right: 10px;">
												<?php 
													global $redux_demo; 
													for ($q = 0; $q < count($redux_demo['job-type']); $q++) {
												?>
													<option value='<?php echo $redux_demo['job-type'][$q]; ?>' <?php if(!empty($wpjobus_resume_work[$i][4])) { selected( $wpjobus_resume_work[$i][4], $redux_demo["job-type"][$q] ); } ?>><?php echo $redux_demo['job-type'][$q]; ?></option>
												<?php 
													}
												?>
											</select>
                            </span>
                          </span> -->
                          <span class="full">
                            <span class="label">
                              <h3>Position</h3>
                            </span>
                            <span class="input">
                              <input type="text" class="resume_work_job_position" id='' name='' value='' />
                            </span>
                          </span>
                          	<span class="full">
                            <span class="label">
                              <h3>Upload your company logo</h3>
							 </span>
                            <span class="input">
                                <div class="default-img">
                                 
                                 <img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_work[$i][6])){ echo $wpjobus_resume_work[$i][6]; }else{
								 
								 $default_profile_image = get_stylesheet_directory_uri()."/img/image-placeholder.png";
                                 echo $default_profile_image;
								 
								 }
								 
								 ?>" />
                               
                                  <span class="select-photo1">
                                  </span>
                                <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_work[$i][6])) echo $wpjobus_resume_work[$i][6]; ?>"/>

							          
							    
										
							            <input class="criteria-image-button-remove button" id="" type="button" value="Delete Image" <?php if (!empty($wpjobus_resume_work[$i][6])) { ?>style="display: block;"<?php  } ?>/> 
							        	
							          
							           
							            <input class="criteria-image-button button" id="" type="button" value="Upload Image"  <?php if (!empty($wpjobus_resume_work[$i][6])) { ?>style="display: none;"<?php  } ?>/>
							        
							            <script>
											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											   
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											   
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

                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" class="resume_work_description" cols="40" name="" id=''>
							
                              </textarea>
                            </span>
                          </span>
                            	
                         <button name="button_del_service" type="button" class="button-secondary button_del_service"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
                          
                        </div>
                        
                    </div>
                      <div class="resume-content acc-body">
                       <span class="full">
                            <!-- <span class="label">
                              <h3>Add Experience</h3>
                            </span> -->
                             <span class="input">
                              <button type="button" name="submit_add_service" id='submit_add_service' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new experience', 'agrg' ); ?></button>
                            </span>
                            </span>

		                      <span class="full submit-row">
		                            <input type="submit" class="gradient-btn" value="Submit" />
		                          </span>
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
					  
                      <div class="resume-content acc-body" id="portfolio">
                      	<?php 

								

									$loop= count($wpjobus_resume_portfolio);
									
								for ($i = 0; $i < $loop; $i++) {
									

							?>
                        <div class="full divider" id="<?php echo $i;?>">
                        	 <span class="full">
                            <span class="label">
                        	<h3 class="skill-item-title"><?php _e( 'Portfolio', 'agrg' ); ?> <span class="num"><?php echo $i+1; ?></span></h3>
                        </span></span>
                          <span class="full">
                            <span class="label">
                              <h3>Title</h3>
                            </span>
                            <span class="input">
                              <input type="text" id='wpjobus_resume_portfolio[<?php echo $i; ?>][0]' name='wpjobus_resume_portfolio[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_portfolio[$i][0])) echo $wpjobus_resume_portfolio[$i][0]; ?>' />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Upload your image</h3>
							 </span>
                            <span class="input">
                                <div class="default-img">
                                 
                                 <img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_portfolio[$i][3])){ echo $wpjobus_resume_portfolio[$i][3];}else{ 				
									$default_profile_image = get_stylesheet_directory_uri()."/img/image-placeholder.png";
                                    echo $default_profile_image; } ?>" />
                                
                                  <span class="select-photo1">
                                  </span>
                                <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_resume_portfolio[<?php echo $i; ?>][3]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_portfolio[$i][3])) echo $wpjobus_resume_portfolio[$i][3]; ?>"/>

							          
							    
										
							            <input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php  echo $j; ?>2" type="button" value="Delete Image" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: block;"<?php  } ?>/> 
							        	
							            
							           
							            <input class="criteria-image-button button" id="your_image_url_button<?php echo $j; ?>2" type="button" value="Upload Image"  <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: none;"<?php  } ?>/>
							        
							            <script>
											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											   
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											    
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
						 	
							?>
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea rows="4" cols="40"  name="wpjobus_resume_portfolio[<?php echo $i; ?>][2]" id='wpjobus_resume_portfolio[<?php echo $i; ?>][2]'>
							  <?php if (!empty($wpjobus_resume_portfolio[$i][2])) echo $wpjobus_resume_portfolio[$i][2]; ?>
                              </textarea>
                            </span>
                          </span>
						 
						 
                          </span>
                        </div>
                         <?php }?>
                      </div>
                      <div id="resume_portfolio">
                       <div class="full" id="<?php echo $i;?>">
                       	 <span class="full">
                            <span class="label">
                        	<h3 class="skill-item-title"><?php _e( 'Portfolio', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
                        </span></span>
                          <span class="full">
                            <span class="label">
                              <h3>Title</h3>
                            </span>
                            <span class="input">
                              <input type="text" class="resume_portfolio_text" id='' name='' value='' />
                            </span>
                          </span>
                          <span class="full">
                            <span class="label">
                              <h3>Upload your image</h3>
							 </span>
                            <span class="input">
                                <div class="default-img">
                                 
                                 <img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_portfolio[$i][3])){ echo $wpjobus_resume_portfolio[$i][3]; }else{
								 
								 	$default_profile_image = get_stylesheet_directory_uri()."/img/image-placeholder.png";
                                    echo $default_profile_image;
								 } ?>" />
                               
                                  <span class="select-photo1">
                                  </span>
                                <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_portfolio[$i][3])) echo $wpjobus_resume_portfolio[$i][3]; ?>"/>

							          
							    
										
							            <input class="criteria-image-button-remove button" id="" type="button" value="Delete Image" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: block;"<?php  } ?>/> 
							        	
							          
							           
							            <input class="criteria-image-button button" id="" type="button" value="Upload Image"  <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: none;"<?php  } ?>/>
							        
							            <script>
											var image_custom_uploader;
											var $thisItem = '';

											jQuery(document).on('click','.criteria-image-button', function(e) {
											    e.preventDefault();

											    $thisItem = jQuery(this);

											    
											    if (image_custom_uploader) {
											        image_custom_uploader.open();
											        return;
											    }

											   
											    image_custom_uploader = wp.media.frames.file_frame = wp.media({
											        title: 'Choose Image',
											        button: {
											            text: 'Choose Image'
											        },
											        multiple: false
											    });

											   
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
						 
							?>
                          <span class="full">
                            <span class="label">
                              <h3>Description</h3>
                            </span>
                            <span class="input">
                              <textarea class="resume_portfolio_des"rows="4" cols="40"  name="" id=''>
							
                              </textarea>
                            </span>
                          </span>
						 
						 
                          </span>
                          <button name="button_del_service" type="button" class="button-secondary button_del_service"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
                        </div>
                          
                    </div>
                      <div class="resume-content acc-body">
                       <span class="full">
                            <!-- <span class="label">
                              <h3>Add portfolio</h3>
                            </span> -->
                             <span class="input">
                              <button type="button" name="submit_add_service" id='submit_add_portfolio' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new portfolio', 'agrg' ); ?></button>
                            </span>
                            </span>
                       <input type="hidden" name="action" value="wpjobusEditResumeForm" />
						<?php wp_nonce_field( 'wpjobusEditResume_html', 'wpjobusEditResume_nonce' ); ?>
                          <span class="full submit-row">
                            <input type="submit" class="gradient-btn" value="Submit" />
							<span class="loading" style="display:none;"><i class="fa fa-refresh fa-spin" ></i></span></span></div>
							<script>
								jQuery(document).on('click','.submit-resume-button .input-submit', function() {

									$thisItem = jQuery(this);
									$thisItem.parent().parent().parent().find('#postStatus').val('published');
									
								});
							</script>
							<input type="hidden" id="postStatus" name="postStatus" value="">
                    </div>
                  </div>
                </div>
					<div id="success" style="display:none;">
								<span>
									<!--<h3><?php _e( 'Profile Updated Successful.', 'agrg' ); ?></h3>-->
									<h3 style="color:#04B45F; font-size:16px;">Profile Updated Successful.</h3>
									<span class="submit-loading"><i class="fa fa-refresh fa-spin" ></i></span>
								</span>
								<div class="divider"></div>
							</div>
										 
							<div id="error"  style="display:none;">
								<span>
									<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?></h3>
								</span>
								<div class="divider"></div>
							</div>
              </div>
            </form>
			
			  <script type="text/javascript">
			  
				jQuery('#wpjobus-add-resume').submit(ajaxSubmit);
				function ajaxSubmit(){
                tinyMCE.triggerSave();
				 jQuery('#wpjobus-add-resume .input-submit').css('display','none');
			    jQuery('#wpjobus-add-resume .submit-loading').css('display','block');
				var newCustomerForm1 = jQuery('#wpjobus-add-resume').serialize();
				//var ename = jQuery('#name').val();
				//alert("hi");
				jQuery.ajax({
				type:"POST",
				url: "../wp-admin/admin-ajax.php",
				data: newCustomerForm1,
				 success: function(data) { //alert(data);
						            if(data != 0) {
						        		jQuery('#wpjobus-add-resume .submit-loading').css('display','none');
						        		jQuery('#success').fadeIn();
                                                //alert(data);
						        		<?php   $redirect_link = home_url()."/my-account"; ?>

      									var delay = 555;
      									setTimeout(function(){ window.location = '<?php echo $redirect_link; ?>';}, delay);

						            } else {
						            	jQuery('#wpjobus-add-resume .input-submit').css('display','block');
							        	jQuery('#wpjobus-add-resume .submit-loading').css('display','none');

							            jQuery('#error').fadeIn();
						            }
						        },
						        error: function(data) {
						        	alert(data);
						        	jQuery('#wpjobus-add-resume .input-submit').css('display','block');
						        	jQuery('#wpjobus-add-resume .submit-loading').css('display','none');

						            jQuery('#error').fadeIn();
						        }
			/*	success:function(data){
				jQuery("#feedback").html(data);
				}*/
				});
				return false;
				$('#resume_service').hide();
				$('#resume_portfolio').hide();
				$('#resume_education').hide();
				
				}
				$('#resume_service').hide();
				$('#resume_portfolio').hide();
				$('#resume_education').hide();
				$('#resume_awards').hide();

		jQuery('#submit_add_service').on('click', function() { //alert("inside add experience"); 		
		$newItem = jQuery('#resume_service div.full').clone().appendTo('#experience').show();
		
		if ($newItem.prev('.full').size() == 1) {
			
			var id = parseInt($newItem.prev('.full').attr('id')) + 1;
			//alert(id);
		} else {
			var id = 0;	
		}
		$newItem.attr('id', id);

		$newItem.find('.skill-item-title span.num').text(id+1);

		var nameText = 'wpjobus_resume_work[' + id + '][0]';
		$newItem.find('.resume_work_organization_name').attr('id', nameText).attr('name', nameText);

		var nameText = 'wpjobus_resume_work[' + id + '][1]';
		$newItem.find('.resume_work_period_1').attr('id', nameText).attr('name', nameText);

		var nameText = 'wpjobus_resume_work[' + id + '][2]';
		$newItem.find('.resume_work_period_2').attr('id', nameText).attr('name', nameText);


		var nameText = 'wpjobus_resume_work[' + id + '][3]';
		$newItem.find('.resume_work_job_type').attr('id', nameText).attr('name', nameText);

		var nameText = 'wpjobus_resume_work[' + id + '][4]';
		$newItem.find('.resume_work_job_position').attr('id', nameText).attr('name', nameText);

		var nameText = 'wpjobus_resume_work[' + id + '][5]';
		$newItem.find('.resume_work_description').attr('id', nameText).attr('name', nameText);




		//event handler for newly created element
		$newItem.children('.button_del_service').on('click', function () {
			alert('Are you sure?');
			jQuery(this).parent().remove();
		});

	});
jQuery('#submit_add_portfolio').on('click', function() { //alert("inside add portfolio"); 		
		$newItem = jQuery('#resume_portfolio div.full').clone().appendTo('#portfolio').show();
		if ($newItem.prev('.full').size() == 1) {
			
			var id = parseInt($newItem.prev('.full').attr('id')) + 1;
			//alert(id);
		} else {
			var id = 0;	
		}
		$newItem.attr('id', id);

		$newItem.find('.skill-item-title span.num').text(id+1);
		var nameText = 'wpjobus_resume_portfolio[' + id + '][0]';
		$newItem.find('.resume_portfolio_text').attr('id', nameText).attr('name', nameText);

		var nameText = 'wpjobus_resume_portfolio[' + id + '][2]';
		$newItem.find('.resume_portfolio_des').attr('id', nameText).attr('name', nameText);

		var nameText = 'wpjobus_resume_portfolio[' + id + '][3]';
		$newItem.find('.criteria-image-url').attr('name', nameText);

		
		var nameText = 'your_image_url_button_remove'+id+'2';
		$newItem.find('.criteria-image-button-remove').attr('id', nameText);
		
		var nameText = 'your_image_url_button'+id+'2';
		$newItem.find('.criteria-image-button').attr('id', nameText);

	
		

		$newItem.children('.button_del_service').on('click', function () {
			alert('Are you sure?');
			jQuery(this).parent().remove();
		});
	});
jQuery('#submit_add_education').on('click', function() { //alert("inside add Qualification"); 		
		$newItem = jQuery('#resume_education div.full').clone().appendTo('#education').show();
		if ($newItem.prev('.full').size() == 1) {
			
			var id = parseInt($newItem.prev('.full').attr('id')) + 1;
			
		} else {
			var id = 0;	
		}
		$newItem.attr('id', id);

		$newItem.find('.skill-item-title span.num').text(id+1);
		var nameText = 'wpjobus_resume_education[' + id + '][0]';
		$newItem.find('.criteria_name').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][2]';
		$newItem.find('.criteria_period').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][3]';
		$newItem.find('.criteria_period2').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][4]';
		$newItem.find('.criteria_location').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][1]';
		$newItem.find('.criteria_qualification').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][5]';
		$newItem.find('.criteria_des').attr('id', nameText).attr('name', nameText);

		$newItem.children('.button_del_service').on('click', function () {
			alert('Are you sure?');
			jQuery(this).parent().remove();
		});
	});
jQuery('#submit_add_education').on('click', function() { //alert("inside add Qualification"); 		
		$newItem = jQuery('#resume_education div.full').clone().appendTo('#education').show();
		if ($newItem.prev('.full').size() == 1) {
			
			var id = parseInt($newItem.prev('.full').attr('id')) + 1;
			
		} else {
			var id = 0;	
		}
		$newItem.attr('id', id);

		$newItem.find('.skill-item-title span.num').text(id+1);
		var nameText = 'wpjobus_resume_education[' + id + '][0]';
		$newItem.find('.criteria_name').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][2]';
		$newItem.find('.criteria_period').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][3]';
		$newItem.find('.criteria_period2').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][4]';
		$newItem.find('.criteria_location').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][1]';
		$newItem.find('.criteria_qualification').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_education[' + id + '][5]';
		$newItem.find('.criteria_des').attr('id', nameText).attr('name', nameText);

		$newItem.children('.button_del_service').on('click', function () {
			alert('Are you sure?');
			jQuery(this).parent().remove();
		});
	});
jQuery('#submit_add_awards').on('click', function() { //alert("inside add Qualification"); 		
		$newItem = jQuery('#resume_awards div.full').clone().appendTo('#awards').show();
		if ($newItem.prev('.full').size() == 1) {
			
			var id = parseInt($newItem.prev('.full').attr('id')) + 1;
			
		} else {
			var id = 0;	
		}
		$newItem.attr('id', id);

		$newItem.find('.skill-item-title span.num').text(id+1);
		var nameText = 'wpjobus_resume_award[' + id + '][0]';
		$newItem.find('.award').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_award[' + id + '][2]';
		$newItem.find('.year').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_award[' + id + '][1]';
		$newItem.find('.competition_name').attr('id', nameText).attr('name', nameText);
		var nameText = 'wpjobus_resume_award[' + id + '][3]';
		$newItem.find('.description').attr('id', nameText).attr('name', nameText);
		

		$newItem.children('.button_del_service').on('click', function () {
			alert('Are you sure?');
			jQuery(this).parent().remove();
		});
	});


</script>
		

          </div>
          <!-- Edit Resume END-->
	
      </div>
    </div>

    <!-- Content END-->
	
  
 <?php get_footer( 'myaccount' ); ?>
 <?php  //get_footer(); ?>
 <style type="text/css">
 .full .label{
 	width: 30%!important;
 	}
 	.resume-content .submit-row{
 		margin-left: auto;
 		margin-right: auto;

 	}
 	</style>