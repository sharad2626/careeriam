<?php
/**
 * Template name: Edit Resume
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

get_header(); ?>

	<section id="blog">

		<div class="container">

			<div class="resume-skills">

				<form id="wpjobus-add-resume" type="post" action="" >

					<input type="hidden" id="postID" name="postID" value="<?php echo $current_post; ?>">

					<h1 class="resume-section-title"><i class="fa fa-file-text-o"></i><?php _e( 'Edit Your Resume', 'agrg' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Hey. It’s easier than it looks. Take a deep breath and complete the fields below. You’ll have a beautifull resume page!', 'agrg' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Full Name:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" name="fullName" id="fullName" value="<?php if(!empty($wpjobus_resume_fullname)) { echo $wpjobus_resume_fullname; } ?>" class="input-textarea" placeholder="" style="margin-bottom: 0;"/>
									<label for="fullName" class="error userNameError"></label>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Gender:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_gender" id="resume_gender" style="width: 100%;">
										<option value="Male" <?php selected( $resume_gender, 'Male' ); ?>>Male</option>
										<option value="Female" <?php selected( $resume_gender, 'Female' ); ?>>Female</option>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Date of birth:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">

									<select name="resume_month_birth" id="resume_month_birth" style="width: 26%; width: -webkit-calc(30% - 10px); width: calc(30% - 10px); margin-right: 10px;">
										<?php 
											echo $resume_month_birth;

											for ($i = 1; $i <= 12; $i++) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $resume_month_birth, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
									</select>

									<select name="resume_day_birth" id="resume_day_birth" style="width: 26%; width: -webkit-calc(30% - 10px); width: calc(30% - 10px); margin-right: 10px;">
										<?php 
											for ($i = 1; $i <= 31; $i++) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $resume_day_birth, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
									</select>

									<select name="resume_year_birth" id="resume_year_birth" style="width: 40%;">
										<?php 
											$thisYear = date("Y");
											for ($i = $thisYear; $i >= 1934; $i--) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $resume_year_birth, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Years of experience:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_years_of_exp" id="resume_years_of_exp" style="width: 100%;">
										<?php 
											for ($i = 1; $i <= 20; $i++) {
										?>
										<option value='<?php echo $i; ?>' <?php selected( $resume_years_of_exp, $i ); ?>><?php echo $i; ?></option>
										<?php 
											}
										?>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Industry:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_industry" id="resume_industry" style="width: 100%; margin-right: 10px;">
										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
										?>
										<option value='<?php echo $redux_demo['resume-industries'][$i]; ?>' <?php selected( $resume_industry, $redux_demo["resume-industries"][$i] ); ?>><?php echo $redux_demo['resume-industries'][$i]; ?></option>
										<?php 
											}
										?>
									</select>
								</span>

							</span>

							<span class="full" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Location:', 'agrg' ); ?></h3>
								</span>
								<span class="three_fifth" style="margin-bottom: 0;">
                              <input type="text" name="resume_location" placeholder="CITY, STATE, COUNTRY" value="<?php echo $resume_location;?>"></span>
								<!-- <span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_location" id="resume_location" style="width: 100%; margin-right: 10px;">
										<?php 
											//global $redux_demo; 
										//	for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {
										?>
										<option value='<?php //echo $redux_demo['resume-locations'][$i]; ?>' <?php// selected( $resume_location, $redux_demo["resume-locations"][$i] ); ?>><?php //echo $redux_demo['resume-locations'][$i]; ?></option>
										<?php 
											//}
										?>
									</select>
								</span> -->

							</span>
							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Career headline Title:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="review-name" class='input-textarea' name='wpjobus_resume_prof_title' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_prof_title; ?>' placeholder="" />
								</span>

							</span>
              <?php /*?><span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Career Level:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<select name="resume_career_level" id="resume_career_level" style="width: 100%; margin-right: 10px;">
										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['resume_career_level']); $i++) {
										?>
										<option value='<?php echo $redux_demo['resume_career_level'][$i]; ?>' <?php selected( $resume_career_level, $redux_demo["resume_career_level"][$i] ); ?>><?php echo $redux_demo['resume_career_level'][$i]; ?></option>

										<?php 
											}
										?>
									</select>
								</span>

							</span><?php */?>
							<span class="full" style="margin-bottom: 0;">

								<!-- <span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php // _e( 'CV File (PDF, doc)', 'agrg' ); ?></h3>
								</span>
        
								<span class="three_fifth" style="margin-bottom: 0;">
                             <!--
									<input type="text" value="<?php //echo $wpjobus_resume_file_name; ?>" class="input-textarea file-name" placeholder="" style="margin-bottom: 0;"/>

									<span class="full" style="margin-bottom: 0; margin-top: 10px;">

						                <input class="criteria-image-url" type="text" size="36" name="wpjobus_resume_file" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_file)) echo $wpjobus_resume_file; ?>" />
						                <input class="criteria-image-url-name" type="text" size="36" name="wpjobus_resume_file_name" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_file_name)) echo $wpjobus_resume_file_name; ?>" />
						                <i class="fa fa-trash-o" <?php if(!empty($wpjobus_resume_file_name)) { ?>style="display: block;"<?php } ?>></i><input class="criteria-file-remove button" id="wpjobus_resume_file" type="button" value="Remove" <?php if(!empty($wpjobus_resume_file_name)) { ?>style="display: block;"<?php } ?>/>
						                <i class="fa fa-cloud-upload" <?php if(!empty($wpjobus_resume_file_name)) { ?>style="display: none;"<?php } ?>></i><input class="criteria-file button" id="your_image_url_button" type="button" value="Upload File" <?php if(!empty($wpjobus_resume_file_name)) { ?>style="display: none;"<?php } ?>/>

						            </span>

								</span> -->

					            <script>
						            var image_custom_uploader_file;
						            var $thisItem = '';

						            jQuery(document).on('click','.criteria-file', function(e) {
						                e.preventDefault();

						                $thisItem = jQuery(this);

						                //If the uploader object has already been created, reopen the dialog
						                if (image_custom_uploader) {
						                    image_custom_uploader.open();
						                    return;
						                }

						                //Extend the wp.media object
						                image_custom_uploader_file = wp.media.frames.file_frame = wp.media({
						                    title: 'Choose File',
						                    button: {
						                        text: 'Choose File'
						                    },
						                    multiple: false
						                });

						                //When a file is selected, grab the URL and set it as the text field's value
						                image_custom_uploader_file.on('select', function() {
						                    attachment = image_custom_uploader_file.state().get('selection').first().toJSON();
						                    var url = '';
						                    url = attachment['url'];
						                    var filename ='';
						                    filename = attachment['filename'];
						                    $thisItem.parent().parent().parent().find('.criteria-image-url').val(url);
						                    $thisItem.parent().parent().parent().find('.criteria-image-url-name').val(filename);
						                    $thisItem.parent().parent().parent().find('.file-name').val(filename);
						                    $thisItem.parent().parent().parent().find('.criteria-file').css("display", "none");
						                    $thisItem.parent().parent().parent().find('.criteria-file-remove').css("display", "block");
						                    $thisItem.parent().parent().parent().find(".fa-cloud-upload").css("display", "none");
									        $thisItem.parent().parent().parent().find(".fa-trash-o").css("display", "block");
						                });

						                //Open the uploader dialog
						                image_custom_uploader_file.open();
						             });

						             jQuery(document).on('click','.criteria-file-remove', function(e) {
						                jQuery(this).parent().parent().parent().find('.criteria-image-url').val('');
						                jQuery(this).parent().parent().parent().find('.criteria-image-url-name').val('');
						                jQuery(this).parent().parent().parent().find('.file-name').val('');
						                jQuery(this).parent().parent().parent().find('.criteria-file').css("display", "block");
						                jQuery(this).parent().parent().parent().find(".fa-cloud-upload").css("display", "block");
									    jQuery(this).parent().parent().parent().find(".fa-trash-o").css("display", "none");
						                jQuery(this).css("display", "none");
										
						             });
									 


								</script>

							</span>

						</div>

						<div class="one_half">

							<span class="full" style="margin-bottom: 0;">

								<span class="one_half first" style="margin-bottom: 0;">
									<h3><?php _e( 'About Me:', 'agrg' ); ?></h3>
								</span>

							</span>

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
              
              <span class="full" style="margin-top:10px;" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Career Pitch Video Url:', 'agrg' ); ?></h3>
		
        						</span>
							<span class="three_fifth" style="margin-bottom: 10px;">
									
