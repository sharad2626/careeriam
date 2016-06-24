<?php


add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

add_action('bp_init','my_post_form',4);//register a form
//it will register a fomr
function my_post_form(){
$settings=array('post_type'=>'company',//which post type
'post_author'=>  bp_loggedin_user_id(),//who will be the author of the submitted post
'post_status'=>'draft',//how the post should be saved, change it to 'publish' if you want to make the post published automatically
'current_user_can_post'=>  is_user_logged_in(),//who can post
'show_categories'=>true,//whether to show categories list or not, make sure to keep it true
'allowed_categories'=>array(1,2,3,4)//array of allowed categories which should be shown, use  get_all_category_ids() if you want to allow all categories
);
//$form=bp_new_simple_blog_post_form('my form',$settings);//create a Form Instance and register it
}




add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
		
		 wp_enqueue_style( 'arrowchat_css', get_stylesheet_directory_uri()."/arrowchat/external.php?type=css", array( 'parent-style' ), null, 'all' );
		 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
		
		wp_enqueue_script( 'arrowchat-ui', home_url(). '/arrowchat/includes/js/jquery-ui.js', array( 'jquery' ), '20150406' );
		
		wp_enqueue_script( 'arrowchat-djs', home_url(). '/arrowchat/external.php?type=djs', array( 'jquery' ), '20150406', true );
		wp_enqueue_script( 'arrowchat-js', home_url(). '/arrowchat/external.php?type=js', array( 'jquery' ), '20150406', true );

}
function checkfriends($cuurentuser_id)
{
	global $wpdb;
$sql="select friend_user_id from `".$wpdb->prefix."bp_friends` where initiator_user_id=$cuurentuser_id";	$results=$wpdb->get_results($sql);

return $results;
	}




add_action( 'bp_member_header_actions', 'bp_add_friend_button' );
add_action( 'bp_member_header_actions', 'bp_send_public_message_button' );
add_action( 'bp_member_header_actions', 'bp_send_private_message_button' );

//vvv steve@damionhickman.com vvv (3/23/2015)

include("functions_sldh.php");

/*
 * Custom Controls
 */
include("inc/customization.php");


//^^^ steve@damionhickman.com ^^^




function WPJobus_extra_widgets_init() {

    register_sidebar( array(

        'name' => __( 'Profile Associates', 'theme-slug' ),

        'id' => 'profile-associates',

        'description' => __( 'Widgets in this area will be shown on Profile page.', 'theme-slug' ),

        'before_widget' => '<div class="widget">',

	'after_widget'  => '</div>',

	'before_title'  => '<h1 class="block-title">',

	'after_title'   => '</h1><div class="divider"></div>',

    ) );
		
		    register_sidebar( array(

        'name' => __( 'Profile Inbox', 'theme-slug' ),

        'id' => 'profile-inbox',

        'description' => __( 'Widgets in this area will be shown on Profile page.', 'theme-slug' ),

        'before_widget' => '<div class="widget">',

	'after_widget'  => '</div>',

	'before_title'  => '<h4> <i class="fa fa-inbox"></i> ',

	'after_title'   => '</h4>',

    ) );

		    register_sidebar( array(

        'name' => __( 'Home buttom widget', 'theme-slug' ),

        'id' => 'home-buttom-vedio',

        'description' => __( 'Widgets in this area will be shown on home page.', 'theme-slug' ),

        'before_widget' => '<div class="homebuttom">',

	'after_widget'  => '<div style="clear:both"></div></div>',

	'before_title'  => '',

	'after_title'   => '',

    ) );
		
		 register_sidebar( array(

        'name' => __( 'Home buttom widget Text', 'theme-slug' ),

        'id' => 'home-buttom-text',

        'description' => __( 'Widgets in this area will be shown on home page.', 'theme-slug' ),

        'before_widget' => '<div class="homebuttomright">',

	'after_widget'  => '<div style="clear:both"></div></div>',

	'before_title'  => '',

	'after_title'   => '',

    ) );
		register_sidebar( array(

        'name' => __( 'Home buttom area', 'theme-slug' ),

        'id' => 'home-buttom-area',

        'description' => __( 'Widgets in this area will be shown on home page.', 'theme-slug' ),

        'before_widget' => '<div class="full">',

	'after_widget'  => '</div>',

	'before_title'  => '',

	'after_title'   => '',

    ) );

	register_sidebar(array(

			'name' => __( 'Activity Page Trending Widget', 'theme-slug' ),

			'id' => 'activity-trending-area',

			'description' => __( 'Activity Page Trending Widget.', 'theme-slug' ),

			'before_widget' => '',

			'after_widget'  => '',

			'before_title'  => '',

			'after_title'   => '',

	));

}

add_action( 'widgets_init', 'WPJobus_extra_widgets_init' );


if ( ! current_user_can( 'manage_options' ) ) {

    show_admin_bar( false );

}




add_action("add_meta_boxes", "register_resume_careerpitch");



function register_resume_careerpitch(){



   add_meta_box("wpjobus_resume_careerpitch_settings", "Career Pitch Video Url", "display_wpjobus_resume_careerpitch_settings", "resume");
   add_meta_box("wpjobus_resume_careerpitch_video_settings", "Career Pitch Video Upload", "display_wpjobus_resume_careerpitch_video_settings", "resume");



}



function display_wpjobus_resume_careerpitch_settings ($post) {

 
 
  $custom = get_post_custom($post->ID);
   $resume_careerpitch = $custom["resume_careerpitch"][0];
   $resume_careerpitch_radio = $custom["resume_careerpitch_radio"][0];

  ?>



  <input type="text" id="resume_careerpitch" name="resume_careerpitch" value="<?php echo $resume_careerpitch; ?>" />
  <input type="radio" id="resume_careerpitch_radio" name="resume_careerpitch_radio" <?php if($resume_careerpitch_radio=='url'){?> checked="checked" <?php } ?> value="url" />

  <?php

}

function display_wpjobus_resume_careerpitch_video_settings ($post) {

 
 
  $custom = get_post_custom($post->ID);
   $resume_careerpitch_video = $custom["resume_careerpitch_video"][0];
   $resume_careerpitch_radio = $custom["resume_careerpitch_radio"][0];

  ?>



  <input type="text" id="resume_careerpitch_video" name="resume_careerpitch_video" value="<?php echo $resume_careerpitch_video; ?>" />
  <input type="radio" id="resume_careerpitch_radio" name="resume_careerpitch_radio" <?php if($resume_careerpitch_radio=='upload'){?> checked="checked" <?php } ?> value="upload" />

  <?php

}



add_action('save_post', 'save_details');

function save_details(){

  global $post;



  update_post_meta($post->ID, "resume_careerpitch", $_POST["resume_careerpitch"]);
  update_post_meta($post->ID, "resume_careerpitch_video", $_POST["resume_careerpitch_video"]);
  update_post_meta($post->ID, "resume_careerpitch_radio", $_POST["resume_careerpitch_radio"]);




}

add_action( 'wp_ajax_wpjobusEditResumeForm', 'wpjobuscEditResumeForm' );
add_action( 'wp_ajax_nopriv_wpjobusEditResumeForm', 'wpjobuscEditResumeForm' );

function wpjobuscEditResumeForm() {


	$current_post = $_POST['postID'];



	$post_id = $current_post;


	
	update_post_meta($post_id, "resume_careerpitch", $_POST["resume_careerpitch"]);
	update_post_meta($post_id, "resume_careerpitch_video", $_POST["resume_careerpitch_video"]);
	update_post_meta($post_id, "resume_careerpitch_radio", $_POST["resume_careerpitch_radio"]);

	  $SubmitResumeSuccess = home_url()."/resume/".$post_id;
   
 


}

function remove_update_notifications($value) {
    if ( isset( $value ) && is_object( $value ) ) {
       
        unset($value->response[ 'indeed-job-importer/indeed-job-importer.php' ]);
    }
}
add_filter('site_transient_update_plugins', 'remove_update_notifications');


add_filter('wp_mail','handle_wp_mail');

function handle_wp_mail($atts) {
    /*"Your username and password" is the subject of the Email WordPress send from "function wp_new_user_notification" in file "wp-includes/pluggable.php"*/

    if (isset ($atts ['subject']) && substr_count($atts ['subject'],'Your username and password')>0 ) {
	if (isset($atts['message'])) {
	   $atts['message'] = 'new body';
	}
    }
    return ($atts);
}
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );




function showing_associates($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'author_id' => '',
		'post_id' => ''
	), $atts));
	global $post;
	global $redux_demo; 
