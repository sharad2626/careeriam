<?php
/**
 * Company Page
 */

global $redux_demo; 
$access_state = $redux_demo['access-state'];

if ( !is_user_logged_in() && $access_state == 1) {

	$login = home_url()."/login?info=accesspage";
	wp_redirect( $login ); exit;

}

 $this_post_id = $post->ID; //echo  $this_post_id;

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
global $redux_demo;
$contact_email = esc_attr(get_post_meta($this_post_id, 'wpjobus_company_email',true));
$wpcrown_contact_email_error = esc_attr($redux_demo['contact-email-error']);
$wpcrown_contact_name_error = esc_attr($redux_demo['contact-name-error']);
$wpcrown_contact_message_error = esc_attr($redux_demo['contact-message-error']);
$wpcrown_contact_thankyou = esc_attr($redux_demo['contact-thankyou-message']);
$wpcrown_contact_test_error = esc_attr($redux_demo['contact-test-error']);
get_header( 'profile' );
?>
<div class="company-header sections">
      <div class="container">
          <div class="breadcrumbs-sec">
            <ul>
              <li><a href="<?php echo home_url(); ?>">Home</a></li>
              <li><a href="<?php echo home_url('/companies'); ?>">Companies</a></li>
              <li><a href="#" class="active"><?php echo $wpjobus_company_fullname; ?></a></li>
            </ul>
          </div>
          <div class="company-banner" >
            <div class="company-details">
              <div class="follow-details">
                  <div class="list followers">
                      <span class="icon"></span><span class="text">
                          <?php 
						 /* 
						   query for below : 
						   SELECT * FROM `wp_postmeta` WHERE `post_id` = $this_post_id AND `meta_key` LIKE 'company-followers' 
						 */
						  $user_ids = get_post_meta( $this_post_id, 'company-followers', false );
                                echo sizeof($user_ids); ?> <br>followers</span>
							         <div class="view_all_follower_link"><a href="<?php echo home_url();?>/company-followers/?c_id=<?php echo $this_post_id; ?>">View All </a></div>  
								</div>
              </div>
                <?php 
                    global $redux_demo, $website_type; 
                    $website_type = $redux_demo['homepage-state'];
                    if(($website_type == 1) or empty($website_type)) { }
                    if(!empty($wpjobus_company_profile_picture)) {
			
                        echo '<div class="company_user_icon">';
              			echo "<img src='".$wpjobus_company_profile_picture."' alt='" . $wpjobus_company_fullname . "'/>";
              			echo '</div>';
                                      
                                  } else {
                                      echo '<div class="company_user_icon">';
              				?>
                      		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/company-default.png" alt="<?php echo $wpjobus_company_fullname; ?>" />
              			<?php 
                                      echo '</div>';
              			}
              		?>
              
              <h3><?php echo $wpjobus_company_fullname; ?></h3>
              <div class="add-details">
                <div class="list address">
                   <?php if($wpjobus_company_address!=''){ ?> <span class="icon"></span> <?php } ?>
                    <span class="text"><?php echo $wpjobus_company_address; ?></span>
                </div>
                <div class="list calender">
                    <?php if($wpjobus_company_address!=''){ ?><span class="icon"></span> <?php } ?>
                    <span class="text"><?php echo $wpjobus_company_foundyear; ?></span>
                </div>
                <div class="list url_link">
                    <?php if($wpjobus_company_address!=''){ ?><span class="icon"></span> <?php } ?>
                    <span class="text"><?php echo preg_replace('#^https?://#', '', $wpjobus_company_website);?></span>
                </div>
              </div>
              <?php   $current_user_id = get_current_user_id();
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
		            <!-- <span class="company-follow comfollow<?php echo $this_post_id; ?>"> <a class="mfollow " href="javascript:void(0);" onclick="return makeFollow('<?php echo $this_post_id; ?>');" > Follow </a> </span>								
                <span class="company-following comfollowing<?php echo $this_post_id; ?>" style="display:none;"> <a class="dflow send-msg gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $this_post_id; ?>);">  Following </a></span> -->

                <a class="company-follow comfollow<?php echo $this_post_id; ?> gradient-btn"> 
                  <span class="mfollow " href="javascript:void(0);" onclick="return makeFollow('<?php echo $this_post_id; ?>');" > Follow </span> 
                </a>               
                <a class="company-following comfollowing<?php echo $this_post_id; ?> gradient-btn" style="display:none;"> 
                  <span class="dflow send-msg gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $this_post_id; ?>);">  Following </span>
                </a>
                <?php 
								}else{
									?>
                  <div id="myfollow_board"></div>
               <!-- <span class="company-follow comfollow<?php echo $this_post_id; ?>" style="display:none;"> <a class="mfollow send-msg gradient-btn" href="javascript:void(0);" onclick="return makeFollow('<?php echo $this_post_id; ?>');" > Follow </a> </span>		
                  <span class="company-following comfollowing<?php echo $this_post_id; ?>"> <a class="dflow send-msg gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $this_post_id; ?>);">  Following </a></span> -->

                  <a class="company-follow comfollow<?php echo $this_post_id; ?> gradient-btn" style="display:none;"> <span class="mfollow send-msg gradient-btn" href="javascript:void(0);" onclick="return makeFollow('<?php echo $this_post_id; ?>');" > Follow </span> </a> 

                  <a class="company-following comfollowing<?php echo $this_post_id; ?> gradient-btn"> <span class="dflow send-msg gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $this_post_id; ?>);">  Following </span></a>
									<?php 
								}
								 } 
								 ?>
              </div>
            <div class="company_cover">
                <?php if($wpjobus_company_cover_image==''){?>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-cover.jpg" alt="company_banner">
				<?php }else{?>
						<img src="<?php echo $wpjobus_company_cover_image; ?>" alt="company_banner">
				<?php } ?> 
				

            </div>
          </div>
          
      </div>
    </div>
    <div class="company_service_sec sections">
     <div class="container">
        <div class="section-title">
          <h3>Services</h3>
          <span>Here’s an overview of the services we provide.</span>
        </div>
        <div class="service_inner">
		<?php if(count($wpjobus_company_services)>1){ ?>
          
		  <ul>
            <?php if(!empty($wpjobus_company_services)) {
		for ($i = 0; $i < (count($wpjobus_company_services)); $i++) { ?>
            <li>
                
              <img src="<?php echo $wpjobus_company_services[$i][1]; ?>" alt="services">
              <h2><?php echo $wpjobus_company_services[$i][0]; ?>
                
              </h2>
              <p><?php echo esc_attr($wpjobus_company_services[$i][2]); ?></p>
            </li>
            <?php } } ?>
            
          </ul>
          <?php } ?>

        </div>
     </div>
    </div>
    <div class="portfolio-section sections">
      <div class="container">
        <div class="section-title">
          <h3>Portfolio</h3>
          <span>Here are some of my works.</span>
        </div>
        <div class="section-content">
          <div class="portfolio-wrap cf">
              <?php 
            if(!empty($wpjobus_company_portfolio)) {
		for ($i = 0; $i < (count($wpjobus_company_portfolio)); $i++) {
				if(!empty($wpjobus_company_portfolio[$i][1])) {
					$all_project_cat[] = $wpjobus_company_portfolio[$i][1];
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
                                if(!empty($wpjobus_company_portfolio)) { 
                                        for ($i = 0; $i < (count($wpjobus_company_portfolio)); $i++) {
                                            $directorClass='';
				if(!empty($wpjobus_company_portfolio[$i][1])) {
					$project_cat = $wpjobus_company_portfolio[$i][1];
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
                                                  <span class="title"><?php echo $wpjobus_company_portfolio[$i][0]; ?></span>
                                                  <span class="tags"><?php echo $wpjobus_company_portfolio[$i][2]; ?></span>
                                                </div>
                                              </div>
                                            </div>
                                            
											<img src="<?php echo $wpjobus_company_portfolio[$i][3]; ?>" alt="">

                                        </div>
                                    </div>
                                </div>
                                    <?php }      
                                } ?>  
                            </div>
          </div>
        </div>
      </div>
    </div>
<!-- portfolio end -->
    <div class="exp-section sections">
      <div class="half-col left-col">
        <div class="inner-container">
          <div class="edu-title">
            <h2>Testimonials</h2>
          </div>
          <div id="edu-list" class="test-exp-list mCustomScrollbar">
            <div class="test-top-icon"></div>
            <div id="slides">
                <?php if(!empty($wpjobus_company_testimonials)) { ?>
              <ul>
                  <?php for ($i = 0; $i < (count($wpjobus_company_testimonials)); $i++) { ?>
 
                <li class="slide">
                  <div class="text-slide">
                   <?php echo esc_attr($wpjobus_company_testimonials[$i][2]); ?>
                  </div>
                  <div class="text-slide">
                   
                  </div>   
                  <div class="text-slide">
                      <h3><?php echo esc_attr($wpjobus_company_testimonials[$i][0]); ?></h3> 
                    <em><?php echo esc_attr($wpjobus_company_testimonials[$i][1]); ?></em>
                  </div> 
                </li>
                  <?php } ?>
              </ul>
                <?php } ?>
            </div>
            <div class="test-bottom-icon"></div>
            <div class="btn-bar">
              <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="half-col right-col">
        <div class="inner-container">
            <div class="edu-title">
                <h2>clients</h2>
            </div> 
            <div id="exp-list" class="test-exp-list mCustomScrollbar">
            <?php  if(!empty($wpjobus_company_clients)) { ?>
                <div id="<?php if(count($wpjobus_resume_education) > 6){ echo 'slides2'; } ?>">
                    <ul>
                        <?php
                            $slcnt=0; $slclosed=FALSE;
                            for ($i = 0; $i < (count($wpjobus_company_clients)); $i++) { 
                                if($slcnt==0){ echo '<li class="slide2">'; } $slcnt++;
                                ?>
                                <div class="co-logo">
                                    <div class="img-logo">
									   <?php if($wpjobus_company_clients[$i][6]!=''){ ?>
										
										<img src="<?php echo $wpjobus_company_clients[$i][6]; ?>" alt="Company logos"/>
                                      
									   <?php } ?> 
									</div>
                                </div>
                            <?php if($slcnt==6) { echo '</li>'; $slcnt=0; $slclosed = TRUE; } ?>
                        <?php }  if(!$closed){ echo '</li>'; } ?>
                    </ul>
                </div>
                <?php if(count($wpjobus_resume_education) > 6){ ?>
                <div class="btn-bar2">
                    <div id="buttons2"><a id="prev2" href="#"><</a><a id="next2" href="#">></a> </div>
                </div>
            <?php } } ?>
          </div> 
          
          </div>
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
<?php get_footer( 'profile' ); ?>