<?php
/**
 * Template name: User following Company
 */


if(!is_user_logged_in()){ 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

}

//echo "hi";
//die();
$page = get_page($post->ID);
$current_page_id = $page->ID;

//get_header(); 

get_template_part('header-myaccount');
//get_template_part('header-add-company');

?>

	<?php 

		// Retrieve the URL variables (using PHP).
		if (isset($_GET['keyword'])) {
		    $keyword = $_GET['keyword'];
		} else {
		    $keyword = "";
		}

		if (isset($_GET['company_location'])) {
		    $job_location = $_GET['company_location'];
		} else {
		    $job_location = "";
		}

		if($job_location == "all") {
			$job_location = "";
		}

		if (isset($_GET['company_industry'])) {
		    $job_type = $_GET['company_industry'];
		} else {
		    $job_type = "";
		}

		if($job_type == "all") {
			$job_type = "";
		}

		if(!empty($job_type)) {

			$string = "AND m.meta_key = 'company_industry' AND m.meta_value LIKE '%" . $job_type . "%'";

		} else {

			$string = "";

		}

		if(!empty($job_location)) {

			$stringLocation = "AND m2.meta_key = 'company_location' AND m2.meta_value = '" . $job_location . "'";

		} else {

			$stringLocation = "";

		}

		if(!empty($keyword)) {

			$stringKeyword = "AND (m4.meta_key = 'wpjobus_company_fullname' AND m4.meta_value LIKE '%" . $keyword . "%')";

		} else {

			$stringKeyword = "";

		}

	?>

	<!-- 

	<section id="blog" style="padding-top: 0; margin-top: 25px;">

		<div class="container">

			<div class="resume-skills">

				<form id="wpjobus-companies" type="post" action="" >

					<div class="two_third first">

						<div class="full">
							<h1 class="resume-section-title"><i class="fa fa-search"></i><?php _e( 'Search for Companies', 'agrg' ); ?></h1>
							<h3 class="resume-section-subtitle" style="margin-bottom: 0;"><?php _e( 'Use our awesome search tool to find companies’profiles!', 'agrg' ); ?></h3>
						</div>

						<div class="full" style="margin-bottom: 0;">
							<div class="loading"><i class="fa fa-spinner fa-spin"></i></div>
						</div>

						

					</div>

					<div class="one_third">

						<?php 

							$currentDate = current_time('timestamp');

							$total_jobs = 0;

							$wpjobus_jobs = $wpdb->get_results( "SELECT DISTINCT p.ID
																FROM  `wp_posts` p
																LEFT JOIN  `wp_postmeta` m ON p.ID = m.post_id
																WHERE p.post_type = 'company'
																AND p.post_status = 'publish'
																AND m.meta_key = 'wpjobus_featured_expiration_date' 
																AND m.meta_value >= '".$currentDate."'
																ORDER BY RAND()");

							foreach($wpjobus_jobs as $q) { 
							  	$total_jobs++;
							}

							if($total_jobs > 0) {

								$curren_job = 0;

						?>

						<span class="filters-title"><i class="fa fa-star"></i><?php _e( 'Featured Companies!', 'agrg' ); ?></span>

						<div id="owl-demo" class="owl-carousel owl-theme featured-items">

							<?php foreach($wpjobus_jobs as $job) {

								$curren_job++; 
								  	
								$job_id = $job->ID;

								if($curren_job <= 5) {

							?>

							<div class="item">

						  		<a href="<?php $link_job = home_url()."/company/".$job_id; echo $link_job; ?>">

							  		<div class="featured-item">

							  			<span class="featured-item-image">

							  				<?php 

							  					$wpjobus_company_cover_image = esc_url(get_post_meta($job_id, 'wpjobus_company_cover_image',true));
							  					$wpjobus_company_fullname = esc_attr(get_post_meta($job_id, 'wpjobus_company_fullname',true));
												$wpjobus_company_tagline = esc_attr(get_post_meta($job_id, 'wpjobus_company_tagline',true));
												$wpjobus_company_foundyear = esc_attr(get_post_meta($job_id, 'wpjobus_company_foundyear',true));
												$company_location = esc_attr(get_post_meta($job_id, 'company_location',true));
												$wpjobus_company_profile_picture = esc_url(get_post_meta($job_id, 'wpjobus_company_profile_picture',true));

									    		$total_jobs = 0;

									    		$company_jobs = $wpdb->get_results( "SELECT p.ID
																					FROM  `{$wpdb->prefix}posts` p
																					LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id
																					WHERE p.post_type = 'job'
																					AND (p.post_status = 'publish' or p.post_status = 'draft' or p.post_status = 'pending')
																					AND m.meta_key = 'job_company' AND m.meta_value = '".$job_id."'
																					");
						  
												foreach($company_jobs as $job) { 
													$total_jobs++;
												}	

							  					if(!empty($wpjobus_company_cover_image)) {

									  			require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
													$params = array( 'width' => 340, 'height' => 200, 'crop' => true );
													echo "<img class='big-img' src='" . bfi_thumb( "$wpjobus_company_cover_image", $params ) . "' alt='" . $wpjobus_company_fullname . "'/>";

												} else {

													echo "<span class='featured-image-replacer'><i class='fa fa-briefcase'></i>";

												}

											?>

											<?php if(!empty($wpjobus_company_profile_picture)) { ?>

							  				<span class="featured-item-content-title-logo">
							  					<span class="featured-item-content-company-title-logo-img">
								  					<span class="helper"></span>
								  					<img src="<?php echo $wpjobus_company_profile_picture; ?>" alt="">
								  				</span>
							  				</span>

							  				<?php } ?>

							  			</span>

							  			<span class="featured-item-badge">

							  				<span class="featured-item-job-badge">

							  					<span class="featured-item-job-badge-title"><?php _e( 'EST. IN', 'agrg' ); ?> <?php echo $wpjobus_company_foundyear; ?></span>

							  					<span class="featured-item-job-badge-info">

							  						<span class="featured-item-job-badge-info-sum"><?php echo $total_jobs; ?></span>

													<span class="featured-item-job-badge-info-per"><?php if($total_jobs == 1) { _e( 'Job', 'agrg' ); } else { _e( 'Jobs', 'agrg' ); } ?></span>						  						

							  					</span>

							  				</span>

							  			</span>

							  			<span class="featured-item-content">

							  				<span class="featured-item-content-title"><?php echo $wpjobus_company_fullname; ?></span>
							  				<span class="featured-item-content-tagline"><?php echo $wpjobus_company_tagline; ?></span>
							  				<span class="featured-item-content-subtitle">

							  					<span><i class="fa fa-map-marker"></i><?php echo $company_location; ?></spam>

							  				</span>

							  			</span>

							  		</div>

							  	</a>

						  	</div>

							<?php } } ?>

						</div>

						<?php } ?>

						<div class="filters">

							

							<div class="full sidebar-widget-bottom-line">

								<div class="full" style="margin-bottom: 0;">

									<input type="text" name="comp_keyword"  value="<?php if (!empty($keyword)) { echo $keyword; } ?>" placeholder="<?php _e( 'search by name, job title and location.', 'agrg' ); ?>" class="searchcr" >
				<input id="comp_keyword" class="greensubmit" type="button" value="Submit">		
									<div id="search-results"></div>

								</div>
                                <div class="full sidebar-widget-bottom-line" style="display:none;">

								<div class="one_half first">

									<span class="filters-subtitle"><?php _e( 'Has Job Offers', 'agrg' ); ?></span>

									<ul class="filters-lists-main">
										
										<li class="filters-has-jobs-all active">
											<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php _e( 'All Companies', 'agrg' ); ?>
											<input type="hidden" class="filters-has-jobs-all-input" name="filters_has_jobs_all" value="1" />
										</li>

										<li class="filters-has-jobs-yes">
											<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php _e( 'Has Job Offer', 'agrg' ); ?>
											<input type="hidden" class="filters-has-jobs-yes-input" name="filters_has_jobs_yes" value="" />
										</li>

										<li class="filters-has-jobs-no">
											<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php _e( 'No Job Offer', 'agrg' ); ?>
											<input type="hidden" class="filters-has-jobs-no-input" name="filters_has_jobs_no" value="" />
										</li>

									</ul>

								</div>

								<div class="one_half">

									<span class="filters-subtitle"><?php _e( 'Job Offers', 'agrg' ); ?></span>

									<ul class="filters-lists">

										<li class="filters-list-all">
											<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php _e( 'All Types', 'agrg' ); ?>
											<input type="hidden" class="job_presence_type_option" name="job_presence_type_all" value="1" />
										</li>

										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['job-type']); $i++) {
										?>
										
										<li class="filters-list-one">
											<i id="job-type[<?php echo $i; ?>]" class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php echo $redux_demo['job-type'][$i]; ?>
											<input type="hidden" class="job_presence_type_option_value" name="job_presence_type_value[<?php echo $i; ?>]" value="<?php echo $redux_demo['job-type'][$i]; ?>" />
											<input type="hidden" class="job_presence_type_option" name="job_presence_type[<?php echo $i; ?>]" value="" />
										</li>

										<?php 
											}
										?>

									</ul>

								</div>

							</div>

								<div class="three_fifth first" style="display:none;">

									<span class="filters-subtitle"><?php _e( 'Categories', 'agrg' ); ?></span>

									<ul class="filters-lists-category">

										<li class="filters-list-category-all <?php if(empty($job_type)) { ?>active<?php }?>">
											<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php _e( 'All Categories', 'agrg' ); ?>
											<input type="hidden" class="company-category-all" name="company_category_all" value="<?php if(empty($job_type)) { ?>1<?php } ?>" />
										</li>

										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['resume-industries']); $i++) {
										?>
										
										<li class="filters-list-category-one <?php if($job_type == $redux_demo['resume-industries'][$i] ) { ?>active<?php } ?>">
											<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php echo $redux_demo['resume-industries'][$i]; ?>
											<input type="hidden" class="company-category-value" name="company_category_value[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume-industries'][$i]; ?>" />
											<input type="hidden" class="company-category" name="company_category[<?php echo $i; ?>]" value="<?php if($job_type == $redux_demo['resume-industries'][$i] ) { echo $redux_demo['resume-industries'][$i]; } ?>" />
										</li>

										<?php 
											}
										?>

									</ul>

								</div>

								<div class="two_fifth" style="display:none;">

									<span class="filters-subtitle"><?php _e( 'Locations', 'agrg' ); ?></span>

									<ul class="filters-lists-location">

										<li class="filters-list-location-all <?php if(empty($job_location)) { ?>active<?php }?>">
											<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php _e( 'All Locations', 'agrg' ); ?>
											<input type="hidden" class="company-location-all" name="company_location_all" value="<?php if(empty($job_location)) { ?>1<?php } ?>" />
										</li>

										<?php 
											global $redux_demo; 
											for ($i = 0; $i < count($redux_demo['resume-locations']); $i++) {
										?>
										
										<li class="filters-list-location <?php if($job_location == $redux_demo['resume-locations'][$i] ) { ?>active<?php } ?>">
											<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php echo $redux_demo['resume-locations'][$i]; ?>
											<input type="hidden" class="company-location-value" name="company_location_value[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume-locations'][$i]; ?>" />
											<input type="hidden" class="company-location" name="company_location[<?php echo $i; ?>]" value="<?php if($job_location == $redux_demo['resume-locations'][$i] ) { echo $redux_demo['resume-locations'][$i]; } ?>" />
										</li>

										<?php 
											}
										?>

									</ul>

								</div>

							</div>

							<div class="full sidebar-widget-bottom-line" style="display:none;">

								<span class="filters-subtitle"><?php _e( 'Established Since', 'agrg' ); ?></span>

								<?php

									$wpjobus_companies_est_year = $wpdb->get_results( "SELECT DISTINCT m.meta_value FROM  `{$wpdb->prefix}posts` p LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id WHERE p.post_type =  'company' AND p.post_status =  'publish' AND m.meta_key = 'wpjobus_company_foundyear' ORDER BY  m.meta_value+0 ASC");

									$total_years = 0;
								  
									foreach($wpjobus_companies_est_year as $year) { 
										$total_years++;
									}

									$s = 0;
									$m = $total_years;
									$min = $wpjobus_companies_est_year[$s] -> meta_value;
        							$max = $wpjobus_companies_est_year[count($wpjobus_companies_est_year)-1] -> meta_value;

        							foreach($wpjobus_companies_est_year as $year) { 

										if(empty($min)) {
	        								$s++;
	        								$min = $wpjobus_companies_est_year[$s] -> meta_value;
	        							}

									}

									for($countQ = $total_years; $countQ > 0; $countQ--) {

										if(empty($max)) {
	        								$m--;
	        								$max = $wpjobus_companies_est_year[$m] -> meta_value;
	        							}

									}

									$medium = floor(($max + $min)/2);

								?>

								<div class="one_half first">

									<p><?php _e( 'Older than:', 'agrg' ); ?> <span class="comp_est_year_num"><?php echo $medium; ?></span></p>

								</div>

								<div class="one_half">

									<div id="advance-search-slider" class="ui-slider-horizontal" aria-disabled="false">
										<a class="ui-slider-handle" href="#"></a>
										<input type="hidden" name="comp_est_year" id="comp_est_year" value="<?php echo $min; ?>" >
									</div>

								</div>

							</div>

							<div class="full sidebar-widget-bottom-line" style="display:none;">

								<span class="filters-subtitle"><?php _e( 'Team Size', 'agrg' ); ?></span>

								<div class="full">

									<p class="comp_team_holder" style="margin-bottom: 0;"><?php _e( 'From', 'agrg' ); ?> <input type="text" name="comp_min_team" id="comp_min_team" value="" > <?php _e( 'to', 'agrg' ); ?> <input type="text" name="comp_max_team" id="comp_max_team" value="" > <?php _e( 'people', 'agrg' ); ?></p>

								</div>

							</div>

							

							<div class="full" style="margin-bottom: 0; text-align: center; display:none;">

								<span id="comp-reset" class="button-ag-full" ><i class="fa fa-check"></i><?php _e( 'Reset Filters', 'agrg' ); ?></span>

							</div>

						</div>

					</div>
          <div id="companies-block">

							<ul id="companies-block-list-ul">

							<?php 

								global $companies_per_page, $total_companies, $total_pages, $current_page;

								$companies_per_page = 18;

								$total_companies = 0;

								$current_page = max(1, get_query_var('paged'));

								$wpjobus_companies = $wpdb->get_results( "SELECT DISTINCT p.ID
																	FROM  `{$wpdb->prefix}posts` p
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id
																	WHERE p.post_type =  'company'
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

							?> 

							<li id="<?php echo $current_element_id; ?>">

								<a href="<?php $companylink = home_url()."/company/".$company_id; echo $companylink; ?>">

									<div class="company-holder-block">

										<span class="company-list-icon  rounded-img">
											<span class="helper"></span>
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
											
										</span>

										<span class="company-list-name-block">
											<span class="company-list-name"><?php echo $wpjobus_company_fullname; ?></span>
											<span class="company-list-location"><i class="fa fa-map-marker"></i><?php echo $company_location; ?>
											</span>
										</span>

										

										

									</div>

								</a>
                <div class="company-list-follow">

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
                 
								<span class="company-follow comfollow<?php echo $company_id; ?>"> <a class="mfollow" href="javascript:void(0);" onclick="return makeFollow('<?php echo $company_id; ?>');" > Follow </a> </span>								
                <span class="company-following comfollowing<?php echo $company_id; ?>" style="display:none;"> <a class="dflow" href="javascript:void(0);" onclick="return delFollow(<?php echo $company_id; ?>);">  Following </a></span>
                <?php 
								}else{
									?>
                  <div id="myfollow_board"></div>
               <span class="company-follow comfollow<?php echo $company_id; ?>" style="display:none;"> <a class="mfollow" href="javascript:void(0);" onclick="return makeFollow('<?php echo $company_id; ?>');" > Follow </a> </span>		
                  <span class="company-following comfollowing<?php echo $company_id; ?>"> <a class="dflow" href="javascript:void(0);" onclick="return delFollow(<?php echo $company_id; ?>);">  Following </a></span>
									<?php 
								}
								 } 
								 ?>

										</div>
							</li>

							<?php } } ?> 

							</ul> 

							<?php if($current_element_id == 0) { ?>

						      	<div class="full"><h4><?php _e( 'Well, it looks like there are no results matching your criterias.', 'agrg' ); ?></h4></div>

						    <?php } 