<input type="text" name="resume_careerpitch" value="<?php if(!empty($resume_careerpitch)) { echo $resume_careerpitch; } ?>" class="criteria-image-url" placeholder="" style="margin-bottom: 0;"/>
                   <span class="full" style="margin-bottom: 0; margin: 10px 0px;">
                   <i class="fa fa-trash-o" <?php if(!empty($resume_careerpitch)) { ?>style="display: block;"<?php } ?>></i><input class="criteria-video-remove button" id="wpjobus_resume_video" type="button" value="Remove" <?php if(!empty($resume_careerpitch)) { ?>style="display:block; width:auto;"<?php } ?>/>
<i class="fa fa-cloud-upload" <?php if(!empty($resume_careerpitch)) { ?>style="display: block;"<?php } ?>></i><input class="criteria-video button" id="your_image_url_button" type="button" value="Upload Video" <?php if(!empty($resume_careerpitch)) { ?>style="display: block;"<?php } ?>/>
</span>
    <p>We accept vimeo and youtube or upload .</p></span>
    
    
<input type="checkbox" id="resume_careerpitch_radio" name="resume_careerpitch_radio" <?php if($resume_careerpitch_radio=='1'){ ?> checked="checked" <?php } ?> value="1" />Please check the button for show the video


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




                                

							</span>

						</div>

					</div>

					<div class="full">

						<div class="one_half first">

							<span class="full" style="margin-bottom: 0;">

								<span class="full" style="margin-bottom: 0;">
									<h3><i class="fa fa-camera"></i><?php _e( 'Profile Picture:', 'agrg' ); ?></h3>
								</span>

								<div style="width: 100%; float: left;">
									<img class="criteria-image" id="your_image_url_img" src="<?php if (!empty($wpjobus_resume_profile_picture)) echo $wpjobus_resume_profile_picture; ?>" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 340px;" /> 
								</div>
					            <input class="criteria-image-url" id="your_image_url" type="text" size="36" name="wpjobus_resume_profile_picture" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_profile_picture)) echo $wpjobus_resume_profile_picture; ?>" />
					            <input class="criteria-image-id" id="your_image_id" type="text" size="36" name="wpjobus_resume_profile_picture_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_profile_picture_id)) echo $wpjobus_resume_profile_picture_id; ?>" />
					            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove" type="button" value="Delete Image" /> </br>
					            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button" type="button" value="Upload Image" />
								<h6>Please upload an image of 280*280 dimensions</h6>

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

							</span>

						</div>

						<div class="one_half">

							<span class="full" style="margin-bottom: 0;">

								<span class="full" style="margin-bottom: 0;">
									<h3><i class="fa fa-picture-o"></i><?php _e( 'Cover Image:', 'agrg' ); ?></h3>
								</span>

								<div style="width: 100%; float: left;">
									<img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_cover_image)) echo $wpjobus_resume_cover_image; ?>" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 340px;" /> 
								</div>
					            <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_resume_cover_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_cover_image)) echo $wpjobus_resume_cover_image; ?>" />
					            <input class="criteria-image-id" id="your_cover_id" type="text" size="36" name="wpjobus_resume_cover_image_id" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_cover_image_id)) echo $wpjobus_resume_cover_image_id; ?>" />
					            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" /> </br>
					            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" />
                               <h6>Please upload an image of 1600*1000 dimensions</h6>
					            <script>
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

						</div>

						<div class="divider"></div>

					</div>

				

					

					

					

					

					

					<!-- <div class="full" style="margin-bottom: 0;">

						<div class="one_half first" style="margin-bottom: 20px;">

							<span class="full" >

								<!-- <span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php // _e( 'Native Language', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="review-name" class='' name='wpjobus_resume_native_language' style="width: 100%; float: left; margin-bottom: 0;" value='<?php //echo $wpjobus_resume_native_language; ?>' placeholder="" />
								</span>

							</span>

						</div> 

						<div class="divider"style="margin-top: 0px;"></div>

					</div> -->



					<div class="full" style="margin-bottom: 0;">

						<!-- <div class="one_fifth first">

							<h3 class="skill-item-title"><?php //_e( 'Hobbies:', 'agrg' ); ?></h3>

						</div> 

						<div class="four_fifth">

							<input type='text' id="review-name" class='' name='wpjobus_resume_hobbies' style="width: 100%; float: left; margin-bottom: 0;" value='<?php // echo $wpjobus_resume_hobbies; ?>' placeholder="" />
							<span class="info-text" style="margin-left: 0;"><?php //_e( 'Insert multiple hobbies and separate them using commas', 'agrg' ); ?></span>

						</div> -->

						<div class="divider" style="margin-top: 20px;"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-university"></i><?php _e( 'Education', 'agrg' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Fill in the education related info using the fields below.', 'agrg' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_institution">
							<?php 

								if(!empty($wpjobus_resume_education)) {

								for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Institution', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Institution Name', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id="wpjobus_resume_education[<?php echo $i; ?>][0]" class="criteria_name" name='wpjobus_resume_education[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_education[$i][0])) echo $wpjobus_resume_education[$i][0]; ?>' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Qualification & Faculty:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][1]' name='wpjobus_resume_education[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_education[$i][1])) echo $wpjobus_resume_education[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Period:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][2]' name='wpjobus_resume_education[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_education[$i][2])) echo $wpjobus_resume_education[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 40%"> <span style="float: left; margin: 10px;">-</span> <input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][3]' name='wpjobus_resume_education[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_education[$i][3])) echo $wpjobus_resume_education[$i][3]; ?>' class='criteria_to_time' placeholder="" style="width: 40%">
										</span>

									</span>

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Location:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_education[<?php echo $i; ?>][4]' name='wpjobus_resume_education[<?php echo $i; ?>][4]' value='<?php if (!empty($wpjobus_resume_education[$i][4])) echo $wpjobus_resume_education[$i][4]; ?>' class='criteria_location' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Notes:', 'agrg' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<textarea class="criteria_notes" name="wpjobus_resume_education[<?php echo $i; ?>][5]" id='wpjobus_resume_education[<?php echo $i; ?>][5]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_education[$i][5])) echo $wpjobus_resume_education[$i][5]; ?></textarea>
									</span>

								</span>

								<button name="button_del_institution" type="button" class="button-secondary button_del_institution"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_education">
							
							<div class="full option_item" id="999">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Institution', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Institution Name', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id="" class="criteria_name" name='' style="width: 100%; float: left;" value='' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Qualification & Faculty:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Period:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_from_time' placeholder="" style="width: 40%"> <span style="float: left; margin: 10px;">-</span> <input type='text' id='' name='' value='' class='criteria_to_time' placeholder="" style="width: 40%">
										</span>

									</span>

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Location:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_location' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Notes:', 'agrg' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<textarea class="criteria_notes" name="" id='' cols="70" rows="4" ></textarea>
									</span>

								</span>

								<button name="button_del_institution" type="button" class="button-secondary button_del_institution"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_institution" id='submit_add_institution' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new institution', 'agrg' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-trophy"></i><?php _e( 'Awards', 'agrg' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Let everybody know how good you are!', 'agrg' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_award">
							<?php 

								if(!empty($wpjobus_resume_award)) {

								for ($i = 0; $i < (count($wpjobus_resume_award)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Award', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Prize:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id="wpjobus_resume_award[<?php echo $i; ?>][0]" class="criteria_name" name='wpjobus_resume_award[<?php echo $i; ?>][0]' style="width: 100%; float: left;" value='<?php if (!empty($wpjobus_resume_award[$i][0])) echo $wpjobus_resume_award[$i][0]; ?>' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Competition Name:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][1]' name='wpjobus_resume_award[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_award[$i][1])) echo $wpjobus_resume_award[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Year:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][2]' name='wpjobus_resume_award[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_award[$i][2])) echo $wpjobus_resume_award[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Location:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_award[<?php echo $i; ?>][3]' name='wpjobus_resume_award[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_award[$i][3])) echo $wpjobus_resume_award[$i][3]; ?>' class='criteria_location' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<button name="button_del_award" type="button" class="button-secondary button_del_award" style="margin-top: 30px;"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_award">
							
							<div class="full option_item" id="999">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Award', 'agrg' ); ?> <span class="num">999</span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Prize:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id="" class="criteria_name" name='' style="width: 100%; float: left;" value='' placeholder="" />
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Competition Name:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Year:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_from_time' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Location:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_location' placeholder="" style="width: 100%;">
										</span>

									</span>

								</span>

								<button name="button_del_award" type="button" class="button-secondary button_del_award" style="margin-top: 30px;"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
							
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_award" id='submit_add_award' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new award', 'agrg' ); ?></button>
							
						</div>

						<div class="divider"></div>

					</div>

					

					

					

					<h1 class="resume-section-title"><i class="fa fa-building"></i><?php _e( 'Experience', 'agrg' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Name the organization in which you gained your precious experience and professional expertise.', 'agrg' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_work">
							<?php 

								if(!empty($wpjobus_resume_work)) {

								for ($i = 0; $i < (count($wpjobus_resume_work)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Work Experience', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Organization Name:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][0]' name='wpjobus_resume_work[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_work[$i][0])) echo $wpjobus_resume_work[$i][0]; ?>' class='criteria_name' placeholder="" style="width: 100%; float: left;">
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Job Position:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][1]' name='wpjobus_resume_work[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_work[$i][1])) echo $wpjobus_resume_work[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Period:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][2]' name='wpjobus_resume_work[<?php echo $i; ?>][2]' value='<?php if (!empty($wpjobus_resume_work[$i][2])) echo $wpjobus_resume_work[$i][2]; ?>' class='criteria_from_time' placeholder="" style="width: 40%;"> <span style="float: left; margin: 10px;">-</span> <input type='text' id='wpjobus_resume_work[<?php echo $i; ?>][3]' name='wpjobus_resume_work[<?php echo $i; ?>][3]' value='<?php if (!empty($wpjobus_resume_work[$i][3])) echo $wpjobus_resume_work[$i][3]; ?>' class='criteria_to_time' placeholder="" style="width: 40%;">
										</span>

									</span>

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Job type:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
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

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Notes:', 'agrg' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<textarea class="criteria_notes" name="wpjobus_resume_work[<?php echo $i; ?>][5]" id='wpjobus_resume_work[<?php echo $i; ?>][5]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_work[$i][5])) echo $wpjobus_resume_work[$i][5]; ?></textarea>
									</span>

								</span>

								<button name="button_del_work" type="button" class="button-secondary button_del_work"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_work">
							
							<div class="full option_item" id="999">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Work Experience', 'agrg' ); ?> <span class="num">999</span></h3>
									</span>
								</div>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Organization Name:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name' placeholder="" style="width: 100%; float: left;">
									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Job Position:', 'agrg' ); ?></h3>
									</span>

									<span class="one_half" style="margin-bottom: 0;">
										<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
									</span>

								</span>

								<span class="one_half first"  style="margin-bottom: 0;">

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Period:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
											<input type='text' id='' name='' value='' class='criteria_from_time' placeholder="" style="width: 40%;"> <span style="float: left; margin: 10px;">-</span> <input type='text' id='' name='' value='' class='criteria_to_time' placeholder="" style="width: 40%;">
										</span>

									</span>

									<span class="full"  style="margin-bottom: 0;">

										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Job type:', 'agrg' ); ?></h3>
										</span>

										<span class="one_half" style="margin-bottom: 0;">
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

									</span>

								</span>

								<span class="one_half" style="margin-bottom: 0;">

									<span class="one_fourth first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Notes:', 'agrg' ); ?></h3>
									</span>

									<span class="three_fourth" style="margin-bottom: 0;">
										<textarea class="criteria_notes" name="" id='' cols="70" rows="4" ></textarea>
									</span>

								</span>

								<button name="button_del_work" type="button" class="button-secondary button_del_work"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_work" id='submit_add_work' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new organization ', 'agrg' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

				
					

					

					

					<h1 class="resume-section-title"><i class="fa fa-bookmark"></i><?php _e( 'Portfolio', 'agrg' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Upload your finest and brilliant work!', 'agrg' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div id="resume_portfolio">
							<?php 

								if(!empty($wpjobus_resume_portfolio)) {

								for ($i = 0; $i < (count($wpjobus_resume_portfolio)); $i++) {

							?>
							
							<div class="full option_item" id="<?php echo $i; ?>">
								
								<div class='full'  style="margin-bottom: 0;">
									<span class="one_half first" style="margin-bottom: 0;">
										<h3 class="skill-item-title"><?php _e( 'Project', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
									</span>
								</div>

								<div class="full" style="margin-bottom: 0;">

									<span class="one_half first"  style="margin-bottom: 0;">

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Name:', 'agrg' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='wpjobus_resume_portfolio[<?php echo $i; ?>][0]' name='wpjobus_resume_portfolio[<?php echo $i; ?>][0]' value='<?php if (!empty($wpjobus_resume_portfolio[$i][0])) echo $wpjobus_resume_portfolio[$i][0]; ?>' class='criteria_name' placeholder="" style="width: 100%;">
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Category:', 'agrg' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='wpjobus_resume_portfolio[<?php echo $i; ?>][1]' name='wpjobus_resume_portfolio[<?php echo $i; ?>][1]' value='<?php if (!empty($wpjobus_resume_portfolio[$i][1])) echo $wpjobus_resume_portfolio[$i][1]; ?>' class='criteria_name_two' placeholder="" style="width: 100%;">
												<span class="info-text" style="margin-left: 0;"><?php _e( 'You can leave it empty', 'agrg' ); ?></span>
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Note:', 'agrg' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<textarea class="criteria_notes" name="pjobus_resume_portfolio[<?php echo $i; ?>][2]" id='pjobus_resume_portfolio[<?php echo $i; ?>][2]' cols="70" rows="4" ><?php if (!empty($wpjobus_resume_portfolio[$i][2])) echo $wpjobus_resume_portfolio[$i][2]; ?></textarea>
											</span>

										</div>

									</span>

									<span class="one_half" style="margin-bottom: 0;">

										<span class="full" style="margin-bottom: 0;">
											<h3><i class="fa fa-picture-o"></i><?php _e( 'Picture:', 'agrg' ); ?></h3>
										</span>

										<div style="width: 100%; float: left;">
											<img class="criteria-image" id="your_cover_url_img" src="<?php if (!empty($wpjobus_resume_portfolio[$i][3])) echo $wpjobus_resume_portfolio[$i][3]; ?>" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 100px;" /> 
										</div>
										
							            <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="wpjobus_resume_portfolio[<?php echo $i; ?>][3]" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="<?php if (!empty($wpjobus_resume_portfolio[$i][3])) echo $wpjobus_resume_portfolio[$i][3]; ?>"/>
							            <i class="fa fa-trash-o" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: block;"<?php  } ?>></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: block;"<?php  } ?>/> </br>
							            <i class="fa fa-cloud-upload" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: none;"<?php  } ?>></i><input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" <?php if (!empty($wpjobus_resume_portfolio[$i][3])) { ?>style="display: none;"<?php  } ?>/>

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

								</div>

								<button name="button_del_portfolio" type="button" class="button-secondary button_del_portfolio"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
								
							</div>
							
							<?php 
								} }
							?>


						</div>

						<div id="template_portfolio">
							
							<div class="full option_item" id="999">
								
								<div class="full" style="margin-bottom: 0;">

									<div class='full' style="margin-bottom: 0;">
										<span class="one_half first" style="margin-bottom: 0;">
											<h3 class="skill-item-title"><?php _e( 'Project', 'agrg' ); ?> <span class="num"><?php echo ($i+1); ?></span></h3>
										</span>
									</div>

									<span class="one_half first"  style="margin-bottom: 0;">

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Name:', 'agrg' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='' name='' value='' class='criteria_name' placeholder="" style="width: 100%;">
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Category:', 'agrg' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<input type='text' id='' name='' value='' class='criteria_name_two' placeholder="" style="width: 100%;">
												<span class="info-text" style="margin-left: 0;"><?php _e( 'You can leave it empty', 'agrg' ); ?></span>
											</span>

										</div>

										<div class="full" style="margin-bottom: 0;">

											<span class="one_fourth first" style="margin-bottom: 0;">
												<h3 class="skill-item-title"><?php _e( 'Note:', 'agrg' ); ?></h3>
											</span>

											<span class="three_fourth" style="margin-bottom: 0;">
												<textarea class="criteria_notes" name="" id='' cols="70" rows="4" ></textarea>
											</span>

										</div>

									</span>

									<span class="one_half" style="margin-bottom: 0;">

										<span class="full" style="margin-bottom: 0;">
											<h3><i class="fa fa-picture-o"></i><?php _e( 'Picture:', 'agrg' ); ?></h3>
										</span>

										<div style="width: 100%; float: left;">
											<img class="criteria-image" id="your_cover_url_img" src="" style="float: left; width: auto; margin-bottom: 20px; margin-top: 10px; max-height: 100px;" /> 
										</div>
										
							            <input class="criteria-image-url" id="your_icover_url" type="text" size="36" name="" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="" />
							            <i class="fa fa-trash-o"></i><input class="criteria-image-button-remove button" id="your_image_url_button_remove<?php echo $i; ?>2" type="button" value="Delete Image" /> </br>
							            <i class="fa fa-cloud-upload"></i><input class="criteria-image-button button" id="your_image_url_button<?php echo $i; ?>2" type="button" value="Upload Image" />

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

								</div>

								<button name="button_del_portfolio" type="button" class="button-secondary button_del_portfolio"><i class="fa fa-trash-o"></i><?php _e( 'Delete', 'agrg' ); ?></button>
							</div>

						</div>

						<div class="option_item">
							<button type="button" name="submit_add_portfolio" id='submit_add_portfolio' value="add" class="button-secondary"><i class="fa fa-plus-circle"></i><?php _e( 'Add new project', 'agrg' ); ?></button>
						</div>

						<div class="divider"></div>

					</div>

					<h1 class="resume-section-title"><i class="fa fa-envelope"></i><?php _e( 'Contact Details', 'agrg' ); ?></h1>
					<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'We’re almost done! Fill in the contact deatils accuratelly.', 'agrg' ); ?></h3>

					<div class="divider"></div>

					<div class="full" style="margin-bottom: 0;">

						<div class="one_half first">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Address:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" name="wpjobus_resume_address" id="wpjobus_resume_address" style="width: 100%; float: left;" value="<?php echo $wpjobus_resume_address; ?>" class="input-textarea" placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Phone number:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_phone" class='input-textarea' name='wpjobus_resume_phone' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_phone; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Website:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_website" class='input-textarea' name='wpjobus_resume_website' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_website; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Email:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_email" class='input-textarea' name='wpjobus_resume_email' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_email; ?>' placeholder="" />
									<span class="full" style="margin-bottom: 0;">
										<input type="checkbox" class='' name='wpjobus_resume_publish_email' style="width: 10px; margin-right: 5px; float: left; margin-top: 7px;" value='publish_email' placeholder="" <?php if (!empty($wpjobus_resume_publish_email)) { ?>checked<?php } ?>/><?php _e( 'Publish my email address', 'agrg' ); ?>
									</span>
								</span>

							</span>

						</div>

						<div class="one_half">

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Facebook:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_facebook" class='input-textarea' name='wpjobus_resume_facebook' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_facebook; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'LinkedIn:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_linkedin" class='input-textarea' name='wpjobus_resume_linkedin' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_linkedin; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Twitter:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_twitter" class='input-textarea' name='wpjobus_resume_twitter' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_twitter; ?>' placeholder="" />
								</span>

							</span>

							<span class="full" >

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Google+:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type='text' id="wpjobus_resume_googleplus" class='input-textarea' name='wpjobus_resume_googleplus' style="width: 100%; float: left;" value='<?php echo $wpjobus_resume_googleplus; ?>' placeholder="" />
								</span>

							</span>

						</div>

						<div class="full" >

							<span class="one_fifth first" style="margin-bottom: 0;">
								<h3><?php _e( 'Google Maps Address:', 'agrg' ); ?></h3>
							</span>

							<span class="four_fifth" style="margin-bottom: 0;">
								<input type='text' id="address" class='input-textarea' name='wpjobus_resume_googleaddress' style="width: 100%; float: left; margin-bottom: 0;" value='<?php echo $wpjobus_resume_googleaddress; ?>' placeholder="" />
								<p class="help-block"><?php _e('Start typing an address and select from the dropdown.', 'agrg') ?></p>
							</span>

						</div>

						

						<div class="full" >

							<div class="one_half first" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Latitude:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" id="latitude" name="wpjobus_resume_latitude" value="<?php echo $wpjobus_resume_latitude; ?>" class="input-textarea">
								</span>

							</div>

							<div class="one_half" style="margin-bottom: 0;">

								<span class="two_fifth first" style="margin-bottom: 0;">
									<h3><?php _e( 'Longitude:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fifth" style="margin-bottom: 0;">
									<input type="text" id="longitude" name="wpjobus_resume_longitude" value="<?php echo $wpjobus_resume_longitude; ?>" class="input-textarea">
								</span>

							</div>

						</div>

					</div>

					<div class="divider"></div>

					<div class="full save-resume-block">

						<div class="full" style="margin-bottom: 0;">

							<div id="success">
								<span>
									<h3><?php _e( 'Profile Updated Successful.', 'agrg' ); ?></h3>
								</span>
								<div class="divider"></div>
							</div>
										 
							<div id="error">
								<span>
									<h3><?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?></h3>
								</span>
								<div class="divider"></div>
							</div>

						</div>

						<input type="hidden" name="action" value="wpjobusEditResumeForm" />
						<?php wp_nonce_field( 'wpjobusEditResume_html', 'wpjobusEditResume_nonce' ); ?>

						<span class="draft-resume-button">

							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Save As Draft', 'agrg' ); ?>" class="input-submit">

							<script>
								jQuery(document).on('click','.draft-resume-button .input-submit', function() {

									$thisItem = jQuery(this);
									$thisItem.parent().parent().parent().find('#postStatus').val('draft');
									
								});
							</script>

						</span>

						<span class="submit-resume-button">

							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php global $redux_demo, $recipe_state; $recipe_state = $redux_demo['resume-state']; if($recipe_state == "1" or current_user_can('administrator')) { _e( 'Update Resume', 'agrg' ); } else { _e( 'Update Resume For Review', 'agrg' ) ;} ?>" class="input-submit">	 
							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>

							<script>
								jQuery(document).on('click','.submit-resume-button .input-submit', function() {

									$thisItem = jQuery(this);
									$thisItem.parent().parent().parent().find('#postStatus').val('published');
									
								});
							</script>

						</span>

					</div>

					<input type="hidden" id="postStatus" name="postStatus" value="">

				</form>

				<script type="text/javascript">

				jQuery(function($) {
					jQuery('#wpjobus-add-resume').validate({
						rules: {
						    fullName: {
						        required: true,
						        minlength: 3
						    },
						    wpjobus_resume_email: {
						        required: true,
						        email: true
						    }
						},
						messages: {
							fullName: {
							    required: "<?php _e( 'Please provide your full name', 'agrg' ); ?>",
							    minlength: "<?php _e( 'Your name must be at least 3 characters long', 'agrg' ); ?>"
							},
							wpjobus_resume_email: {
							    required: "<?php _e( 'Please provide an email address', 'agrg' ); ?>",
							    email: "<?php _e( 'Please enter a valid email address', 'agrg' ); ?>"
							}
						},
						submitHandler: function(form) {
							tinyMCE.triggerSave();
						    jQuery('#wpjobus-add-resume .input-submit').css('display','none');
						    jQuery('#wpjobus-add-resume .submit-loading').css('display','block');
						    jQuery(form).ajaxSubmit({
						        type: "POST",
								data: jQuery(form).serialize(),
								url: '<?php echo admin_url('admin-ajax.php'); ?>', 
						        success: function(data) {
						            if(data != 0) {
						        		jQuery('#wpjobus-add-resume .submit-loading').css('display','none');
						        		jQuery('#success').fadeIn();
                                              // alert("ganesh");
						        		<?php  $redirect_link = home_url()."/my-account"; ?>

      									var delay = 555;
      									setTimeout(function(){ window.location = '<?php echo $redirect_link; ?>';}, delay);

						            } else {
						            	jQuery('#wpjobus-add-resume .input-submit').css('display','block');
							        	jQuery('#wpjobus-add-resume .submit-loading').css('display','none');

							            jQuery('#error').fadeIn();
						            }
						        },
						        error: function(data) {
						        	jQuery('#wpjobus-add-resume .input-submit').css('display','block');
						        	jQuery('#wpjobus-add-resume .submit-loading').css('display','none');

						            jQuery('#error').fadeIn();
						        }
						    });
						}
					});
				});
				</script>

			</div>
			
		</div>

	</section>

<?php get_footer(); ?>