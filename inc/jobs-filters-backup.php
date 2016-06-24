<?php

function wpjobusSubmitJobsFilter1() {

var_dump( $_POST['wpjobusSubmitJobsFilter_nonce']);
  	if ( isset( $_POST['wpjobusSubmitJobsFilter_nonce'] ) && wp_verify_nonce( $_POST['wpjobusSubmitJobsFilter_nonce'], 'wpjobusSubmitJobsFilter_html' ) ) {

  		global $wpdb, $companies_per_page, $total_companies, $total_pages, $current_page, $wpjobus_companies;

		$companies_per_page = 18;

		$total_companies = 0;

		$current_page = $_POST['companies_current_page'];

  		$companies_map_block = $_POST['companies_map_block'];

  		// Job Presence Filter
  		/*$job_presence_type = $_POST['job_presence_type'];
		$job_presence_type_all = $_POST['job_presence_type_all'];

		$stringOriginal = '';
		$stringOriginalCount = 0;

		if($job_presence_type_all == 1) {

			global $redux_demo; 
			for ($i = 0; $i < count($redux_demo['job-type']); $i++) {

				if($stringOriginalCount != 0) {
					$stringOriginalCountPrim = " OR ";
				} else {
					$stringOriginalCountPrim = "";
				}

				$stringOriginal .= $stringOriginalCountPrim."m.meta_value = '". $redux_demo['job-type'][$i] ."'";

				$stringOriginalCount++;

			 }

		} else {

			for ($countQ = 0; $countQ < count($job_presence_type); $countQ++) { 

				if(!empty($job_presence_type[$countQ])) { 

					if($stringOriginalCount != 0) {
						$stringOriginalCountPrim = " OR ";
					} else {
						$stringOriginalCountPrim = "";
					}

					$stringOriginal .= $stringOriginalCountPrim."m.meta_value = '". $job_presence_type[$countQ] ."'";

					$stringOriginalCount++;

				}

			  }

		}

		if(!empty($stringOriginal)) {

			$string = "AND m.meta_key = 'wpjobus_job_type'  AND (" . $stringOriginal . ")";

		} else {

			$string = "";

		}*/
		// End Job Presence Filter

		// Job Career Level Filter
  		/*$job_career_level = $_POST['job_career_level'];
		$job_career_level_all = $_POST['job_career_level_all'];

		$stringOriginalLevel = '';
		$stringOriginalLevelCount = 0;

		if($job_career_level_all == 1) {

			global $redux_demo; 
			for ($i = 0; $i < count($redux_demo['resume_career_level']); $i++) {

				if($stringOriginalLevelCount != 0) {
					$stringOriginalLevelCountPrim = " OR ";
				} else {
					$stringOriginalLevelCountPrim = "";
				}

				$stringOriginalLevel .= $stringOriginalLevelCountPrim."m2.meta_value = '". $redux_demo['resume_career_level'][$i] ."'";

				$stringOriginalLevelCount++;

			 }

		} else {

			for ($countQ = 0; $countQ < count($job_career_level); $countQ++) { 

				if(!empty($job_career_level[$countQ])) { 

					if($stringOriginalLevelCount != 0) {
						$stringOriginalLevelCountPrim = " OR ";
					} else {
						$stringOriginalLevelCountPrim = "";
					}

					$stringOriginalLevel .= $stringOriginalLevelCountPrim."m2.meta_value = '". $job_career_level[$countQ] ."'";

					$stringOriginalLevelCount++;

				}

			  }

		}

		if(!empty($stringOriginalLevel)) {

			$stringLevel = "AND m2.meta_key = 'job_career_level'  AND (" . $stringOriginalLevel . ")";

		} else {

			$stringLevel = "";

		}*/
		// End Job Career Level Filter

		// Job Career Level Filter
  		/*$job_location = $_POST['company_location'];
		$job_location_all = $_POST['company_location_all'];

		$stringOriginalLocation = '';
		$stringOriginalLocationCount = 0;

		if($job_location_all == 1) {

			global $redux_demo; 
			for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {

				if($stringOriginalLocationCount != 0) {
					$stringOriginalLocationCountPrim = " OR ";
				} else {
					$stringOriginalLocationCountPrim = "";
				}

				$stringOriginalLocation .= $stringOriginalLocationCountPrim."m3.meta_value = '". $redux_demo['resume-locations'][$i] ."'";

				$stringOriginalLocationCount++;

			 }

		} else {

			for ($countQ = 0; $countQ < count($job_location); $countQ++) { 

				if(!empty($job_location[$countQ])) { 

					if($stringOriginalLocationCount != 0) {
						$stringOriginalLocationCountPrim = " OR ";
					} else {
						$stringOriginalLocationCountPrim = "";
					}

					$stringOriginalLocation .= $stringOriginalLocationCountPrim."m3.meta_value = '". $job_location[$countQ] ."'";

					$stringOriginalLocationCount++;

				}

			  }

		}

		if(!empty($stringOriginalLocation)) {

			$stringLocation = "AND m3.meta_key = 'job_location'  AND (" . $stringOriginalLocation . ")";

		} else {

			$stringLocation = "";

		}*/
		// End Job Career Level Filter

		// Job Presence Filter
  		/*$job_presence = $_POST['company_presence'];
		$job_presence_all = $_POST['filters_presence_all'];

		$stringOriginalPresence = '';
		$stringOriginalPresenceCount = 0;

		if($job_presence_all == 1) {

			global $redux_demo; 
			for ($i = 0; $i < count($redux_demo['job_presence_type']); $i++) {

				if($stringOriginalPresenceCount != 0) {
					$stringOriginalPresenceCountPrim = " OR ";
				} else {
					$stringOriginalPresenceCountPrim = "";
				}

				$stringOriginalPresence .= $stringOriginalPresenceCountPrim."m4.meta_value = '". $redux_demo['job_presence_type'][$i] ."'";

				$stringOriginalPresenceCount++;

			 }

		} else {

			for ($countQ = 0; $countQ < count($job_presence); $countQ++) { 

				if(!empty($job_presence[$countQ])) { 

					if($stringOriginalPresenceCount != 0) {
						$stringOriginalPresenceCountPrim = " OR ";
					} else {
						$stringOriginalPresenceCountPrim = "";
					}

					$stringOriginalPresence .= $stringOriginalPresenceCountPrim."m4.meta_value = '". $job_presence[$countQ] ."'";

					$stringOriginalPresenceCount++;

				}

			  }

		}

		if(!empty($stringOriginalPresence)) {

			$stringPresence = "AND m4.meta_key = 'job_presence_type'  AND (" . $stringOriginalPresence . ")";

		} else {

			$stringPresence = "";

		}*/
		// End Job Presence Filter

		// Job Experience Years Filter
  		/*$comp_est_year = $_POST['comp_est_year'];

		if(!empty($comp_est_year)) {

			$stringEstYear = "AND m5.meta_key = 'job_years_of_exp' AND m5.meta_value >= ".$comp_est_year."";

		} else {

			$stringEstYear = "";

		}*/
		// End Experience Years Filter

		// Job Salary Filter
		/*$comp_min_team = $_POST['comp_min_team'];
		$comp_max_team = $_POST['comp_max_team'];

		if(!empty($comp_min_team)) {

			$string_comp_min_team = "AND m6.meta_key = 'wpjobus_job_remuneration_raw' AND m6.meta_value >= ".$comp_min_team."";

		} else {

			$string_comp_min_team = "";

		}

		if(!empty($comp_max_team)) {

			$string_comp_max_team = "AND m7.meta_key = 'wpjobus_job_remuneration_raw' AND m7.meta_value <= ".$comp_max_team."";

		} else {

			$string_comp_max_team = "";

		}*/
		// End Salary Filter

		// Keyword search filter
		$keyword = $_POST['comp_keyword'];

		if(!empty($keyword)) {
			$stringLocation = "AND (m2.meta_key = 'job_location' AND m2.meta_value LIKE '%" . $keyword . "%')";	
			$stringKeyword = "OR (m2.meta_key = 'wpjobus_job_fullname' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringindompany = "OR (m2.meta_key = 'ind_company_job_company' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringindompany = "OR (m2.meta_key = 'job_company' AND m2.meta_value in(SELECT DISTINCT p.ID
												FROM  `{$wpdb->prefix}posts` p										
												WHERE p.post_type =  'company'
												AND p.post_status =  'publish' and p.post_title LIKE '%" . $keyword . "%'))";

		} else {

			$stringKeyword = "";
			$stringLocation = "";
			$stringindompany = "";
			
		
		}

		$wpjobus_companies = $wpdb->get_results( "SELECT DISTINCT p.ID
												FROM  `{$wpdb->prefix}posts` p
												LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id											
												WHERE p.post_type =  'job'
												AND p.post_status =  'publish'												
												".$stringLocation."
												".$stringKeyword."
												".$stringindompany."
												ORDER BY  `p`.`ID` DESC");



  		if($companies_map_block == 0) {

			?>

			<ul id="companies-block-list-ul">

			<?php
						  
			foreach($wpjobus_companies as $company) { 
			  	$total_companies++;
			}

			$total_pages = ceil($total_companies/$companies_per_page);
			$current_pos = -1;
			$current_element_id = 0; 

			foreach($wpjobus_companies as $q) { 

				$current_pos++;

			  	if($current_page == 1) {
					$start_loop = 0;
			  	} else {
					$start_loop = ($current_page - 1) * $companies_per_page;
			  	}

			  	$end_loop = $current_page * $companies_per_page;

			  	if($current_pos >= $start_loop && $current_pos <= ($end_loop-1)) {

					$current_element_id++;

					$company_id = $q->ID;

										$result_company_date = get_the_date("Y-m-d h:m:s", $company_id );
										
										$wpjobus_job_fullname = esc_attr(get_post_meta($company_id, 'wpjobus_job_fullname',true));

										$wpjobus_job_longitude = esc_attr(get_post_meta($company_id, 'wpjobus_job_longitude',true));
										
										$wpjobus_job_jobkey = esc_attr(get_post_meta($company_id, '_indeed_jobkey',true));
										
										$wpjobus_ind_job_detail_url = esc_attr(get_post_meta($company_id, 'ind_job_detail_url',true));
										
										$wpjobus_job_latitude = esc_attr(get_post_meta($company_id, 'wpjobus_job_latitude',true));

										$job_company = esc_attr(get_post_meta($company_id, 'job_company',true));
										
										$wpjobus_ind_company_job_company = esc_attr(get_post_meta($company_id, 'ind_company_job_company',true));
										
										if($wpjobus_ind_company_job_company !=""){ 
										$wpjobus_company_fullname = $wpjobus_ind_company_job_company;
										}else{
											$wpjobus_company_fullname = esc_attr(get_post_meta($job_company, 'wpjobus_company_fullname',true));
										}
										
										$wpjobus_company_profile_picture = esc_url(get_post_meta($job_company, 'wpjobus_company_profile_picture',true));

										$job_location = esc_attr(get_post_meta($company_id, 'job_location',true));

			?> 

					<li id="<?php echo $current_element_id; ?>">

						<a href="<?php $companylink = home_url()."/job/".$company_id; echo $companylink; ?>">

							<div class="company-holder-block">

										<span class="company-list-icon">
											<span class="helper"></span>
                      <?php if($wpjobus_job_jobkey!=""){ ?>
											<img src="<?php echo get_stylesheet_directory_uri().'/img/indeed-logo.png'; ?>" alt="<?php echo $wpjobus_job_fullname; ?>" />
                      <?php }else{ ?>
                      <img src="<?php echo $wpjobus_company_profile_picture; ?>" alt="<?php echo $wpjobus_job_fullname; ?>" />
                      <?php } ?>
										</span>

										<span class="company-list-name-block" style="max-width: 380px;">
											<span class="company-list-name"><?php echo $wpjobus_job_fullname; ?></span>
											<span class="company-list-location"><i class="fa fa-briefcase"></i><?php echo $wpjobus_company_fullname; ?><i class="fa fa-map-marker" style="margin-left: 10px;"></i><?php echo $job_location; ?><i class="fa fa-calendar-o" style="margin-left: 10px;"></i><?php echo human_time_diff( strtotime($result_company_date), current_time('timestamp') ) . ' '; _e( 'ago', 'agrg' ); ?>
											</span>
										</span>

										<span class="company-list-view-profile">

											<span class="company-view-profile">
												<span class="company-view-profile-title-holder">
													<span class="company-view-profile-title"><?php _e( 'View', 'agrg' ); ?></span>
													<span class="company-view-profile-subtitle"><?php _e( 'Job Offer', 'agrg' ); ?></span>
												</span>
												<i class="fa fa-eye"></i>
											</span>

										</span>

										<span class="company-list-badges" style="margin-top: 19px;">

											<?php

												global $redux_demo;
												$colorState = 0;

												if(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][0] ) {
													$colorState = 1;
													$color = "#16a085";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][1] ) {
													$colorState = 1;
													$color = "#3498db";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][2] ) {
													$colorState = 1;
													$color = "#e74c3c";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][3] ) {
													$colorState = 1;
													$color = "#1abc9c";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][4] ) {
													$colorState = 1;
													$color = "#8e44ad";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][5] ) {
													$colorState = 1;
													$color = "#9b59b6";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][6] ) {
													$colorState = 1;
													$color = "#34495e";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][7] ) {
													$colorState = 1;
													$color = "#e67e22";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][8] ) {
													$colorState = 1;
													$color = "#e74c3c";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][9] ) {
													$colorState = 1;
													$color = "#16a085";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][10] ) {
													$colorState = 1;
													$color = "#2980b9";
												} elseif(($wpjobus_job_type = get_post_meta($company_id, 'wpjobus_job_type',true)) == $redux_demo['job-type'][11] ) {
													$colorState = 1;
													$color = "#2ecc71";
												}

											?>

											<span class="job-offers-post-badge" style="max-width: 220px; <?php if($colorState ==1) { ?>background-color: <?php echo $color; ?>; border: solid 2px <?php echo $color; ?>;<?php } ?>">
												<span class="job-offers-post-badge-job-type" style="width: 110px; <?php if($colorState ==1) { ?>color: <?php echo $color; ?>;<?php } ?>"><?php  if($wpjobus_job_jobkey!=""){ echo 'View'; }else{ echo $wpjobus_job_type = esc_attr(get_post_meta($company_id, 'wpjobus_job_type',true)); } ?></span>
                        <?php  if($wpjobus_job_jobkey!=""){ ?>
                        <span class="job-offers-post-badge-amount-per">&nbsp;</span>
												<span class="job-offers-post-badge-amount-per">@indeed</span>
                        <?php }else{ ?>
                        <span class="job-offers-post-badge-amount"><?php echo $wpjobus_job_remuneration = esc_attr(get_post_meta($company_id, 'wpjobus_job_remuneration',true)); ?></span>
												<span class="job-offers-post-badge-amount-per">/<?php echo $wpjobus_job_remuneration_per = esc_attr(get_post_meta($company_id, 'wpjobus_job_remuneration_per',true)); ?></span>
                        <?php } ?>
											</span>

										</span>

									</div>

						</a>

					</li>

			  	<?php } } ?>

			</ul>

			<?php if($current_element_id == 0) { ?>

			  	<div class="full"><h4><?php _e( 'Well, it looks like there are no results matching your criterias.', 'agrg' ); ?></h4></div>

			<?php }

			if($total_pages > 1) {  

			  	$wpcook_pagination = array(
					  'base' => @add_query_arg('page','%#%'),
					  'format' => '',
					  'total' => $total_pages,
					  'current' => $current_page,
					  'prev_next' => true,
					  'prev_text'    => __('« Previous', 'agrg'),
					  'next_text'    => __('Next »', 'agrg'),
					  'type' => 'plain',
					  );

			  	$wpcook_pagination['base'] = '#%#%';

			  	if( !empty($wp_query->query_vars['s']) )
					$wpcook_pagination['add_args'] = array('s'=>get_query_var('s'));

					echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 
			}

			$response = ob_get_contents();

		}


	} else {

		$response = 0;

  	}

  	die(); // this is required to return a proper result

}
add_action( 'wp_ajax_wpjobusSubmitJobsFilter', 'wpjobusSubmitJobsFilter1' );
add_action( 'wp_ajax_nopriv_wpjobusSubmitJobsFilter', 'wpjobusSubmitJobsFilter1' );

