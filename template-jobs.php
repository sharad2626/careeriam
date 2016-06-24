<?php
/**
 * Template name: Jobs
 */

$page = get_page($post->ID);
$current_page_id = $page->ID;

//get_header(); 

get_template_part('header-activity');

?>

	<?php 

		global $keyword;

		// Retrieve the URL variables (using PHP).
		if (isset($_GET['keyword'])) {
		    $keyword = $_GET['keyword'];
		
		} else {
		    $keyword = "";
		}

		if (isset($_GET['job_location'])) {
		    $job_location_search = $_GET['job_location'];
		} else {
		    $job_location_search = "";
		}

		if($job_location_search == "all") {
			$job_location_search = "";
		}

		if (isset($_GET['job_type'])) {
		    $job_type = $_GET['job_type'];
		} else {
		    $job_type = "";
		}

		if($job_type == "all") {
			$job_type = "";
		}

		if(!empty($job_type)) {

			$string = "AND m.meta_key = 'wpjobus_job_type' AND m.meta_value = '" . $job_type . "'";

		} else {

			$string = "";

		}

		if(!empty($job_location_search)) {

			$stringLocation = "AND m2.meta_key = 'job_location' AND m2.meta_value = '" . $job_location_search . "'";

		} else {

			$stringLocation = "";

		}

		if(!empty($keyword)) {

			$stringKeyword = "AND (m2.meta_key = 'job_location' AND m2.meta_value LIKE '%" . $keyword . "%')";
			$stringKeyword = "OR (m3.meta_key = 'wpjobus_job_fullname' AND m3.meta_value LIKE '%" . $keyword . "%')";

		} else {

			$stringKeyword = "";

		}
?>


 <!-- Content START-->

<form id="wpjobus-companies" type="post" action="" >
	<div class="company-header sections">
      <div class="container">
          <!-- Breadcrumb START-->
          <div class="breadcrumbs-sec">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Search Companies</a></li>
            </ul>
          </div>
          <!-- Breadcrumb END-->
          <!-- Search START-->
          <div class="search-profiles">
            <h2>Job List</h2>
			

            <span>Use our Awesome Search tool to find Jobs</span>
            <div class="search-prof-form">
                <input type="text" name="comp_keyword" id="comp_keyword" class="search-profile" palceholder="Search by Designation, Location Experience" value="">
            	<input type="button" id="submitbutton" class="submit line-btn" value="Submit">
              
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

							if( $wp_rewrite->using_permalinks() )
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

							?> 
		
			<a href="<?php $register_link = home_url()."/register/"; if(is_user_logged_in()){ $joblink = home_url()."/job-details/?post=".$company_id; echo  $joblink;  }else{ echo $register_link;  } ?>" target="<?php  if(is_user_logged_in()){ echo $lk_target; }else{ echo $register_link;   }      ?>" >
			
            <div class="result-list">
                <div class="list-icon">
                	
					<?php if($wpjobus_job_jobkey!=""){ ?>
					
					<img src="<?php echo get_stylesheet_directory_uri().'/img/indeed-logo.png'; ?>" alt="Indeed logo" />
					
					<?php }elseif($wpjobus_job_cover_image!=''){?>
                  
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
				  
				  <a href="<?php $register_link = home_url()."/register/"; if(is_user_logged_in()){ $joblink = home_url()."/job-details/?post=".$company_id; echo  $joblink;  }else{ echo $register_link;  } ?>" class="gradient-btn" target="_blank">
                    <span>View</span>
                  </a>
                
				<?php } ?>

                </div>
            </div>
			</a>
           
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
          </div>
		  </div>
          <!-- Search Results END-->
      </div>
    </div>
	
	<input type="hidden" id="companies_current_page" name="companies_current_page" value="1" />
	<input type="hidden" id="companies_map_block" name="companies_map_block" value="" />
	<input type="hidden" name="action" value="wpjobusSubmitJobsFilter" />
	<?php wp_nonce_field( 'wpjobusSubmitJobsFilter_html', 'wpjobusSubmitJobsFilter_nonce' ); ?>

</form>
				<script type="text/javascript">

					jQuery(function($) {

						jQuery(document).ready( function() {
                            
							/*
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

                            */

							jQuery("#submitbutton").click(function() { 
					            $.fn.wpjobusSubmitFormFunction();
					            //$.fn.wpjobusSubmitFormMapFunction();
							});
							jQuery("#comp_keyword").click(function() {
					            $.fn.wpjobusSubmitFormFunction();
					            $.fn.wpjobusSubmitFormMapFunction();
							});

							// jQuery("#comp_keyword").keydown(function(event) {
								// if (event.keyCode == 13) {
						            // $.fn.wpjobusSubmitFormFunction();
						            // $.fn.wpjobusSubmitFormMapFunction();
						        // }
							// });

							jQuery("#comp_max_team").focusout(function() {
								jQuery('#companies_current_page').val('1');
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
								    success: function(response) { //alert(response); 
										jQuery('.loading').fadeOut(100, function(){
							        		jQuery("#companies-block").html(response);
							        		jQuery("#companies-block").css('height', 'auto');
								            jQuery("#companies-block").stop().animate({'opacity' : '1'}, 250);
								            //jQuery('.pagination').insertBefore( "#companies-block-list-ul" );


                                            /*  
								            jQuery('#companies-block-list-ul').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
											  	if (isInView) {
											    	// element is now visible in the viewport
											    	if (jQuery(this).hasClass('animated-list')) {
											            
											        } else { )
											        	jQuery(this).addClass('animated-list');

											        	jQuery('#companies-block-list-ul div').each(function(i) {
															var $li = jQuery(this);
															setTimeout(function() {
															    $li.addClass('animate');
															}, i*100); // delay 150 ms
														});
											        }

											  	}
											});

                                            */  
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
							};

						});

					});

				</script>


    <!-- Content END-->


	


<?php 
 get_footer("add-company");

?>