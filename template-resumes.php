	<?php
/**
 * Template name: Resumes
 */
$page = get_page($post->ID);
$current_page_id = $page->ID;

//get_header(); 

get_template_part('header-myaccount');


		// Retrieve the URL variables (using PHP).
		if (isset($_GET['keyword'])) {
			
		    $keyword = $_GET['keyword'];

		} else {
		    $keyword = "";
		}

		if(!empty($keyword)) {
			$stringKeyword = "AND (m2.meta_key = 'wpjobus_resume_fullname' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeywordtitle = "OR (m2.meta_key = 'wpjobus_resume_prof_title' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeywordlocation = "OR (m2.meta_key = 'resume_location' AND m2.meta_value LIKE '%" . $keyword . "%')";
		} else {

		$stringKeyword = "";
			$stringKeywordtitle = "";
			$stringKeywordlocation = "";
		}
	?>
	<!--  -->

<!-- new design html start  -->

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
          <form id="wpjobus-companies" type="post" action="" >

		  <div class="search-profiles">
            <h2>Search Profiles</h2>
            <span>Use our Awesome Search tool to find the right associates</span>
            
			<!-- filters start  -->

							

				<div class="filters" >

						<div class="full sidebar-widget-bottom-line" style="display:none;">

							<div class="full" style="margin-bottom: 0;">							
							<div id="search-results">
							</div>

							</div>

							<div class="full" style="display:none;">
							<div class="one_half first" style="margin-bottom: 0;">

							<span class="filters-subtitle"><?php _e( 'Career Level', 'agrg' ); ?></span>

							<ul class="filters-lists">

							<li class="filters-list-career-all active">

							<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php _e( 'All Types', 'agrg' ); ?>

							<input type="hidden" class="job_career_level_option" name="job_career_level_all" value="1" />

							</li>



							<?php 

							global $redux_demo; 

							for ($i = 0; $i < count($redux_demo['resume_career_level']); $i++) {

							?>


							<?php if($redux_demo['resume_career_level'][$i]!='Indeed'){ ?>
							<li class="filters-list-career-one">

							<i id="job-type[<?php echo $i; ?>]" class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php echo $redux_demo['resume_career_level'][$i]; ?>

							<input type="hidden" class="job_career_level_option_value" name="job_career_level_value[<?php echo $i; ?>]" value="<?php echo $redux_demo['resume_career_level'][$i]; ?>" />

							<input type="hidden" class="job_career_level_option" name="job_career_level[<?php echo $i; ?>]" value="" />

							</li>



							<?php 
							}
							}

							?>


							</ul>

							</div>

							<div class="one_half" style="margin-bottom: 0;" style="display:none;">
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



						</div>



						<div class="full sidebar-widget-bottom-line" style="display:none">



							<span class="filters-subtitle"><?php _e( 'Experience', 'agrg' ); ?></span>



							<?php



							$wpjobus_companies_est_year = $wpdb->get_results( "SELECT DISTINCT m.meta_value FROM  `{$wpdb->prefix}posts` p LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id WHERE p.post_type =  'resume' AND p.post_status =  'publish' AND m.meta_key = 'resume_years_of_exp' ORDER BY  m.meta_value+0 ASC");



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



							<p><?php _e( 'More than', 'agrg' ); ?> <span class="comp_est_year_num"><?php echo $medium; ?></span> <?php _e( 'years', 'agrg' ); ?></p>



							</div>



							<div class="one_half">



							<div id="advance-search-slider" class="ui-slider-horizontal" aria-disabled="false">

							<a class="ui-slider-handle" href="#"></a>

							<input type="hidden" name="comp_est_year" id="comp_est_year" value="<?php echo $min; ?>" >

							</div>



							</div>



						</div>



						<div class="full sidebar-widget-bottom-line" style="display:none;">



								<span class="filters-subtitle"><?php _e( 'Expected Salary', 'agrg' ); ?></span>



								<div class="full">



								<p class="comp_team_holder" style="margin-bottom: 0;"><?php _e( 'From', 'agrg' ); ?> <input type="text" name="comp_min_team" id="comp_min_team" value="" > <?php _e( 'to', 'agrg' ); ?> <input type="text" name="comp_max_team" id="comp_max_team" value="" ></p>



								</div>



						</div>



						<div class="full sidebar-widget-bottom-line" style="display:none;">



						<div class="one_half first">



						<span class="filters-subtitle"><?php _e( 'Job Types', 'agrg' ); ?></span>



						<ul class="filters-lists">



						<li class="filters-list-all <?php if(empty($job_type)) { ?>active<?php }?>">

						<i class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php _e( 'All Types', 'agrg' ); ?>

						<input type="hidden" class="job_presence_type_option" name="job_presence_type_all" value="<?php if(empty($job_type)) { ?>1<?php }?>" />

						</li>



						<?php 

						global $redux_demo; 

						for ($i = 0; $i < count($redux_demo['job-type']); $i++) {

						?>


						<?php if($redux_demo['job-type'][$i]!='Indeed'){ ?>	
						<li class="filters-list-one <?php if($job_type == $redux_demo['job-type'][$i] ) { ?>active<?php } ?>">

						<i id="job-type[<?php echo $i; ?>]" class="fa fa-square-o"></i><i class="fa fa-check-square"></i><?php echo $redux_demo['job-type'][$i]; ?>

						<input type="hidden" class="job_presence_type_option_value" name="job_presence_type_value[<?php echo $i; ?>]" value="<?php echo $redux_demo['job-type'][$i]; ?>" />

						<input type="hidden" class="job_presence_type_option" name="job_presence_type[<?php echo $i; ?>]" value="<?php if($job_type == $redux_demo['job-type'][$i] ) { echo $redux_demo['job-type'][$i]; } ?>" />

						</li>



						<?php 
						}

						}

						?>



						</ul>



						</div>



						<div class="one_half">



						</div>



						</div>



						<div class="full" style="margin-bottom: 0; text-align: center; display:none">



						<span id="comp-reset" class="button-ag-full" ><i class="fa fa-check"></i><?php _e( 'Reset Filters', 'agrg' ); ?></span>



						</div>



				</div>	

			
			<!-- filter end -->

			<div class="search-prof-form">              
                <input type="text" name="comp_keyword" id="comp_keyword" value="<?php if (!empty($keyword)) { echo $keyword; } ?>" class="search-profile" placeholder="<?php _e( 'Search by members name, location, title.', 'agrg' ); ?>">
                <input id="comp_keyword" type="button" name="submit" class="submit line-btn" value="Submit">
            
            </div>
			<div class="full" style="margin-bottom: 0;">

				<div class="loading"><i class="fa fa-spinner fa-spin"></i></div>

			</div>
          </div>
          <!-- Search END-->

          <!-- Search Results START-->
          <span class="summary-result">
            <!-- Search results for Location <strong>New York</strong>, About <strong>24,202</strong> results found -->
          </span>
        <div id="companies-block">
		  <div class="listing-results" id="companies-block-list-ul">
          <?php 



								global $companies_per_page, $total_companies, $total_pages, $current_page;



								$companies_per_page = 18;



								$total_companies = 0;



								$current_page = max(1, get_query_var('paged'));


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

								  
              
								foreach($wpjobus_companies as $company) { 

									$total_companies++;

								}



								$total_pages = ceil($total_companies/$companies_per_page);



								$current_pos = -1; 



								$current_element_id = 0;

								$current_user_id = get_current_user_id();
								if($total_pages > 1){
							
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

								//echo "<pre>";print_r($wpjobus_companies);
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
                        $resume_industry = esc_attr(get_post_meta($company_id, 'resume_industry',true));
										$wpjobus_resume_latitude = esc_attr(get_post_meta($company_id, 'wpjobus_resume_latitude',true));



										$wpjobus_resume_profile_picture = esc_url(get_post_meta($company_id, 'wpjobus_resume_profile_picture',true));



										$resume_location = get_post_meta($company_id, 'resume_location',true);



										$wpjobus_resume_job_type = esc_attr(get_post_meta($company_id, 'wpjobus_resume_job_type',true));



										$wpjobus_resume_prof_title = esc_attr(get_post_meta($company_id, 'wpjobus_resume_prof_title',true));



										$wpjobus_resume_remuneration = esc_attr(get_post_meta($company_id, 'wpjobus_resume_remuneration',true));

										$wpjobus_resume_remuneration_per = esc_attr(get_post_meta($company_id, 'wpjobus_resume_remuneration_per',true));



										$resume_years_of_exp = esc_attr(get_post_meta($company_id, 'resume_years_of_exp',true));



							?> 

				<div class="result-list" id="ok">
				  
				    <a class="resumelists" href="<?php $companylink = home_url()."/resume/".$company_id; $register_link = home_url()."/register/";  if(is_user_logged_in()){ echo $companylink; }else{ echo $register_link;  } ?>">

					<div class="list-icon">
					  <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/member-icon.png" alt="Member Icon" /> -->
					
						<?php 

						require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
						$params = array( 'width' => 85, 'height' => 85, 'crop' => true );

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
					</div>
				    </a> 
					 
					<div class="list-action" >
					   <!-- <a href="#" class="gradient-btn">
						<span>Associate Request</span>
					  </a>  -->
					  	<?php //echo "echo".$company_user_id;
						      bp_add_friend_button($company_user_id);
							  
						?>
					</div>
				</div>


				<?php } 
				
				
				} ?> 
           
    

            <!-- Pagination Starts-->
            
				
				<?php
				//echo $total_pages;
			  			if($total_pages > 1){
							
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

            <!-- </div> -->
            <!-- Pagination Ends-->
          </div>
		  </div>
          <!-- Search Results END-->

		<input type="hidden" id="companies_current_page" name="companies_current_page" value="1" />
		<input type="hidden" id="companies_map_block" name="companies_map_block" value="" />
		<input type="hidden" name="action" value="wpjobusSubmitResumesFilter" />
		<?php wp_nonce_field( 'wpjobusSubmitResumesFilter_html', 'wpjobusSubmitResumesFilter_nonce' ); ?>
       
	   	</form>

	    <script type="text/javascript">



					jQuery(function($) {



						jQuery( "#advance-search-slider" ).slider({

					      	range: "min",

					      	value: <?php echo $medium; ?>,

					      	min: <?php echo $min; ?>,

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



						jQuery("#comp_keyword").focusout(function() {

					        $.fn.wpjobusSubmitFormFunction();

				            $.fn.wpjobusSubmitFormMapFunction();

						});



						jQuery("#comp_keyword").keydown(function(event) {

							if (event.keyCode == 13) {

						        $.fn.wpjobusSubmitFormFunction();

				            	$.fn.wpjobusSubmitFormMapFunction();

						    }

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



						       	$.fn.wpjobusSubmitFormFunction();

						       	$.fn.wpjobusSubmitFormMapFunction();



						       	e.preventDefault();

								return false;



						    }

						});



						jQuery(document).on("click","ul.filters-lists li.filters-list-career-one",function(e){



							jQuery('#companies_current_page').val('1');

					     	if (jQuery(this).hasClass('active')) {



						        jQuery(this).removeClass('active');

						        jQuery(this).find('.job_career_level_option').val('');



						        $.fn.wpjobusSubmitFormFunction();

						        $.fn.wpjobusSubmitFormMapFunction();



						        e.preventDefault();

								return false;



						    } else {



						       	jQuery(this).addClass('active');

						       	var id = jQuery(this).find('.job_career_level_option_value').val();

						       	jQuery(this).find('.job_career_level_option').val(id);

						       	jQuery(this).parent().find('.filters-list-career-all').removeClass('active');

						       	jQuery(this).parent().find('.filters-list-career-all .job_career_level_option').val('');



						       	$.fn.wpjobusSubmitFormFunction();

						       	$.fn.wpjobusSubmitFormMapFunction();



						       	e.preventDefault();

								return false;



						   }



						});



						jQuery(document).on("click","ul.filters-lists li.filters-list-career-all",function(e){



					     	if (jQuery(this).hasClass('active')) {

						        jQuery(this).removeClass('active');

						        jQuery(this).find('.job_career_level_option').val('');

						    } else {



						    	jQuery('#companies_current_page').val('1');



						       	jQuery(this).addClass('active');

						       	jQuery(this).find('.job_career_level_option').val('1');

						       	jQuery(this).parent().find('.filters-list-career-one').removeClass('active');

						       	jQuery(this).parent().find('.filters-list-career-one .job_career_level_option').val('');



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



						jQuery(document).on("click",".filters-list-presence-all",function(e){



					     	if (jQuery(this).hasClass('active')) {



						        jQuery(this).removeClass('active');

						        jQuery('.company-presence-all').val('');



						    } else {



						    	jQuery('#companies_current_page').val('1');



						       	jQuery(this).addClass('active');

						       	jQuery('.company-presence-all').val('1');



						       	jQuery('.filters-list-presence').removeClass('active');

						       	jQuery('.company-presence').val('');



						       	$.fn.wpjobusSubmitFormFunction();

						       	$.fn.wpjobusSubmitFormMapFunction();



						       	e.preventDefault();

								return false;



						    }

						});



						jQuery(document).on("click",".filters-list-presence",function(e){



							jQuery('#companies_current_page').val('1');

					     	if (jQuery(this).hasClass('active')) {



						        jQuery(this).removeClass('active');

						        jQuery(this).find('.company-presence').val('');



						        $.fn.wpjobusSubmitFormFunction();

						        $.fn.wpjobusSubmitFormMapFunction();



						        e.preventDefault();

								return false;



						    } else {



						       	jQuery(this).addClass('active');

						       	var id = jQuery(this).find('.company-presence-value').val();

						       	jQuery(this).find('.company-presence').val(id);

						       	jQuery(this).parent().find('.filters-list-presence-all').removeClass('active');

						       	jQuery(this).parent().find('.filters-presence-all-input').val('');



						       	$.fn.wpjobusSubmitFormFunction();

						       	$.fn.wpjobusSubmitFormMapFunction();



						       	e.preventDefault();

								return false;



						   }



						});



						jQuery(document).on("click","#comp-reset",function(e){



							jQuery('#comp_min_team').val('');

						    jQuery('#comp_max_team').val('');

						    jQuery('#comp_keyword').val('');



						    jQuery("#comp_est_year" ).val( '<?php echo $min; ?>' );



						    jQuery('#companies_current_page').val('1');



						    jQuery('.filters-list-all').addClass('active');

						    jQuery('.job_presence_type_option').val('1');



						    jQuery('.filters-list-one').removeClass('active');

						    jQuery('.filters-list-one .job_presence_type_option').val('');



						    jQuery('.filters-list-presence-all').addClass('active');

						    jQuery('.company-presence-all').val('1');



						    jQuery('.filters-list-presence').removeClass('active');

						    jQuery('.company-presence').val('');



						    jQuery('.filters-list-location-all').addClass('active');

						    jQuery('.company-location-all').val('1');



						    jQuery('.filters-list-location').removeClass('active');

						    jQuery('.company-location').val('');



						    jQuery('.filters-list-career-all').addClass('active');

						    jQuery('.job_career_level_option').val('1');



						    jQuery('.filters-list-career-one').removeClass('active');

						    jQuery('.filters-list-career-one .job_career_level_option').val('');



				            $.fn.wpjobusSubmitFormFunction();

				            $.fn.wpjobusSubmitFormMapFunction();



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

							    success: function(response) {     

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

	<!-- Content END-->
    
<!-- new design html end  -->


<?php 
//get_footer(); 

get_footer('login');


?>