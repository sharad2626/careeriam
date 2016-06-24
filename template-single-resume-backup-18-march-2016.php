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

if($job_location == "all") { $job_location = ""; }

if (isset($_GET['resume_type'])) {

    $job_type = $_GET['resume_type'];

} else {

    $job_type = "";

}

if($job_type == "all") {    $job_type = "";     }

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
                               
$args = array( 'ID' =>  $this_post_id );
// get his posts 'ASC'

$user_by_post=get_userdata($post->post_author); $user_by_post->user_login;

$current_user_id = get_current_user_id();

$friends_d=array();

$friends=checkfriends($post->post_author );

foreach($friends as $m) {	$friends_d[]=$m->friend_user_id;	}

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
$wpjobus_resume_comm_note = get_post_meta($this_post_id, 'wpjobus_resume_comm_note',true);

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


global $redux_demo;
$contact_email = get_post_meta($this_post_id, 'wpjobus_resume_email',true);
$wpcrown_contact_email_error = $redux_demo['contact-email-error'];
$wpcrown_contact_name_error = $redux_demo['contact-name-error'];
$wpcrown_contact_message_error = $redux_demo['contact-message-error'];
$wpcrown_contact_thankyou = $redux_demo['contact-thankyou-message'];
$wpcrown_contact_test_error = $redux_demo['contact-test-error'];

get_header( 'profile' );
?>

