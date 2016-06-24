<?php 
$userTP_abspath = dirname(__FILE__);

$userTP_abspath_1 = str_replace('wp-content/themes/careeriam/inc', '', $userTP_abspath);
$userTP_abspath_1 = str_replace('wp-content\themes\careeriam\inc', '', $userTP_abspath_1);
	
require_once($userTP_abspath_1 .'wp-config.php');
if ( ! defined( 'WP_CONTENT_DIR' ) )
       define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );

global $wpdb, $current_user;
get_currentuserinfo();
$userid = $current_user->ID;

$company_id = $_REQUEST['company_id'];

$checkpost_meta = "";
$checkpost_meta = get_post_meta( $company_id, 'company-followers', false );
$checkkey = "";
$checkkey = array_search($userid, $checkpost_meta);
//print_r(checkpost_meta);

if($checkkey !== false){	
	// do stuff
    // when found

	delete_post_meta( $company_id, 'company-followers', $userid );

}
?>