<?php
/**
 * Template name: job details Page
 */

if ( !is_user_logged_in() ) { 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

} 

$page = get_page($post->ID);
$current_page_id = $page->ID;

$query = new WP_Query(array('post_type' => 'job', 'posts_per_page' =>'-1', 'post_status' => 'publish, draft, pending') );

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
	
if(isset($_GET['post'])) {
		
	if($_GET['post'] == $post->ID) {
		
		$current_post = $post->ID;

		
                
                $edu_remuneration_amt = esc_attr(get_post_meta($post->ID, 'edu_remuneration_amt',true));
                $edu_remuneration_desc = esc_attr(get_post_meta($post->ID, 'edu_remuneration_desc',true));

		$wpjobus_job_cover_image = esc_url(get_post_meta($post->ID, 'wpjobus_job_cover_image',true));
		$wpjobus_job_fullname = esc_attr(get_post_meta($post->ID, 'wpjobus_job_fullname',true));
		$job_company = esc_attr(get_post_meta($post->ID, 'job_company',true));
		$job_location = esc_attr(get_post_meta($post->ID, 'job_location',true));
		$job_career_level = esc_attr(get_post_meta($post->ID, 'job_career_level',true));
		$job_presence_type = esc_attr(get_post_meta($post->ID, 'job_presence_type',true));
		$wpjobus_job_type = esc_attr(get_post_meta($post->ID, 'wpjobus_job_type',true));
		$wpjobus_job_remuneration_per = esc_attr(get_post_meta($post->ID, 'wpjobus_job_remuneration_per',true));
		$wpjobus_job_remuneration = esc_attr(get_post_meta($post->ID, 'wpjobus_job_remuneration',true));
		$wpjobus_job_benefits = get_post_meta($post->ID, 'wpjobus_job_benefits',true);

		$job_industry = esc_attr(get_post_meta($post->ID, 'job_industry',true));
		$job_about_me = html_entity_decode(get_post_meta($post->ID, htmlentities('job-about-me'),true));
		$job_years_of_exp = esc_attr(get_post_meta($post->ID, 'job_years_of_exp',true));
		$wpjobus_resume_profile_picture = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_profile_picture',true));

		$wpjobus_resume_prof_title = esc_attr(get_post_meta($post->ID, 'wpjobus_resume_prof_title',true));
		$resume_career_level = esc_attr(get_post_meta($post->ID, 'resume_career_level',true));

		$wpjobus_job_comm_level = esc_attr(get_post_meta($post->ID, 'wpjobus_job_comm_level',true));
		$wpjobus_job_comm_note = esc_attr(get_post_meta($post->ID, 'wpjobus_job_comm_note',true));

		$wpjobus_job_org_level = esc_attr(get_post_meta($post->ID, 'wpjobus_job_org_level',true));
		$wpjobus_job_org_note = esc_attr(get_post_meta($post->ID, 'wpjobus_job_org_note',true));

		$wpjobus_job_job_rel_level = esc_attr(get_post_meta($post->ID, 'wpjobus_job_job_rel_level',true));
		$wpjobus_job_job_rel_note = esc_attr(get_post_meta($post->ID, 'wpjobus_job_job_rel_note',true));

		$wpjobus_job_skills = get_post_meta($post->ID, 'wpjobus_job_skills',true);
		$wpjobus_job_native_language = esc_attr(get_post_meta($post->ID, 'wpjobus_job_native_language',true));
		$wpjobus_job_languages = get_post_meta($post->ID, 'wpjobus_job_languages',true);

		$wpjobus_job_hobbies = esc_attr(get_post_meta($post->ID, 'wpjobus_job_hobbies',true));

		$wpjobus_job_address = esc_attr(get_post_meta($post->ID, 'wpjobus_job_address',true));
		$wpjobus_job_phone = esc_attr(get_post_meta($post->ID, 'wpjobus_job_phone',true));
		$wpjobus_job_website = esc_url(get_post_meta($post->ID, 'wpjobus_job_website',true));
		$wpjobus_job_email = esc_attr(get_post_meta($post->ID, 'wpjobus_job_email',true));
		$wpjobus_job_publish_email = esc_attr(get_post_meta($post->ID, 'wpjobus_job_publish_email',true));
		$wpjobus_job_facebook = esc_url(get_post_meta($post->ID, 'wpjobus_job_facebook',true));
		$wpjobus_job_linkedin = esc_url(get_post_meta($post->ID, 'wpjobus_job_linkedin',true));
		$wpjobus_job_twitter = esc_url(get_post_meta($post->ID, 'wpjobus_job_twitter',true));
		$wpjobus_job_googleplus = esc_url(get_post_meta($post->ID, 'wpjobus_job_googleplus',true));

		$wpjobus_job_googleaddress = esc_attr(get_post_meta($post->ID, 'wpjobus_job_googleaddress',true));

		$wpjobus_job_longitude = esc_attr(get_post_meta($post->ID, 'wpjobus_job_longitude',true));
		if(empty($wpjobus_job_longitude)) {
			$wpjobus_job_longitude = 0;
		}

		$wpjobus_job_latitude = esc_attr(get_post_meta($post->ID, 'wpjobus_job_latitude',true));
		if(empty($wpjobus_job_latitude)) {
			$wpjobus_job_latitude = 0;
		}

	}

}

endwhile; endif;
wp_reset_query();

global $current_post;