$access_state = $redux_demo['access-state'];
		$this_post_id = $post_id;
	if(empty($this_post_id)) {

	$page = get_page($this_post_id);
	$this_post_id = $page->ID;

} 
	//$post->post_author=$author_id;
	if(!empty($author_id))
	{
		$post->post_author=$author_id;
		
		$main_author_1=$author_id;
		
		}else
		{
			$main_author=get_post($this_post_id);
		
$main_author_1=$main_author->post_author;

			}




	global $companies_per_page, $total_companies, $total_pages, $current_page,$wpdb;
		$wpjobus_companies = $wpdb->get_results( "SELECT DISTINCT p.ID, p.post_author

																	FROM  `{$wpdb->prefix}posts` p

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m ON p.ID = m.post_id

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m2 ON p.ID = m2.post_id

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m3 ON p.ID = m3.post_id

																	LEFT JOIN  `{$wpdb->prefix}postmeta` m4 ON p.ID = m4.post_id

																	WHERE p.post_type =  'resume'

																	AND p.post_status =  'publish'	ORDER BY  `p`.`ID` DESC");
																	$args = array(
    'ID'        =>  $this_post_id, // I could also use $user_ID, right?        
    );
	
$output='';
// get his posts 'ASC'


 $user_by_post=get_userdata($main_author_1); $user_by_post->user_login;


															$current_user_id = get_current_user_id();
$friends_d=array();

$friends=checkfriends($post->post_author );
//print_r($friends);
foreach($friends as $m)

{

	$friends_d[]=$m->friend_user_id;
	}

    
	    $output.= '<h4 class="block-title1"><a href="'.site_url().'/associates/">'.$user_by_post->user_nicename.'`s Associates</a></h4>'; 
	 //get first char
	foreach($wpjobus_companies as $q)
{	
		//print_r($q);		
$user_info1 = get_userdata($q->post_author); 
if(!in_array($q->post_author, $friends_d))
{
	
	continue;

	}

									$current_pos++;

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



				
				
					 require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 

								 $output.='<a class="resumelists" href="'.$companylink = home_url().'/resume/'.$company_id.$companylink.'';
	 $params = array( 'width' => 50, 'height' => 50, 'crop' => true );

                  $output.= ' <div class="item-avatar">
							<a href="http://careeriam.com/members/'.$user_info1->user_nicename.'/" title="bnbvnbv">';
							$mg=bfi_thumb( $wpjobus_resume_profile_picture, $params );
                            
                           $output.=  '<img src="'.$mg.'" alt="'.$wpjobus_resume_fullname.'" class="avatar user-26-avatar avatar-50 photo" width="50" height="50" alt="Profile picture of'.$wpjobus_resume_fullname.'">
                             </a>
                             
                             <div class="item">
							<div class="item-title fn"><a title="bnbvnbv" href="http://careeriam.com/members/'.$user_info1->user_nicename.'/">'.$user_info1->user_nicename.'</a></div>
							
							<div class="item-meta">
								<span class="activity">';
                              
$datetime1 = new DateTime($user_info1->user_registered);
$datetime2 = new DateTime();
$interval = $datetime1->diff($datetime2);

		 $output.='registered'.$interval->format("%m month %d days %i hours ago");	

				$output.='</span></div></div></span></a>';
                
								 //echo bp_add_friend_button($company_user_id); 
								
								?>


					



							<?php  
	
	} 
	return $output;
	
}
add_shortcode('associates_by_id', 'showing_associates');

function show_all_associates($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'user_id' => '',
	), $atts));
	global $post;
	
	$html ='';

 $margs = array('user_id' => $user_id);
	 if ( bp_has_members( $margs ) ) :
	
	 while ( bp_members() ) : bp_the_member();

			$html .='<div class="item-avatar">
							<a href="'. bp_core_get_userlink($user_id) .'" title="'. bp_member_name() .'">'. bp_member_avatar() .'</a>
                                                        
                             <div class="item">
							<div class="item-title fn"><a href="'. bp_member_permalink().'" title="'. bp_member_name() .'">'. bp_member_name() .'</a></div>
							<div class="item-meta">
								<span class="activity">								
										'.bp_member_registered().'
								</span>
							</div>
						</div>
                        
                        
						</div>';

						
		endwhile;
	 	else:	


 	$html .='<div class="full"><h4><?php _e( "Well, it looks like there are no results matching your criterias", "resume" ); ?></h4></div>';
	    endif; 
	return $html;	
}

add_shortcode('show_all_associates', 'show_all_associates');
	
	function _bp_core_get_user_domain($domain, $user_id, $user_nicename = false, $user_login = false) {
    if ( empty( $user_id ) ){
        return;
    }
    if( isset($user_nicename) ){
        $user_nicename = bp_core_get_username($user_id);
    }
	global $wpdb;
	$m=$wpdb->get_results('select * from wp_posts where post_author='.$user_id.' and post_type="resume"');
	
	foreach($m as $t)
	{
		
		$user_id=$t->ID;
		$k=get_post_meta($user_id,'wpjobus_resume_fullname');
		$user_nicename=$k[0];
		}
		$user_nicename=$k[0];

    $after_domain ='resume/' . $user_id;

    $domain = trailingslashit( bp_get_root_domain() . '/' . $after_domain );
    $domain = apply_filters( 'bp_core_get_user_domain_pre_cache', $domain, $user_id, $user_nicename, $user_login );
    if ( !empty( $domain ) ) {
        wp_cache_set( 'bp_user_domain_' . $user_id, $domain, 'bp' );
    }
    return $domain;
}

//add_filter('bp_core_get_user_domain', '_bp_core_get_user_domain', 10, 4);		

function _bp_core_get_userid($userid, $username){
    if(is_numeric($username)){
        $aux = get_userdata( $username );
        if( get_userdata( $username ) )
            $userid = $username;
    }

    return $userid;
}



add_filter('bp_core_get_userid', '_bp_core_get_userid', 10, 2);


function my_member_username() {
    global $members_template;

    return $members_template->member->user_login.'p';
}
add_filter('bp_member_name','my_member_username');


	
include("inc/resume_filters.php");	
include("inc/companies-filters.php");
include("inc/jobs-filters.php");

function ray_bp_core_get_user_displayname( $name, $user_id ) {
	global $bp;

	if ( bp_loggedin_user_id() == $user_id ) {
		$displayed_user = $bp->loggedin_user->userdata;
	} elseif ( bp_displayed_user_id() == $user_id ) {
		$displayed_user = $bp->displayed_user->userdata;
	} else {
		if ( empty( $bp->usernames_only->userdata ) ) {
			$bp->usernames_only = new stdClass;
			$bp->usernames_only->userdata = array();
		}

		$displayed_user = false;

		// try to get locally-cached value first
		if ( ! empty( $bp->usernames_only->userdata[$user_id] ) ) {
			$displayed_user = $bp->usernames_only->userdata[$user_id];
		}

		// no cached value, so query for it
		if ( $displayed_user === false ) {
			$displayed_user = bp_core_get_core_userdata( $user_id );

			// cache it for later use
			$bp->usernames_only->userdata[$user_id] = $displayed_user;
		}
	}

	return ray_bp_username_compatibility( $displayed_user );
}
add_filter( 'bp_core_get_user_displayname', 'ray_bp_core_get_user_displayname', 1, 2 );
function ray_bp_username_compatibility( $userdata ) {
	if ( empty( $userdata ) )
		return false;

	if ( bp_is_username_compatibility_mode() )
		return $userdata->user_login;
	
			global $wpdb;
	$m=$wpdb->get_results('select * from wp_posts where post_author='.$userdata->ID.' and post_type="resume"');
	
	foreach($m as $t)
	{
		
		$user_id=$t->ID;
		$h=get_post_meta($user_id,'wpjobus_resume_fullname');
		
		$userdata->user_nicename=$h[0];
		}
		
		

	return $userdata->user_nicename;
}
function ray_get_comment_author( $author ) {
	global $bp, $comment;

	if( $comment->user_id > 0 ) {
		if ( bp_loggedin_user_id() == $comment->user_id ) {
			$displayed_user = $bp->loggedin_user->userdata;
		} else {
			if ( empty( $bp->usernames_only->userdata ) ) {
				$bp->usernames_only = new stdClass;
				$bp->usernames_only->userdata = array();
			}

			$displayed_user = false;

			// try to get locally-cached value first
			if ( ! empty( $bp->usernames_only->userdata[$comment->user_id] ) ) {
				$displayed_user = $bp->usernames_only->userdata[$comment->user_id];
			}

			// no cached value, so query for it
			if ( $displayed_user === false ) {
				$displayed_user = bp_core_get_core_userdata( $comment->user_id );

				// cache it for later use in the loop
				$bp->usernames_only->userdata[$comment->user_id] = $displayed_user;
			}
		}

		return ray_bp_username_compatibility( $displayed_user );

	} else {
		return $author;
	}
}
add_filter( 'get_comment_author', 'ray_get_comment_author' );