<div class="profile-header sections">
    <div class="container">
        <div class="breadcrumbs-sec">
            <ul>
              <li><a href="<?php echo home_url(); ?>">Home</a></li>
              <li><a href="<?php echo home_url('/resumes'); ?>">Profile</a></li>
              <li><a href="#" class="active"><?php echo esc_attr( $wpjobus_resume_fullname ); ?></a></li>
            </ul>
        </div>
        <div class="profile-banner" <?php if($wpjobus_resume_cover_image!="") { ?>style='background: rgba(0, 0, 0, 0) url("<?php echo $wpjobus_resume_cover_image; ?>") no-repeat scroll 0 0 / cover ;' <?php } ?>>
            <div class="profile-details">
                <div class="user-icon">
                    <?php 
                        require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
			$params = array( 'width' => 100, 'height' => 100, 'crop' => true );
			if(bfi_thumb( "$wpjobus_resume_profile_picture", $params )!=""){
			echo "<img src='" . bfi_thumb( "$wpjobus_resume_profile_picture", $params ) . "' alt='" . $wpjobus_resume_fullname . "'/>";
			}else{
			echo "<img src='" . get_stylesheet_directory_uri() . "/img/user-default.png' alt='" . $wpjobus_resume_fullname . "'/>";
			}
		?>
               <!-- <img src="images/user-details_03.png" alt="User Profile"> -->
                </div>
              <h3><?php echo esc_attr( $wpjobus_resume_fullname ); ?> <?php /*echo esc_attr( $wpjobus_resume_email ); */?></h3>
              <div class="add-details">
                <div class="list address"><span class="icon"></span><span class="text"><?php echo esc_attr($resume_location); ?></span></div>
                <div class="list designation"><span class="icon"></span><span class="text"><?php echo esc_attr($resume_industry); ?></span></div>
                <div class="list education"><span class="icon"></span><span class="text"><?php echo esc_attr( $resume_career_level ); ?> </span></div>
              </div>
              
             <a class="fancybox send-msg gradient-btn" href="#inline1">
                  <span> <?php _e( 'Send Message', 'agrg' ); ?></span></a>
               <?php if(is_user_logged_in()){
                   global $current_user;
                   $userid = $current_user->ID;
                   $userresume = $wpdb->get_var( "SELECT DISTINCT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$userid."' ");
                   if($this_post_id == $userresume){
                         ?>
                        <a href="<?php echo esc_url( home_url( '/' ) )."edit-profile/?post=".$userresume; ?>" class="edit-pro gradient-btn">Edit Profile</a> 
                    <?php }
                   else{
                $author_id = $wpdb->get_results( "SELECT DISTINCT post_author FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and ID = '".$this_post_id."' ORDER BY `ID` DESC");
                foreach ($author_id as $key => $value) { $result_author = $value->post_author;}
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
                } ?>
                <a href="<?php echo $link; ?>" class="edit-pro gradient-btn"><?php echo $txt; ?></a> <?php
              }
             } ?>
              
                    <div id="inline1" style="display: none;">
        <div class="two_third first">
          <h1 class="resume-section-title" style="margin-bottom: 10px;">
            <?php _e( 'Send Message', 'agrg' ); ?>
          </h1>
          <div id="resume-contact" >
            <form id="contact" type="post" action="" >
			   <h4>Email  </h4>
		    <select name="reciver_email" id="reciver_email">
			  <option value="">---Select---</option>
			  <?php
              $siteusers = get_users(); 
			   foreach ($siteusers as $user) {
			  ?>
			  <option value="<?php echo  $user->user_email; ?>"><?php echo  $user->display_name; ?></option>
			  <?php
			   }
			  ?>
			  </select>
              <h4>Subject</h4>
              <input type="text" name="subject" value="">
              <h4>Message</h4>
              <span class="contact-message">
              <textarea name="message" id="message" cols="8" rows="8" ></textarea>
              </span>
              <input type="hidden" name="profpic" value="<?php echo $wpjobus_resume_profile_picture?>">
              <input type="hidden" name="fullname" value="<?php echo $wpjobus_resume_fullname;?>">
               <!-- <input type="hidden" name="reciver_email" value="<?php echo $wpjobus_resume_email;?>"> -->
              <input type="hidden" name="reciver_id" value="<?php echo $this_post_id;?>">
              <input type="text" name="receiverEmail" id="receiverEmail" value="<?php echo $wpjobus_resume_email; ?>" class="input-textarea" style="display: none;"/>
              
              <input type="hidden" name="action" value="wpjobContactForm" />
              
			  <?php wp_nonce_field('scf_html','scf_nonce'); ?>

              <input style="margin-bottom: 0;" name="submit" type="submit" value="Send Message" class="input-submit gradient-btn" id="sendmessage">
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
            
          </div>
        </div>
      </div>
            </div>
        </div>
        <div class="other-details">
            <div class="box associate-box">
                <?php  $queryurl = get_site_url().'/associates';
                        $new_query = add_query_arg( array('rsacc' => $post->post_author ), $queryurl ); ?>
              <div class="detail-heading">
                <h4 class="detail-title"><i class="fa fa-users"></i><?php echo esc_attr( $wpjobus_resume_fullname ); ?>'s Associates</h4>
               
                <span class="count"> <?php $cnt=0; $margs = array('user_id' => $post->post_author); if ( bp_has_members( $margs ) ) :   while ( bp_members() ) : bp_the_member();  $cnt++;  endwhile;  endif;
                     echo $cnt; ?></span>
              </div>
                <div class="detail-content">
                  <div class="content-inner mCustomScrollbar">
                    <ul>
                         <?php   $margs = array('user_id' => $post->post_author);
                        if ( bp_has_members( $margs ) ) {
                        while ( bp_members() ) : bp_the_member();
                        $wpjobus_status = $wpdb->get_results( "SELECT  p.ID, p.post_author FROM  `{$wpdb->prefix}posts` p LEFT JOIN  `{$wpdb->prefix}users` u ON p.post_author = u.id WHERE p.post_type =  'resume'	AND p.post_author = ".bp_get_member_user_id()." AND p.post_status =  'publish'");
                        $usr_id = $wpjobus_status[0]->ID;
                        $wpjobus_resume_fullname = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_fullname',true));
                        $resume_location = esc_attr(get_post_meta($usr_id, 'resume_location',true));
                        $wpjobus_resume_prof_title = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_prof_title',true));
                        $wpjobus_assc_profile_picture = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_profile_picture',true));
                 ?>
                      <li>
                        <a href="<?php echo home_url('/resume/'.$usr_id); ?>" class="associates">
                            <?php if(bfi_thumb( "$wpjobus_assc_profile_picture", $params )!=""){
                                        echo "<img src='" . bfi_thumb( "$wpjobus_assc_profile_picture", $params ) . "' alt='" . $wpjobus_resume_fullname . "'/>";
                                  }else{
                                      echo "<img src='" . get_stylesheet_directory_uri() . "/img/user-default.png' alt='" . $wpjobus_resume_fullname . "'/>";
                                  }
                            ?>
                          
                          <div class="assoc-name">
                            <span><?php echo $wpjobus_resume_fullname; ?></span>
                          </div>
                        </a>
                      </li>
                        
                      
                     <?php endwhile; ?></ul> <?php }  else {  ?>
                         <div class="full"> <h4><?php _e( 'Well, it looks like there are no results matching your criterias.aa', 'agrg' ); ?></h4></li>
                                                           
                         </div>
                     <?php } ?>
                  </div>
                </div>
            </div>
            <div class="box co-profiles-box">
              <div class="detail-heading ">
                <h4 class="detail-title"><i class="fa fa-cube"></i>Company Profiles</h4>
              </div>
                <div class="detail-content">
                  <div class="content-inner mCustomScrollbar">
                      	<?php   $ruser_id = get_current_user_id();//$user_info->ID;
                                $company_id = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and (post_status = 'publish') and post_author = '".$ruser_id."' ORDER BY `ID` DESC");
				if(sizeof($company_id)>=1){ ?>
                    <ul>
                        <?php 
                        foreach ($company_id as $key => $value) {
					$result_company[] = $value->ID;
					$result_company_date[] = $value->post_date;
					$result_company_status[] = $value->post_status;
                                        $wpjobus_company_fullname = esc_attr(get_post_meta($result_company[$key], 'wpjobus_company_fullname',true));
                                        $wpjobus_company_tag = esc_attr(get_post_meta($result_company[$key], 'wpjobus_company_tagline',true));
                                        $company_id = $result_company[$key]; ?>
                      <li>
                        <h5><?php echo $wpjobus_company_fullname; ?></h5>
                        <p><?php echo $wpjobus_company_tag; ?></p>
                      </li>
                        <?php } ?>
                    </ul>
                                                        <?php } ?>
                  </div>
                </div>
            </div>
            <div class="box awards-box">
              <div class="detail-heading">
                <h4 class="detail-title"> <i class="fa fa-trophy"></i><?php _e( 'Awards & Honors', 'agrg' ); ?></h4>
              </div>
                <div class="detail-content">
                  <div class="content-inner mCustomScrollbar">
                      <?php if(!empty($wpjobus_resume_award)) { ?>
                    <ul>
                       <?php for ($i = 0; $i < (count($wpjobus_resume_award)); $i++) { ?>
                      <li>
                        <h5><?php echo esc_attr( $wpjobus_resume_award[$i][0] ); ?></h5>
                        <p><?php echo esc_attr( $wpjobus_resume_award[$i][1] ); ?></p>
                      </li>
                       <?php } ?>
                    </ul>
                      <?php } ?>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
    <div class="career-pitch-sec sections">
      <div class="half-col">
        <div class="about-text">
          <h2> <?php _e( 'About', 'agrg' ); ?></h2>
          <span><?php echo $resume_about_me; ?></span>
        </div>
        <div class="virtual-text">
          <h4>Hello</h4> <?php echo $wpjobus_resume_comm_note; ?>
         </div>
      </div>
      <div class="half-col">
        <div class="video-tag">
          <img src="<?php echo get_stylesheet_directory_uri().'/images/video-tag.png'; ?>" alt="video Tag" />
        </div>
        <div class="video-text">
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
				echo $textcode= '['.$tcode.' id="'.$finalvid.'"]';
				echo do_shortcode($textcode);
				}				
				}else{
				
				//echo '<div id="pfdf"><img alt="Logo" src="http://careeriam.com/wp-content/uploads/video-logo/video-logo.png" ></div>';	
					
				}			
			 ?>
        </div>
      </div>
    </div>
    <div class="portfolio-section sections">
      <div class="container">
        <div class="section-title">
          <h2><img src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/images/video-tag.png" alt="video Tag"> Portfolio</h2>
          <span>Here are some of my works.</span>
        </div>
        <div class="section-content">
          <div class="portfolio-wrap cf">
              <?php 
            if(!empty($wpjobus_resume_portfolio)) {
		for ($i = 0; $i < (count($wpjobus_resume_portfolio)); $i++) {
				if(!empty($wpjobus_resume_portfolio[$i][1])) {
					$all_project_cat[] = $wpjobus_resume_portfolio[$i][1];
				}
                        }
		}
                $catProjID = 0;
                if(!empty($all_project_cat)){
		$directors = array_unique($all_project_cat);
               if(!empty($directors)) {
                ?>
                            <!-- portfolio filters -->
                            <div class="filter-holder fixed-filter in-anim" style="opacity: 1;">
                                <div class="gallery-filters">
                                    <ul>
                                        <li>
                                            <a href="#" class="gallery-filter gallery-filter-active" data-filter="*"><span> <?php _e( 'All', 'agrg' ); ?></span></a>
                                        </li>
                                        <?php foreach ($directors as $director) { 
                                                $catProjID++;
                                                $directorClass_0 = preg_replace('/^\/[^a-zA-Z0-9_ -%][().][\/]/s', '_', $director); 
                                                $directorClass = preg_replace('/\s*,\s*/', '_', $directorClass_0); ?>
                                        <li>
                                            <a href="#" class="gallery-filter" data-filter=".<?php echo $directorClass; ?>"><span><?php echo $director; ?></span></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
               <?php } }?>
                            <!-- portfolio filters end -->
                            <!-- portfolio start -->
                            <div class="gallery-items spad">
                               <?php 
                                if(!empty($wpjobus_resume_portfolio)) { 
                                        for ($i = 0; $i < (count($wpjobus_resume_portfolio)); $i++) {
                                            $directorClass='';
				if(!empty($wpjobus_resume_portfolio[$i][1])) {
					$project_cat = $wpjobus_resume_portfolio[$i][1];
                                        $directorClass_0 = preg_replace('/^\/[^a-zA-Z0-9_ -%][().][\/]/s', '_', $project_cat); 
                                        $directorClass = preg_replace('/\s*,\s*/', '_', $directorClass_0);
				}   
		?>
                                <div class="gallery-item <?php echo $directorClass; ?>">
                                    <div class="grid-item-holder" style="opacity: 1;">
                                        <div class="folio-img">
                                            <div class="overlay">
                                              <div class="folio-details">
                                                <div class="folio-title">
                                                  <span class="title"><?php echo $wpjobus_resume_portfolio[$i][0]; ?></span>
                                                  <span class="tags"><?php echo $wpjobus_resume_portfolio[$i][2]; ?></span>
                                                </div>
                                              </div>
                                            </div>
                                            <img src="<?php echo $wpjobus_resume_portfolio[$i][3]; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                    <?php }      
                                } ?>  
                            </div>
                            <!-- portfolio end -->
          </div>
        </div>
      </div>
    </div>
    <div class="exp-section sections">
      <div class="half-col left-col">
        <div class="inner-container">
          <div class="edu-title">
            <h2>Education</h2>
            <span>Here's an overview of education institutions I attended.</span>  
          </div>
          <div id="edu-list" class="edu-exp-list">
            <div class="top-icon"></div>
           <?php  if(!empty($wpjobus_resume_education)) { ?>
            <div id="<?php if(count($wpjobus_resume_education) > 3){ echo 'slides'; } ?>">
              <ul>
                  <?php $icnt=0; $closed = FALSE; 
                  for ($i = 0; $i < (count($wpjobus_resume_education)); $i++) {	
                        if($icnt==0) { echo '<li class="slide">'; } $closed = FALSE; 
                        echo '<div class="text-slide">
                            In <span class="year">'.$wpjobus_resume_education[$i][3].' </span>';
                            echo $wpjobus_resume_education[$i][1].' from '.$wpjobus_resume_education[$i][0];
                            echo '<strong> '.$wpjobus_resume_education[$i][5].' </strong>
                        </div>';  
                        $icnt++;
                        if($icnt==3){ $icnt=0; echo '</li>'; $closed = TRUE; }
                    } 
                    if(!$closed){ echo '</li>'; } ?>
              </ul>
            </div>
           <?php } ?>
            <div class="bottom-icon" <?php if(count($wpjobus_resume_education) < 3){echo "style='bottom:auto;'"; } ?>></div>
            <?php if(count($wpjobus_resume_education) > 3){ ?>
            <div class="btn-bar">
              <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a> </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="half-col right-col">
        <div class="inner-container">
          <div class="edu-title">
            <h2>Experience</h2>
            <span>Here's a list of companies where I worked and gained my professional experience.</span>
          </div> 
          <div id="exp-list" class="edu-exp-list">
              <?php  if(!empty($wpjobus_resume_work)) { ?>
            <div id="<?php if(count($wpjobus_resume_work) > 2){ echo 'slides2'; } ?>">
                <ul>
                    <?php
                        $slcnt=0; $slclosed=FALSE;
                            for ($i = 0; $i < (count($wpjobus_resume_work)); $i++) { 
                                if($slcnt==0){ echo '<li class="slide2">'; } $slcnt++;
                                ?>
                                <div class="co-logo">
                                    <div class="img-logo">
                                        <img src="<?php echo $wpjobus_resume_work[$i][6]; ?>" alt="Company logos"/>
                                    </div>
                                    <div class="work-info">
                                    	<span class="exp-name">Name: <?php echo $wpjobus_resume_work[$i][0]; ?></span>
                                    	<span class="exp-desi">Description: <?php echo $wpjobus_resume_work[$i][1]; ?></span>
                                    	<span class="exp-period">Period: <?php echo $wpjobus_resume_work[$i][2]. '-' . $wpjobus_resume_work[$i][3]; ?> </span>
                                    	<span class="exp-year">Year: <?php  echo $wpjobus_resume_work[$i][7]; ?></span>
                                      <span class="workexp-desc">Work Description: <?php  echo $wpjobus_resume_work[$i][5]; ?></span>
                                   	</div>
                                    
                                    
                                </div>
                            <?php if($slcnt==2) { echo '</li>'; $slcnt=0; $slclosed = TRUE; } ?>
              <?php } ?> 
              </ul>
            </div>
              <?php } 
              if(count($wpjobus_resume_work) > 2){ ?>
            <div class="btn-bar2">
              <div id="buttons2"><a id="prev2" href="#"><</a><a id="next2" href="#">></a> </div>
            </div>
              <?php } ?>
          </div> 
        </div>
      </div>
    </div>
<?php get_footer( 'profile' );
?>