//                                                        echo 'Total Pages'.$total_pages;
//                                                        die();
                                                    $total_pages=5;
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

									if( $wp_rewrite->using_permalinks() )
										$wpcook_pagination['base'] = '#%#%';

									if( !empty($wp_query->query_vars['s']) )
										$wpcook_pagination['add_args'] = array('s'=>get_query_var('s'));

									echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 

								}
								
							?> 

						</div>

					<input type="hidden" id="companies_current_page" name="companies_current_page" value="1" />

					<input type="hidden" id="companies_map_block" name="companies_map_block" value="" />

					<input type="hidden" name="action" value="wpjobusSubmitCompaniesFilter" />
					<?php wp_nonce_field( 'wpjobusSubmitCompaniesFilter_html', 'wpjobusSubmitCompaniesFilter_nonce' ); ?>

				</form>

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
				
				jQuery(function($) {
					
                    /* correction original: min: <?php echo $min; ?>,*/
							
					jQuery( "#advance-search-slider" ).slider({
				      	range: "min",
				      	value: <?php echo $medium; ?>,
						min: <?php echo substr($min,-4); ?>,
				      	max: <?php echo $max; ?>,
				      	slide: function( event, ui ) {
				       		jQuery( "#comp_est_year" ).val( ui.value );
				       		jQuery( ".comp_est_year_num" ).text( ui.value );
				      	},
				      	stop: function() {
				      		jQuery('#companies_current_page').val('1');
			              	$.fn.wpjobusSubmitFormFunction();
			              	$.fn.wpjobusSubmitFormMapFunction();
			          	}  
				    });

					jQuery("#comp_min_team").focusout(function() {
						jQuery('#companies_current_page').val('1');
			            $.fn.wpjobusSubmitFormFunction();
			            $.fn.wpjobusSubmitFormMapFunction();
					});

					jQuery("#comp_max_team").focusout(function() {
						jQuery('#companies_current_page').val('1');
			            $.fn.wpjobusSubmitFormFunction();
			            $.fn.wpjobusSubmitFormMapFunction();
					});

					jQuery("#comp_keyword").click(function() {
					
					    $.fn.wpjobusSubmitFormFunction();
				        $.fn.wpjobusSubmitFormMapFunction();
					});

					jQuery("#comp_keyword").keydown(function(event) {
						if (event.keyCode == 13) {
						    $.fn.wpjobusSubmitFormFunction();
				           	$.fn.wpjobusSubmitFormMapFunction();
						}
					});

					jQuery(document).on("click","#comp-team-submit-clear",function(e){
					    jQuery('#comp_min_team').val('');
					    jQuery('#comp_max_team').val('');
					});

					jQuery(document).on("click","#comp-reset",function(e){

						jQuery('#comp_min_team').val('');
					    jQuery('#comp_max_team').val('');
					    jQuery('#comp_keyword').val('');

					    jQuery('#companies_current_page').val('1');

					    jQuery('.filters-list-category-all').addClass('active');
					    jQuery('.company-category-all').val('1');

					    jQuery('.filters-list-category-one').removeClass('active');
					    jQuery('.company-category').val('');

					    jQuery('.filters-list-location-all').addClass('active');
					    jQuery('.company-location-all').val('1');

					    jQuery('.filters-list-location').removeClass('active');
					    jQuery('.company-location').val('');

					    jQuery( "#comp_est_year" ).val( '<?php echo $min; ?>' );

					    jQuery('.filters-has-jobs-all').addClass('active');
					    jQuery('.filters-has-jobs-all-input').val('1');

					    jQuery('.filters-has-jobs-yes').removeClass('active');
					   	jQuery('.filters-has-jobs-yes-input').val('');

					    jQuery('.filters-has-jobs-no').removeClass('active');
					   	jQuery('.filters-has-jobs-no-input').val('');

					    jQuery('.filters-lists li').removeClass('active');
					    jQuery('.filters-lists input.job_presence_type_option').val('');

			            $.fn.wpjobusSubmitFormFunction();
			            $.fn.wpjobusSubmitFormMapFunction();

					});

					jQuery(document).on("click","ul.filters-lists li.filters-list-one",function(e){

						jQuery('#companies_current_page').val('1');
				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery(this).find('.job_presence_type_option').val('');

					        $.fn.wpjobusSubmitFormFunction();
					        $.fn.wpjobusSubmitFormMapFunction();

					        e.preventDefault();
							return false;

					    } else {

					       	jQuery(this).addClass('active');
					       	var id = jQuery(this).find('.job_presence_type_option_value').val();
					       	jQuery(this).find('.job_presence_type_option').val(id);
					       	jQuery(this).parent().find('.filters-list-all').removeClass('active');
					       	jQuery(this).parent().find('.filters-list-all .job_presence_type_option').val('');

					       	jQuery('.filters-has-jobs-yes').addClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('1');

					       	jQuery('.filters-has-jobs-all').removeClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('');

					       	jQuery('.filters-has-jobs-no').removeClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					   }

					});

					jQuery(document).on("click","ul.filters-lists li.filters-list-all",function(e){

				     	if (jQuery(this).hasClass('active')) {
					        jQuery(this).removeClass('active');
					        jQuery(this).find('.job_presence_type_option').val('');
					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery(this).find('.job_presence_type_option').val('1');
					       	jQuery(this).parent().find('.filters-list-one').removeClass('active');
					       	jQuery(this).parent().find('.filters-list-one .job_presence_type_option').val('');

					       	jQuery('.filters-has-jobs-yes').addClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('1');

					       	jQuery('.filters-has-jobs-all').removeClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('');

					       	jQuery('.filters-has-jobs-no').removeClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-has-jobs-all",function(e){

				     	if (jQuery(this).hasClass('active')) {
					        jQuery(this).removeClass('active');
					        jQuery('.filters-has-jobs-all-input').val('');
					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('1');

					       	jQuery('.filters-has-jobs-yes').removeClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('');

					       	jQuery('.filters-has-jobs-no').removeClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('');

					       	jQuery('.filters-lists li').removeClass('active');
					       	jQuery('.filters-lists input.job_presence_type_option').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-has-jobs-yes",function(e){

				     	if (jQuery(this).hasClass('active')) {
					        jQuery(this).removeClass('active');
					        jQuery('.filters-has-jobs-yes-input').val('');
					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('1');

					       	jQuery('.filters-has-jobs-all').removeClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('');

					       	jQuery('.filters-has-jobs-no').removeClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('');

					       	jQuery('.filters-lists li').removeClass('active');
					       	jQuery('.filters-lists input.job_presence_type_option').val('');

					       	jQuery('.filters-list-all').addClass('active');
					       	jQuery('.filters-list-all .job_presence_type_option').val('1');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-has-jobs-no",function(e){

				     	if (jQuery(this).hasClass('active')) {
					        jQuery(this).removeClass('active');
					        jQuery('.filters-has-jobs-no-input').val('');
					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('1');

					       	jQuery('.filters-has-jobs-yes').removeClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('');

					       	jQuery('.filters-has-jobs-all').removeClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('');

					       	jQuery('.filters-lists li').removeClass('active');
					       	jQuery('.filters-lists input.job_presence_type_option').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-list-category-all",function(e){

				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery('.company-category-all').val('');

					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.company-category-all').val('1');

					       	jQuery('.filters-list-category-one').removeClass('active');
					       	jQuery('.company-category').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-list-category-one",function(e){

						jQuery('#companies_current_page').val('1');
				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery(this).find('.company-category').val('');

					        $.fn.wpjobusSubmitFormFunction();
					        $.fn.wpjobusSubmitFormMapFunction();

					        e.preventDefault();
							return false;

					    } else {

					       	jQuery(this).addClass('active');
					       	var id = jQuery(this).find('.company-category-value').val();
					       	jQuery(this).find('.company-category').val(id);
					       	jQuery(this).parent().find('.filters-list-category-all').removeClass('active');
					       	jQuery(this).parent().find('.company-category-all').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					   }

					});


					jQuery(document).on("click",".filters-list-location-all",function(e){

				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery('.company-location-all').val('');

					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.company-location-all').val('1');

					       	jQuery('.filters-list-location').removeClass('active');
					       	jQuery('.company-location').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-list-location",function(e){

						jQuery('#companies_current_page').val('1');
				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery(this).find('.company-location').val('');

					        $.fn.wpjobusSubmitFormFunction();
					        $.fn.wpjobusSubmitFormMapFunction();

					        e.preventDefault();
							return false;

					    } else {

					       	jQuery(this).addClass('active');
					       	var id = jQuery(this).find('.company-location-value').val();
					       	jQuery(this).find('.company-location').val(id);
					       	jQuery(this).parent().find('.filters-list-location-all').removeClass('active');
					       	jQuery(this).parent().find('.company-location-all').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					   }

					});

					jQuery(document).on("click",".pagination a.page-numbers",function(e){

				     	var hrefprim = jQuery(this).attr('href');
				     	var href = hrefprim.replace("#", "");

                		jQuery('#companies_current_page').val(href);

				     	$.fn.wpjobusSubmitFormFunction();
				     	$.fn.wpjobusSubmitFormMapFunction();

				     	e.preventDefault();
						return false;

					});

					jQuery(".pagination a.page-numbers").click(function(e){

				     	var hrefprim = jQuery(this).attr('href');
				     	var href = hrefprim.replace("#", "");

                		jQuery('#companies_current_page').val(href);

				     	$.fn.wpjobusSubmitFormFunction();
				     	$.fn.wpjobusSubmitFormMapFunction();

				     	e.preventDefault();
						return false;

					});

					$.fn.wpjobusSubmitFormFunction = function() {

						jQuery('#companies_map_block').val('0');

						$contentheight = jQuery('#companies-block').height(),
						jQuery("html, body").animate({ scrollTop: 0 }, 800);

						jQuery('#wpjobus-companies').ajaxSubmit({
						    type: "POST",
							data: jQuery('#wpjobus-companies').serialize(),
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							beforeSend: function() { 
					        	jQuery('.loading').fadeIn(500);
					        	jQuery('#companies-block').stop().animate({'opacity' : '0'}, 250, function() {
					        		jQuery('#companies-block').css('height', $contentheight);
					        	}); 
					        },	 
						    success: function(response) {  //alert(response); 
								jQuery('.loading').fadeOut(100, function(){
					        		jQuery("#companies-block").html(response);
					        		jQuery("#companies-block").css('height', 'auto');
						            jQuery("#companies-block").stop().animate({'opacity' : '1'}, 250);

						            jQuery('#companies-block-list-ul').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
									  	if (isInView) {
									    	// element is now visible in the viewport
									    	if (jQuery(this).hasClass('animated-list')) {
									            
									        } else {
									        	jQuery(this).addClass('animated-list');

									        	jQuery('#companies-block-list-ul li').each(function(i) {
													var $li = jQuery(this);
													setTimeout(function() {
													    $li.addClass('animate');
													}, i*100); // delay 150 ms
												});
									        }

									  	}
									});
					        	});
						        return false;
						    }
						});
					}

					$.fn.wpjobusSubmitFormMapFunction = function() {

						mapDiv = jQuery("#wpjobus-main-map");

						mapDiv.gmap3('clear', 'markers');

						mapDiv.height(500).gmap3({
							map: {
								options: {
									"draggable": true
									,"mapTypeControl": true
									,"mapTypeId": google.maps.MapTypeId.ROADMAP
									,"scrollwheel": false
									,"panControl": true
									,"rotateControl": false
									,"scaleControl": true
									,"streetViewControl": true
									,"zoomControl": true
									<?php global $redux_demo; $map_style = $redux_demo['map-style']; if(!empty($map_style)) { ?>,"styles": <?php echo $map_style; ?> <?php } ?>
								}
							}
							,marker: {
								values: [
									
								],
								options:{
									draggable: false
								},
								cluster:{
					          		radius: 20,
									// This style will be used for clusters with more than 0 markers
									0: {
										content: "<div class='cluster cluster-1'>CLUSTER_COUNT</div>",
										width: 62,
										height: 62
									},
									// This style will be used for clusters with more than 20 markers
									20: {
										content: "<div class='cluster cluster-2'>CLUSTER_COUNT</div>",
										width: 82,
										height: 82
									},
									// This style will be used for clusters with more than 50 markers
									50: {
										content: "<div class='cluster cluster-3'>CLUSTER_COUNT</div>",
										width: 102,
										height: 102
									},
									events: {
										click: function(cluster) {
											map.panTo(cluster.main.getPosition());
											map.setZoom(map.getZoom() + 2);
										}
									}
					          	},
							}
						},"autofit");

						map = mapDiv.gmap3("get");

						jQuery('#companies_map_block').val('1');
						
						jQuery('#wpjobus-companies').ajaxSubmit({
						    type: "POST",
							data: jQuery('#wpjobus-companies').serialize(),
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							beforeSend: function() { 
					        	jQuery('#wpjobus-main-map-preloader').fadeIn(500);
					        },	 
						    success: function(response) {
								jQuery('#wpjobus-main-map-preloader').fadeOut(100, function(){
					        		jQuery("#big-map-holder").html(response);
					        	});
						        return false;
						    }
						});
					}

				});

				</script>

			</div>

			
			
		</div>

	</section>
 -->