function wpjobusRegisterFormcIam() {

  if ( isset( $_POST['wpjobusRegister_nonce'] ) && wp_verify_nonce( $_POST['wpjobusRegister_nonce'], 'wpjobusRegister_html' ) ) {
  	
	$username = sanitize_text_field($_POST['userName']);
	$lastname = sanitize_text_field($_POST['lastName']);
	$email = sanitize_email($_POST['userEmail']);
	$password = $_POST['userPassword'];

	$captcha1= cptch_check_custom_form();

	$registerSuccess = 1;
	$registerName = 1;
	$registerEmail = 1;

	if (username_exists($username)) {
		echo "ji";
	  $registerSuccess = 0;
	  $registerName = 0;


	} 

	if( email_exists( $email )) {
		//echo "jin";
	  $registerSuccess = 0;
	  $registerEmail = 0;

	} 
	
	if($captcha1 == 0)
	{
		$registerSuccess = 0;
		$registerUserSuccess = 6;
            
	}elseif($registerName == 0 AND $registerEmail == 0) {
	  $registerUserSuccess = 3;
	}elseif($registerEmail == 0){
	  $registerUserSuccess = 2;
	}elseif($registerName == 0){
	  $registerUserSuccess = 1;
	}

	if($registerSuccess == 1) {

	  wp_create_user( $username, $password, $email ,$lastname);
	  $user = get_user_by( 'email', $email);
	  $uid=$user->ID;
	  
	  /*************************** add post meta *****************************/
	
	
	
	
	
	    Global $wpdb;
		$wpdb->insert( 
	'wp_posts', 
	array( 
		'post_author' => $uid,
		'post_type' => 'resume',
		'post_date' => date("Y-m-d H:i:s"),
	), 
	array( 
		'%d', 
		'%s' 
	) 
);


        $last_insertid=$wpdb->insert_id;
$my_post = array(
      'ID'           =>  $last_insertid,
      'post_name'   => $last_insertid
  );

// Update the post into the database
  wp_update_post( $my_post );

		$currentDate = current_time('timestamp');
		add_post_meta( $last_insertid, 'post_type','job', true );  
		add_post_meta( $last_insertid, 'post_id',$last_insertid, true );  
		add_post_meta( $last_insertid, 'wpjobus_resume_fullname',$username, true ); 
		add_post_meta( $last_insertid, 'wpjobus_post_title',$username, true );
		add_post_meta( $last_insertid, 'resume_gender','Male', true );
		add_post_meta( $last_insertid, 'resume_years_of_exp','1', true );
		add_post_meta( $last_insertid, 'resume_career_level','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_email',$email, true );
			
		
		add_post_meta( $last_insertid, 'resume_years_of_exp','', true );
		add_post_meta( $last_insertid, 'resume_career_level','', true );
		add_post_meta( $last_insertid, 'resume_careerpitch','', true );
		add_post_meta( $last_insertid, 'resume_careerpitch_video','', true );
		add_post_meta( $last_insertid, 'resume_careerpitch_radio','', true );
		add_post_meta( $last_insertid, 'resume_month_birth','1', true );
		add_post_meta( $last_insertid, 'resume_day_birth','1', true );
		add_post_meta( $last_insertid, 'resume_year_birth','2015', true );
		add_post_meta( $last_insertid, 'resume_industry','Informational Technology', true );
		add_post_meta( $last_insertid, 'resume_location','USA', true );
		add_post_meta( $last_insertid, 'resume-about-me','', true );
			
		
		add_post_meta( $last_insertid, 'wpjobus_resume_profile_picture','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_cover_image','', true );
        add_post_meta( $last_insertid, 'wpjobus_resume_prof_title','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_comm_level','', true );
		
		add_post_meta( $last_insertid, 'wpjobus_resume_comm_note','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_org_level','', true );
        add_post_meta( $last_insertid, 'wpjobus_resume_org_note','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_job_rel_level','', true );
		
		
		add_post_meta( $last_insertid, 'wpjobus_resume_job_rel_note','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_skills','', true );
        add_post_meta( $last_insertid, 'wpjobus_resume_native_language','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_languages','', true );
	
	
	add_post_meta( $last_insertid, 'wpjobus_resume_hobbies','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_education','', true );
        add_post_meta( $last_insertid, 'wpjobus_resume_award','', true );
		add_post_meta( $last_insertid, 'wpjobus_resume_work','', true );
	

	
	add_post_meta( $last_insertid, 'wpjobus_resume_testimonials','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_remuneration','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_remuneration_per','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_remuneration_raw','', true );

	add_post_meta( $last_insertid, 'wpjobus_resume_job_type','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_portfolio','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_address','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_phone','', true );

	
	
	
	add_post_meta( $last_insertid, 'wpjobus_resume_website','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_email',$email, true );
	add_post_meta( $last_insertid, 'wpjobus_resume_publish_email','publish_email', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_facebook','', true );

	
	
	add_post_meta( $last_insertid, 'wpjobus_resume_linkedin','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_twitter','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_googleplus','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_googleaddress','', true );

	add_post_meta( $last_insertid, 'wpjobus_resume_longitude','0', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_latitude','0', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_file','', true );
	add_post_meta( $last_insertid, 'wpb_post_views_count','', true );
	add_post_meta( $last_insertid, 'wpjobus_resume_file_name','', true );
		add_post_meta( $last_insertid, 'wpjobus_featured_expiration_date',$currentDate, true );
	  
 
        $current_post = $last_insertid;

$website = 'http://careeriam.com';
$user_id = wp_update_user( array( 'ID' => $uid, 'user_url' => $website ) );



		
		
        $resumeLink = get_site_url(null, 'resume/' . $current_post);

        $action = '<a href="' . $resumeLink . '">' . wp_kses($username, array()) . '</a>&#8217;s resume was updated';



        $wpdb->query(

            $wpdb->prepare(

                "INSERT INTO wp_bp_activity

(`user_id`,`component`,`type`,`action`,`content`,`primary_link`,`item_id`,`secondary_item_id`,`date_recorded`,`hide_sitewide`,`mptt_left`,`mptt_right`,`is_spam`)

VALUES

(%d, %s, %s, %s, %s, %s, %d, %d, %s, %d, %d, %d, %d)",

                $uid,

                "xprofile",

                "resume_update",

                $action,

                "",

                $resumeLink,

                0, 0, date("Y-m-d H:i:s"), 0, 0, 0, 0

            )

        );
	  
	  /***************************** end here *************************************/
	  $confirmation_status=1;
     $avatar_url = get_avatar_url( $email, 60 ); 
	/*  if($avatar){
		 
		 $avatar=get_avatar( $email, 60 ); 
	 }
	 else{ */
		  $avatar="<img src='".$avatar_url."' style='width:60px; min-height:60px; display:inline-block; vertical-align: middle; margin: 0px 15px 0px 0px;'>";  
	  // }
	  
			$from = get_option('admin_email');
			//$headers = "MIME-Version: 1.0" . "\r\n";
			//$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			//$headers .= 'From: Support <support@careeriam.com>' . "\r\n";
             $user_email ='ketan.patel@wwindia.com';

			$headers .= 'From: '.$user_email."\r\n".
                              'Reply-To: '.$user_email."\r\n" .
                           'X-Mailer: PHP/' . phpversion();
			/*ganesh comment */
			//$msg = "<div style='border: 115px solid #ccc;background: #fff;padding:50px;'><div><img border='0' style='width: 300px;'src='http://careeriam.com/wp-content/uploads/2015/07/careeriam-logo.png' /> <p></div>" ;

	   
	  $subject = "CarrierIam Registration successful";
	  	 /*ganesh comment */
	/*  $msg .= '<div style="font-weight:bold; width:100%; margin-bottom:20px;">Hi '.$username.'!,</div>
	  <div> '.$avatar.'</p></div> ';*/
	  
	  /*
<div style="width:100%; margin-bottom:20px;">Welcome and thank you for joining CareerIam!</div> 
<div style="font-weight:bold; width:100%; margin-bottom:12px;">Here is your login Details</div> 
<div style="width:100%; margin-bottom:20px;">Please go to <a href="http://careeriam.com/members/?token='.$confirmation_status.'&email='.$email.'">CarrierIam</a> and check your account.</div> 
<div style="width:100%; margin-bottom:12px;">Username: '.$username.'</div> 
<div style="width:100%; margin-bottom:12px;">Password: '.$password.'</div> 
	  <br><br> 
<div style=" font-weight:bold; width:100%; margin-bottom:12px;">Explore with confidence!<br> 
<div style=" font-weight:bold; width:100%; margin-bottom:12px;">Thanks,<br> 
	  CarrierIam Team</div>'; */
	 /*ganesh comment */
/*$msg .= '<div style=" font-weight:bold; width:100%; margin-bottom:12px;"><p>Welcome and thank you for joining CareerIam! </p><p>Below is the link along with your username and password to access your account. Explore with confidence!</p></div></br>
<div style="width:100%; margin-bottom:12px;"><p>Username: '.$username.'</div> </p>
<div style="width:100%; margin-bottom:12px;"><p>Password: '.$password.'</div></p>
<div style="width:100%; margin-bottom:12px;"><p>Please go to this page to login <br></p>http://careeriam.com/login'; */

$main_image   = get_stylesheet_directory_uri()."/images/wc-mailer.png";
$logo_image   = get_stylesheet_directory_uri()."/images/CareerImLogo.png.png.";
$home_url     = get_home_url(); 
$home_url_login   = $home_url."/login/";
$main_image   = get_stylesheet_directory_uri()."/images/wc-mailer.png";
			  $logo_image   = get_stylesheet_directory_uri()."/images/CareerImLogo.png";
			  $fb=get_stylesheet_directory_uri()."/images/wc-f.png";
			  $tw=get_stylesheet_directory_uri()."/images/wc-t.png";
			  $go=get_stylesheet_directory_uri()."/images/wc-g.png";

$msg='<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Career-I-am</title>
  <style>
   table {border-collapse:collapse; table-layout:fixed; width:550px;}
   table td {  word-wrap:break-word; }
   </style>
</head>
  
<body style="margin:0; padding:0; ">
  <table width="550" style="margin:0 auto; "  cellspacing="0" cellpadding="0" border="0">
    <tr width="550" style=" background:#404040;margin:0; padding:0; ">
      <td style="margin:0 auto; padding:25px 0; text-align:center;" >
        <img src="'.$logo_image.'" alt="Logo"  />
      </td>
    </tr>
    <tr width="550" style="margin:0; padding:0; ">
      <td style="margin:0 auto; text-align:center;" >
        <img src="'.$main_image.'" alt="Main Image"  />
      </td>
    </tr>
  </table> 
    <table width="550" style="background:#f7f7f7; display:block; margin:0 auto;" cellspacing="0" cellpadding="0" border="0">
      <tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px; ">
        <td style="font-size:51px;color: #28a4c4; float:left; width:474px; font-weight:bold; margin:0 auto; text-align:center; padding:20px 0 2px 0;" >
         WELCOME
        </td>
      </tr>
      <tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px  ">
        <td style="color:#9a9a9a; font-size:18px; text-align:center;font-weight:bold; width:474px; float:left;"> and thank you for joining CareerIam!</td>
      </tr>
      <tr  style="float:left; width:474px; display:block; margin:0 ;padding:0 38px; ">
        <td style="color:#747474; font-size:16px; font-weight:normal; width:474px; float:left; padding:30px 0 0;">Below is the link with your email & password to access your account</td>
      </tr>
      <tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px; ">
        <td style="color:#53b6d2; width:474px; float:left; padding:18px 0 0; font-size:15px;"><a href="'.$home_url_login.'">Login</a></td>
      </tr>
      <tr style="float:left; width:474px; display:block; margin:0;padding:0 38px; ">
        <td style="color:#a0a0a0; font-size:16px; padding:5px 0 10px 0;">Email    : '.$email.'</td>
      </tr>
      <tr style="float:left; width:474px; display:block; margin:0;padding:0 38px; ">
        <td style="color:#a0a0a0; font-size:16px; padding:5px 0 40px 0;">password: '.$password.'</td>
      </tr>
    </table>
    <table width="550" style="background:#f7f7f7; display:block; margin:0 auto;" cellspacing="0" cellpadding="0" border="0">
        <tr width="550" style="background-color:#43c499;">
            <td style="text-align:center; width:550px;">
               <ul style="margin:0; padding:24px 0 20px 0;">
                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Jobs</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Members</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Companies</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Contact Us</a></li>

               </ul> 
          </td>
    </tr>

    <tr width="550" style="background-color:#43c499;">
         <td style="text-align:center; padding:0 0 22px 0; margin:0; width:550px;">
              <a href="#"><img src="'.$fb.'" alt="Facebook"></a>
             <a href="#"><img src="'.$tw.'" alt="Twitter"></a>
             <a href="#"><img src="'.$go.'" alt="Google"></a>
         </td>
    </tr>
    <tr width="550" style="background-color:#2aa6c9;">
        <td style="font-size:12px; color:#fff; text-align:center; padding:15px 0 15px 0; margin:0; width:550px;">
          <a href="#" style="color:#fff; text-decoration:none;">www.careeriam.com</a> - Copyright 2015
        </td>
    </tr>
    </table>
</body>
</html>';
//echo $msg;
//exit;
// wp_mail( $email, $subject, $msg, $headers);

/*** SMTP code start ***/

		include($_SERVER['DOCUMENT_ROOT'].'/PHPMailer-master/PHPMailerAutoload.php');

		ini_set('display_errors','1');
		error_reporting(E_ALL);


		$from = 'testing@careeriam.phpdevelopment.co.in';
		$from_name = 'From Careeriam website';
		$subject = $subject;

		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->IsHTML(true);
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'mail.phpdevelopment.co.in';
		$mail->Port = 25;
		$mail->Username = "testing@careeriam.phpdevelopment.co.in";
		$mail->Password = "T2[-+Do_rAyw";
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $msg;
		// $mail->AddAddress($mgmtEmail);
		$mail->AddAddress($email);

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

        /*
		if ($mail->Send()) {
		  
		 } else {
		

		 } */

		// Email header start


		// To send HTML mail, the Content-type header must be set

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Create email headers

		$headers .= 'From: '.$from."\r\n".
		'Reply-To: '.$from."\r\n" .
		'X-Mailer: PHP/' . phpversion();

		
		if(mail($email, $subject, $msg, $headers)){
		
		}else{
		
		}



         //echo "Exit at 1071"; exit;  

/*** SMTP code end **/

	  $login_data = array();
	  $login_data['user_login'] = $username;
	  $login_data['user_password'] = $password;
	  wp_signon( $login_data, false );

	  $registerUserSuccess = 4;

	}

  } else {

	$registerUserSuccess = 5;

  }

  echo $registerUserSuccess;

  die(); // this is required to return a proper result

}
add_action( 'wp_ajax_wpjobusRegisterForm', 'wpjobusRegisterFormcIam' );
add_action( 'wp_ajax_nopriv_wpjobusRegisterForm', 'wpjobusRegisterFormcIam' );


function wpjobusResetFormcIam() {


  if ( isset( $_POST['wpjobusReset_nonce'] ) && wp_verify_nonce( $_POST['wpjobusReset_nonce'], 'wpjobusReset_html' ) ) {

	$email = sanitize_email($_POST['userEmail']);
	$captcha= cptch_check_custom_form();
	//echo  $captcha; 

	$user = get_user_by( 'email', $email );
	$user_ID = $user->ID;
	/*echo "hi";
	print_r($user_ID);*/
	if($captcha == 1){

	if( !empty($user_ID)) {
		//echo "str";

		$new_password = wp_generate_password( 12, false ); 

		if ( isset($new_password) ) {
			//echo "one";

			wp_set_password( $new_password, $user_ID );

			$from = get_option('admin_email');
			 $avatar= get_avatar( $email, 60 ); 
			  $uid  .=get_avatar( $user_ID ); 
			  //echo "tho",$uid;
	 if($uid){
	 	//echo "three";
		  $avatar_url = get_avatar_url( $email, 60 ); 
		 
	   }
	 else{

		 $avatar="<img src='".$avatar_url."' style='width:60px; min-height:60px; display:inline-block; vertical-align: middle; margin: 0px 15px 0px 0px;'>";
	  }
	// echo "four";
	     
			$headers = "MIME-Version: 1.0" . "\r\n";
       		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: '.$from . "\r\n";
			$subject = "Password reset!";
			 $main_image   = get_stylesheet_directory_uri()."/images/wc-mailer.png";
			  $logo_image   = get_stylesheet_directory_uri()."/images/CareerImLogo.png";
			  $fb=get_stylesheet_directory_uri()."/images/wc-f.png";
			  $tw=get_stylesheet_directory_uri()."/images/wc-t.png";
			  $go=get_stylesheet_directory_uri()."/images/wc-g.png";
			$msg='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Career-I-am</title>
  <style>
   table {border-collapse:collapse; table-layout:fixed; width:550px;}
   table td {  word-wrap:break-word; }
   </style>
</head>
  <html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Career-I-am</title>
  <style>
   table {border-collapse:collapse; table-layout:fixed; width:550px;}
   table td {  word-wrap:break-word; }
   </style>
</head>
  
<body style="margin:0; padding:0; ">
  <table width="550" style="margin:0 auto; "  cellspacing="0" cellpadding="0" border="0">
    <tr width="550" style=" background:#404040;margin:0; padding:0; ">
      <td style="margin:0 auto; padding:25px 0; text-align:center;" >
        <img src="'.$logo_image.'" alt="Logo"  />
      </td>
    </tr>
    <tr width="550" style="margin:0; padding:0; ">
      <td style="margin:0 auto; text-align:center;" >
        <img src="'.$main_image.'" alt="Main Image"  />
      </td>
    </tr>
  </table> 
    <table width="550" style="background:#f7f7f7; display:block; margin:0 auto;" cellspacing="0" cellpadding="0" border="0">
      <tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px; ">
        <td style="font-size:51px;color: #28a4c4; float:left; width:474px; font-weight:bold; margin:0 auto; text-align:center; padding:20px 0 2px 0;" >
         PASSWORD
        </td>
      </tr>
      <tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px  ">
        <td style="color:#9a9a9a; font-size:18px; text-align:center;font-weight:bold; width:474px; float:left;"> We received a request to reset the password</td>
      </tr>
      <tr  style="float:left; width:474px; display:block; margin:0 ;padding:0 38px; ">
        <td style="color:#747474; font-size:16px; font-weight:normal; width:474px; float:left; padding:30px 0 0;"> Your New Password is:'.$new_password.' </td>
      </tr>
     
      <tr style="float:left; width:474px; display:block; margin:0;padding:0 38px; ">
        <td style="color:#747474; font-size:16px; font-weight:normal; width:474px; float:left; padding:30px 0 40px;"> If you did not request to have your password reset you can safely ignore this email. Rest assured your customer account is safe.</td>
      </tr>
    </table>
    <table width="550" style="background:#f7f7f7; display:block; margin:0 auto;" cellspacing="0" cellpadding="0" border="0">
        <tr width="550" style="background-color:#43c499;">
            <td style="text-align:center; width:550px;">
               <ul style="margin:0; padding:24px 0 20px 0;">
                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Jobs</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Members</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Companies</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Contact Us</a></li>

               </ul> 
          </td>
    </tr>

    <tr width="550" style="background-color:#43c499;">
         <td style="text-align:center; padding:0 0 22px 0; margin:0; width:550px;">
             <a href="#"><img src="'.$fb.'" alt="Facebook"></a>
             <a href="#"><img src="'.$tw.'" alt="Twitter"></a>
             <a href="#"><img src="'.$go.'" alt="Google"></a>
         </td>
    </tr>
    <tr width="550" style="background-color:#2aa6c9;">
        <td style="font-size:12px; color:#fff; text-align:center; padding:15px 0 15px 0; margin:0; width:550px;">
          <a href="#" style="color:#fff; text-decoration:none;">www.careeriam.com</a> - Copyright 2015
        </td>
    </tr>
    </table>

  
</body>
</html>';
//$msg .= 'Reset password.<br>Your login details<br><br>New Password: '.$new_password.'  <div> '.$avatar.'</div>'  ; 
//echo $msg;
//exit;
// wp_mail( $email, $subject, $msg, $headers);

/*** SMTP code start ***/

		include($_SERVER['DOCUMENT_ROOT'].'/PHPMailer-master/PHPMailerAutoload.php');

		ini_set('display_errors','1');
		error_reporting(E_ALL);


			$from = get_option('admin_email');
		$from_name = 'From Careeriam website';
		$subject = $subject;

		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->IsHTML(true);
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'mail.phpdevelopment.co.in';
		$mail->Port = 25;
		$mail->Username = "testing@careeriam.phpdevelopment.co.in";
		$mail->Password = "T2[-+Do_rAyw";
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $msg;
		// $mail->AddAddress($mgmtEmail);
		$mail->AddAddress($email);

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

		
			//$msg .= 'Reset password.<br>Your login details<br><br>New Password: '.$new_password.'  <div> '.$avatar.'</div>'  ; 

			//wp_mail( $email, $subject, $msg, $headers );

			$resetSuccess = 1;
			//if ($mail->Send()) 
			if(mail($email, $subject, $msg, $headers))	
			{
				echo "sent";
		  
		 } else {
		
		 		echo "not sent";
		 }

		}

	} }else {

		$resetSuccess = 2;

		$message = "There is no user available for this email.";

	} // end if/else


  } else {

	$resetSuccess = 3;

  }

  //echo $resetSuccess;

  //die(); // this is required to return a proper result

}
add_action( 'wp_ajax_wpjobusResetForm', 'wpjobusResetFormcIam' );
add_action( 'wp_ajax_nopriv_wpjobusResetForm', 'wpjobusResetFormcIam' );

/*add_filter( 'bp_get_activity_action', 'new_activity_array' );
function new_activity_array(){
global $activities_template;
//print_r($activities_template);
$action = $activities_template->activity->action;
$action = apply_filters_ref_array( 'bp_get_activity_action_pre_meta', array( $action, &$activities_template->activity ) );

if ( !empty( $action ) )
$action = bp_insert_activity_meta( $action );   

return apply_filters_ref_array( 'bp_get_activity_action', array( $action, &$activities_template->activity ) );
}
*/


/*function my_theme_add_activity_tab() {

if ( !is_user_logged_in() )

return false;

?>

<li id="activity-myclass">

<a href="<?php echo site_url( BP_ACTIVITY_SLUG . '/#myclass/' ) ?>" title="<?php _e( 'Activity for my Class Year.', 'buddypress' ) ?>">

<?php printf( __( 'My Class', 'buddypress' ) ) ?>

</a>

</li>

<?php

}


add_action( 'bp_before_activity_type_tab_friends', 'my_theme_add_activity_tab' );

// passes MyClass scope into ajax query for custom Class Year activity filter

function bp_my_ajax_querystring_activity_filter( $query_string, $scope ) {

global $bp, $wpdb;



echo ">>>>>>>>>".$scope;

}

add_filter( 'bp_dtheme_ajax_querystring', 'bp_my_ajax_querystring_activity_filter', 10, 6 );*/
function my_member_username1() {

global $members_template;

$members_template->member->user_login="test";

return $members_template->member->user_login;

}

add_filter('bp_member_name','my_member_username1');
function ray_bp_acomment_name( $name, $comment ) {
//print_r($comment);

 global $wpdb;

	$m=$wpdb->get_results('select * from wp_posts where post_author='. $comment->user_id.' and post_type="resume"');
	
	foreach($m as $t)
	{
		
		$user_id=$t->ID;
		$h=get_post_meta($user_id,'wpjobus_resume_fullname');
		
		$comment->user_nicename=$h[0];
		$name=$h[0];
		}


	return ray_bp_username_compatibility( $comment );

}

add_filter( 'bp_acomment_name' , 'ray_bp_acomment_name', 1, 2 );




add_action("wp_ajax_send_message", "send_message");
add_action("wp_ajax_nopriv_send_message", "send_message");
function send_message(){ 
	
	global $current_user,$wpdb;
	get_currentuserinfo();
	
	$reciever_id = $_POST['reciver_id'];
	$message = $_POST['message'];
	$sender_id =  $current_user->ID ;
	$sender_name=$current_user->display_name;
	$sender_mail=$current_user->user_email;
	$subject = $_POST['subject'];
	$receiverEmail = sanitize_email($_POST['receiverEmail']);
	//echo $receiverEmail;
	$sql= $wpdb->get_results("select ID from wp_users where user_email = '".$receiverEmail."'");
	//echo "select ID from wp_users where user_email LIKE '%".$receiverEmail."%'";
	//print_r($sql);
	/*foreach ($sql as $key ) {

		$reciever_id=$key->id;
	}*/
	 $reciever_id=$sql[0]->ID;
	//echo "id",$reciever_id;

	//print_r($sql) ;
   // $sender_mail="sanjayrajmastana@gmail.com";
	 
			$from = $sender_id;
			$avatar= get_avatar( $sender_mail, 60 ); 
			if($avatar){
			$avatar=get_avatar( $sender_mail, 60 ); 
			}
			if(empty($avatar)){
			$avatar="<img src='http://careeriam.com/wp-content/themes/careeriam/img/user-default.png' style='width:60px;height:60px'>";
			}

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: '.$from . "\r\n";
			$subject = $subject;
			$msg = "<div><img border='0' src='http://careeriam.com/wp-content/uploads/2015/07/careeriam-logo.png' /> </div>" ;
			
			 $msg .= '<div style="font-weight:bold; width:100%; margin-bottom:20px;">'.$avatar.'</div> ';
			$msg .= ' <div> New Message From:&nbsp;&nbsp;'.$sender_name.' \r\n Message:'.$message.'</div>'  ;
			$mail=wp_mail( $sender_mail, $subject, $msg, $headers );
			if($mail){
			    $mssage=1;
				$currentDate = current_time('timestamp');
				$today = date('h-i-s');
				  Global $wpdb;
		
		
		
			$wpdb->insert( 
			'wp_inboxmessage', 
			array( 
			'reciever_id' => $reciever_id,
			'sender_id' => $sender_id,
			'date' => $sender_id,
			'time' => $today,
			'message'=>$message,
			'subject' =>$subject 
			), 
			array( 
			'%d', 
			'%d',
			'%s', 
			'%s',
			'%s',
			'%s'
			) 
			);


				return $mssage;
			}
			else{
					$mssage=0;
					return $mssage;
			}

 
 }
 
/**
 * Load media files needed for Uploader
 */
function load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'init', 'load_wp_media_files' );




