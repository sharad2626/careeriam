<?php
/**
 * Template name: test
 */
$page = get_page($post->ID);
$current_page_id = $page->ID;
get_header(); 
$email="support@careeriam.com";
//$email="sanjayrajmastana@gmail.com";
 echo get_avatar( get_current_user_id($email), 46 );


die;
 $ss = get_avatar_url( $email); 
	
	   if($ss)
		{
			echo get_avatar($email);
	
		}
      else {

	echo "<img src=".$ss.">"; 
		  
          }

  
   get_footer(); ?>