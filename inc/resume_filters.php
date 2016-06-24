<?php

function wpjobusSubmitResumesFilter1() {

	
  	if ( isset( $_POST['wpjobusSubmitResumesFilter_nonce'] ) && wp_verify_nonce( $_POST['wpjobusSubmitResumesFilter_nonce'], 'wpjobusSubmitResumesFilter_html' ) ) {

  		global $wpdb, $companies_per_page, $total_companies, $total_pages, $current_page, $wpjobus_companies;

		$companies_per_page = 18;

		$total_companies = 0;

		//$current_page = $_POST['companies_current_page'];

		if(isset($_POST['comp_keyword'])&& $_POST['comp_keyword']!=''){ 
			
			$current_page = 1;

		}else{ $current_page = $_POST['companies_current_page'];

		}

  		$companies_map_block = $_POST['companies_map_block'];
        $followers_id = $_POST['followers_id'];
        	
        	 $keyword = $_POST['comp_keyword'];

  	

		// Keyword search filter
		$keyword = trim($_POST['comp_keyword']);

		if(!empty($keyword)) {

			$stringKeyword = "AND (m2.meta_key = 'wpjobus_resume_fullname' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeywordtitle = "OR (m2.meta_key = 'wpjobus_resume_prof_title' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeywordlocation = "OR (m2.meta_key = 'resume_location' AND m2.meta_value LIKE '%" . $keyword . "%')";


		} else {

			$stringKeyword = "";
			$stringKeywordtitle = "";
			$stringKeywordlocation = "";


		}
		// End keyword search filter
	
		$myquery1 ="SELECT DISTINCT p.ID
		FROM  `{$wpdb->prefix}posts` p												
				LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id
				WHERE p.post_type = 'resume'
				AND p.post_status = 'publish'
				".$stringKeyword."
				".$stringKeywordtitle."
				".$stringKeywordlocation."
				ORDER BY  `p`.`ID` DESC";


        //echo $myquery1;

		$wpjobus_companies = $wpdb->get_results($myquery1);
		if(!empty($followers_id)){
			$wpjobus_companies= $wpdb->get_results("
															SELECT *
															FROM wp_users
															JOIN wp_postmeta ON wp_users.ID = wp_postmeta.meta_value
															JOIN wp_posts ON wp_users.ID = wp_posts.post_author
															WHERE wp_postmeta.post_id =".$followers_id."
															AND wp_posts.post_type LIKE '%resume%'
															AND wp_postmeta.meta_key LIKE '%company-followers%'
															AND wp_users.user_url LIKE '%http://careeriam.com%'");
			
		}

if(!empty($keyword) && !empty($followers_id)) {
	$stringKeyword = "AND (wp_users.user_login LIKE '%" . $keyword . "%')";
			/*$stringKeywordtitle = "OR (m2.meta_key = 'wpjobus_resume_prof_title' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeywordlocation = "OR (m2.meta_key = 'resume_location' AND m2.meta_value LIKE '%" . $keyword . "%')";*/
			$wpjobus_companies = $wpdb->get_results( "SELECT DISTINCT wp_users.ID
	FROM wp_users
	JOIN wp_postmeta ON wp_users.ID = wp_postmeta.meta_value
	JOIN wp_posts ON wp_users.ID = wp_posts.post_author
	WHERE wp_postmeta.post_id =86
	AND wp_posts.post_type LIKE '%resume%'
	AND wp_postmeta.meta_key LIKE '%company-followers%'
	AND wp_users.user_url LIKE '%http://careeriam.com%'".$stringKeyword."");

}

//print_r($wpjobus_companies);

  		if($companies_map_block == 0) {

			?>

			<div class="listing-results" id="companies-block-list-ul">

				<?php
							  
				foreach($wpjobus_companies as $company) { 
				  	$total_companies++;
				}

				$total_pages = ceil($total_companies/$companies_per_page);
				$current_pos = -1;
				$current_element_id = 0; 

				/* pagination starts */

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


				/* pagination end */

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

						//$company_user_id = $q->post_author;

						$result_company_date = get_the_date("Y-m-d h:m:s", $company_id );
											
						$wpjobus_resume_fullname = esc_attr(get_post_meta($company_id, 'wpjobus_resume_fullname',true));

						$wpjobus_resume_longitude = get_post_meta($company_id, 'wpjobus_resume_longitude',true);
						$wpjobus_resume_latitude = get_post_meta($company_id, 'wpjobus_resume_latitude',true);

						$wpjobus_resume_profile_picture = esc_attr(get_post_meta($company_id, 'wpjobus_resume_profile_picture',true));

						$resume_location = esc_attr(get_post_meta($company_id, 'resume_location',true));

						$wpjobus_resume_job_type = get_post_meta($company_id, 'wpjobus_resume_job_type',true);

						$wpjobus_resume_prof_title = esc_attr(get_post_meta($company_id, 'wpjobus_resume_prof_title',true));

						$wpjobus_resume_remuneration = get_post_meta($company_id, 'wpjobus_resume_remuneration',true);
						$wpjobus_resume_remuneration_per = get_post_meta($company_id, 'wpjobus_resume_remuneration_per',true);

						$resume_years_of_exp = esc_attr(get_post_meta($company_id, 'resume_years_of_exp',true));

				?> 

					<div id="<?php echo $current_element_id; ?>" class="result-list">

						<a class="resumelists" href="<?php $companylink = home_url()."/resume/".$company_id; $register_link = home_url()."/register/"; if(is_user_logged_in()){ echo $companylink; }else{ echo $register_link; } ?>">

							<div class="list-icon">
								<?php 

									require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
									$params = array( 'width' => 50, 'height' => 50, 'crop' => true );

									if($wpjobus_resume_profile_picture!=""){
											?>	
										

											<img src="<?php echo bfi_thumb( "$wpjobus_resume_profile_picture", $params ); ?>" alt="<?php echo $wpjobus_resume_fullname; ?>" />
										
										
										<?php }else{ ?>	
                                       
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/user-default.png" alt="<?php echo $wpjobus_resume_fullname; ?>" />
                                        
                                        <?php } ?>

								</div>
								<div class="list-details">			
								
										<div class="title">
											<h3>
												<?php 

												if(!empty($wpjobus_resume_fullname)){
												echo $wpjobus_resume_fullname; }

												else{

												$user_info = get_userdata($company_id);
												echo $user_info->display_name;

												}?>
											</h3>
										
											<span class="designation"><?php echo $resume_industry; ?></span>
										
										</div>	
								
										
										<div class="loc">	
											    <span><?php echo $resume_location; ?></span>
										</div>

									</span>
								
								</span>

                                </div>



							
								

						

						</a>
					   <div class="list-action" >
						<?php 
							
							/*$postdata = get_post($company_id, ARRAY_A);
							$company_user_id = $postdata['post_author'];
							bp_add_friend_button($company_user_id);*/ ?>

							<?php //echo $company_id;

							  $company_user_id = $wpdb->get_var("SELECT post_author FROM `wp_posts` WHERE `ID` = $company_id ");
						     
							  bp_add_friend_button($company_user_id);
							  
						?>
					    
						</div>  
					
					</div>

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

			  	$wpcook_pagination['base'] = '#%#%';

			  	if( !empty($wp_query->query_vars['s']) )
					$wpcook_pagination['add_args'] = array('s'=>get_query_var('s'));

					echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 
			}

			$response = ob_get_contents();

			?>
			</div>

		<?php } elseif($companies_map_block == 1) {

			?>

		

			<?php

			$response = ob_get_contents();

		}


	} else {

		$response = 0;

  	}

  	die(); // this is required to return a proper result

}
add_action( 'wp_ajax_wpjobusSubmitResumesFilter', 'wpjobusSubmitResumesFilter1' );
add_action( 'wp_ajax_nopriv_wpjobusSubmitResumesFilter', 'wpjobusSubmitResumesFilter1' );


function wpjobusSubmitResumesFilter_associate(){
		

								if($_REQUEST['rsacc']!="")
								{
									$acuserId=$_REQUEST['rsacc'];
								}else{
									$acuserId = get_current_user_id();
								}
								
								$margs = array('user_id' => $acuserId);
								if ( bp_has_members( $margs ) ) :

								$arr ='';
								while ( bp_members() ) : bp_the_member();

								$arr .= bp_get_member_user_id().',';
								endwhile; 
								$arr .='0';

								endif;
		
								global $companies_per_page, $total_companies, $total_pages, $current_page, $wpdb;



								$companies_per_page = 3;
								

								$current_page = $_POST['companies_current_page'];

						  		$companies_map_block = $_POST['companies_map_block'];


								$total_companies = 0;



								


								$wpjobus_companies = $wpdb->get_results( "SELECT DISTINCT p.ID, p.post_author

																	FROM  `{$wpdb->prefix}posts` p

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id

																	LEFT JOIN  `{$wpdb->prefix}users` u ON p.post_author = u.id

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id

																	WHERE p.post_type =  'resume'
																	
																	AND p.post_author in (".$arr.")

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

								$current_user_id = $acuserId;
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

				                      	//echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 



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

										$company_user_id = $q->post_author;



										$result_company_date = get_the_date("Y-m-d h:m:s", $company_id );

										

										$wpjobus_resume_fullname = esc_attr(get_post_meta($company_id, 'wpjobus_resume_fullname',true));



										$wpjobus_resume_longitude = esc_attr(get_post_meta($company_id, 'wpjobus_resume_longitude',true));

										$wpjobus_resume_latitude = esc_attr(get_post_meta($company_id, 'wpjobus_resume_latitude',true));



										$wpjobus_resume_profile_picture = esc_url(get_post_meta($company_id, 'wpjobus_resume_profile_picture',true));



										$resume_location = esc_attr(get_post_meta($company_id, 'resume_location',true));



										$wpjobus_resume_job_type = esc_attr(get_post_meta($company_id, 'wpjobus_resume_job_type',true));



										$wpjobus_resume_prof_title = esc_attr(get_post_meta($company_id, 'wpjobus_resume_prof_title',true));



										$wpjobus_resume_remuneration = esc_attr(get_post_meta($company_id, 'wpjobus_resume_remuneration',true));

										$wpjobus_resume_remuneration_per = esc_attr(get_post_meta($company_id, 'wpjobus_resume_remuneration_per',true));



										$resume_years_of_exp = esc_attr(get_post_meta($company_id, 'resume_years_of_exp',true));

										 $resume_industry = esc_attr(get_post_meta($company_id, 'resume_industry',true));



							?> 


          
			
			
		<!-- Single Result item Starts  associates result starts -->
          <?php 
			$findme   = $_POST['comp_keyword'];
						$pos1 = stripos($wpjobus_resume_fullname, $findme);
						$pos2 = stripos($resume_industry, $findme);
						$pos3 = stripos($resume_location, $findme);

						if($_POST['comp_keyword']!='' && ( $pos1 !== false || $pos2 !== false || $pos3 !== false)){ 

						?>
            
		 <div class="result-list">
                <div class="list-icon">
                  <?php 

					require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
					$params = array( 'width' => 50, 'height' => 50, 'crop' => true );

					?>
					
					<?php	if($wpjobus_resume_profile_picture!=""){ ?>

					<img src="<?php echo bfi_thumb( "$wpjobus_resume_profile_picture", $params ); ?>" alt="<?php echo $wpjobus_resume_fullname; ?>" />
					
					<?php }else{ ?>	

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/user-default.png" alt="<?php echo $wpjobus_resume_fullname; ?>" />

					<?php } ?>


                </div>
                <div class="list-details">
                  <div class="title">
                    <h3><?php echo $wpjobus_resume_fullname; ?></h3>
                    <span class="designation"><?php echo $resume_industry; ?></span>
                  </div>
                  <div class="loc">
                    <span><?php echo $resume_location; ?></span>
                  </div>
                </div>
                <div class="list-action">
                  
				  <?php bp_add_friend_button($company_user_id); ?>

                </div>
            </div>
	
	       <?php } ?>

		   <!-- search functionlity -->
         
        <!-- Single Result item Ends-->
   
            <?php } } ?>
			


<!--  New Code Starts  working code -->


		       <ul>
                     
					 <?php 
					 
					  /* https://codex.buddypress.org/developer/loops-reference/the-members-loop/#accepted-parameters 
					  
					    user_id optional
						Limit the members returned to only friend connections of the logged in user.

					  */

					    //echo $post->post_author;
						
							global $current_user;
							$userid = $current_user->ID; //echo $userid;	

							if($_POST['usrs_acco']!="")
							{
								$userid=$_POST['usrs_acco'];
							}else{
								$userid = get_current_user_id();
							}

					    $margs = array('user_id' => $userid);
                        if ( bp_has_members( $margs ) ) {
                        while ( bp_members() ) : bp_the_member();
						
						$myquery ="SELECT  p.ID, p.post_author FROM  `{$wpdb->prefix}posts` p LEFT JOIN  `{$wpdb->prefix}users` u ON p.post_author = u.id WHERE p.post_type =  'resume'	AND p.post_author = ".bp_get_member_user_id()." AND p.post_status =  'publish'";
						
					    if(!empty($_POST['comp_keyword'])){
						
							$keyword= trim($_POST['comp_keyword']);
						}
						
          
                 
							$myquery ="SELECT p.ID, p.post_author FROM `wp_posts` p 
							 LEFT JOIN `wp_users` u ON p.post_author = u.id 
							 LEFT JOIN  wp_postmeta m ON p.ID = m.post_id
							 WHERE p.post_type = 'resume' AND p.post_author = ".bp_get_member_user_id()." AND p.post_status = 'publish' AND m.meta_key = 'wpjobus_resume_fullname' AND m.meta_value LIKE '%$keyword%'";
							 
						
						//echo  $myquery;

                        $wpjobus_status = $wpdb->get_results($myquery);  
                        $usr_id = $wpjobus_status[0]->ID;
                        $wpjobus_resume_fullname = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_fullname',true));
                        $resume_location = esc_attr(get_post_meta($usr_id, 'resume_location',true));
                        $wpjobus_resume_prof_title = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_prof_title',true));
                        $wpjobus_assc_profile_picture = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_profile_picture',true));
                 
						if(count($wpjobus_status)>0){  
				 
				 ?>
                    
					
					
					<!-- <li>
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
                      </li> -->


					   <div class="result-list">
			 
			     <a class="resumelists" href="<?php $companylink = home_url()."/resume/".$usr_id; echo $companylink; ?>">
                <div class="list-icon">
                
					<?php 

					require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
					$params = array( 'width' => 50, 'height' => 50, 'crop' => true );

					?>
					
					<?php	if($wpjobus_assc_profile_picture!=""){ ?>

					<img src="<?php echo bfi_thumb( "$wpjobus_assc_profile_picture", $params ); ?>" alt="<?php echo $wpjobus_resume_fullname; ?>" />
					
					<?php }else{ ?>	

							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/user-default.png" alt="<?php echo $wpjobus_resume_fullname; ?>" />

					<?php } ?>


                </div>
				
				<!-- original design -->

				<div class="list-details">
					  <div class="title">
						<h3><?php echo $wpjobus_resume_fullname; ?></h3>
						<span class="designation"><?php echo $resume_industry; ?></span>
					  </div>
					  <div class="loc">
						<span><?php echo $resume_location; ?></span>
					  </div>
					</div>
					</a>

					<div class="list-action">
					 

					  <?php bp_add_friend_button($company_user_id); ?>

					</div>
				</div>

				<?php } ?>
                     
                <!-- original design -->
				  
                     <?php endwhile; ?>

                <?php } ?> 

		  <!--  New code ends   -->


        

				<?php if($current_element_id == 0) { ?>

					<div class="full"><h4><?php _e( 'Well, it looks like there are no results matching your criterias.aa', 'agrg' ); ?></h4></div>

				<?php }  ?>

			<?php						
			
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

				                      	//echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 



								}

								

							?>
          </div>
          <!-- Search Results END-->

<?php

//echo "end here";

}




