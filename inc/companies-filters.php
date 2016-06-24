<?php
 
 function wpjobusSubmitCompaniesFilter_following() {
  ?>


				<?php 

								global  $wpdb, $companies_per_page, $total_companies, $total_pages, $current_page,$wp_rewrite;
								
								global $current_user, $user_id, $user_info;
								get_currentuserinfo();
								$user_id = $current_user->ID; 
								
								if($_POST['usrs_compns']!="")
								{
									$user_id = $_POST['usrs_compns'];

								}else{

									$user_id = get_current_user_id();
								}

								$companies_per_page = 18;
								//$companies_per_page = 2;

								$total_companies = 0;

								$current_page = max(1, get_query_var('paged'));


								//$current_page = max(1, get_query_var('paged'));
								$current_page = $_POST['companies_current_page'];

								
								// Keyword search filter
								$keyword = trim($_POST['comp_keyword']);

								if(!empty($keyword)) {

									$stringKeyword = "OR (T2.meta_key = 'wpjobus_company_fullname' AND T2.meta_value LIKE '%" . $keyword . "%')";
									$stringKeywordlocation = "OR (T2.meta_key = 'company_location' AND T2.meta_value LIKE '%" . $keyword . "%')";
									$stringKeywordtitle = "OR  (T2.meta_key = 'wpjobus_resume_prof_title' AND T2.meta_value LIKE '%" . $keyword . "%')";


								} else {

									$stringKeyword = "";
									$stringKeywordtitle = "";
									$stringKeywordlocation = "";


								}

                                /*
								$myquery = "SELECT DISTINCT p.ID	FROM  `{$wpdb->prefix}posts` p
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id
																	WHERE p.post_type =  'company'
																	AND p.post_status =  'publish'
																	AND p.post_author = $user_id
																	".$stringKeyword."
																	".$stringKeywordlocation."
																	".$stringKeywordtitle."
																	ORDER BY  `p`.`ID` DESC";
									*/


							$myquery = " SELECT T1.* FROM wp_posts T1 INNER JOIN wp_postmeta T2 ON T1.ID = T2.post_id WHERE T2.meta_key='company-followers' AND T2.meta_value = $user_id ";

							//echo $myquery;


								$wpjobus_companies = $wpdb->get_results($myquery);
								  
								foreach($wpjobus_companies as $company) { 
									$total_companies++;
								}

								$total_pages = ceil($total_companies/$companies_per_page);

								$current_pos = -1; 

								$current_element_id = 0;  //echo count($wpjobus_companies);

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
										$wpjobus_company_profile_picture = esc_url(get_post_meta($company_id, 'wpjobus_company_profile_picture',true));
										$wpjobus_company_fullname = esc_attr(get_post_meta($company_id, 'wpjobus_company_fullname',true));
										$company_location = esc_attr(get_post_meta($company_id, 'company_location',true));
										$wpjobus_company_foundyear = esc_attr(get_post_meta($company_id, 'wpjobus_company_foundyear',true));
										$company_team_size = esc_attr(get_post_meta($company_id, 'company_team_size',true));
										$company_industry = esc_attr(get_post_meta($company_id, 'company_industry',true));

						?> 

            <?php  
			
			$findme   = $_POST['comp_keyword'];
			$pos1 = stripos($wpjobus_company_fullname, $findme);
			$pos2 = stripos($company_industry, $findme);
			$pos3 = stripos($company_location, $findme);
			
			if($_POST['comp_keyword']!='' && ( $pos1 !== false || $pos2 !== false || $pos3 !== false)){  
			
			
			 ?>   

            <!-- Single Result item Starts-->
            
			<div class="result-list" id="<?php echo $current_element_id; ?>" >
               
				<a href="<?php $companylink = home_url()."/company/".$company_id; echo $companylink; ?>">
				<div class="list-icon">
                  
				  <!-- <img src="images/companies-list_03.png" alt="Companies Icon" /> -->

					<?php 
					if(!empty($wpjobus_company_profile_picture)) {

					require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
						$params = array( 'width' => 85, 'height' => 85, 'crop' => true );
						echo "<img src='" . bfi_thumb( "$wpjobus_company_profile_picture", $params ) . "' alt='" . $wpjobus_company_fullname . "'/>";
						} else {

						?>

						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/company-default.png" alt="<?php echo $wpjobus_company_fullname; ?>" />

					<?php 

					}

					?>

                </div>
                <div class="list-details">
                  <div class="title">
                    <h3><?php echo $wpjobus_company_fullname; ?></h3>
                    <span class="designation"><?php echo $company_industry; ?></span>
                  </div>
                  <div class="loc">
                    <span><?php echo $company_location; ?></span>
                  </div>
                </div>
                </a>

				<div class="list-action">
                  <!-- <a href="#" class="gradient-btn">
                    <span>Follow</span>
                  </a> -->

				  	<?php 
						
					$current_user_id = get_current_user_id();
								 
							if($current_user_id != ""){

								$checkpost_meta = "";
								$checkpost_meta = get_post_meta( $company_id, 'company-followers', false );
								$checkkey = "";
								$checkkey = array_search($current_user_id, $checkpost_meta);
								//print_r(checkpost_meta);
								
								if($checkkey !== false){ 
								?>
									<!-- <div id="myfollow_board"></div>
									<span class="company-follow comfollow<?php echo $company_id; ?>" style="display:none;"> <a class="mfollow gradient-btn" href="javascript:void(0);" onclick="return makeFollow('<?php echo $company_id; ?>');" > Follow </a> </span>		
									<span class="company-following comfollowing<?php echo $company_id; ?>"> <a class="dflow gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $company_id; ?>);">  Following </a></span> -->


								<?php 
								}else{
								?>

									<!-- <div id="myfollow_board"></div>

									<span class="company-follow comfollow<?php echo $company_id; ?>">
									<a class="mfollow gradient-btn" href="javascript:void(0);" onclick="return makeFollow('<?php echo $company_id; ?>');" > Follow </a>
									</span>								
									<span class="company-following comfollowing<?php echo $company_id; ?>" style="display:none;"> <a class="dflow gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $company_id; ?>);">  Following </a>
									</span> -->
								
								<?php 
								}

							}

							?>
                </div>


            </div>
            <!-- Single Result item Ends-->

			<?php } ?>

			<?php } } ?>
            

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

									if( $wp_rewrite->using_permalinks() )
										$wpcook_pagination['base'] = '#%#%';

									if( !empty($wp_query->query_vars['s']) )
										$wpcook_pagination['add_args'] = array('s'=>get_query_var('s'));

									echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 

								}
								
							?> 
            
    
 


