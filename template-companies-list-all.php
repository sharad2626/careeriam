<?php
/**
 *  Template name: All Companies list

 */

/*
if(!is_user_logged_in()){ 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

}

*/

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

	
 -->

<!-- New html start  -->

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
            <h2>Search Companies</h2>
            <span>Use our Awesome Search tool to find Companies Profiles!</span>
            <div class="search-prof-form">
            	
	             <form id="wpjobus-companies" type="post" action="" >
                 
                <input type="text" name="comp_keyword"  class="searchcr search-profile" palceholder="Search by Members Name, Location, Title" value="">
                <input type="button" id="comp_keyword" name="submit" class="submit line-btn" value="Submit">
                <input type="hidden" id="companies_current_page" name="companies_current_page" value="1" />

                <input type="hidden" id="companies_map_block" name="companies_map_block" value="" />

                <!-- <input type="hidden" name="action" value="wpjobusSubmitCompaniesFilter_following" /> -->
				<input type="hidden" name="action" value="wpjobusSubmitCompaniesFilter" />

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
								
								global $current_user, $user_id, $user_info;
								get_currentuserinfo();
								$user_id = $current_user->ID;                               

								//$companies_per_page = 18;
								$companies_per_page = 10;

								$total_companies = 0;

								$current_page = max(1, get_query_var('paged'));
								
								
								$myquery = "SELECT DISTINCT p.ID	FROM  `{$wpdb->prefix}posts` p
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id
																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id
																	WHERE p.post_type =  'company'
																	AND p.post_status =  'publish'
																	".$string."
																	".$stringLocation."
																	".$stringKeyword."
																	ORDER BY  `p`.`ID` DESC";
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
               
				<a href="<?php $register_link = home_url()."/register/";   $companylink = home_url()."/company/".$company_id; if(is_user_logged_in()){ echo $companylink; }else{ echo $register_link;  }  ?>">
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
						
					$current_user_id = get_current_user_id(); //echo "id=".$current_user_id;
								 
							if($current_user_id != ""){

								$checkpost_meta = "";
								$checkpost_meta = get_post_meta($company_id, 'company-followers', false );
								$checkkey = "";

								//echo $current_user_id."<br>";
								//print_r($checkpost_meta);

								$checkkey = array_search($current_user_id, $checkpost_meta);
								
							    //print_r($checkkey);    
								
								if($checkkey !== false){ //echo "if";
								?>
									<div id="myfollow_board"></div>							

									<div id="myfollow_board"></div>
									<span class="company-follow comfollow<?php echo $company_id; ?>" style="display:none;"> <a class="mfollow gradient-btn" href="javascript:void(0);" onclick="return makeFollow('<?php echo $company_id; ?>');" > Follow </a> </span>		
									<span class="company-following comfollowing<?php echo $company_id; ?>"> <a class="dflow gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $company_id; ?>);">  Following </a></span>

								<?php 
								}else{ //echo "else";
								?>

									<span class="company-follow comfollow<?php echo $company_id; ?>">
									<a class="mfollow gradient-btn" href="javascript:void(0);" onclick="return makeFollow('<?php echo $company_id; ?>');" > Follow </a>
									</span>								
									<span class="company-following comfollowing<?php echo $company_id; ?>" style="display:none;"> <a class="dflow gradient-btn" href="javascript:void(0);" onclick="return delFollow(<?php echo $company_id; ?>);">  Following </a>
									</span>
								

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
            
          </div>
          <!-- Search Results END-->
      </div>
    </div>

 <!-- Content END-->

<script type="text/javascript">
				
				function makeFollow(comid){
					var company_id = comid; //alert(company_id);
					url	=	'<?php echo home_url(); ?>/wp-content/themes/careeriam/inc/com-follow.php'; 
					jQuery.get(url, {company_id: company_id}, function (mytickets){ //alert(mytickets);
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
					
					/*		
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
					*/
                    /*
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

					*/

					jQuery("#comp_keyword").click(function() {
					
					    $.fn.wpjobusSubmitFormFunction();
				        //$.fn.wpjobusSubmitFormMapFunction();
					});

					jQuery("#comp_keyword").keydown(function(event) {
						if (event.keyCode == 13) {
                                              
						    $.fn.wpjobusSubmitFormFunction();
				           	//$.fn.wpjobusSubmitFormMapFunction();
						}
					});
					
					
					jQuery(document).on("click",".pagination a.page-numbers",function(e){

				     	var hrefprim = jQuery(this).attr('href');
				     	var href = hrefprim.replace("#", "");

                		jQuery('#companies_current_page').val(href);

				     	$.fn.wpjobusSubmitFormFunction();
				     	//$.fn.wpjobusSubmitFormMapFunction();

				     	e.preventDefault();
						return false;

					});

					jQuery(".pagination a.page-numbers").click(function(e){

				     	var hrefprim = jQuery(this).attr('href');
				     	var href = hrefprim.replace("#", "");

                		jQuery('#companies_current_page').val(href);

				     	$.fn.wpjobusSubmitFormFunction();
				     	//$.fn.wpjobusSubmitFormMapFunction();

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
								
								
					        },	 
						    success: function(response) {  //alert(response); 
								
								
								jQuery("#companies-block").empty();
								jQuery("#companies-block").html(response);
								//jQuery("#companies-block").html("there seems some error");

                                /*
								

								*/

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