//echo "====================".$current_post;
		// echo $job_about_me;
		

 get_header('activity'); 
 ?>
 <!-- Content START-->
    <div class="profile-header sections job-details">
      <div class="container">
          <div class="breadcrumbs-sec">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Job List</a></li>
              <li><a href="#" class="active">Job Details</a></li>
            </ul>
          </div>
          <div class="profile-banner">
            <div class="profile-details">
              <div class="user-icon">
                <?php if($wpjobus_job_cover_image !=""){?>
              <img src="<?php  echo $wpjobus_job_cover_image; ?>">
              <?php }else{?>
                <img src="http://careeriam.phpdevelopment.co.in/wp-content/uploads/2015/11/user-details_03.png">
                <?php }?>
              </div>
              <h3><?php if (!empty($wpjobus_job_fullname)) echo $wpjobus_job_fullname; ?></h3>
              <div class="add-details">
                <div class="list settings my-account-header-settings-link">
                  <i class="fa fa-cubes"></i>
                  <span class="text">Real Estate</span>
                </div>
                <div class="list email my-account-header-subscriptions-link">
                  <i class="fa fa-map-marker"></i>
                  <span class="text"><?php if (!empty($job_location)) echo $job_location; ?> Staten Island, New York</span>
                </div>
              </div>
              <a href="#" class="edit-pro gradient-btn">Apply</a>
            </div>
          </div>
          <!-- START Job Deatils Content-->
          <div class="job-deatils-wrap">
            <div class="full opening-details" style="display:none;">
              <h3>Opening for Collection Executive (calling Executive)</h3>
              <ul>
                <li>
                  <i class="fa fa-clock-o"></i>
                  <span>2 - 5 yrs</span>
                </li>
                <li>
                  <i class="fa fa-money"></i>
                  <span>1,50,000 - 2,50,000 P.A</span>
                </li>
                <li>
                  <i class="fa fa-user"></i>
                  <span>2 Openings</span>
                </li>
                <li>
                  <i class="fa fa-pencil-square-o"></i>
                  <span>posted 1 week ago</span>
                </li>
              </ul>
            </div>
            <div class="full other-desc">
              <h3>Job Description</h3>
			 <?php echo $job_about_me; ?>
             <!-- <ul>
                <li><span>Making payment reminder outcalls for members with overdue payments and ensuring that the relevant TATs/CSATS/ quality standards are strictly maintained</span></li>
                <li><span>Follow up post the payment reminder outcall: for payment collection or outcall to be made on another date.</span></li>
                <li><span>Follow up with customers with overdue payments via various communication</span></li>
                <li><span>Escalating to seniors/supervisors irregular cases and seeking help in closing them.</span></li>
                <li><span>Identifying complaints received from members and forwarding them to the complaints team for resolution</span></li>
                <li><span>Provide administrative work related to collection, adjustment to payment apportionment, collation of MIS data.</span></li>
                <li><span>Field visits to be done as per appointment given by the customer to collect the payment</span></li>
              </ul>-->
              <div class="other-job-details">
                <span class="full">
                  <span class="one-left">Required Skills: </span>
                  <span class="one-right"><?php echo $wpjobus_job_skills[0][0]; ?></span>
                </span>
                <span class="full">
                  <span class="one-left">Remuneration Amount:</span>
                  <span class="one-right"><?php echo $wpjobus_job_remuneration; ?></span>
                </span>
                <span class="full">
                  <span class="one-left">Description: </span>
                  <span class="one-right"><?php echo $wpjobus_job_benefits[0][1]; ?></span>
                </span>
                <!--<span class="full">
                  <span class="one-left">Role Category:  </span>
                  <span class="one-right">Finance/Audit</span>
                </span>
                <span class="full">	
                  <span class="one-left">Role:</span>
                  <span class="one-right">Credit/Control Executive</span>
                </span>
                <span class="full">
                  <span class="one-left">Education: </span>
                  <span class="one-right">UG: Any Graduate  PG: MBA/PGDM - Any Specialization</span>
                </span>-->
              </div>
              <div class="other-job-details">
                <h3>Company Profile</h3>
                <p>
				<?php echo $edu_remuneration_desc; ?>
				<!--Magic Holidays is a timeshare product from the Panoramic Group of Companies, a worldwide hospitality innovator. Timeshare is currently the fastest growing leisure segment in the tourism industry. Magic Holidays has been able to create waves in the segment with its customer-centric approach that offers them an experience like never before. A Magic Holidays customer is guaranteed of timely booking at any of their resorts in some of the best locations in India and abroad. In addition, they get a value-for-money package, which is an advantage in these inflation-ridden times. Powered by RCI (Resort Condominium International: Subsidiary of Wyndham Worldwide Corporation) the largest timeshare vacation exchange network in the world through association with brands like Ramada, Baymont Inn and Suites, Wingate Inn, etc., Magic Holidays gives customers a wide choice of holidaying in more than 103 countries. The resort locations range from mountain slopes to coastal plains; providing a variety of accommodation across 6,500+ resorts worldwide.-->
				</p>      
              </div>
              <!--<div class="other-job-details">
                <h3>Contact</h3>
                <span class="full">
                  <span class="one-left">Recruiter Name: </span>
                  <span class="one-right">Kalpita Mandavale</span>
                </span>
                <span class="full">
                  <span class="one-left">Email Address:</span>
                  <span class="one-right">[kalpita.mandavale@panoramicworld.biz]</span>
                </span>
                <span class="full">
                  <span class="one-left">Website: </span>
                  <span class="one-right">Website</span>
                </span>
                <span class="full">
                  <span class="one-left">Telephone: </span>
                  <span class="one-right">9167757439</span>
                </span>-->
              </div>
              <div class="submit-row">
                <input type="submit" class="gradient-btn" value="Apply">
              </div>
            </div>
          </div>
          <!-- END Job Deatils Content-->
      </div>
    </div>
    <!-- Content END-->
	<?php get_footer('login'); ?>