add_action('wp_ajax_wpjobusSubmitResumesFilter_associate', 'wpjobusSubmitResumesFilter_associate');
function wpjobusSubmitResumesFilter2() {


	}
	add_action( 'wp_ajax_wpjobusSubmitCompaniesFilter', 'wpjobusSubmitResumesFilter2' );
    add_action( 'wp_ajax_nopriv_wpjobusSubmitCompaniesFilter', 'wpjobusSubmitResumesFilter2' );

//company followers fileter

 
function wpjobusSubmitResumesFilterComFollowers() {

	//echo "new function";

	 

  	if ( isset( $_POST['wpjobusSubmitResumesFilterNew_nonce'] ) && wp_verify_nonce( $_POST['wpjobusSubmitResumesFilterNew_nonce'], 'wpjobusSubmitResumesFilterNew_html' ) ) {

  		global $wpdb, $companies_per_page, $total_companies, $total_pages, $current_page, $wpjobus_companies;

		$companies_per_page = 18;

		$total_companies = 0;

		$current_page = $_POST['companies_current_page'];

  		$companies_map_block = $_POST['companies_map_block'];
        $followers_id = $_POST['followers_id'];
        	
        	 $keyword = $_POST['comp_keyword'];

			 $keyword = trim($_POST['comp_keyword']);

		if(!empty($keyword)) {

			$stringKeyword = "AND (m2.meta_key = 'wpjobus_resume_fullname' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeywordtitle = "OR (m2.meta_key = 'wpjobus_resume_prof_title' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeywordlocation = "OR (m2.meta_key = 'resume_location' AND m2.meta_value LIKE '%" . $keyword . "%')";


		} else {

			$stringKeyword = "";
			$stringKeywordtitle = "";
			$stringKeywordlocation = "";


		}
		// End keyword search filter
	
	 	/*$myquery1 ="SELECT DISTINCT p.ID
		FROM  `{$wpdb->prefix}posts` p												
				LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id
				WHERE p.post_type = 'resume'
				AND p.post_status = 'publish'
				".$stringKeyword."
				".$stringKeywordtitle."
				".$stringKeywordlocation."
				ORDER BY  `p`.`ID` DESC";  */




        //echo $myquery1;

	//	$myquery1 ="SELECT  * FROM wp_posts T1 INNER JOIN wp_postmeta T2 ON T1.ID = T2.post_id WHERE T2.meta_key='company-followers' AND T2.meta_value = '10'";

		 //$myquery1 ="SELECT  * FROM wp_users U INNER JOIN wp_postmeta T2 ON U.ID = T2.meta_value WHERE T2.meta_key='company-followers' AND U.user_login='".$_POST['comp_keyword']."' AND T2.post_id='".$_POST['followers_id']."'";

		//$myquery1 ="SELECT  * FROM wp_posts T1 INNER JOIN wp_postmeta T2 ON T1.ID = T2.post_id WHERE T2.meta_key='company-followers'  AND T2.post_id='".$_POST['followers_id']."'";

		 $myquery1 ="SELECT T1.* FROM wp_posts T1 INNER JOIN wp_postmeta T2 ON T1.post_author = T2.meta_value WHERE T2.meta_key='company-followers' AND T2.post_id = '".$_POST['followers_id']."' AND T1.post_type='resume'";

		 //echo $myquery1;

		$wpjobus_companies = $wpdb->get_results($myquery1);

/*

		if(!empty($followers_id)){
			$wpjobus_companies= $wpdb->get_results("
															SELECT *
															FROM wp_users
															JOIN wp_postmeta ON wp_users.ID = wp_postmeta.meta_value
															JOIN wp_posts ON wp_users.ID = wp_posts.post_author
															WHERE wp_postmeta.post_id =".$followers_id."
															AND wp_posts.post_type LIKE '%resume%'
															AND wp_postmeta.meta_key LIKE '%company-followers%'
															AND wp_users.user_url LIKE '%http://careeriam.com%'");
			
		}

if(!empty($keyword) && !empty($followers_id)) {
	$stringKeyword = "AND (wp_users.user_login LIKE '%" . $keyword . "%')";
			/*$stringKeywordtitle = "OR (m2.meta_key = 'wpjobus_resume_prof_title' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeywordlocation = "OR (m2.meta_key = 'resume_location' AND m2.meta_value LIKE '%" . $keyword . "%')";*/
			/*$wpjobus_companies = $wpdb->get_results( "SELECT DISTINCT wp_users.ID
	FROM wp_users
	JOIN wp_postmeta ON wp_users.ID = wp_postmeta.meta_value
	JOIN wp_posts ON wp_users.ID = wp_posts.post_author
	WHERE wp_postmeta.post_id =86
	AND wp_posts.post_type LIKE '%resume%'
	AND wp_postmeta.meta_key LIKE '%company-followers%'
	AND wp_users.user_url LIKE '%http://careeriam.com%'".$stringKeyword."");

}
*/
//print_r($wpjobus_companies);

  		

			?>

			<div class="listing-results" id="companies-block-list-ul">

				<?php
							  
				foreach($wpjobus_companies as $company) { 
				  	$total_companies++;
				}

				$total_pages = ceil($total_companies/$companies_per_page);
				$current_pos = -1;
				$current_element_id = 0; 

				/* pagination starts */

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


				/* pagination end */

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

						//$company_user_id = $q->post_author;

						$result_company_date = get_the_date("Y-m-d h:m:s", $company_id );
											
						$wpjobus_resume_fullname = esc_attr(get_post_meta($company_id, 'wpjobus_resume_fullname',true));

						$wpjobus_resume_longitude = get_post_meta($company_id, 'wpjobus_resume_longitude',true);
						$wpjobus_resume_latitude = get_post_meta($company_id, 'wpjobus_resume_latitude',true);

						$wpjobus_resume_profile_picture = esc_attr(get_post_meta($company_id, 'wpjobus_resume_profile_picture',true));

						$resume_location = esc_attr(get_post_meta($company_id, 'resume_location',true));

						$wpjobus_resume_job_type = get_post_meta($company_id, 'wpjobus_resume_job_type',true);

						$wpjobus_resume_prof_title = esc_attr(get_post_meta($company_id, 'wpjobus_resume_prof_title',true));

						$wpjobus_resume_remuneration = get_post_meta($company_id, 'wpjobus_resume_remuneration',true);
						$wpjobus_resume_remuneration_per = get_post_meta($company_id, 'wpjobus_resume_remuneration_per',true);

						$resume_years_of_exp = esc_attr(get_post_meta($company_id, 'resume_years_of_exp',true));


						$findme   = $_POST['comp_keyword'];
						$pos1 = stripos($wpjobus_resume_fullname, $findme);
						$pos2 = stripos($resume_industry, $findme);
						$pos3 = stripos($resume_location, $findme);

						if($_POST['comp_keyword']!='' && ( $pos1 !== false || $pos2 !== false || $pos3 !== false)){  
				?> 
               

                    <!-- following company user's listed started  -->

					<div id="<?php echo $current_element_id; ?>" class="result-list">

						<a class="resumelists" href="<?php $companylink = home_url()."/resume/".$company_id; $register_link = home_url()."/register/"; if(is_user_logged_in()){ echo $companylink; }else{ echo $register_link; } ?>">

							<div class="list-icon">
								<?php 

									require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
									$params = array( 'width' => 50, 'height' => 50, 'crop' => true );

									if($wpjobus_resume_profile_picture!=""){
											?>	
										

											<img src="<?php echo bfi_thumb( "$wpjobus_resume_profile_picture", $params ); ?>" alt="<?php echo $wpjobus_resume_fullname; ?>" />
										
										
										<?php }else{ ?>	
                                       
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/user-default.png" alt="<?php echo $wpjobus_resume_fullname; ?>" />
                                        
                                        <?php } ?>

								</div>
								<div class="list-details">			
								
										<div class="title">
											<h3>
												<?php 

												if(!empty($wpjobus_resume_fullname)){
												echo $wpjobus_resume_fullname; }

												else{

												$user_info = get_userdata($company_id);
												echo $user_info->display_name;

												}?>
											</h3>
										
											<span class="designation"><?php echo $resume_industry; ?></span>
										
										</div>	
								
										
										<div class="loc">	
											    <span><?php echo $resume_location; ?></span>
										</div>

									</span>
								
								</span>

                                </div>



							
								

						

						</a>
					   <div class="list-action" >
						<?php 
							
							/*$postdata = get_post($company_id, ARRAY_A);
							$company_user_id = $postdata['post_author'];
							bp_add_friend_button($company_user_id);*/ ?>

							<?php //echo $company_id;

							  $company_user_id = $wpdb->get_var("SELECT post_author FROM `wp_posts` WHERE `ID` = $company_id ");
						     
							  bp_add_friend_button($company_user_id);
							  
						?>
					    
						</div>  
					
					</div>

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

			  	$wpcook_pagination['base'] = '#%#%';

			  	if( !empty($wp_query->query_vars['s']) )
					$wpcook_pagination['add_args'] = array('s'=>get_query_var('s'));

					echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 
			}

			$response = ob_get_contents();

			?>
			</div>

		

		 

		

			<?php

			$response = ob_get_contents();

	


	} else {

		$response = 0;

  	}

  	die(); // this is required to return a proper result

}
add_action( 'wp_ajax_wpjobusSubmitResumesFilterNew', 'wpjobusSubmitResumesFilterComFollowers' );
add_action( 'wp_ajax_nopriv_wpjobusSubmitResumesFilterNew', 'wpjobusSubmitResumesFilterComFollowers' );




?>