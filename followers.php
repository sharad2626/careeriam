<?php 

/**
 * Template name: followersPage
 */


get_header(); ?>
<?php
global $redux_demo; 
$access_state = $redux_demo['access-state'];

if ( !is_user_logged_in() && $access_state == 1) {

	$login = home_url()."/login?info=accesspage";
	wp_redirect( $login ); exit;

}
$url = explode('/',$_SERVER['REDIRECT_URL']);



  $this_post_id = $url['2'];

if(empty($this_post_id)) {
	$page = get_page($post->ID);
	$this_post_id = $page->ID;
} 

$wpjobus_company_cover_image = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_cover_image',true));
$wpjobus_company_fullname = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_fullname',true));
$wpjobus_company_tagline = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_tagline',true));
$company_industry = esc_attr(get_post_meta($this_post_id, 'company_industry',true));
$company_team_size = esc_attr(get_post_meta($this_post_id, 'company_team_size',true));
$resume_about_me = html_entity_decode(get_post_meta($this_post_id, 'company-about-me',true));
$wpjobus_company_foundyear = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_foundyear',true));
$wpjobus_company_profile_picture = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_profile_picture',true));
$company_location = esc_attr(get_post_meta($this_post_id, 'company_location',true));
$wpjobus_resume_prof_title = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_prof_title',true));
$resume_career_level = esc_attr(get_post_meta($this_post_id, 'resume_career_level',true));
$wpjobus_resume_comm_level = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_comm_level',true));
$wpjobus_resume_comm_note = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_comm_note',true));
$wpjobus_resume_org_level = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_org_level',true));
$wpjobus_resume_org_note = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_org_note',true));
$wpjobus_resume_job_rel_level = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_rel_level',true));
$wpjobus_resume_job_rel_note = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_rel_note',true));
$wpjobus_company_services = get_post_meta($this_post_id, 'wpjobus_company_services',true);
$wpjobus_company_expertise = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_expertise',true));
$wpjobus_resume_education = get_post_meta($this_post_id, 'wpjobus_resume_education',true);
$wpjobus_resume_award = get_post_meta($this_post_id, 'wpjobus_resume_award',true);
$wpjobus_company_clients = get_post_meta($this_post_id, 'wpjobus_company_clients',true);
$wpjobus_company_testimonials = get_post_meta($this_post_id, 'wpjobus_company_testimonials',true);
$wpjobus_resume_remuneration = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_remuneration',true));
$wpjobus_resume_remuneration_per = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_remuneration_per',true));
$wpjobus_resume_job_freelance = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_freelance',true));
$wpjobus_resume_job_part_time = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_part_time',true));
$wpjobus_resume_job_full_time = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_full_time',true));
$wpjobus_resume_job_internship = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_internship',true));
$wpjobus_resume_job_volunteer = esc_attr(get_post_meta($this_post_id, 'wpjobus_resume_job_volunteer',true));
$wpjobus_company_portfolio = get_post_meta($this_post_id, 'wpjobus_company_portfolio',true);
$wpjobus_company_address = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_address',true));
$wpjobus_company_phone = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_phone',true));
$wpjobus_company_website = esc_url(get_post_meta($this_post_id, 'wpjobus_company_website',true));
$wpjobus_company_email = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_email',true));
$wpjobus_company_publish_email = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_publish_email',true));
$wpjobus_company_facebook = esc_url(get_post_meta($this_post_id, 'wpjobus_company_facebook',true));
$wpjobus_company_linkedin = esc_url(get_post_meta($this_post_id, 'wpjobus_company_linkedin',true));
$wpjobus_company_twitter = esc_url(get_post_meta($this_post_id, 'wpjobus_company_twitter',true));
$wpjobus_company_googleplus = esc_url(get_post_meta($this_post_id, 'wpjobus_company_googleplus',true));
$wpjobus_company_googleaddress = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_googleaddress',true));
$wpjobus_company_longitude = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_longitude',true));
$wpjobus_company_latitude = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_latitude',true));
get_header(); 
global $redux_demo;
$contact_email = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_email',true));
$wpcrown_contact_email_error = esc_attr($redux_demo['contact-email-error']);
$wpcrown_contact_name_error = esc_attr($redux_demo['contact-name-error']);
$wpcrown_contact_message_error = esc_attr($redux_demo['contact-message-error']);
$wpcrown_contact_thankyou = esc_attr($redux_demo['contact-thankyou-message']);
$wpcrown_contact_test_error = esc_attr($redux_demo['contact-test-error']);

?>

