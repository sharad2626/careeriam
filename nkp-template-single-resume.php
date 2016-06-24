<?php
/**
 * Resume Page
 */



global $redux_demo; 


$access_state = $redux_demo['access-state'];
if ( !is_user_logged_in() && $access_state == 1) {

	$login = home_url()."/login?info=accesspage";
	wp_redirect( $login ); exit;

}


$this_post_id = $post->ID;

if(empty($this_post_id)) {

	$page = get_page($post->ID);
	$this_post_id = $page->ID;

} 
//echo do_shortcode('[associates_by_id post_id='.$this_post_id.']');

if (isset($_GET['keyword'])) {

		    $keyword = $_GET['keyword'];

		} else {

		    $keyword = "";

		}



		if (isset($_GET['resume_location'])) {

		    $job_location = $_GET['resume_location'];

		} else {

		    $job_location = "";

		}



		if($job_location == "all") {

			$job_location = "";

		}



		if (isset($_GET['resume_type'])) {

		    $job_type = $_GET['resume_type'];

		} else {

		    $job_type = "";

		}



		if($job_type == "all") {

			$job_type = "";

		}



		if(!empty($job_type)) {



			$string = "AND m.meta_key = 'wpjobus_resume_job_type' AND m.meta_value LIKE '%" . $job_type . "%'";



		} else {



			$string = "";



		}



		if(!empty($job_location)) {



			$stringLocation = "AND m2.meta_key = 'resume_location' AND m2.meta_value = '" . $job_location . "'";



		} else {



			$stringLocation = "";



		}



		if(!empty($keyword)) {



			$stringKeyword = "AND (m4.meta_key = 'resume-about-me' AND m4.meta_value LIKE '%" . $keyword . "%')";



		} else {



			$stringKeyword = "";



		}
		
			global $companies_per_page, $total_companies, $total_pages, $current_page;
		$wpjobus_companies = $wpdb->get_results( "SELECT DISTINCT p.ID, p.post_author

																	FROM  `{$wpdb->prefix}posts` p

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id

																	WHERE p.post_type =  'resume'

																	AND p.post_status =  'publish'

																	".$string."

																	".$stringLocation."

																	".$stringKeyword."

																	ORDER BY  `p`.`ID` DESC");
																	$args = array(
    'ID'        =>  $this_post_id, // I could also use $user_ID, right?        
    );

// get his posts 'ASC'


 $user_by_post=get_userdata($post->post_author); $user_by_post->user_login;

															$current_user_id = get_current_user_id();
$friends_d=array();

$friends=checkfriends($post->post_author );

foreach($friends as $m)

{

	$friends_d[]=$m->friend_user_id;
	}




 $wpjobus_resume_cover_image = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_cover_image',true));

$wpjobus_resume_fullname = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_fullname',true));
$resume_industry = esc_attr(get_post_meta($this_post_id, 'resume_industry',true));
$resume_about_me = html_entity_decode(get_post_meta($this_post_id, 'resume-about-me',true));
$resume_careerpitch = esc_attr(get_post_meta($this_post_id, 'resume_careerpitch',true));
$resume_careerpitch_radio = esc_attr(get_post_meta($this_post_id, 'resume_careerpitch_radio',true));
$resume_years_of_exp = esc_attr(get_post_meta($this_post_id, 'resume_years_of_exp',true));
$wpjobus_resume_profile_picture = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_profile_picture',true));

$wpjobus_resume_prof_title = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_prof_title',true));
$resume_career_level = esc_attr(get_post_meta($this_post_id, 'resume_career_level',true));

$wpjobus_resume_comm_level = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_comm_level',true));
$wpjobus_resume_comm_note = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_comm_note',true));

$wpjobus_resume_org_level = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_org_level',true));
$wpjobus_resume_org_note = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_org_note',true));

$wpjobus_resume_job_rel_level = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_rel_level',true));
$wpjobus_resume_job_rel_note = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_rel_note',true));

$wpjobus_resume_skills = get_post_meta($this_post_id, 'wpjobus_resume_skills',true);
$wpjobus_resume_native_language = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_native_language',true));
$wpjobus_resume_languages = get_post_meta($this_post_id, 'wpjobus_resume_languages',true);

$wpjobus_resume_hobbies = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_hobbies',true));

$wpjobus_resume_education = get_post_meta($this_post_id, 'wpjobus_resume_education',true);
$wpjobus_resume_award = get_post_meta($this_post_id, 'wpjobus_resume_award',true);
$wpjobus_resume_work = get_post_meta($this_post_id, 'wpjobus_resume_work',true);
$wpjobus_resume_testimonials = get_post_meta($this_post_id, 'wpjobus_resume_testimonials',true);

$wpjobus_resume_file = get_post_meta($this_post_id, 'wpjobus_resume_file',true);

$wpjobus_resume_remuneration = get_post_meta($this_post_id, 'wpjobus_resume_remuneration',true);
$wpjobus_resume_remuneration_per = get_post_meta($this_post_id, 'wpjobus_resume_remuneration_per',true);

$wpjobus_resume_job_type = get_post_meta($this_post_id, 'wpjobus_resume_job_type',true);

$wpjobus_resume_job_freelance = get_post_meta($this_post_id, 'wpjobus_resume_job_freelance',true);
$wpjobus_resume_job_part_time = get_post_meta($this_post_id, 'wpjobus_resume_job_part_time',true);
$wpjobus_resume_job_full_time = get_post_meta($this_post_id, 'wpjobus_resume_job_full_time',true);
$wpjobus_resume_job_internship = get_post_meta($this_post_id, 'wpjobus_resume_job_internship',true);
$wpjobus_resume_job_volunteer = get_post_meta($this_post_id, 'wpjobus_resume_job_volunteer',true);

$wpjobus_resume_portfolio = get_post_meta($this_post_id, 'wpjobus_resume_portfolio',true);


$wpjobus_resume_address = get_post_meta($this_post_id, 'wpjobus_resume_address',true);
$wpjobus_resume_phone = get_post_meta($this_post_id, 'wpjobus_resume_phone',true);
$wpjobus_resume_website = get_post_meta($this_post_id, 'wpjobus_resume_website',true);
$wpjobus_resume_email = get_post_meta($this_post_id, 'wpjobus_resume_email',true);
$wpjobus_resume_publish_email = get_post_meta($this_post_id, 'wpjobus_resume_publish_email',true);
$wpjobus_resume_facebook = get_post_meta($this_post_id, 'wpjobus_resume_facebook',true);
$wpjobus_resume_linkedin = get_post_meta($this_post_id, 'wpjobus_resume_linkedin',true);
$wpjobus_resume_twitter = get_post_meta($this_post_id, 'wpjobus_resume_twitter',true);
$wpjobus_resume_googleplus = get_post_meta($this_post_id, 'wpjobus_resume_googleplus',true);

$wpjobus_resume_googleaddress = get_post_meta($this_post_id, 'wpjobus_resume_googleaddress',true);
$wpjobus_resume_longitude = get_post_meta($this_post_id, 'wpjobus_resume_longitude',true);
$wpjobus_resume_latitude = get_post_meta($this_post_id, 'wpjobus_resume_latitude',true);
///////
$resume_industry = get_post_meta($this_post_id, 'resume_industry',true);
$resume_location= get_post_meta($this_post_id, 'resume_location',true);
///
get_header(); 

global $redux_demo;
$contact_email = get_post_meta($this_post_id, 'wpjobus_resume_email',true);
$wpcrown_contact_email_error = $redux_demo['contact-email-error'];
$wpcrown_contact_name_error = $redux_demo['contact-name-error'];
$wpcrown_contact_message_error = $redux_demo['contact-message-error'];
$wpcrown_contact_thankyou = $redux_demo['contact-thankyou-message'];
$wpcrown_contact_test_error = $redux_demo['contact-test-error'];

?>

<div class="main_resume_wrapper">

<section id="resume-menu">
  <div class="container">
    <div class="left-avatar ">
      <?php 
		require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
							$params = array( 'width' => 100, 'height' => 100, 'crop' => true );
							if(bfi_thumb( "$wpjobus_resume_profile_picture", $params )!=""){
							echo "<img src='" . bfi_thumb( "$wpjobus_resume_profile_picture", $params ) . "' alt='" . $wpjobus_resume_fullname . "'/>";
							}else{
								
								echo "<img src='" . get_stylesheet_directory_uri() . "/img/user-default.png' alt='" . $wpjobus_resume_fullname . "'/>";
							}
		?>
      <h5>
		<span class="light"><b>
        <?php _e( '', 'agrg' ); ?>
        <?php echo esc_attr( $wpjobus_resume_fullname ); ?></b> </span>
	  </h5>
      <h5><?php echo esc_attr( $resume_career_level ); ?> <?php echo esc_attr( $wpjobus_resume_prof_title ); ?></h5>
      <!------------------------------------ Dbuglab  ------------------------------------> 
      <span class="light">
      <?php _e( '', 'agrg' ); ?>
      </span> <?php echo esc_attr($resume_industry); ?></br>
      <span class="light">
      <?php _e( '', 'agrg' ); ?>
      </span> <?php echo esc_attr($resume_location); ?></br>
      <!-------------------------------------- End Here ------------------------------------>
      <ul class="nav navbar-nav">

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/jquery-1.10.1.min.js"></script> 
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />
        <li><a class="fancybox" href="#inline1"><span>
          <?php _e( 'Send Message', 'agrg' ); ?>
          </span><i class="fa fa-envelope"></i></a>
		</li>
      </ul>
      <div id="inline1" style="display: none;">
        <div class="two_third first">
          <h1 class="resume-section-title" style="margin-bottom: 10px;">
            <?php _e( 'Send Message', 'agrg' ); ?>
          </h1>
          <div id="resume-contact" >
            <form id="contact" type="post" action="" >
              <h4>Subject</h4>
              <input type="text" name="subject" value="">
              <h4>Message</h4>
              <span class="contact-message">
              <textarea name="message" id="message" cols="8" rows="8" ></textarea>
              </span>
              <input type="hidden" name="reciver_id" value="<?php echo $this_post_id;?>">
              <input type="text" name="receiverEmail" id="receiverEmail" value="<?php echo $wpjobus_resume_email; ?>" class="input-textarea" style="display: none;"/>
              
              <!-- <input type="hidden" name="action" value="wpjobContactForm" />-->
              <?php //wp_nonce_field( 'scf_html', 'scf_nonce' ); ?>
              <input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Send Message', 'agrg' ); ?>" class="input-submit" id="sendmessage">
              <span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
            </form>
            <div id="success"> <span>
              <h3>Your message has been sent successfully</h3>
              </span> 
			</div>
            <div id="error"> <span>
              <h3>
                <?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?>
              </h3>
              </span> 
			</div>
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
						            answer: {
						                required: true,
						                answercheck: true
						            }
						        },
						        messages: {
						            name: {
						                required: "<?php echo esc_attr( $wpcrown_contact_name_error ); ?>"
						            },
						            email: {
						                required: "<?php echo esc_attr( $wpcrown_contact_email_error ); ?>"
						            },
						            message: {
						                required: "<?php echo esc_attr( $wpcrown_contact_message_error ); ?>"
						            },
						            answer: {
						                required: "<?php echo esc_attr( $wpcrown_contact_test_error ); ?>"
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
        </div>
      </div>
      <?php 

							
$is_friend = bp_is_friend( $result_author );


switch ( $is_friend ) {
    case 'pending' :
        $link = wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/requests/cancel/' . $result_author . '/', 'friends_withdraw_friendship' );
		$txt = 'Association Pending';
    break;

    case 'awaiting_response' :
        $link = bp_loggedin_user_domain() . bp_get_friends_slug() . '/requests/';
		$txt = 'Awaiting Association';
    break;
 
    case 'is_friend' :
        $link = wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/remove-friend/' . $result_author . '/', 'friends_remove_friend' );
		$txt = 'Cancle Association';
    break;
	
	case '':
		$link = '';
		$txt = '';
	break;

    default:
        $link = wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/add-friend/' . $result_author . '/', 'friends_add_friend' );
		$txt = 'ASSOCIATE REQUEST';
    break;
}
global $current_user;
global $wpdb;
						get_currentuserinfo();
						 $result_authors =  $current_user->ID ;
						// echo  $author= get_the_author($this_post_id);  
						// echo "<br>";
						// echo $current_user->ID;
						
						$post_data = $wpdb->get_row( "SELECT * FROM wp_posts WHERE ID =$this_post_id ") ;

$author= $post_data->post_author ; 
						
						
if($current_user->ID!=$author){
						?>
      <div id="members-dir-list" class="members dir-list">
        <h5>
			<span>
          <?php
					
						

$mylink = $wpdb->get_row( 'SELECT * FROM wp_posts WHERE post_author = '.$result_authors.'' );
							$ID=$mylink->ID;
							if($result_author){
								   echo bp_add_friend_button($result_author);
							}
								else{
									echo bp_add_friend_button($ID);
								}
					?>
          </span>
		</h5>
      </div>
      <?php 
}
	  if(!empty($wpjobus_resume_file)) { ?>
      
      <!--<span class="resume-download-file">
						<a href="<?php echo esc_url( $wpjobus_resume_file ); ?>" rel="external"><i class="fa fa-cloud-download"></i><?php _e( 'Download Resume', 'agrg' ); ?></a>
					</span>-->
      
      <?php } ?>
    </div>
    <select id="mobile-nav-bar" onChange="location = this.options[this.selectedIndex].value;">
      <?php/* <option value="#backtop"><?php //_e( 'Home', 'agrg' ); ?></option>
				<option value="#resume-about-block"><?php _e( 'About', 'agrg' ); ?></option>
				<option value="#resume-skills-block"><?php _e( 'Career Pitch', 'agrg' ); ?></option>
        <option value="#resume-education-block"><?php _e( 'Education', 'agrg' ); ?></option>
				<option value="#resume-experience-block"><?php _e( 'Experience', 'agrg' ); ?></option>
				<option value="#resume-portfolio-block"><?php _e( 'Portfolio', 'agrg' ); ?></option> 
				<option value="#resume-addassociate-block"><?php _e( 'Add associate', 'agrg' ); ?></option>*/?>
      <option value="#resume-contact-block">
      <?php _e( 'Contact', 'agrg' ); ?>
      </option>
    </select>
  </div>
</section>

<section id="resume-cover-image">
  <?php 
			if (current_user_can('administrator')) {
		?>
  <div class="admin-settings-header">
    <div class="admin-settings-header-top">
      <div class="container">
        <div class="one_fifth first"> <span>
          <?php _e( 'Status:', 'agrg' ); ?>
          <?php echo get_post_status($result_company[$this_post_id]); ?></span> 
		</div>
        <div class="one_fifth"> <span>
          <?php _e( 'Type:', 'agrg' ); ?>
          <?php $wpjobus_post_reg_status = esc_attr(get_post_meta($this_post_id, 'wpjobus_featured_post_status',true)); echo $wpjobus_post_reg_status; ?>
          </span> 
		</div>
        <div class="one_fifth"> <span>
          <?php _e( 'Submitted on:', 'agrg' ); ?>
          <?php echo get_the_time('d/m/Y', $this_post_id); ?></span> 
		</div>
        <div class="one_fifth">
          <?php if($wpjobus_post_reg_status == "featured") { ?>
          <span>
          <?php _e( 'Expires on:', 'agrg' ); ?>
          <?php $wpjobus_post_exp = esc_attr(get_post_meta($this_post_id, 'wpjobus_featured_expiration_date',true)); if(!empty($wpjobus_post_exp)) { echo $time = date("m/d/Y", $wpjobus_post_exp); } ?>
          </span>
          <?php } ?>
        </div>
        <div class="one_fifth">
          <?php

							$author_id = $wpdb->get_results( "SELECT DISTINCT post_author FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and ID = '".$this_post_id."' ORDER BY `ID` DESC");

							foreach ($author_id as $key => $value) {
							    
							    $result_author = $value->post_author;

							}
							

						?>
          <span style="float: right;">
          <?php _e( 'Username:', 'agrg' ); ?>
          <?php $user_info = get_userdata($result_author); echo $user_info->user_login; ?>
          </span> 
		</div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="bannerText">
    <div class="resume-author-avatar">
      <?php 

							
$is_friend = bp_is_friend( $result_author );


switch ( $is_friend ) {
    case 'pending' :
        $link = wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/requests/cancel/' . $result_author . '/', 'friends_withdraw_friendship' );
		$txt = 'Association Pending';
    break;

    case 'awaiting_response' :
        $link = bp_loggedin_user_domain() . bp_get_friends_slug() . '/requests/';
		$txt = 'Awaiting Association';
    break;

    case 'is_friend' :
        $link = wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/remove-friend/' . $result_author . '/', 'friends_remove_friend' );
		$txt = 'Cancle Association';
    break;
	
	case '':
		$link = '';
		$txt = '';
	break;

    default:
        $link = wp_nonce_url( bp_loggedin_user_domain() . bp_get_friends_slug() . '/add-friend/' . $result_author . '/', 'friends_add_friend' );
		$txt = 'ASSOCIATE REQUEST';
    break;
}


						?>
      <h4><span>
        <?php //echo bp_add_friend_button($result_author); ?>
        <a href="<?php echo $link;?>"><?php echo $txt;?></a> </span></h4>
      <?php if(!empty($wpjobus_resume_file)) { ?>
      
      <!--<span class="resume-download-file">
						<a href="<?php echo esc_url( $wpjobus_resume_file ); ?>" rel="external"><i class="fa fa-cloud-download"></i><?php _e( 'Download Resume', 'agrg' ); ?></a>
					</span>-->
      
      <?php } ?>
    </div>
    <?php 

				global $redux_demo, $website_type; 
				$website_type = $redux_demo['homepage-state'];

				if(($website_type == 1) or empty($website_type)) {

			?>
    <div class="menu-nav-trigger"> 
		<span class="zebra-line top"></span> <span class="zebra-line middle"></span> <span class="zebra-line bottom"></span> 
	</div>
    <?php } ?>
    <h1>
		<span class="light">
      <?php _e( '', 'agrg' ); ?>
      </span> <?php echo esc_attr( $wpjobus_resume_fullname ); ?>
	</h1>
    <h2><?php echo esc_attr( $resume_career_level ); ?> <?php echo esc_attr( $wpjobus_resume_prof_title ); ?></h2>
  </div>
<div class="coverImageHolder">
<img src="<?php echo esc_url( $wpjobus_resume_cover_image ); ?>" alt="" class="bgImg" style="height: 400px;">
		</div>
</section>

<section id="resume-about-block">
  <div class="container">
    <div class="two_third first">
      <h1 class="resume-section-title"><i class="fa fa-info-circle"></i>
        <?php _e( 'About', 'agrg' ); ?>
      </h1>
      <div class="full"> <?php echo $resume_about_me; ?> </div>
    </div>
    <div class="one_third">
      <div class="resume-associates">
        <div class="widget">
          <?php 
		 $queryurl = get_site_url().'/associates';
		 $new_query = add_query_arg( array(
    'rsacc' => $post->post_author
), $queryurl );
		 ?>
          <h4 class="block-title"><a href="<?php echo $new_query; ?>"><?php echo esc_attr( $wpjobus_resume_fullname ); ?>'s Associates</a></h4>
          <?php
	 $margs = array('user_id' => $post->post_author);
	 if ( bp_has_members( $margs ) ) :
	 $i=0;
	 	 	while ( bp_members() ) : bp_the_member();
			
			$wpjobus_status = $wpdb->get_results( "SELECT  p.ID, p.post_author FROM  `{$wpdb->prefix}posts` p LEFT JOIN  `{$wpdb->prefix}users` u ON p.post_author = u.id WHERE p.post_type =  'resume'	AND p.post_author = ".bp_get_member_user_id()." AND p.post_status =  'publish'");
			$usr_id = $wpjobus_status[0]->ID;
			
			$wpjobus_resume_fullname = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_fullname',true));
			
			$resume_location = esc_attr(get_post_meta($usr_id, 'resume_location',true));
			
			$wpjobus_resume_prof_title = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_prof_title',true));
		?>
          <a href="<?php site_url();?>/resume/<?php echo $usr_id;?>" title="<?php bp_member_name(); ?>">
          <div class="company-holder-block sidebar">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td class="left-avatar"><?php //bp_member_avatar() 
				if(bfi_thumb( "$wpjobus_resume_profile_picture", $params )!=""){
							echo "<img src='" . bfi_thumb( "$wpjobus_resume_profile_picture", $params ) . "' alt='" . $wpjobus_resume_fullname . "'/>";
							}else{
								
								echo "<img src='" . get_stylesheet_directory_uri() . "/img/user-default.png' alt='" . $wpjobus_resume_fullname . "'/>";
							}
				
				?></td>
                <td><div class="company-list-name-block">
                    <div class="company-list-name">
                      <p><?php echo $wpjobus_resume_fullname;?></p>
                      <span class="resume-prof-title"><?php echo $wpjobus_resume_prof_title; ?></span></div>
                    <span class="company-list-location"><span> <i class="fa fa-map-marker"></i>
                    <?php
									
										echo $resume_location;
									
								?>
                    </span> </span> </div></td>
              </tr>
            </table>
          </div>
          </a>
          <?php
						$i++;
						if($i>3){
							echo '<a href="'.site_url().'/online-members/">More Associates</a>';
							break;
						}
		endwhile;
	else:	
?>
          <div class="full">
            <h4>
              <?php _e( 'Well, it looks like there are no results matching your criterias.aa', 'agrg' ); ?>
            </h4>
          </div>
          <?php endif;
	  ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="resume-experience-block">
  <div class="container">
    <div class="resume-skills">
      <h1 class="resume-section-title"><i class="fa fa-building"></i>
        <?php _e( 'Experience', 'agrg' ); ?>
      </h1>
      <h3 class="resume-section-subtitle">
        <?php _e( 'Here&rsquo;s a list of companies where I worked and gained my professional experience.', 'agrg' ); ?>
      </h3>
      <div class="divider" style="margin-top: 20px;"></div>
      <div class="work-experience-holder">
        <?php 

						if(!empty($wpjobus_resume_work)) {
if(!empty($wpjobus_resume_work[$i][0] )) {
							for ($i = 0; $i < (count($wpjobus_resume_work)); $i++) {
					?>
        <span class="work-experience-block"> <span class="work-experience-first-block"> <span class="work-experience-first-block-content"> <span class="work-experience-org-name"><?php echo esc_attr( $wpjobus_resume_work[$i][0] ); ?></span> <span class="work-experience-job-title"><?php echo esc_attr( $wpjobus_resume_work[$i][1] ); ?></span> </span> </span> <span class="work-experience-second-block"> <span class="work-experience-second-block-content"> <span class="work-experience-time-line"></span> <span class="work-experience-period"><?php echo esc_attr( $wpjobus_resume_work[$i][2] ); ?> - <?php echo esc_attr( $wpjobus_resume_work[$i][3] ); ?></span> <span class="work-experience-job-type"><?php echo esc_attr( $wpjobus_resume_work[$i][4] ); ?></span> </span> </span> <span class="work-experience-third-block"> <span class="work-experience-third-block-content"> <span class="work-experience-notes"><?php echo esc_attr( $wpjobus_resume_work[$i][5] ); ?></span> </span> </span> </span>
        <?php } }} ?>
      </div>
    </div>
  </div>
</section>
<section id="resume-skills-block">
  <div class="container">
    <div class="two_third first">
      <div class="full">
        <h1 class="resume-section-title">
          <?php global $redux_demo; $logo = $redux_demo['logo']['url']; if (!empty($logo)) { ?>
          <img src="<?php echo $logo; ?>" alt="Logo" />
          <?php } else { ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""/>
          <?php } ?>
        </h1>
        <?php 
				
				$tcode ="";
				$getvid = "";
				$finalvid = "";
				$noelement ="";
				
				$pos = strpos($resume_careerpitch, 'vimeo');
				if ($pos !== false) {
					$tcode ="vimeo";
					$getvid = explode("vimeo.com/", $resume_careerpitch);
				 	$finalvid = str_replace ('/','',$getvid[1]);
				 	 
				}else{
					$posy = strpos($resume_careerpitch, 'youtube');
					if ($posy !== false) {
					$tcode ="youtube";
					$getvid = explode("watch?v=", $resume_careerpitch);
				 	$finalvid = str_replace ('/','',$getvid[1]);
				 	 
				}else{
					 $tcode ="iframe";
					 $finalvid = $resume_careerpitch;
				}
				}
				
				if($resume_careerpitch_radio=='1'){
				if($noelement =="")
				{
				$textcode= '['.$tcode.' id="'.$finalvid.'"]';
				echo do_shortcode($textcode);
				}				
				}else{
				
				//echo '<div id="pfdf"><img alt="Logo" src="http://careeriam.com/wp-content/uploads/video-logo/video-logo.png" ></div>';	
					
				}
				
			 ?>
      </div>
    </div>
    <div class="one_third">
      <div class="resume-skills awards-trophy">
        <h1 class="resume-section-title"><i class="fa fa-suitcase"></i>
          <?php _e( 'Company Profiles', 'agrg' ); ?>
        </h1>
        <div class="divider"></div>
        <div class="pitchcompany">
          <?php 
							// $ruser_id = $result_author;
							$ruser_id = get_current_user_id();
							$company_id = $wpdb->get_results( "SELECT post_id FROM `{$wpdb->prefix}postmeta` WHERE meta_key = 'company-followers' and meta_value = '".$ruser_id."' ORDER BY `meta_id` ASC");
							
							//print_r($company_id);
							if(sizeof($company_id)>=1)
							{
								?>
          <?php 
							
								foreach ($company_id as $key => $value) {
									
							    $result_company[] = $value->post_id;						   

							    $wpjobus_company_fullname = esc_attr(get_post_meta($result_company[$key], 'wpjobus_company_fullname',true));

							    $company_id = $result_company[$key];

							   ?>
          <i class="fa fa-angle-right"></i><span><a href="<?php $companylink = home_url()."/company/".$result_company[$key];  echo $companylink; ?>"><?php echo $wpjobus_company_fullname; ?></a></span><br>
          <?php 
									}
								 } ?>
        </div>
      </div>
    </div>
  </div>
</section>
 <section id="resume-education-block">
<div class="container">
<?php if(!empty($wpjobus_resume_award)) { ?>
<div class="two_third first">
  <?php } else { ?>
  <div class="full">
    <?php } ?>
    <h1 class="resume-section-title"><i class="fa fa-university"></i>
      <?php _e( 'Education', 'agrg' ); ?>
    </h1>
    <h3 class="resume-section-subtitle">
      <?php _e( 'Here&rsquo;s an overview of education institutions I attended.', 'agrg' ); ?>
    </h3>
    <?php 

					if(!empty($wpjobus_resume_education)) {
  if(!empty($wpjobus_resume_award[$i][2])){
						for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {
				?>
    <span class="education-institution-block"> <span class="education-period-circle"> <i class="fa fa-book"></i> <span class="education-period-time"><?php echo esc_attr( $wpjobus_resume_education[$i][3] ); ?></span> <span class="education-period-time">-</span> <span class="education-period-time"><?php echo esc_attr( $wpjobus_resume_education[$i][2] ); ?></span> </span> <span class="education-institution-name"><?php echo esc_attr( $wpjobus_resume_education[$i][0] ); ?></span> <span class="education-institution-faculty-name"><?php echo esc_attr( $wpjobus_resume_education[$i][1] ); ?></span> <span class="education-institution-location"><i class="fa fa-map-marker"></i><?php echo esc_attr( $wpjobus_resume_education[$i][4] ); ?></span> <span class="education-institution-notes"><?php echo esc_attr( $wpjobus_resume_education[$i][5] ); ?></span> </span>
    <?php } }
					}	?>
  </div>
  <?php if(!empty($wpjobus_resume_award)) { ?>
  <div class="one_third">
    <div class="resume-skills awards-trophy">
      <h1 class="resume-section-title"><i class="fa fa-trophy"></i>
        <?php _e( 'Awards & Honors', 'agrg' ); ?>
      </h1>
      <div class="divider"></div>
      <?php 
	
		 if(!empty($wpjobus_resume_award[$i][2])){
						for ($i = 0; $i < (count($wpjobus_resume_award)); $i++) {
					?>
      <span class="education-institution-block"> <span class="education-period-circle"> <span class="education-period-trophy"><i class="fa fa-trophy"></i></span> <span class="education-period-time"><?php echo esc_attr( $wpjobus_resume_award[$i][2] ); ?></span> </span> <span class="education-institution-name"><?php echo esc_attr( $wpjobus_resume_award[$i][0] ); ?></span> <span class="education-institution-faculty-name"><?php echo esc_attr( $wpjobus_resume_award[$i][1] ); ?></span> <span class="education-institution-location"><i class="fa fa-map-marker"></i><?php echo esc_attr( $wpjobus_resume_award[$i][3] ); ?></span> </span>
      <?php }
  }
	 
	  
	  
  ?>
    </div>
  </div>
  <?php } ?>
</div>
</section> 
<section id="resume-portfolio-block">
  <div class="container">
    <h1 class="resume-section-title"><i class="fa fa-bookmark"></i>
      <?php _e( 'Portfolio', 'agrg' ); ?>
    </h1>
    <h3 class="resume-section-subtitle">
      <?php _e( 'Here are some of my works.', 'agrg' ); ?>
    </h3>
	
	
    <section class="ff-container">
      <?php

					$categories = 0;

					for ($i = 0; $i < (count($wpjobus_resume_portfolio)); $i++) {

						if(!empty($wpjobus_resume_portfolio[$i][1])) {
							$categories++;
						}

					}
				?>
      <?php if($categories > 0) { ?>
      <input id="select-type-all" name="radio-set-1" type="radio" class="ff-selector-type-all" checked="checked" />
      <label for="select-type-all" class="ff-label-type-all">
        <?php _e( 'All', 'agrg' ); ?>
      </label>
      <?php 

			    if(!empty($wpjobus_resume_portfolio)) {

				    for ($i = 0; $i < (count($wpjobus_resume_portfolio)); $i++) {

						if(!empty($wpjobus_resume_portfolio[$i][1])) {
							$all_project_cat[] = $wpjobus_resume_portfolio[$i][1];
						}

					}

				}

				?>
      <?php

					$catProjID = 0;

					$directors = array_unique($all_project_cat);
					foreach ($directors as $director) { $catProjID++; $directorClass_0 = preg_replace('/^\/[^a-zA-Z0-9_ -%][().][\/]/s', '_', $director); $directorClass = preg_replace('/\s*,\s*/', '_', $directorClass_0); ?>
      <style>

				    		.ff-container input.ff-selector-type-<?php echo esc_attr( $directorClass ); ?>:checked ~ label.ff-label-type-<?php echo esc_attr( $directorClass ); ?> {
							    background: #999;
							    color: #fff;
							    padding: 10px 20;
							}

							.ff-container input.ff-selector-type-<?php echo esc_attr( $directorClass ); ?>:checked ~ .ff-items .ff-item-type-<?php echo esc_attr( $directorClass ); ?> {
							    opacity: 1;
							}

							.ff-container input.ff-selector-type-<?php echo esc_attr( $directorClass ); ?>:checked ~ .ff-items li:not(.ff-item-type-<?php echo esc_attr( $directorClass ); ?>) {
							    opacity: 0.1;
							}

							.ff-container input.ff-selector-type-<?php echo esc_attr( $directorClass ); ?>:checked ~ .ff-items li:not(.ff-item-type-<?php echo esc_attr( $directorClass ); ?>) span {
							    display: none;
							}


				    	</style>
      <input id="select-type-<?php echo esc_attr( $directorClass ); ?>" name="radio-set-1" type="radio" class="ff-selector-type-<?php echo esc_attr( $directorClass ); ?>" />
      <label for="select-type-<?php echo esc_attr( $directorClass ); ?>" class="ff-label-type-<?php echo esc_attr( $directorClass ); ?>"><?php echo esc_attr( $director ); ?></label>
      <?php } ?>
      <?php } ?>
      <div class="clr"></div>
      <ul class="ff-items <?php if($categories == 0) { ?>visibile-projects<?php } ?>">
        <?php 
 if(!empty($wpjobus_resume_portfolio[$p][1])){
			    	if(!empty($wpjobus_resume_portfolio)) {

				    	$current = -1;

					    for ($p = 0; $p < (count($wpjobus_resume_portfolio)); $p++) {

					    	$directorClassProj_0 = preg_replace('/[^a-zA-Z0-9_ -%][().][\/]/s', '_', $wpjobus_resume_portfolio[$p][1]); $directorClassProj = preg_replace('/\s*,\s*/', '_', $directorClassProj_0);
					    	$current++;

					?>
        <li class="ff-item-type-<?php echo esc_attr( $directorClassProj ); ?> <?php if($current%3 ==0) { echo 'first'; } ?>"> <a href="<?php echo esc_attr( $wpjobus_resume_portfolio[$p][3] ); ?>" data-lightbox="portfolio" data-title="<?php echo esc_attr( $wpjobus_resume_portfolio[$p][2] ); ?>"> <span><?php echo esc_attr( $wpjobus_resume_portfolio[$p][0] ); ?></span>
          <?php 

								require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
								$params = array( 'width' => 430, 'height' => 247, 'crop' => true );
								$wpjobus_resume_portfolio_img = $wpjobus_resume_portfolio[$p][3];
								echo "<img src='" . bfi_thumb( "$wpjobus_resume_portfolio_img", $params ) . "' alt='" . $wpjobus_resume_portfolio[$p][0] . "'/>";

							?>
          </a> </li>
        <?php } } 
		
}
		
		?>
      </ul>
    </section>
  </div>
</section>
<section id="resume-contact-block">
<div class="container">
<div class="resume-contact" style="display:block;">
<div class="one_third">
  <?php
					
						global $wpdb;
						global $current_user;
						get_currentuserinfo();
						$sender_id =  $current_user->ID ;

			if($current_user->ID==$author){			
	$data=$wpdb->get_results('select * from wp_inboxmessage where reciever_id='.$this_post_id.'');
	
	?>
  <h4>Inbox</h4>
  <?php foreach($data as $value){?>
  <div class="mainin">
    <div class="users_message">
      <?php	echo $value->subject;
		$senderid=$value->sender_id;
		$avatar_url = get_avatar_url($senderid, 22 ); 
		$avatar= get_avatar($senderid, 22 ); 
		?><img class="avatar user-6421-avatar avatar-22 photo" width="22" height="22" alt="Profile photo of Robin" src="<?php echo $avatar_url ; ?>">
		<?php
				/* if($avatar){
			              echo  $avatar;
				  }
				 else{?>
      <img src='http://careeriam.com/wp-content/themes/careeriam/img/user-default.png' style='width:12px;height:12px'>
      <?php

					}
					
					*/
                           echo $avatar->display_name;	?>
    </div>
    <div class='messagecontent' style="display:none;" id="messagecontent<?php echo $value->id;?>">
      <?php	echo $value->message;?>
    </div>
    </div>
      <?php												
            } 
	}
	 ?>
      <h1 class="resume-section-title" style="margin-bottom: 80px;">&nbsp;</h1>
      <?php if(!empty($wpjobus_resume_address)) { ?>
      <span class="resume-contact-info"> <i class="fa fa-map-marker"></i><span><?php echo esc_attr( $wpjobus_resume_address ); ?></span> </span>
      <?php } ?>
      <?php if(!empty($wpjobus_resume_phone)) { ?>
      <span class="resume-contact-info"> <i class="fa fa-mobile"></i><span><?php echo esc_attr( $wpjobus_resume_phone ); ?></span> </span>
      <?php } ?>
      <?php if(!empty($wpjobus_resume_website)) { ?>
      <span class="resume-contact-info">
      <?php 

							$return = $wpjobus_resume_website;
							$url = $wpjobus_resume_website;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>
      <i class="fa fa-link"></i><span><a href="<?php echo esc_url( $return ); ?>"><?php echo esc_attr( $wpjobus_resume_website ); ?></a></span> </span>
      <?php } ?>
      <?php if(!empty($wpjobus_resume_email)) { ?>
      <?php if(!empty($wpjobus_resume_publish_email)) { ?>
       <span class="resume-contact-info" style="display:none;"> <i class="fa fa-envelope-o"></i><span><a href="mailto:<?php echo esc_url( $wpjobus_resume_email ); ?>"><?php echo esc_attr( $wpjobus_resume_email ); ?></a></span> </span> 
      <?php } } ?>
      <?php if(!empty($wpjobus_resume_facebook)) { ?>
      <span class="resume-contact-info">
      <?php 

							$return = $wpjobus_resume_facebook;
							$url = $wpjobus_resume_facebook;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>
      <i class="fa fa-facebook-square"></i><span><a href="<?php echo esc_url( $return ); ?>">
      <?php _e( 'Facebook', 'agrg' ); ?>
      </a></span> </span>
      <?php } ?>
      <?php if(!empty($wpjobus_resume_linkedin)) { ?>
      <span class="resume-contact-info">
      <?php 

							$return = $wpjobus_resume_linkedin;
							$url = $wpjobus_resume_linkedin;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>
      <i class="fa fa-linkedin-square"></i><span><a href="<?php echo esc_url( $return ); ?>">
      <?php _e( 'LinkedIn', 'agrg' ); ?>
      </a></span> </span>
      <?php } ?>
      <?php if(!empty($wpjobus_resume_twitter)) { ?>
      <span class="resume-contact-info">
      <?php 

							$return = $wpjobus_resume_twitter;
							$url = $wpjobus_resume_twitter;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>
      <i class="fa fa-twitter-square"></i><span><a href="<?php echo esc_url( $return ); ?>">
      <?php _e( 'Twitter', 'agrg' ); ?>
      </a></span> </span>
      <?php } ?>
      <?php if(!empty($wpjobus_resume_googleplus)) { ?>
      <span class="resume-contact-info">
      <?php 

							$return = $wpjobus_resume_googleplus;
							$url = $wpjobus_resume_googleplus;
							if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) { $return = 'http://' . $url; }

						?>
      <i class="fa fa-google-plus-square"></i><span><a href="<?php echo esc_url( $return ); ?>">
      <?php _e( 'Google+', 'agrg' ); ?>
      </a></span> </span>
      <?php } ?>
      <span class="resume-contact-info" style="display:none;">
      <?php dynamic_sidebar( 'profile-inbox' ); ?>
      </span> <span class="resume-contact-info">
      <?php 
								$ruser_id = $user_info->ID;
							$company_id = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and (post_status = 'publish') and post_author = '".$ruser_id."' ORDER BY `ID` DESC");
							if(sizeof($company_id)>=1)
							{
								?>
      <h4> <i class="fa fa-suitcase"></i> Company Profiles </h4>
      <?php 
							
							foreach ($company_id as $key => $value) {
							    $result_company[] = $value->ID;
							    $result_company_date[] = $value->post_date;
							    $result_company_status[] = $value->post_status;

							    $wpjobus_company_fullname = esc_attr(get_post_meta($result_company[$key], 'wpjobus_company_fullname',true));

							    $company_id = $result_company[$key];

							   ?>
      <i class="fa fa-angle-right"></i><span><a href="<?php $companylink = home_url()."/company/".$result_company[$key];  echo $companylink; ?>"><?php echo $wpjobus_company_fullname; ?></a></span>
      <?php 
									}
								 } ?>
      </span> 
	</div>
  </div>
</div>
</div>
</div>
</section>

</div>

<style>
	.fancybox-inner{
		
		height:auto !important;
	}
	</style>
<script type="text/javascript">
						jQuery(document).ready(function() {
						  jQuery(".users_message").click(function(){
							  //  var getId = jQuery(this).attr('id');
								 jQuery(this).parent('.mainin').children('.messagecontent').toggle();
                    
                         });	
							
						jQuery("#sendmessage").click(function(){ 
						var order = jQuery("#contact").serialize();
						var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
							jQuery.ajax ({
							type: "POST",
							url: ajaxurl,
							data: order + "&action=send_message",
							cache: false,
							success: function(data)
						 {
								 
						  jQuery('#success').fadeIn();
						 }
						   }); 
								 
						  }); 
							  jQuery(".fancybox").fancybox({"width":400,"height":300});
						}); 


</script>
<?php  

dynamic_sidebar( 'custom-associates' );  get_footer(); ?>
