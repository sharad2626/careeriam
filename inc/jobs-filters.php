<?php

function wpjobusSubmitJobsFilter1() {

 
  	if ( isset( $_POST['wpjobusSubmitJobsFilter_nonce'] ) && wp_verify_nonce( $_POST['wpjobusSubmitJobsFilter_nonce'], 'wpjobusSubmitJobsFilter_html' ) ) {

  		global $wpdb, $companies_per_page, $total_companies, $total_pages, $current_page, $wpjobus_companies;

		$companies_per_page = 18;

		$total_companies = 0;


		if(isset($_POST['comp_keyword'])&& $_POST['comp_keyword']!=''){ 
			
			$current_page = 1;
		
		}else{
			$current_page = $_POST['companies_current_page'];
		}

  		$companies_map_block = $_POST['companies_map_block'];

  	

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

		 <div class="listing-results" id="companies-block">
		  <div id="companies-block-list-ul">
            <!-- Single Result item Starts-->
              <?php 

								//global $companies_per_page, $total_companies, $total_pages, $current_page;

								$companies_per_page = 18;

								$total_companies = 0;

								//$current_page = max(1, get_query_var('paged'));

								$wpjobus_companies = $wpdb->get_results( "SELECT DISTINCT p.ID
																	FROM  `{$wpdb->prefix}posts` p
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id
																	WHERE p.post_type =  'job'
																	AND p.post_status =  'publish'
																	".$string."
																	".$stringLocation."
																	".$stringKeyword."
																	ORDER BY  `p`.`ID` DESC");
								  
								foreach($wpjobus_companies as $company) { 
									$total_companies++;
								}

								$total_pages = ceil($total_companies/$companies_per_page);

								$current_pos = -1; 

								$current_element_id = 0;
								if($total_pages > 1) {  

							$wpcook_pagination = array(
								'base' => @add_query_arg('page','%#%'),
								'format' => '',
								'total' => $total_pages,
								'current' => $current_page,
								'prev_next' => true,
								'prev_text'    => __('Previous', 'agrg'),
								'next_text'    => __('Next', 'agrg'),
								'type' => 'plain',
								);

							//if( $wp_rewrite->using_permalinks() )
								$wpcook_pagination['base'] = '#%#%';

							if( !empty($wp_query->query_vars['s']) )
								$wpcook_pagination['add_args'] = array('s'=>get_query_var('s'));

							echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 

						}
						

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

										$wpjobus_job_cover_image = esc_url(get_post_meta($company_id, 'wpjobus_job_cover_image',true));
										$wpjobus_job_jobkey = esc_attr(get_post_meta($company_id, '_indeed_jobkey',true));

							?> 
							<?php 
								if($wpjobus_ind_job_detail_url !=""){ 
									$companylink = $wpjobus_ind_job_detail_url;
									$lk_target = '_blank'; 
								 }else{ 
								 	$companylink = home_url()."/job-details/?post=".$company_id;
									$lk_target = '_self'; 
								 }
								 ?>
            <a class="job_pg_link" href="<?php  $register_link = home_url()."/register/"; if(is_user_logged_in()){  echo  $companylink;  }else{ $register_link;  } ?>" target="<?php if(is_user_logged_in()){ echo $lk_target; }else{ $register_link;   } ?>" >

             <div class="result-list">
                <div class="list-icon">
					<?php if($wpjobus_job_jobkey!=""){ ?>
						<img src="<?php echo get_stylesheet_directory_uri().'/img/indeed-logo.png'; ?>" alt="Indeed logo" />
				
				<?php }elseif($wpjobus_job_cover_image!=''){ ?>
                
				  <img src="<?php echo $wpjobus_job_cover_image;  ?>" alt="Companies Icon" width="78" height="78" />
                  <?php }else{?>
                    
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/user-default.png" alt="Companies Icon" width="78" height="78" />

                   <?php }?>
                </div>
                <div class="list-details">
                  <div class="title">
                    <h3><?php echo $wpjobus_job_fullname; ?></h3>
                    <span class="designation"><?php echo $wpjobus_company_fullname; ?></span>
                  </div>
                  <div class="loc">
                    <span><?php echo $job_location; ?></span>
                  </div>
                </div>
                <div class="list-action">
                 <?php if(is_user_logged_in()){ ?>

				  <a  href="<?php $joblink = home_url()."/job-details/?post=".$company_id;  echo $joblink; ?>" class="gradient-btn" target="_blank">
                    <span>View</span>
				  <?php } ?>

                  </a>

                </div>
            </div>
			
			</a>
			
			
            <?php } } ?> 
			</div> 

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
					  'prev_text'    => __('Previous', 'agrg'),
					  'next_text'    => __('Next', 'agrg'),
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