/*Add job Ajax*/
function wpjobusSubmitJobForm() {

  if ( isset( $_POST['wpjobusSubmitJob_nonce'] ) && wp_verify_nonce( $_POST['wpjobusSubmitJob_nonce'], 'wpjobusSubmitJob_html' ) ) {

	global $redux_demo; 
	$recipe_state = $redux_demo['resume-state'];

	if (current_user_can('administrator')) {

	  	$post_information = array(
			'ID' => $current_post,
			'post_title' => $_POST['fullName'],
			'post_content' => strip_tags($_POST['postContent']),
			'post_type' => 'job',
				'comment_status' => 'open',
				'ping_status' => 'open',
			'post_status' => 'publish'
	  	);

	  	$post_id = wp_insert_post($post_information);
                
		$my_post = array(
			'ID' => $post_id,
			'post_title' => $_POST['fullName'],
			'post_name' => $post_id
		);

		wp_update_post( $my_post );

		$postStatus = $_POST['postStatus'];

		if($postStatus == 'draft') {

		  	$my_post = array(
			  	'ID' => $post_id,
			  	'post_status' => 'draft'
		  	);

		  	wp_update_post( $my_post );

		} else {

		  	$my_post = array(
			  	'ID' => $post_id,
			  	'post_status' => 'publish'
		  	);

		  	wp_update_post( $my_post );

		  	

		}

		update_post_meta($post_id, 'wpjobus_featured_post_status', 'regular');

	} else {

	  	if($recipe_state == "1") {
	
			$post_information = array(
				'ID' => $current_post,
				'post_title' => $_POST['fullName'],
				'post_content' => strip_tags($_POST['postContent']),
				'post_type' => 'job',
					'comment_status' => 'open',
					'ping_status' => 'open',
				'post_status' => 'draft'
		  	);

		  	$post_id = wp_insert_post($post_information);

			$my_post = array(
				'ID' => $post_id,
				'post_title' => $_POST['fullName'],
				'post_name' => $post_id
			);

			wp_update_post( $my_post );

			$postStatus = $_POST['postStatus'];

			if($postStatus == 'draft') {

			  	$my_post = array(
				  	'ID' => $post_id,
				  	'post_status' => 'draft'
			  	);

			  	wp_update_post( $my_post );

			} else {

			  	global $redux_demo; 
			  	$comp_reg_price = $redux_demo['job-regular-price'];
				$wpjobus_post_reg_status = esc_attr(get_post_meta($post_id, 'wpjobus_featured_post_status',true));

			  	if(($wpjobus_post_reg_status == "featured") || ($wpjobus_post_reg_status == "regular") or (empty($comp_reg_price))) {

				  	$my_post = array(
					  	'ID' => $post_id,
					  	'post_status' => 'publish'
				  	);



				} else {

					$my_post = array(
					  	'ID' => $post_id,
					  	'post_status' => 'draft'
				  	);

				}

			  	wp_update_post( $my_post );

			}

	  	} else {

			$post_information = array(
				'ID' => $current_post,
				'post_title' => $_POST['fullName'],
				'post_content' => strip_tags($_POST['postContent']),
				'post_type' => 'job',
					'comment_status' => 'open',
					'ping_status' => 'open',
				'post_status' => 'pending'
		  	);

		  	$post_id = wp_insert_post($post_information);

			$my_post = array(
				'ID' => $post_id,
				'post_title' => $_POST['fullName'],
				'post_name' => $post_id
			);

			wp_update_post( $my_post );

	  	}

	}
        add_post_meta( $post_id, 'edu_remuneration_amt', $_POST['edu_remuneration_amt'] );
        add_post_meta( $post_id, 'edu_remuneration_desc', $_POST['edu_remuneration_desc'] );
	update_post_meta($post_id, 'wpjobus_job_fullname', wp_kses($_POST['fullName'], $allowed));
	update_post_meta($post_id, 'wpjobus_post_title', wp_kses($_POST['fullName'], $allowed));
	update_post_meta($post_id, 'job_industry', wp_kses($_POST['job_industry'], $allowed));
	update_post_meta($post_id, 'job_location', wp_kses($_POST['job_location'], $allowed));
	update_post_meta($post_id, 'job_company', wp_kses($_POST['job_company'], $allowed));
	update_post_meta($post_id, 'job-about-me', htmlentities(stripslashes($_POST['postContent'])));
	update_post_meta($post_id, 'job_years_of_exp', wp_kses($_POST['job_years_of_exp'], $allowed));
	update_post_meta($post_id, 'wpjobus_job_cover_image', wp_kses($_POST['wpjobus_job_cover_image'], $allowed));
	update_post_meta($post_id, 'job_presence_type', $_POST['job_presence_type']);

	update_post_meta($post_id, 'wpjobus_job_prof_title', wp_kses($_POST['wpjobus_job_prof_title'], $allowed));
	update_post_meta($post_id, 'job_career_level', wp_kses($_POST['job_career_level'], $allowed));

	update_post_meta($post_id, 'wpjobus_job_skills', $_POST['wpjobus_job_skills']);

	update_post_meta($post_id, 'wpjobus_job_comm_level', wp_kses($_POST['wpjobus_job_comm_level'], $allowed));
	update_post_meta($post_id, 'wpjobus_job_comm_note', strip_tags($_POST['skillsNotes']));

	update_post_meta($post_id, 'wpjobus_job_org_level', wp_kses($_POST['wpjobus_job_org_level'], $allowed));
	update_post_meta($post_id, 'wpjobus_job_org_note', strip_tags($_POST['orgNotes']));

	update_post_meta($post_id, 'wpjobus_job_job_rel_level', wp_kses($_POST['wpjobus_job_job_rel_level'], $allowed));
	update_post_meta($post_id, 'wpjobus_job_job_rel_note', strip_tags($_POST['jobNotes']));

	update_post_meta($post_id, 'wpjobus_job_native_language', wp_kses($_POST['wpjobus_job_native_language'], $allowed));

	update_post_meta($post_id, 'wpjobus_job_languages', $_POST['wpjobus_job_languages']);

	update_post_meta($post_id, 'wpjobus_job_hobbies', wp_kses($_POST['wpjobus_job_hobbies'], $allowed));

	update_post_meta($post_id, 'wpjobus_job_benefits', $_POST['wpjobus_job_benefits']);

	update_post_meta($post_id, 'wpjobus_job_remuneration', $_POST['wpjobus_job_remuneration']);
	update_post_meta($post_id, 'wpjobus_job_remuneration_per', $_POST['wpjobus_job_remuneration_per']);

	$remuneration_ammount = $_POST['wpjobus_job_remuneration'];
	$str = preg_replace('/\D/', '', $remuneration_ammount);
	update_post_meta($post_id, 'wpjobus_job_remuneration_raw', $str);
	
	update_post_meta($post_id, 'wpjobus_job_type', $_POST['wpjobus_job_type']);

	update_post_meta($post_id, 'wpjobus_job_address', $_POST['wpjobus_job_address']);
	update_post_meta($post_id, 'wpjobus_job_phone', $_POST['wpjobus_job_phone']);
	update_post_meta($post_id, 'wpjobus_job_website', $_POST['wpjobus_job_website']);
	update_post_meta($post_id, 'wpjobus_job_email', $_POST['wpjobus_job_email']);
	update_post_meta($post_id, 'wpjobus_job_publish_email', $_POST['wpjobus_job_publish_email']);
	update_post_meta($post_id, 'wpjobus_job_facebook', $_POST['wpjobus_job_facebook']);
	update_post_meta($post_id, 'wpjobus_job_linkedin', $_POST['wpjobus_job_linkedin']);
	update_post_meta($post_id, 'wpjobus_job_twitter', $_POST['wpjobus_job_twitter']);
	update_post_meta($post_id, 'wpjobus_job_googleplus', $_POST['wpjobus_job_googleplus']);
	update_post_meta($post_id, 'wpjobus_job_googleaddress', $_POST['wpjobus_job_googleaddress']);
	update_post_meta($post_id, 'wpjobus_job_longitude', $_POST['wpjobus_job_longitude']);
	update_post_meta($post_id, 'wpjobus_job_latitude', $_POST['wpjobus_job_latitude']);

	if ( get_post_status ( $post_id ) == 'publish' ) {
		wpjobusSendNotifications($post_id);
	}

	$SubmitResumeSuccess = home_url()."/job/".$post_id;

  } else {

	$SubmitResumeSuccess = 0;

  }

  echo $SubmitResumeSuccess;

  die(); // this is required to return a proper result

}
add_action( 'wp_ajax_wpjobusSubmitJobForm', 'wpjobusSubmitJobForm' );
add_action( 'wp_ajax_nopriv_wpjobusSubmitJobForm', 'wpjobusSubmitJobForm' );
/*Add job Ajax*/