<!-- New html start  -->
<?php

global $current_user, $user_id, $user_info;
	get_currentuserinfo();
	
	
	$user_id = $current_user->ID;                               
	
	if($_REQUEST['usrs_compns']!="")
	{
		$user_id =$_REQUEST['usrs_compns'];
	
	}else{
		$user_id = get_current_user_id();
	}	


?>

<!-- Content START-->
    <div class="company-header sections">
      <div class="container">
          <!-- Breadcrumb START-->
          <div class="breadcrumbs-sec">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Search Profile</a></li>
            </ul>
          </div>
          <!-- Breadcrumb END-->
          <!-- Search START-->
          <div class="search-profiles">
            <h2>Search in Following Companies</h2>
            <span>Use our Awesome Search tool to find Companies Profiles!</span>
            <div class="search-prof-form">
            	
	             <form id="wpjobus-companies" type="post" action="" >
                 
                <input type="text" name="comp_keyword"  class="searchcr search-profile" palceholder="Search by Members Name, Location, Title" value="">
                <input type="button" id="comp_keyword" name="submit" class="submit line-btn" value="Submit">
                <input type="hidden" id="companies_current_page" name="companies_current_page" value="1" />

                <input type="hidden" id="companies_map_block" name="companies_map_block" value="" />

               <input type="hidden" name="action" value="wpjobusSubmitCompaniesFilter_following" />
				<!-- <input type="hidden" name="action" value="wpjobusSubmitCompaniesFilter" /> -->
				
               <input type="hidden" id="usrs_compns" name="usrs_compns" value="<?php echo $user_id; ?>" >

                <?php wp_nonce_field( 'wpjobusSubmitCompaniesFilter_html', 'wpjobusSubmitCompaniesFilter_nonce' ); ?>
              </form>
            </div>
          </div>
			<!-- <div class="full" style="margin-bottom: 0;">
				<div class="loading"><i class="fa fa-spinner fa-spin"></i></div>
			</div> -->
          <!-- Search END-->

          <!-- Search Results START-->
          <span class="summary-result">
            
          </span>
          <div class="listing-results" id="companies-block">

				<?php 

								global $companies_per_page, $total_companies, $total_pages, $current_page;
								
								

                                //echo "user_id".$userid;   
                           
								$companies_per_page = 18;
								//$companies_per_page = 2;

								$total_companies = 0;

								$current_page = max(1, get_query_var('paged'));


								$myquery = "SELECT DISTINCT p.ID	FROM  `{$wpdb->prefix}posts` p
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id
																	WHERE p.post_type =  'company'
																	AND p.post_status =  'publish'
																	AND p.post_author = $user_id
																	".$string."
																	".$stringLocation."
																	".$stringKeyword."
																	ORDER BY  `p`.`ID` DESC";


							    
								$myquery = " SELECT T1.* FROM wp_posts T1 INNER JOIN wp_postmeta T2 ON T1.ID = T2.post_id WHERE T2.meta_key='company-followers' AND T2.meta_value = $user_id";
								
								
								
								
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

			<?php } } ?>
            
            <!-- Pagination Starts-->