<?php
}


add_action( 'wp_ajax_wpjobusSubmitCompaniesFilter_following', 'wpjobusSubmitCompaniesFilter_following');
//add_action( 'wp_ajax_nopriv_wpjobusSubmitCompaniesFilter_following', 'wpjobusSubmitCompaniesFilter_following' );


function wpjobusSubmitCompaniesFilter1() {

  	if ( isset( $_POST['wpjobusSubmitCompaniesFilter_nonce'] ) && wp_verify_nonce( $_POST['wpjobusSubmitCompaniesFilter_nonce'], 'wpjobusSubmitCompaniesFilter_html' ) ) {  //echo "<pre>"; print_r($_POST); exit;
		 

								global $companies_per_page, $total_companies, $total_pages, $current_page, $wpdb, $wp_rewrite;
								
								global $current_user, $user_id, $user_info;
								get_currentuserinfo();
								$user_id = $current_user->ID;                               

								//$companies_per_page = 18;
								$companies_per_page = 10;

								$total_companies = 0;
                                
							

								//$current_page = max(1, get_query_var('paged'));
								//$current_page = $_POST['companies_current_page'];

								if(isset($_POST['comp_keyword'])&& $_POST['comp_keyword']!=''){ 

									$current_page = 1;

								}else{
								
									$current_page = $_POST['companies_current_page'];
								}

								
								// Keyword search filter
								$keyword = trim($_POST['comp_keyword']);

								if(!empty($keyword)) {

									$stringKeyword = "AND (m2.meta_key = 'wpjobus_company_fullname' AND m2.meta_value LIKE '%" . $keyword . "%')";
									$stringKeywordtitle = "OR (m2.meta_key = 'wpjobus_resume_prof_title' AND m2.meta_value LIKE '%" . $keyword . "%')";
									$stringKeywordlocation = "OR (m2.meta_key = 'company_location' AND m2.meta_value LIKE '%" . $keyword . "%')";


								} else {

									$stringKeyword = "";
									$stringKeywordtitle = "";
									$stringKeywordlocation = "";


								}



								$myquery = "SELECT DISTINCT p.ID	FROM  `{$wpdb->prefix}posts` p
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id
																	WHERE p.post_type =  'company'
																	AND p.post_status =  'publish'
																	".$stringKeyword."
																	".$stringKeywordlocation."
																	".$stringKeywordtitle."
																	ORDER BY  `p`.`ID` DESC";
								//echo $myquery;


								$wpjobus_companies = $wpdb->get_results($myquery);
								  
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
									
									//echo "=curr=".$current_pos."start loop=".$start_loop."AND =current pos=".$current_pos."end_loop=".$end_loo;

									if($current_pos >= $start_loop && $current_pos <= ($end_loop-1)) { //echo "line 310"."<br>";

										$current_element_id++;

										$company_id = $q->ID;
										$wpjobus_company_profile_picture = esc_url(get_post_meta($company_id, 'wpjobus_company_profile_picture',true));
										$wpjobus_company_fullname = esc_attr(get_post_meta($company_id, 'wpjobus_company_fullname',true));
										$company_location = esc_attr(get_post_meta($company_id, 'company_location',true));
										$wpjobus_company_foundyear = esc_attr(get_post_meta($company_id, 'wpjobus_company_foundyear',true));
										$company_team_size = esc_attr(get_post_meta($company_id, 'company_team_size',true));

										$company_industry = esc_attr(get_post_meta($company_id, 'company_industry',true));


						?> 

            <!-- Single Result item Starts-->
            
			<div class="result-list" id="<?php echo $current_element_id; ?>" >
               
				<a href="<?php $companylink = home_url()."/company/".$company_id; echo $companylink; ?>">
				<div class="list-icon">
                  
				  <!-- <img src="images/companies-list_03.png" alt="Companies Icon" /> -->

					<?php 
					if(!empty($wpjobus_company_profile_picture)) {

					require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
						$params = array( 'width' => 85, 'height' => 85, 'crop' => true );
						echo "<img src='" . bfi_thumb( "$wpjobus_company_profile_picture", $params ) . "' alt='" . $wpjobus_company_fullname . "'/>";
						} else {

						?>

						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/company-default.png" alt="<?php echo $wpjobus_company_fullname; ?>" />

					<?php 

					}

					?>

                </div>
                <div class="list-details">
                  <div class="title">
                    <h3><?php echo $wpjobus_company_fullname; ?></h3>
                    <span class="designation"><?php echo $company_industry; ?></span>
                  </div>
                  <div class="loc">
                    <span><?php echo $company_location; ?></span>
                  </div>
                </div>
                </a>

				<div class="list-action">
                  <!-- <a href="#" class="gradient-btn">
                    <span>Follow</span>
                  </a> -->

				  	<?php 
						
					$current_user_id = get_current_user_id();
								 
							if($current_user_id != ""){

								$checkpost_meta = "";
								$checkpost_meta = get_post_meta( $company_id, 'company-followers', false );
								$checkkey = "";
								$checkkey = array_search($current_user_id, $checkpost_meta);
								//print_r(checkpost_meta);
								
								if($checkkey == ""){ 
								?>
									<div id="myfollow_board"></div>

									<span class="company-follow comfollow<?php echo $company_id; ?>">
									<a class="mfollow gradient-btn" href="javascript:void(0);" onclick="return makeFollow('<?php echo $company_id; ?>');" > Follow </a>
									</span>								
									<span class="company-following comfollowing<?php echo $company_id; ?>" style="display:none;"> <a class="dflow gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $company_id; ?>);">  Following </a>
									</span>
								<?php 
								}else{
								?>
									<div id="myfollow_board"></div>
									<span class="company-follow comfollow<?php echo $company_id; ?>" style="display:none;"> <a class="mfollow gradient-btn" href="javascript:void(0);" onclick="return makeFollow('<?php echo $company_id; ?>');" > Follow </a> </span>		
									<span class="company-following comfollowing<?php echo $company_id; ?>"> <a class="dflow gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $company_id; ?>);">  Following </a></span>
								<?php 
								}

							}

							?>
                </div>


            </div>
            <!-- Single Result item Ends-->

			<?php } } ?>
            

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

									if( $wp_rewrite->using_permalinks() )
										$wpcook_pagination['base'] = '#%#%';

									if( !empty($wp_query->query_vars['s']) )
										$wpcook_pagination['add_args'] = array('s'=>get_query_var('s'));

									echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 

								}
								
							?> 
            
         <?php
    


	} else {

		$response = 0;

  	}

  	die(); // this is required to return a proper result

}
add_action( 'wp_ajax_wpjobusSubmitCompaniesFilter', 'wpjobusSubmitCompaniesFilter1' );
add_action( 'wp_ajax_nopriv_wpjobusSubmitCompaniesFilter', 'wpjobusSubmitCompaniesFilter1' );