function wpjobusEditJobForm() {

  if ( isset( $_POST['wpjobusEditJob_nonce'] ) && wp_verify_nonce( $_POST['wpjobusEditJob_nonce'], 'wpjobusEditJob_html' ) ) {

	global $redux_demo; 
	$recipe_state = $redux_demo['resume-state'];

	$current_post = $_POST['postID'];

	if (current_user_can('administrator')) {

	  	$post_information = array(
			'ID' => $current_post,
			'post_title' => $_POST['fullName'],
			'post_content' => strip_tags($_POST['postContent']),
			'post_type' => 'job',
				'comment_status' => 'open',
				'ping_status' => 'open',
			'post_status' => 'publish'
	  	);

		$postStatus = $_POST['postStatus'];

		if($postStatus == 'draft') {

		  	$my_post = array(
			  	'ID' => $current_post,
			  	'post_status' => 'draft'
		  	);

		  	wp_update_post( $my_post );

		} else {

		  	$my_post = array(
			  	'ID' => $current_post,
			  	'post_status' => 'publish'
		  	);

		  	wp_update_post( $my_post );

		}

	} else {

	  	if($recipe_state == "1") {
	
			$post_information = array(
				'ID' => $current_post,
				'post_title' => $_POST['fullName'],
				'post_content' => strip_tags($_POST['postContent']),
				'post_type' => 'job',
					'comment_status' => 'open',
					'ping_status' => 'open',
				'post_status' => 'draft'
		  	);

			$postStatus = $_POST['postStatus'];

			if($postStatus == 'draft') {

			  	$my_post = array(
				  	'ID' => $current_post,
				  	'post_status' => 'draft'
			  	);

			  	wp_update_post( $my_post );

			} else {

			  	global $redux_demo; 
			  	$comp_reg_price = $redux_demo['job-regular-price'];
				$wpjobus_post_reg_status = esc_attr(get_post_meta($current_post, 'wpjobus_featured_post_status',true));

			  	if(($wpjobus_post_reg_status == "featured") || ($wpjobus_post_reg_status == "regular") or (empty($comp_reg_price))) {

				  	$my_post = array(
					  	'ID' => $current_post,
					  	'post_status' => 'publish'
				  	);

				} else {

					$my_post = array(
					  	'ID' => $current_post,
					  	'post_status' => 'draft'
				  	);

				}

			  	wp_update_post( $my_post );

			}

	  	} else {

			$post_information = array(
				'ID' => $current_post,
				'post_title' => $_POST['fullName'],
				'post_content' => strip_tags($_POST['postContent']),
				'post_type' => 'job',
					'comment_status' => 'open',
					'ping_status' => 'open',
				'post_status' => 'pending'
		  	);

		  	wp_insert_post($post_information);

	  	}

	}

	$my_post = array(
		'ID' => $current_post,
		'post_title' => $_POST['fullName']
	);

	wp_update_post( $my_post );

	$post_id = $current_post;
        update_post_meta( $post_id, 'edu_remuneration_amt', $_POST['edu_remuneration_amt'] );
        update_post_meta( $post_id, 'edu_remuneration_desc', $_POST['edu_remuneration_desc'] );
	update_post_meta($post_id, 'wpjobus_job_fullname', wp_kses($_POST['fullName'], $allowed));
	update_post_meta($post_id, 'wpjobus_post_title', wp_kses($_POST['fullName'], $allowed));
	update_post_meta($post_id, 'job_industry', wp_kses($_POST['job_industry'], $allowed));
	update_post_meta($post_id, 'job_location', wp_kses($_POST['job_location'], $allowed));
	update_post_meta($post_id, 'job_company', wp_kses($_POST['job_company'], $allowed));
	update_post_meta($post_id, 'job-about-me', htmlentities(stripslashes($_POST['postContent'])));
	update_post_meta($post_id, 'job_years_of_exp', wp_kses($_POST['job_years_of_exp'], $allowed));
	update_post_meta($post_id, 'wpjobus_job_cover_image', wp_kses($_POST['wpjobus_job_cover_image'], $allowed));
	update_post_meta($post_id, 'job_presence_type', $_POST['job_presence_type']);

	update_post_meta($post_id, 'wpjobus_job_prof_title', wp_kses($_POST['wpjobus_job_prof_title'], $allowed));
	update_post_meta($post_id, 'job_career_level', wp_kses($_POST['job_career_level'], $allowed));

	update_post_meta($post_id, 'wpjobus_job_skills', $_POST['wpjobus_job_skills']);

	update_post_meta($post_id, 'wpjobus_job_comm_level', wp_kses($_POST['wpjobus_job_comm_level'], $allowed));
	update_post_meta($post_id, 'wpjobus_job_comm_note', strip_tags($_POST['skillsNotes']));

	update_post_meta($post_id, 'wpjobus_job_org_level', wp_kses($_POST['wpjobus_job_org_level'], $allowed));
	update_post_meta($post_id, 'wpjobus_job_org_note', strip_tags($_POST['orgNotes']));

	update_post_meta($post_id, 'wpjobus_job_job_rel_level', wp_kses($_POST['wpjobus_job_job_rel_level'], $allowed));
	update_post_meta($post_id, 'wpjobus_job_job_rel_note', strip_tags($_POST['jobNotes']));

	update_post_meta($post_id, 'wpjobus_job_native_language', wp_kses($_POST['wpjobus_job_native_language'], $allowed));

	update_post_meta($post_id, 'wpjobus_job_languages', $_POST['wpjobus_job_languages']);

	update_post_meta($post_id, 'wpjobus_job_hobbies', wp_kses($_POST['wpjobus_job_hobbies'], $allowed));

	update_post_meta($post_id, 'wpjobus_job_benefits', $_POST['wpjobus_job_benefits']);

	update_post_meta($post_id, 'wpjobus_job_remuneration', $_POST['wpjobus_job_remuneration']);
	update_post_meta($post_id, 'wpjobus_job_remuneration_per', $_POST['wpjobus_job_remuneration_per']);

	$remuneration_ammount = $_POST['wpjobus_job_remuneration'];
	$str = preg_replace('/\D/', '', $remuneration_ammount);
	update_post_meta($post_id, 'wpjobus_job_remuneration_raw', $str);
	
	update_post_meta($post_id, 'wpjobus_job_type', $_POST['wpjobus_job_type']);

	update_post_meta($post_id, 'wpjobus_job_address', $_POST['wpjobus_job_address']);
	update_post_meta($post_id, 'wpjobus_job_phone', $_POST['wpjobus_job_phone']);
	update_post_meta($post_id, 'wpjobus_job_website', $_POST['wpjobus_job_website']);
	update_post_meta($post_id, 'wpjobus_job_email', $_POST['wpjobus_job_email']);
	update_post_meta($post_id, 'wpjobus_job_publish_email', $_POST['wpjobus_job_publish_email']);
	update_post_meta($post_id, 'wpjobus_job_facebook', $_POST['wpjobus_job_facebook']);
	update_post_meta($post_id, 'wpjobus_job_linkedin', $_POST['wpjobus_job_linkedin']);
	update_post_meta($post_id, 'wpjobus_job_twitter', $_POST['wpjobus_job_twitter']);
	update_post_meta($post_id, 'wpjobus_job_googleplus', $_POST['wpjobus_job_googleplus']);
	update_post_meta($post_id, 'wpjobus_job_googleaddress', $_POST['wpjobus_job_googleaddress']);
	update_post_meta($post_id, 'wpjobus_job_longitude', $_POST['wpjobus_job_longitude']);
	update_post_meta($post_id, 'wpjobus_job_latitude', $_POST['wpjobus_job_latitude']);

	$SubmitResumeSuccess = home_url()."/job/".$post_id;

  } else {

	$SubmitResumeSuccess = 0;

  }

  echo $SubmitResumeSuccess;

  die(); // this is required to return a proper result

}
add_action( 'wp_ajax_wpjobusEditJobForm', 'wpjobusEditJobForm' );
add_action( 'wp_ajax_nopriv_wpjobusEditJobForm', 'wpjobusEditJobForm' );


 
/******* THis function for Sending message from popup on user inbox that is user_message page  ***********/

