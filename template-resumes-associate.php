<?php

/**

 * Template name: Associates of logged in user

 */

if(!is_user_logged_in()){ 

	$login = home_url()."/login";
	wp_redirect( $login ); exit;

}

$page = get_page($post->ID);

$current_page_id = $page->ID;

//get_header(); 

get_template_part('header-myaccount');


?>



	<?php 



		// Retrieve the URL variables (using PHP).

		if (isset($_GET['keyword'])) {

		    $keyword = $_GET['keyword'];

		} else {

		    $keyword = "";

		}



		if (isset($_GET['resume_location'])) {

		    $job_location = $_GET['resume_location'];

		} else {

		    $job_location = "";

		}



		if($job_location == "all") {

			$job_location = "";

		}



		if (isset($_GET['resume_type'])) {

		    $job_type = $_GET['resume_type'];

		} else {

		    $job_type = "";

		}



		if($job_type == "all") {

			$job_type = "";

		}



		if(!empty($job_type)) {



			$string = "AND m.meta_key = 'wpjobus_resume_job_type' AND m.meta_value LIKE '%" . $job_type . "%'";



		} else {



			$string = "";



		}



		if(!empty($job_location)) {



			$stringLocation = "AND m2.meta_key = 'resume_location' AND m2.meta_value = '" . $job_location . "'";



		} else {



			$stringLocation = "";



		}

         //$keyword="swapnilj";

		if(!empty($keyword)) {



			$stringKeyword = "AND (m4.meta_key = 'resume-about-me' AND m4.meta_value LIKE '%" . $keyword . "%') OR (m2.meta_key = 'resume_location' AND m2.meta_value LIKE '%" . $keyword . "')";



		} else {



			$stringKeyword = "";



		}



	?>

	<!-- -->

	<!-- New HTML page -->


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
            <h2>Associates</h2>
            <span>Use our Awesome Search tool to find Associates</span>
            <div class="search-prof-form">
           
                <input type="text" name="comp_keyword" id="comp_keyword" name="search-profile" class="search-profile" placeholder="Search by Members Name, Location, Title" value="">
                <input type="button" name="submit" id="submit_button" class="submit line-btn" value="Submit">
           
            </div>
          </div>
          <!-- Search END-->

          <!-- Search Results START-->
          <span class="summary-result">
            <!-- Search results for Location <strong>New York</strong>, About <strong>24,202</strong> results found -->
          </span>
          <div id="companies-block">
          <div class="listing-results" id="companies-block-list-ul" >
           
		   <?php 

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

								//echo $arr;
		
								global $companies_per_page, $total_companies, $total_pages, $current_page;



								$companies_per_page = 3;



								$total_companies = 0;



								$current_page = max(1, get_query_var('paged'));


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

								  
								//print_r($wpjobus_companies);
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

										'prev_text'    => __('« Previous', 'agrg'),

										'next_text'    => __('Next »', 'agrg'),

										'type' => 'plain',

										);



									if( $wp_rewrite->using_permalinks() )

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


          
			
			
			<!-- Single Result item Starts-->
            
			<!-- <div class="result-list">
			 
			     <a class="resumelists" href="<?php $companylink = home_url()."/resume/".$company_id; echo $companylink; ?>">
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
                </a>

                <div class="list-action">
                 
							  <?php bp_add_friend_button($company_user_id); ?>

                </div>
            </div>
		-->
            <!-- Single Result item Ends-->
   
            <?php } } ?> 




			  <!--  New Code Starts   -->


		       <ul>
                     
					 <?php 
					 
					  /* https://codex.buddypress.org/developer/loops-reference/the-members-loop/#accepted-parameters 
					  
					    user_id optional
						Limit the members returned to only friend connections of the logged in user.

					  */

					    //echo $post->post_author;
						
							global $current_user;
							$userid = $current_user->ID; //echo $userid;	

							if($_REQUEST['usrs_acco']!="")
							{
								$userid=$_REQUEST['usrs_acco'];
							}else{
								$userid = get_current_user_id();
							}

					    $margs = array('user_id' => $userid);

                        if ( bp_has_members( $margs ) ) {
                        while ( bp_members() ) : bp_the_member();
                        $wpjobus_status = $wpdb->get_results( "SELECT  p.ID, p.post_author FROM  `{$wpdb->prefix}posts` p LEFT JOIN  `{$wpdb->prefix}users` u ON p.post_author = u.id WHERE p.post_type =  'resume'	AND p.post_author = ".bp_get_member_user_id()." AND p.post_status =  'publish'");
                        $usr_id = $wpjobus_status[0]->ID;
                        $wpjobus_resume_fullname = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_fullname',true));
                        $resume_location = esc_attr(get_post_meta($usr_id, 'resume_location',true));
                        $wpjobus_resume_prof_title = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_prof_title',true));
                        $wpjobus_assc_profile_picture = esc_attr(get_post_meta($usr_id, 'wpjobus_resume_profile_picture',true));
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
			       
				   <?php $company_id= $wpjobus_status[0]->ID;  ?>

			     <a class="resumelists" href="<?php $companylink = home_url()."/resume/".$company_id; echo $companylink; ?>">
                <div class="list-icon">
                
					<?php 

					require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
					$params = array( 'width' => 50, 'height' => 50, 'crop' => true );

					?>
					
					<?php	
					//echo $wpjobus_resume_profile_picture."--";
					
					if((trim($wpjobus_assc_profile_picture))!=''){ ?>

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

										'prev_text'    => __('« Previous', 'agrg'),

										'next_text'    => __('Next »', 'agrg'),

										'type' => 'plain',

										);



									if( $wp_rewrite->using_permalinks() )

										$wpcook_pagination['base'] = '#%#%';



									if( !empty($wp_query->query_vars['s']) )

										$wpcook_pagination['add_args'] = array('s'=>get_query_var('s'));



									//echo '<div class="pagination">' . paginate_links($wpcook_pagination) . '</div>'; 



								}

								

							?>
          </div>
          </div>
          <!-- Search Results END-->


		  <input type="hidden" id="companies_current_page" name="companies_current_page" value="1" />



					<input type="hidden" id="companies_map_block" name="companies_map_block" value="" />
                    <input type="hidden" id="usrs_acco" name="usrs_acco" value="<php echo $userid; ?>" >
 

					<input type="hidden" name="action" value="wpjobusSubmitResumesFilter_associate" />

					<?php wp_nonce_field( 'wpjobusSubmitResumesFilter_html', 'wpjobusSubmitResumesFilter_nonce' ); ?>



				</form>
				<script type="text/javascript">



					jQuery(function($) {











						jQuery("#comp_keyword").focusout(function() {

					        $.fn.wpjobusSubmitFormFunction();

				            //$.fn.wpjobusSubmitFormMapFunction();

						});



						jQuery("#comp_keyword").keydown(function(event) {

							if (event.keyCode == 13) {

						        $.fn.wpjobusSubmitFormFunction();

				            	//$.fn.wpjobusSubmitFormMapFunction();

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


							jQuery(document).on("click","#submit_button",function(e){ 

								 $.fn.wpjobusSubmitFormFunction();

							});



						$.fn.wpjobusSubmitFormFunction = function() {


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
                                 
								  jQuery("#companies-block-list-ul").html(response);

								    /*
									jQuery('.loading').fadeOut(100, function(){

						        		jQuery("#companies-block-list-ul").html(response);

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

														}, i*100); // delay 150 ms

													});

										        }



										  	}

										});

						        	});

									*/

							       //return false;

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

	<!-- NEW HTML PAGe -->



<?php //get_footer(); 

get_footer('login');

?>