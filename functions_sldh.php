<?php

function sldh_editingResume()

{

    global $wpdb;

    $current_post = $_POST['postID'];

    $postStatus = $_POST['postStatus'];

    if ($postStatus != 'draft') {

        $user_ID = get_current_user_id();

        $current_post = $_POST['postID'];

        $resumeLink = get_site_url(null, 'resume/' . $current_post);

        $action = '<a href="' . $resumeLink . '">' . wp_kses($_POST['fullName'], array()) . '</a>&#8217;s resume was updated';



        $wpdb->query(

            $wpdb->prepare(

                "INSERT INTO wp_bp_activity

(`user_id`,`component`,`type`,`action`,`content`,`primary_link`,`item_id`,`secondary_item_id`,`date_recorded`,`hide_sitewide`,`mptt_left`,`mptt_right`,`is_spam`)

VALUES

(%d, %s, %s, %s, %s, %s, %d, %d, %s, %d, %d, %d, %d)",

                $user_ID,

                "xprofile",

                "resume_update",

                $action,

                "",

                $resumeLink,

                0, 0, date("Y-m-d H:i:s"), 0, 0, 0, 0

            )

        );





    }

}


/* custom company activity save */
function sldh_editingCompany()

{

    global $wpdb;

    $current_post = $_POST['postID'];

    $postStatus = $_POST['postStatus'];

    if ($postStatus != 'draft') {

        $user_ID = get_current_user_id();

        $current_post = $_POST['postID'];

        $resumeLink = get_site_url(null, 'company/' . $current_post);

        $action = '<a href="' . $resumeLink . '">' . wp_kses($_POST['fullName'], array()) . '</a>&#8217;s Company was updated';



        $wpdb->query(

            $wpdb->prepare(

                "INSERT INTO wp_bp_activity

(`user_id`,`component`,`type`,`action`,`content`,`primary_link`,`item_id`,`secondary_item_id`,`date_recorded`,`hide_sitewide`,`mptt_left`,`mptt_right`,`is_spam`)

VALUES

(%d, %s, %s, %s, %s, %s, %d, %d, %s, %d, %d, %d, %d)",

                $user_ID,

                "activity",

                "activity_update",

                $action,

                "",

                $resumeLink,

                0, 0, date("Y-m-d H:i:s"), 0, 0, 0, 0

            )

        );





    }

}


function sldh_submittingResume()

{



}



//override buddypress profile with link to users' Resume

function sldh_buddypressUserLinkOnWall($link)

{

    global $activities_template;

    $userId = $activities_template->activity->user_id;

    return sldh_getResumeLink($userId);

}



function sldh_getResumeLink($userId)

{

    global $wpdb;

    if ($userId == 1) $userId = 10;

    $query = "SELECT * FROM wp_posts WHERE post_author = $userId AND post_type = 'resume' AND post_status = 'publish' LIMIT 1";

    $theResume = $wpdb->get_row($query);

    if ($theResume === null) {

        return "javascript:;";

    } else {

        return $theResume->guid;

    }

}



function sldh_getResumeName($userId, $default)

{

    global $wpdb;



    $theResume = $wpdb->get_row("

SELECT * FROM wp_posts p

LEFT JOIN wp_postmeta pm ON pm.post_id = p.ID

WHERE p.post_author = $userId AND p.post_type = 'resume' AND p.post_status = 'publish' AND pm.meta_key = 'wpjobus_resume_fullname' LIMIT 1");

    if ($theResume === null) {

        return $default;

    } else {

        return $theResume->meta_value;

    }

}





function sldh_nograv($in)

{

    return true;

}



function sldh_defaultavatar($one, $params)

{

    global $wpdb;

    $userid = $params['item_id'];

    if ($userid == 1) $userid = 10;

    $default = "http://careeriam.com/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg";

    $theResume = $wpdb->get_row("SELECT * FROM wp_posts WHERE post_author = $userid AND post_type = 'resume' AND post_status = 'publish' LIMIT 1");

    if ($theResume === null) {

        return $default;

    } else {

        $theImg = $wpdb->get_row("SELECT * FROM wp_postmeta WHERE post_id = " . $theResume->ID . " AND meta_key='wpjobus_resume_profile_picture' LIMIT 1");

        if ($theImg === null) {

            return $default;

        }

        return $theImg->meta_value;

    }

}



function sldh_loggedin_user_domain($in)

{



    return $in;



    $userId = get_current_user_id();



    return sldh_getResumeLink($userId);

}



function sldh_core_get_user_domain($domain, $user_id, $user_nicename, $user_login)

{

    if (sldh_is_on_page(array("/activity"))){

        return sldh_getResumeLink($user_id);

    }

    return $domain;

}



function sldh_get_member_name ($name)

{

    global $members_template;

    if (sldh_is_on_page(array("/activity"))){

        return sldh_getResumeName($members_template->member->ID, $name);

    }

    return $name;

}



function sldh_is_on_page($arr)

{

    $path=$_SERVER['REQUEST_URI'];

    $parsed = parse_url('http://www.example.com'.$path);

    if ( in_array(rtrim($parsed['path'], "/"), $arr)) {

        return true;

    }





}



function sldh_get_activity_action($a)

{

    die("<pre>".htmlentities(print_r($a,true)));

}



add_action('wp_ajax_wpjobusEditResumeForm', 'sldh_editingResume', 1);

add_action('wp_ajax_nopriv_wpjobusEditResumeForm', 'sldh_editingResume', 1);

add_action('wp_ajax_wpjobusSubmitResumeForm', 'sldh_submittingResume', 1);

add_action('wp_ajax_nopriv_wpjobusSubmitResumeForm', 'sldh_submittingResume', 1);

add_filter('bp_get_activity_user_link', 'sldh_buddypressUserLinkOnWall');

add_filter('bp_core_fetch_avatar_no_grav', 'sldh_nograv');

add_filter('bp_core_default_avatar_user', 'sldh_defaultavatar', 10, 2);

add_filter( 'bp_loggedin_user_domain', 'sldh_loggedin_user_domain', 1);

add_filter('bp_core_get_user_domain', 'sldh_core_get_user_domain',  10, 4);

add_filter('bp_get_member_name', 'sldh_get_member_name',  10, 1);

//add_action('wp_ajax_wpjobusEditCompanyForm', 'sldh_editingCompany', 1);//custom company add activity