function wpjobContactForm1() {  
	/* if(mail('sharad.kolhe@wwindia.com', 'My Subject', "test")){ echo "Sent";  }else{ echo "Not sent"; } exit; */

  if ( isset( $_POST['scf_nonce'] ) && wp_verify_nonce( $_POST['scf_nonce'], 'scf_html' ) ) {


	$name = sanitize_text_field($_POST['contactName']);
	$email = sanitize_email($_POST['UsrEmail']);
	$receiverEmail = sanitize_email($_POST['receiverEmail']);
	$message = wp_kses_data($_POST['message']);
	$subject_msg = wp_kses_data($_POST['subject']);

	$reciever_id = $_POST['reciever_id'];
	$sender_id = $_POST['sender_id'];
	
	//echo $message;
	$blog_title = get_bloginfo('name');
	$to=sanitize_text_field($_POST['to']); 
	$fullName=sanitize_text_field($_POST['fullname']);
	$profpic=sanitize_text_field($_POST['profpic']);
	//echo $profpic;
	$emailTo = $email;
	//echo $emailTo;
	$subject = "Message from ".$blog_title; 
	$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
	
	$main_image   = get_stylesheet_directory_uri()."/images/wc-mailer.png";
	$logo_image =get_stylesheet_directory_uri()."/images/CareerImLogo.png";
	$fb=get_stylesheet_directory_uri()."/images/wc-f.png";
	$tw=get_stylesheet_directory_uri()."/images/wc-t.png";
	$go=get_stylesheet_directory_uri()."/images/wc-g.png";

	$home_url = get_home_url();

	$mail_links = $home_url."/resumes/";
	
    /******** Email Template integration code end  **********/


	$mail_content ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Career-I-am</title>
  <style>
   table {border-collapse:collapse; table-layout:fixed; width:550px;}
   table td {  word-wrap:break-word; }
   </style>
</head>
  
<body style="margin:0; padding:0; ">
  <table width="550" style="margin:0 auto; "  cellspacing="0" cellpadding="0" border="0">
    <tr width="550" style=" background:#404040;margin:0; padding:0; ">
      <td style="margin:0 auto; padding:25px 0; text-align:center;" >
        <img src="'.$logo_image.'" alt="Logo"  />
      </td>
    </tr>
    <tr width="550" style="margin:0; padding:0; ">
      <td style="margin:0 auto; text-align:center;" >
        <img src="'.$main_image.'" alt="Main Image"  />
      </td>
    </tr>
  </table> 
    <table width="550" style="background:#f7f7f7; display:block; margin:0 auto;" cellspacing="0" cellpadding="0" border="0">
      <tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px; ">
        <td style="font-size:51px;color: #28a4c4; float:left; width:474px; font-weight:bold; margin:0 auto; text-align:center; padding:20px 0 2px 0;" >
         MESSAGE
        </td>
      </tr>
      <tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px  ">
        <td style="color:#9a9a9a; font-size:18px; text-align:center;font-weight:bold; width:474px; float:left;"> You have a message from</td>
      </tr>
     
      <tr style="float:left; width:488px; display:block; margin:35px 31px 40px;padding:30px 0; background:url(http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/images/wc-bg.jpg)no-repeat; ">
        <td style=" width:130px; float:left; margin:0 0 0 25px;"> 
          <img src="'.$profpic.'" alt="Profile pic" width="113" height="113"/>
        </td>
        <td style=" width:300px; float:right; color:#fff; padding: 0 10px 0 0;"> 
            <h3 style="margin:0;">'.$fullName.'</h3>
            <p style="font-size: 14px;">'.$message.'</p>
            <p style="float:right; width:190px;">
              <a href="'.$mail_links.'" style="display:inline; color:#fff; width:98px; height:34px; line-height:34px; padding:0 12px;">IGNORE</a>
              <a href="'.$mail_links.'" style="display:inline-block; color:#fff; text-decoration:none; width:98px; height:34px; line-height:34px; text-align:center; background: #2ba7ca !important; background: -moz-linear-gradient(-45deg,  #2ba7ca 0%, #3bb9bc 49%, #41bfb0 52%, #46c79c 100%) !important; background: -webkit-linear-gradient(-45deg,  #2ba7ca 0%,#3bb9bc 49%,#41bfb0 52%,#46c79c 100%) !important; background: linear-gradient(135deg,  #2ba7ca 0%,#3bb9bc 49%,#41bfb0 52%,#46c79c 100%) !important;">REPLY</a>
            </p>
        </td>
      </tr>
    </table>
    <table width="550" style="background:#f7f7f7; display:block; margin:0 auto;" cellspacing="0" cellpadding="0" border="0">
        <tr width="550" style="background-color:#43c499;">
            <td style="text-align:center; width:550px;">
               <ul style="margin:0; padding:24px 0 20px 0;">
                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Jobs</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Members</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Companies</a></li>

                  <li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Contact Us</a></li>

               </ul> 
          </td>
    </tr>

    <tr width="550" style="background-color:#43c499;">
         <td style="text-align:center; padding:0 0 22px 0; margin:0; width:550px;">
             <a href="#"><img src="'.$fb.'" alt="Facebook"></a>
             <a href="#"><img src="'.$tw.'" alt="Twitter"></a>
             <a href="#"><img src="'.$go.'" alt="Google"></a>
         </td>
    </tr>
    <tr width="550" style="background-color:#2aa6c9;">
        <td style="font-size:12px; color:#fff; text-align:center; padding:15px 0 15px 0; margin:0; width:550px;">
          <a href="#" style="color:#fff; text-decoration:none;">www.careeriam.com</a> - Copyright 2015
        </td>
    </tr>
    </table>

  
</body>
</html>
';
	include($_SERVER['DOCUMENT_ROOT'].'/PHPMailer-master/PHPMailerAutoload.php');

		ini_set('display_errors','1');
		error_reporting(E_ALL);

          

			$from = $email ;
			//echo "string",$from;
		$from_name = 'From Careeriam website';
		$subject = $subject;

		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->IsHTML(true);
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		//$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = 'mail.phpdevelopment.co.in';
		$mail->Port = 25;
		$mail->Username = "testing@careeriam.phpdevelopment.co.in";
		$mail->Password = "T2[-+Do_rAyw";
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $mail_content;
		// $mail->AddAddress($mgmtEmail);
		$mail->AddAddress($emailTo);

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

	
	/********* Email Template integration code end *********/
	
	//$headers = 'From <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
	//if ($mail->Send()) 

   // echo $emailTo."-".$subject;

	// To send HTML mail, the Content-type header must be set

     $from =  get_option('admin_email');
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Create email headers
	$headers .= 'From: '.$from."\r\n".
	'Reply-To: '.$from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
    
	 //echo $mail_content;

	// echo $emailTo."-".$subject;

	if(mail($emailTo,$subject,$mail_content,$headers))	
	{
				echo "sent";
				$send = "sent";
		  
		 } else {
		
		 		echo "not sent";
				$send ="not sent";
		 }

    global $wpdb;
	
	$current_date = $today = date("Y-m-d H:i:s"); 
	$current_time = date('h-i-s');

	$query_res =$wpdb->insert( 
			  'wp_inboxmessage', 
			   array( 
			'reciever_id' => $reciever_id,
			'sender_id' => $sender_id,
			'date' => $current_date,
			'time' => $current_time,
			'message'=>$message,
			'subject' =>$subject_msg 
			), 
			array( 
			'%d', 
			'%d',
			'%s', 
			'%s',
			'%s',
			'%s'
			) 
			);

          echo "query_red=".$query_res; 


	  return $send;
	//wp_mail($emailTo, $subject, $body, $headers);

  } else {

  }
 
  die(); // this is required to return a proper result

}


