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
    <title><?php wp_title( '|', true, 'right' ); ?></title> 
  <!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/home-style.css';?>" type="text/css"> -->
 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- Slidebars CSS -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/home-slidebars.css'; ?>" type="text/css"> 
  
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/common-style.css" type="text/css"> 
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css" type="text/css">

      <?php if (!empty($favicon)) : ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
  <?php endif; ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/small.css';?>" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/medium.css';?>" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/css/large.css';?>" type="text/css">
  
</head>  
<body class="home">   
   <!-- <nav class="sb-slidebar sb-left menu">
    <ul>
        <?php wp_nav_menu(array('theme_location' => 'secondary', 'container' => 'false')); ?>
    </ul> 
  </nav>  -->
  <div id="sb-site" class="wrapper <?php if(is_user_logged_in()) { ?> inner-pages <?php } ?> ">
      <?php if(is_user_logged_in()){ 
            global $current_user;
            $userid = $current_user->ID;
            $userresume = $wpdb->get_var( "SELECT DISTINCT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$userid."' ");	
          ?>
    <div class="top-links">
      <div class="container">
          <?php  require_once("top-links.php");  ?>
      </div>
    </div>
      <?php } ?>
    <header class="<?php if(is_user_logged_in()){ echo 'logged-in-header'; } ?>">
      <div class="container">
        <!-- <div class="menu-trigger">
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