<!--            <div class="pagination">
              <a href="#" class="prev disabled">Previous</a>
              <a href="#" class="page-numbers current">1</a>
              <a href="#" class="page-numbers">2</a>
              <a href="#" class="page-numbers">3</a>
              <a href="#" class="page-numbers">4</a>
              <a href="#" class="page-numbers">5</a>
              <a href="#" class="page-numbers">6</a>
              <a href="#" class="next">Next</a>
            </div>-->
            <!-- Pagination Ends-->
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
            
          </div>
          <!-- Search Results END-->
      </div>
    </div>

 <!-- Content END-->

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
				
				jQuery(function($) {
					
                    /* correction original: min: <?php echo $min; ?>,*/
							
					jQuery( "#advance-search-slider" ).slider({
				      	range: "min",
				      	value: <?php echo $medium; ?>,
						min: <?php echo substr($min,-4); ?>,
				      	max: <?php echo $max; ?>,
				      	slide: function( event, ui ) {
				       		jQuery( "#comp_est_year" ).val( ui.value );
				       		jQuery( ".comp_est_year_num" ).text( ui.value );
				      	},
				      	stop: function() {
				      		jQuery('#companies_current_page').val('1');
			              	$.fn.wpjobusSubmitFormFunction();
			              	$.fn.wpjobusSubmitFormMapFunction();
			          	}  
				    });

					jQuery("#comp_min_team").focusout(function() {
						jQuery('#companies_current_page').val('1');
			            $.fn.wpjobusSubmitFormFunction();
			            $.fn.wpjobusSubmitFormMapFunction();
					});

					jQuery("#comp_max_team").focusout(function() {
						jQuery('#companies_current_page').val('1');
			            $.fn.wpjobusSubmitFormFunction();
			            $.fn.wpjobusSubmitFormMapFunction();
					});

					jQuery("#comp_keyword").click(function() {
					
					    $.fn.wpjobusSubmitFormFunction();
				        $.fn.wpjobusSubmitFormMapFunction();
					});

					jQuery("#comp_keyword").keydown(function(event) {
						if (event.keyCode == 13) {
                                              
						    $.fn.wpjobusSubmitFormFunction();
				           	$.fn.wpjobusSubmitFormMapFunction();
						}
					});

					jQuery(document).on("click","#comp-team-submit-clear",function(e){
					    jQuery('#comp_min_team').val('');
					    jQuery('#comp_max_team').val('');
					});

					jQuery(document).on("click","#comp-reset",function(e){

						jQuery('#comp_min_team').val('');
					    jQuery('#comp_max_team').val('');
					    jQuery('#comp_keyword').val('');

					    jQuery('#companies_current_page').val('1');

					    jQuery('.filters-list-category-all').addClass('active');
					    jQuery('.company-category-all').val('1');

					    jQuery('.filters-list-category-one').removeClass('active');
					    jQuery('.company-category').val('');

					    jQuery('.filters-list-location-all').addClass('active');
					    jQuery('.company-location-all').val('1');

					    jQuery('.filters-list-location').removeClass('active');
					    jQuery('.company-location').val('');

					    jQuery( "#comp_est_year" ).val( '<?php echo $min; ?>' );

					    jQuery('.filters-has-jobs-all').addClass('active');
					    jQuery('.filters-has-jobs-all-input').val('1');

					    jQuery('.filters-has-jobs-yes').removeClass('active');
					   	jQuery('.filters-has-jobs-yes-input').val('');

					    jQuery('.filters-has-jobs-no').removeClass('active');
					   	jQuery('.filters-has-jobs-no-input').val('');

					    jQuery('.filters-lists li').removeClass('active');
					    jQuery('.filters-lists input.job_presence_type_option').val('');

			            $.fn.wpjobusSubmitFormFunction();
			            $.fn.wpjobusSubmitFormMapFunction();

					});

					jQuery(document).on("click","ul.filters-lists li.filters-list-one",function(e){

						jQuery('#companies_current_page').val('1');
				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery(this).find('.job_presence_type_option').val('');

					        $.fn.wpjobusSubmitFormFunction();
					        $.fn.wpjobusSubmitFormMapFunction();

					        e.preventDefault();
							return false;

					    } else {

					       	jQuery(this).addClass('active');
					       	var id = jQuery(this).find('.job_presence_type_option_value').val();
					       	jQuery(this).find('.job_presence_type_option').val(id);
					       	jQuery(this).parent().find('.filters-list-all').removeClass('active');
					       	jQuery(this).parent().find('.filters-list-all .job_presence_type_option').val('');

					       	jQuery('.filters-has-jobs-yes').addClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('1');

					       	jQuery('.filters-has-jobs-all').removeClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('');

					       	jQuery('.filters-has-jobs-no').removeClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					   }

					});

					jQuery(document).on("click","ul.filters-lists li.filters-list-all",function(e){

				     	if (jQuery(this).hasClass('active')) {
					        jQuery(this).removeClass('active');
					        jQuery(this).find('.job_presence_type_option').val('');
					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery(this).find('.job_presence_type_option').val('1');
					       	jQuery(this).parent().find('.filters-list-one').removeClass('active');
					       	jQuery(this).parent().find('.filters-list-one .job_presence_type_option').val('');

					       	jQuery('.filters-has-jobs-yes').addClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('1');

					       	jQuery('.filters-has-jobs-all').removeClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('');

					       	jQuery('.filters-has-jobs-no').removeClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-has-jobs-all",function(e){

				     	if (jQuery(this).hasClass('active')) {
					        jQuery(this).removeClass('active');
					        jQuery('.filters-has-jobs-all-input').val('');
					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('1');

					       	jQuery('.filters-has-jobs-yes').removeClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('');

					       	jQuery('.filters-has-jobs-no').removeClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('');

					       	jQuery('.filters-lists li').removeClass('active');
					       	jQuery('.filters-lists input.job_presence_type_option').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-has-jobs-yes",function(e){

				     	if (jQuery(this).hasClass('active')) {
					        jQuery(this).removeClass('active');
					        jQuery('.filters-has-jobs-yes-input').val('');
					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('1');

					       	jQuery('.filters-has-jobs-all').removeClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('');

					       	jQuery('.filters-has-jobs-no').removeClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('');

					       	jQuery('.filters-lists li').removeClass('active');
					       	jQuery('.filters-lists input.job_presence_type_option').val('');

					       	jQuery('.filters-list-all').addClass('active');
					       	jQuery('.filters-list-all .job_presence_type_option').val('1');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-has-jobs-no",function(e){

				     	if (jQuery(this).hasClass('active')) {
					        jQuery(this).removeClass('active');
					        jQuery('.filters-has-jobs-no-input').val('');
					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.filters-has-jobs-no-input').val('1');

					       	jQuery('.filters-has-jobs-yes').removeClass('active');
					       	jQuery('.filters-has-jobs-yes-input').val('');

					       	jQuery('.filters-has-jobs-all').removeClass('active');
					       	jQuery('.filters-has-jobs-all-input').val('');

					       	jQuery('.filters-lists li').removeClass('active');
					       	jQuery('.filters-lists input.job_presence_type_option').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-list-category-all",function(e){

				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery('.company-category-all').val('');

					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.company-category-all').val('1');

					       	jQuery('.filters-list-category-one').removeClass('active');
					       	jQuery('.company-category').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-list-category-one",function(e){

						jQuery('#companies_current_page').val('1');
				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery(this).find('.company-category').val('');

					        $.fn.wpjobusSubmitFormFunction();
					        $.fn.wpjobusSubmitFormMapFunction();

					        e.preventDefault();
							return false;

					    } else {

					       	jQuery(this).addClass('active');
					       	var id = jQuery(this).find('.company-category-value').val();
					       	jQuery(this).find('.company-category').val(id);
					       	jQuery(this).parent().find('.filters-list-category-all').removeClass('active');
					       	jQuery(this).parent().find('.company-category-all').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					   }

					});


					jQuery(document).on("click",".filters-list-location-all",function(e){

				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery('.company-location-all').val('');

					    } else {

					    	jQuery('#companies_current_page').val('1');

					       	jQuery(this).addClass('active');
					       	jQuery('.company-location-all').val('1');

					       	jQuery('.filters-list-location').removeClass('active');
					       	jQuery('.company-location').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					    }
					});

					jQuery(document).on("click",".filters-list-location",function(e){

						jQuery('#companies_current_page').val('1');
				     	if (jQuery(this).hasClass('active')) {

					        jQuery(this).removeClass('active');
					        jQuery(this).find('.company-location').val('');

					        $.fn.wpjobusSubmitFormFunction();
					        $.fn.wpjobusSubmitFormMapFunction();

					        e.preventDefault();
							return false;

					    } else {

					       	jQuery(this).addClass('active');
					       	var id = jQuery(this).find('.company-location-value').val();
					       	jQuery(this).find('.company-location').val(id);
					       	jQuery(this).parent().find('.filters-list-location-all').removeClass('active');
					       	jQuery(this).parent().find('.company-location-all').val('');

					       	$.fn.wpjobusSubmitFormFunction();
					       	$.fn.wpjobusSubmitFormMapFunction();

					       	e.preventDefault();
							return false;

					   }

					});

					jQuery(document).on("click",".pagination a.page-numbers",function(e){

				     	var hrefprim = jQuery(this).attr('href');
				     	var href = hrefprim.replace("#", "");

                		jQuery('#companies_current_page').val(href);

				     	$.fn.wpjobusSubmitFormFunction();
				     	$.fn.wpjobusSubmitFormMapFunction();

				     	e.preventDefault();
						return false;

					});

					jQuery(".pagination a.page-numbers").click(function(e){

				     	var hrefprim = jQuery(this).attr('href');
				     	var href = hrefprim.replace("#", "");

                		jQuery('#companies_current_page').val(href);

				     	$.fn.wpjobusSubmitFormFunction();
				     	$.fn.wpjobusSubmitFormMapFunction();

				     	e.preventDefault();
						return false;

					});

					$.fn.wpjobusSubmitFormFunction = function() {

						jQuery('#companies_map_block').val('0');

						$contentheight = jQuery('#companies-block').height(),
						jQuery("html, body").animate({ scrollTop: 0 }, 800);

						jQuery('#wpjobus-companies').ajaxSubmit({
						    type: "POST",
							data: jQuery('#wpjobus-companies').serialize(),
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							beforeSend: function() {
								/*
					        	jQuery('.loading').fadeIn(500);
					        	jQuery('#companies-block').stop().animate({'opacity' : '0'}, 250, function() {
					        		jQuery('#companies-block').css('height', $contentheight);
					        	});
								*/
								
					        },	 
						    success: function(response) {  //alert(response); 
								
								//companies-block
								
								jQuery("#companies-block").empty();
								jQuery("#companies-block").html(response);

                                /*
								jQuery('.loading').fadeOut(100, function(){
                                                                 
					        		jQuery("#companies-block").html(response);
					        		jQuery("#companies-block").css('height', 'auto');
						            jQuery("#companies-block").stop().animate({'opacity' : '1'}, 250);

						            jQuery('#companies-block-list-ul').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
									  	if (isInView) {
									    	
									    	if (jQuery(this).hasClass('animated-list')) {
									            
									        } else {
									        	jQuery(this).addClass('animated-list');

									        	jQuery('#companies-block-list-ul li').each(function(i) {
													var $li = jQuery(this);
													setTimeout(function() {
													    $li.addClass('animate');
													}, i*100); 
												});
									        }

									  	}
									});
					        	});

								*/

						        return false;
						    }
						});
					}

					$.fn.wpjobusSubmitFormMapFunction = function() {

						mapDiv = jQuery("#wpjobus-main-map");

						mapDiv.gmap3('clear', 'markers');

						mapDiv.height(500).gmap3({
							map: {
								options: {
									"draggable": true
									,"mapTypeControl": true
									,"mapTypeId": google.maps.MapTypeId.ROADMAP
									,"scrollwheel": false
									,"panControl": true
									,"rotateControl": false
									,"scaleControl": true
									,"streetViewControl": true
									,"zoomControl": true
									<?php global $redux_demo; $map_style = $redux_demo['map-style']; if(!empty($map_style)) { ?>,"styles": <?php echo $map_style; ?> <?php } ?>
								}
							}
							,marker: {
								values: [
									
								],
								options:{
									draggable: false
								},
								cluster:{
					          		radius: 20,
									// This style will be used for clusters with more than 0 markers
									0: {
										content: "<div class='cluster cluster-1'>CLUSTER_COUNT</div>",
										width: 62,
										height: 62
									},
									// This style will be used for clusters with more than 20 markers
									20: {
										content: "<div class='cluster cluster-2'>CLUSTER_COUNT</div>",
										width: 82,
										height: 82
									},
									// This style will be used for clusters with more than 50 markers
									50: {
										content: "<div class='cluster cluster-3'>CLUSTER_COUNT</div>",
										width: 102,
										height: 102
									},
									events: {
										click: function(cluster) {
											map.panTo(cluster.main.getPosition());
											map.setZoom(map.getZoom() + 2);
										}
									}
					          	},
							}
						},"autofit");

						map = mapDiv.gmap3("get");

						jQuery('#companies_map_block').val('1');
						
						jQuery('#wpjobus-companies').ajaxSubmit({
						    type: "POST",
							data: jQuery('#wpjobus-companies').serialize(),
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							beforeSend: function() { 
					        	jQuery('#wpjobus-main-map-preloader').fadeIn(500);
					        },	 
						    success: function(response) {
								jQuery('#wpjobus-main-map-preloader').fadeOut(100, function(){
					        		jQuery("#big-map-holder").html(response);
					        	});
						        return false;
						    }
						});
					}

				});

				</script>


<!-- New html end   -->

<?php 

//get_footer(); 

get_footer('login');

?>