add_action( 'wp_ajax_wpjobContactForm1', 'wpjobContactForm1' );
add_action( 'wp_ajax_nopriv_wpjobContactForm1', 'wpjobContactForm1' );


function wpjobContactForm() {  
/* if(mail('sharad.kolhe@wwindia.com', 'My Subject', "test")){ echo "Sent";  }else{ echo "Not sent"; } exit; */

$captcha3= cptch_check_custom_form();
//echo "========================". $captcha3;

if(isset($_POST['form_name'])&& $_POST['form_name']=='send_msg'){ 

 $captcha3 = 1;

}else{

}

  if ( isset( $_POST['scf_nonce'] ) && wp_verify_nonce( $_POST['scf_nonce'], 'scf_html' )  && $captcha3 == '1') { // echo "<pre>"; print_r($_POST);
  //echo"in";

   //  $name = sanitize_text_field($_POST['contactName']);
	
	if(isset($_POST['form_name'])&& $_POST['form_name']=='send_msg'){ 
	    $email  = sanitize_email($_POST['receiverEmail']);
	
	}else{
	
		 $email = sanitize_email($_POST['email']);
		 $email =  get_option('admin_email');

		// $email ='sharad.kolhe@wwindia.com';

	}
	$message1 =$_POST['message'];
	//echo $message;
	$blog_title = get_bloginfo('name');
	//$user_mailid=sanitize_text_field($_POST['reciver_email']); echo $user_mailid;
	 $fullName= $_POST['contactName'];
	//$profpic=sanitize_text_field($_POST['profpic']);
	//echo $profpic;

	/* profile picture and sender name needs to fetched */

	/* Message sender  will always be logged in user becsuse he can either send message to his associates or can send message to any other resume member */

	global $current_user,$wpdb;
	$logged_userid = $current_user->ID;

	$user_post_record = $wpdb->get_results("SELECT ID FROM `wp_posts` WHERE `post_author` = $logged_userid AND `post_type` = 'resume' ");
	$user_post_id = $user_post_record[0]->ID;  
	$wpjobus_resume_profile_picture = esc_attr(get_post_meta($user_post_id, 'wpjobus_resume_profile_picture',true));
	$wpjobus_resume_fullname = esc_attr(get_post_meta($user_post_id,'wpjobus_resume_fullname',true));

    if($wpjobus_resume_profile_picture!=''){
		
		$profpic = $wpjobus_resume_profile_picture;

	}else{ 
		$profpic = get_stylesheet_directory_uri()."/img/user-default.png";
	}

	//$profpic = get_stylesheet_directory_uri()."/img/user-default.png";

	$fullName= $wpjobus_resume_fullname;

	$emailTo = $email; 
	//echo $emailTo;
	$subject = "Message from ".$blog_title; 
	//$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
	
	$main_image   = get_stylesheet_directory_uri()."/images/wc-mailer.png";
	$logo_image =get_stylesheet_directory_uri()."/images/CareerImLogo.png";
	$fb=get_stylesheet_directory_uri()."/images/wc-f.png";
	$tw=get_stylesheet_directory_uri()."/images/wc-t.png";
	$go=get_stylesheet_directory_uri()."/images/wc-g.png";

	$home_url = get_home_url();

	$mail_links = $home_url."/user-messages/";
   
    

   $to = $emailTo;
   $from =  get_option('admin_email');

   //echo"====".$to;
   //echo"@@@@".$from;

 

// To send HTML mail, the Content-type header must be set

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 

// Create email headers

$headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();

 

// Compose a simple HTML email message

$message = '<html>';
$message .= '<head><title>Career-I-am</title>';
$message .= '<style>
   table {border-collapse:collapse; table-layout:fixed; width:550px;}
   table td {  word-wrap:break-word; }
   </style></head>';
$message .= '<body style="margin:0; padding:0; ">';
$message .= '<table width="550" style="margin:0 auto; "  cellspacing="0" cellpadding="0" border="0">';
   $message .= '<tr width="550" style=" background:#404040;margin:0; padding:0; ">';
      $message .= '<td style="margin:0 auto; padding:25px 0; text-align:center;" >';
        $message .= '<img src="'.$logo_image.'" alt="Logo"  />';
      $message .= '</td>';
    $message .= '</tr>';
   $message .= '<tr width="550" style="margin:0; padding:0; ">';
      $message .= '<td style="margin:0 auto; text-align:center;" >';
        $message .= '<img src="'.$main_image.'" alt="Main Image" />';
      $message .= '</td>';
    $message .= '</tr>';
    $message .= '</table>';

 $message .= '<table width="550" style="background:#f7f7f7; display:block; margin:0 auto;"cellspacing="0" cellpadding="0" border="0">
     ';
 $message .= '<tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px; ">';
        $message .= '<td style="font-size:51px;color: #28a4c4; float:left; width:474px; font-weight:bold; margin:0 auto; text-align:center; padding:20px 0 2px 0;" >';
        $message .= 'MESSAGE';
       $message .= '</td>';
      $message .= '</tr>';
        $message .= '<tr  style="float:left; width:474px; display:block; margin:0;padding:0 38px  ">';
       $message .= ' <td style="color:#9a9a9a; font-size:18px; text-align:center;font-weight:bold; width:474px; float:left;"> You have a message from</td>';
      $message .= '</tr>';
  $message .= '<tr style="float:left; width:488px; display:block; margin:35px 31px 40px;padding:30px 0; background:url(http://careeriam.com/wp-content/themes/careeriam/images/wc-bg.jpg)no-repeat; ">';
        $message .= '<td style=" width:130px; float:left; margin:0 0 0 25px;">'; 
         $message .= '<img src="'.$profpic.'" alt="Profile pic" width="113" height="113"/>';
        $message .= '</td>';
        $message .= '<td style=" width:300px; float:right; color:#fff; padding: 0 10px 0 0;"> ';
            $message .= '<h3 style="margin:0;">'.$fullName.'</h3>';
            $message .= '<p style="font-size: 14px;">'.$message1.'</p>';
            $message .= '<p style="float:right; width:190px;">';
              $message .= '<a href="'.$mail_links.'" style="display:inline; color:#fff; width:98px; height:34px; line-height:34px; padding:0 12px;">IGNORE</a>';
              $message .= '<a href="'.$mail_links.'" style="display:inline-block; color:#fff; text-decoration:none; width:98px; height:34px; line-height:34px; text-align:center; background: #2ba7ca !important; background: -moz-linear-gradient(-45deg,  #2ba7ca 0%, #3bb9bc 49%, #41bfb0 52%, #46c79c 100%) !important; background: -webkit-linear-gradient(-45deg,  #2ba7ca 0%,#3bb9bc 49%,#41bfb0 52%,#46c79c 100%) !important; background: linear-gradient(135deg,  #2ba7ca 0%,#3bb9bc 49%,#41bfb0 52%,#46c79c 100%) !important;">REPLY</a>';
            $message .= '</p>';
        $message .= '</td>';
      $message .= '</tr>';
    $message .= '</table>';
	 $message .= '<table width="550" style="background:#f7f7f7; display:block; margin:0 auto;" cellspacing="0" cellpadding="0" border="0">';
         $message .= '<tr width="550" style="background-color:#43c499;">';
             $message .= '<td style="text-align:center; width:550px;">';
                $message .= '<ul style="margin:0; padding:24px 0 20px 0;">';
                   $message .= '<li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">';
                     $message .= '<a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Jobs</a></li>';

                   $message .= '<li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Members</a></li>';

                   $message .= '<li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; border-right: 1px solid #fff; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Companies</a></li>';

                   $message .= '<li style="margin: 0; padding: 0; list-style-type: none; display: inline-block;">
                    <a href="#" style="margin: 0;  list-style-type: none; text-decoration: none; color:#fff; font-size: 16px; padding: 0 15px 0 15px;">Contact Us</a></li>';

                $message .= '</ul>'; 
           $message .= '</td>';
     $message .= '</tr>';

     $message .= '<tr width="550" style="background-color:#43c499;">';
          $message .= '<td style="text-align:center; padding:0 0 22px 0; margin:0; width:550px;">';
              $message .= '<a href="#"><img src="'.$fb.'" alt="Facebook"></a>';
              $message .= '<a href="#"><img src="'.$tw.'" alt="Twitter"></a>';
              $message .= '<a href="#"><img src="'.$go.'" alt="Google"></a>';
          $message .= '</td>';
     $message .= '</tr>';
     $message .= '<tr width="550" style="background-color:#2aa6c9;">';
         $message .= '<td style="font-size:12px; color:#fff; text-align:center; padding:15px 0 15px 0; margin:0; width:550px;">';
           $message .= '<a href="#" style="color:#fff; text-decoration:none;">www.careeriam.com</a> - Copyright 2015';
         $message .= '</td>';
    $message .= '</tr>';
     $message .= '</table>';
$message .= '</body></html>';

// echo $message;
 // exit;	

  // echo "--".$to;
   //echo   "--".$subject."--".$message; 

    if(mail($to, $subject, $message, $headers))
		{ // echo "Mail sent"; 
	//	print_r(error_get_last());
		//echo"in mail sending process";
		//echo "Sent";
		$send = 1;
	
		}
	    else{ //echo "Problem in mail send"; 
			//echo"in mail  not sending process";
			//echo "Not sent";
			$send = 0;
			}

  }
  else
	{  //echo "Inside else";
	  //echo"not getting the captcha id valid";
       $send = 0;
	}
   
  echo $send;
die(); // this is required to return a proper result
}
add_action( 'wp_ajax_wpjobContactForm', 'wpjobContactForm' );
add_action( 'wp_ajax_nopriv_wpjobContactForm', 'wpjobContactForm' );




?>