<div class="main_resume_wrapper">
<section id="company-menu">

		<div class="container">
			<div class="left-avatar">
			<?php 

				global $redux_demo, $website_type; 
				$website_type = $redux_demo['homepage-state'];

				if(($website_type == 1) or empty($website_type)) {

			?>
		
			<?php } 
            
            					if(!empty($wpjobus_company_profile_picture)) {

									  			require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
													$params = array( 'width' => 75, 'height' => 75, 'crop' => true );
													echo "<img src='" . bfi_thumb( "$wpjobus_company_profile_picture", $params ) . "' alt='" . $wpjobus_company_fullname . "'/>";
													} else {

													?>

													<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/company-default.png" alt="<?php echo $wpjobus_company_fullname; ?>" />

												<?php 

											
										}
												?>
			
	      	
	      	
	    </div>
      <div class="resume-author-avatar">
			<h4><?php echo $wpjobus_company_fullname; ?></h4>

      </div>
			<?php /* <ul class="nav navbar-nav">

				<!--<li class="menuItem active backtophome"><a href="#backtop"><span><?php //_e( 'Home', 'agrg' ); ?></span><i class="fa fa-home"></i></a></li>-->
				<!--<li class="menuItem"><a href="#resume-about-block"><span><?php// _e( 'Profile', 'agrg' ); ?></span><i class="fa fa-file-text-o"></i></a></li>-->
				<!--<li class="menuItem"><a href="#resume-jobs-block"><span><?php //_e( 'Job Offers', 'agrg' ); ?></span><i class="fa fa-bullhorn"></i></a></li>-->
				<!--<li class="menuItem"><a href="#resume-experience-block"><span><?php //_e( 'Clients', 'agrg' ); ?></span><i class="fa fa-building"></i></a></li>-->
				<!--<li class="menuItem"><a href="#resume-portfolio-block"><span><?php //_e( 'Portfolio', 'agrg' ); ?></span><i class="fa fa-bookmark"></i></a></li>-->
				<li class="menuItem">
				
				<?php 
								 $current_user_id = get_current_user_id();
							$current_user = wp_get_current_user();
							 
								
								 if($current_user_id != ""){
									$checkpost_meta = "";
									$checkpost_meta = get_post_meta( $this_post_id, 'company-followers', false );
									$checkkey = "";
								
									$checkkey = array_search($current_user_id, $checkpost_meta);
									//print_r(checkpost_meta);
								if($checkkey == ""){ 
								 ?>
                 <div id="myfollow_board"></div>
                 
								<span class="company-follow comfollow<?php echo $this_post_id; ?>"> <a class="mfollow" href="javascript:void(0);" onclick="return makeFollow('<?php echo $this_post_id; ?>');" > Follow </a> </span>								
                <span class="company-following comfollowing<?php echo $this_post_id; ?>" style="display:none;"> <a class="dflow" href="javascript:void(0);" onclick="return delFollow(<?php echo $this_post_id; ?>);">  Following </a></span>
                <?php 
								}else{
									?>
                  <div id="myfollow_board"></div>
               <span class="company-follow comfollow<?php echo $this_post_id; ?>" style="display:none;"> <a class="mfollow" href="javascript:void(0);" onclick="return makeFollow('<?php echo $this_post_id; ?>');" > Follow </a> </span>		
                  <span class="company-following comfollowing<?php echo $this_post_id; ?>"> <a class="dflow" href="javascript:void(0);" onclick="return delFollow(<?php echo $this_post_id; ?>);">  Following </a></span>
									<?php 
								}
								 } 
								 ?>
				
				
				
				

										</li>

			</ul> */ ?>

			<select id="mobile-nav-bar" onchange="location = this.options[this.selectedIndex].value;">

				<option value="#backtop"><?php _e( 'Home', 'agrg' ); ?></option>
				<option value="#resume-about-block"><?php _e( 'Profile', 'agrg' ); ?></option>
				<option value="#resume-jobs-block"><?php _e( 'Job Offers', 'agrg' ); ?></option>
				<option value="#resume-experience-block"><?php _e( 'Clients', 'agrg' ); ?></option>
				<option value="#resume-portfolio-block"><?php _e( 'Portfolio', 'agrg' ); ?></option>
				<option value="#resume-contact-block"><?php _e( 'Contact', 'agrg' ); ?></option>

			</select>

		</div>

	</section> 
	
 <div class="one_third">
        <h1 class="resume-section-title"><i class="fa fa-user"></i><?php _e( 'Followers', 'agrg' ); ?></h1>
        <ul class="flr">
        <?php 
				
				//$post_tmp = get_post($this_post_id);
			//	$author_id = $post_tmp->post_author;
				//echo $company_id = get_the_ID();
				
				$user_ids = get_post_meta( $this_post_id, 'company-followers', false );
				//print_r($user_ids);
				$resume_post_id = "";
				$count_follwers=sizeof($user_ids);
					if(count($user_ids)>1)
					{
						foreach ($user_ids as $value) {
							    $author_id = $value;
									
									$resume_id = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and post_status = 'publish' and post_author = '".$author_id."' ORDER BY `ID` DESC");
				
								// print_r($resume_id) ; 
								
				
					if(sizeof($resume_id)>=1)
					{
								
								?>
                                
                                <?php 
								foreach ($resume_id as $key => $value) {
									
									$resume_post_id = $value->ID ;
									
									$wpjobus_resume_fullname = get_post_meta($resume_post_id, 'wpjobus_resume_fullname',true);
									
									?>
                   <li><i class="fa fa-angle-right"></i> <span><a href="<?php echo get_permalink($value->ID); ?>"><?php echo $wpjobus_resume_fullname; ?></a></span></li>                  
                  <?php 
				  
				 
								}
								
								
					?>
                    
                    <?php 			
						}
					}
					 
					if($count_follwers>1){
					  
					  //echo "<a href='$this_post_id' >see all</a>";
				      }			
					}
			
				?>
        </ul>
        </div>
	</div>
	<script type="text/javascript">
				
				function makeFollow(comid){
					var company_id = comid;
					url	=	'<?php echo home_url(); ?>/wp-content/themes/careeriam/inc/com-follow.php'; 
					jQuery.get(url, {company_id: company_id}, function (mytickets){
						jQuery('#myfollow_board').html(mytickets); 
					});
					jQuery('.comfollowing'+company_id).show();
					jQuery('.comfollow'+company_id).hide();
					return false;
				}
				function delFollow(comid){
					var company_id = comid;
					url	=	'<?php echo home_url(); ?>/wp-content/themes/careeriam/inc/com-followdel.php'; 
					jQuery.get(url, {company_id: company_id}, function (mytickets){
						jQuery('#myfollow_board').html(mytickets); 
					});
					jQuery('.comfollowing'+company_id).hide();
					jQuery('.comfollow'+company_id).show();
					return false;
				}
				
				</script>
	
	<?php get_footer(); ?>