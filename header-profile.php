<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>  
<head>     
  <meta charset="utf-8">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- arrow chat code start  -->

	<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css" charset="utf-8" />
	<script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
	<script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>

	<!-- arrow chat code  end -->

  <title><?php wp_title( '|', true, 'right' ); ?></title> 
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/profile-style.css';?>" type="text/css"> -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/common-style.css';?>" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/custom.css';?>" type="text/css">

  <!-- Slidebars CSS -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/profile-slidebars.css'; ?>" type="text/css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" type="text/css">
  
<!-- custom scrollbar stylesheet -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/jquery.mCustomScrollbar.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri().'/css/profile-demos.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />
      <?php if (!empty($favicon)) : ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
  <?php endif; ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/small.css';?>" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/medium.css';?>" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/large.css';?>" type="text/css">
</head>  
<body>   
   <!-- <nav class="sb-slidebar sb-left menu">
    <ul>
        <?php wp_nav_menu(array('theme_location' => 'secondary', 'container' => 'false')); ?>
    </ul> 
  </nav>  -->
  <?php if(is_user_logged_in()){ 
    global $current_user;
    $userid = $current_user->ID;
    $userresume = $wpdb->get_var( "SELECT DISTINCT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$userid."' ");  
    ?>
    <nav class="sb-slidebar sb-left">
    <ul>
        <?php if(!empty($userresume)){ ?> 
        <li><a href="<?php $profile = home_url()."/my-account"; echo $profile; ?>" title="my-account"><?php printf( __( 'My Account', 'agrg' )); ?></a></li>
        <?php } ?>

        <li><a href="<?php echo esc_url( home_url( '/' ) )."jobs/"; ?>" title="Profile"><?php printf( __( 'Jobs', 'agrg' )); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) )."resumes/"; ?>" title="Profile"><?php printf( __( 'Members', 'agrg' )); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) )."user-messages/"; ?>" title="Profile"><?php printf( __( 'Messages', 'agrg' )); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) )."activity/"; ?>" title="Profile"><?php printf( __( 'Activity wall', 'agrg' )); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) )."companies/"; ?>" title="Profile"><?php printf( __( 'Companies', 'agrg' )); ?></a></li>
        <?php if(!empty($userresume)){ ?>
        <li><a href="<?php echo esc_url( home_url( '/' ) )."resume/".$userresume; ?>" title="Profile"><?php printf( __( 'Profile', 'agrg' )); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) )."edit-profile/?post=".$userresume; ?>" title="Profile"><?php printf( __( 'Edit Profile', 'agrg' )); ?></a></li>
        <?php }else{ ?>
        <li><a href="<?php echo esc_url( home_url( '/' ) )."add-resume"; ?>" title="Profile"><?php printf( __( 'Add Resume', 'agrg' )); ?></a></li>
        <?php } ?>
        <li><a href="<?php echo wp_logout_url(get_option('siteurl')); ?>" title="Logout"><?php printf( __( 'Log out', 'agrg' )); ?></a></li>
    </ul>
  </nav>
  <div id="sb-site" class="wrapper <?php if(is_user_logged_in()) { ?> inner-pages <?php } ?>  ">
    
    <div class="top-links">
      <div class="container">
      <?php  require_once("top-links.php");  ?>
      <div class="menu-trigger">
            <div class="menu-click sb-toggle-left">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </div>
          </div> 
      </div>
    </div>
      <?php } ?>
    <header class="<?php if(is_user_logged_in()){ echo 'logged-in-header'; } ?>">
      <div class="container">
       <!--  <div class="menu-trigger">
          <div class="menu-click sb-toggle-left">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
          </div>
        </div> -->
        <div class="logo">
            <a class="logo" href="<?php echo home_url(); ?>">
		<img src="<?php echo get_template_directory_uri(); ?>/images/CareerImLogo.png" alt="Career I AM"/>
            </a>
        </div>
          <?php /*if( ! is_user_logged_in()) { ?>
        <div class="head-right">
          <div class="log-reg-links">
              
            <a href="<?php $login = home_url()."/login"; echo $login; ?>" class="btn">Login</a>
            <a href="<?php $register = home_url()."/register"; echo $register; ?>" class="btn">Register</a>
          </div>
        </div>
          <?php } */?>
          <div class="head-right">
            <div class="header-social">
              <ul>
                <li><a href="#" ><i class="fa fa-facebook" aria-hidden="true"></i>
              </a></li>
              <li><a href="#" ><i class="fa fa-twitter" aria-hidden="true"></i>
               </a></li>
              <li><a href="#" ><i class="fa fa-google-plus" aria-hidden="true"></i>
               </a></li>
              </ul>
            </div>
          </div>
      </div>
    </header>