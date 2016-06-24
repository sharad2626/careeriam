<?php error_reporting(0);

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
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	


	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php global $redux_demo; $favicon = $redux_demo['favicon']['url']; ?>

	<script type="text/javascript">
		var templateDir = "<?php echo get_template_directory_uri() ?>"; 
	</script>
<?php if (!empty($favicon)) : ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
	<?php endif; ?>  

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>

	
	<!-- arrow chat code start  -->
	
	<?php if(is_user_logged_in()){ ?>

	<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css" charset="utf-8" />
	<script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
	<script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
 
    <?php } ?>

	<!-- arrow chat code  end -->

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	
	<!-- New Design CSS  -->

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" type="text/css"> 
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/common-style.css" type="text/css"> 
	
	<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/my-account-style.css" type="text/css">
	 -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css" type="text/css">
	<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom_msg.css" type="text/css"> -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/small.css" type="text/css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/medium.css" type="text/css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/large.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="http://careeriam.phpdevelopment.co.in/wp-content/themes/wpjobus/source/jquery.fancybox.css?v=2.1.5" media="screen" />



	<!-- Slidebars CSS -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slidebars.css">

	<!-- CUstom styling for checkbox & Radio-->
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/minimal.css" rel="stylesheet">


	<!-- New Design CSS  --> 



	

</head>

<!-- <body <?php if($post->post_type == 'resume') { ?>id="single-resume"<?php } ?> <?php if($post->post_type == 'company') { ?>id="single-company"<?php } ?> <?php if($post->post_type == 'job') { ?>id="single-job"<?php } ?> <?php body_class(); ?>>

	

	<section id="top">

		<div class="container">

			<div class="header-stats">

				<span>
				<?php

					$jobs = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'job' and post_status = 'publish'");

					$jobsNum = 0;

					foreach ($jobs as $key => $value) {
						$jobsNum++;
					}

					echo $jobsNum;

				?>
				<?php if($jobsNum == 1) {
					_e( 'Job', 'agrg' ); 
				} else {
					_e( 'Jobs', 'agrg' );
				} ?>
				</span>

				<span class="header-stats-divider">|</span>

				<span>
				<?php

					$resumes = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and post_status = 'publish'");

					$resumesNum = 0;

					foreach ($resumes as $key => $value) {
						$resumesNum++;
					}

					echo $resumesNum;

				?>
				<?php if($resumesNum == 1) {
					_e( 'Resume', 'agrg' ); 
				} else {
					_e( 'Resumes', 'agrg' );
				} ?>
				</span>

				<span class="header-stats-divider">|</span>

				<span>
				<?php

					$companies = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE post_type = 'company' and post_status = 'publish'");

					$compNum = 0;

					foreach ($companies as $key => $value) {
						$compNum++;
					}

					echo $compNum;

				?>
				<?php if($compNum == 1) {
					_e( 'Company', 'agrg' ); 
				} else {
					_e( 'Companies', 'agrg' );
				} ?>
				</span>


			</div>

			<div class="top_menu account-menu">

				<?php 
					if ( is_user_logged_in() && current_user_can('administrator')) {

						$company_id = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}posts` WHERE (post_type = 'company' or post_type = 'job' or post_type = 'resume') and post_status = 'pending'");

						$pending_posts_num = 0;

						foreach ($company_id as $key) {
							$pending_posts_num++;
						}
				?>

				<a class="pending-posts <?php if($pending_posts_num > 0) { ?>pending-active<?php } ?>" href="<?php $pending = home_url()."/pending"; echo $pending; ?>">
					<i class="fa fa-gavel"></i><?php echo $pending_posts_num; ?>
				</a>

				<?php } ?>

				<ul class="menu" style="padding-left: 0;">
					<?php 
						if ( is_user_logged_in() ) {
							
						global $current_user;
						$userid = $current_user->ID;
						$userresume = $wpdb->get_var( "SELECT DISTINCT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$userid."' ");	
						
						
					?>
					<li class="first">
						<a href="<?php $profile = home_url()."/my-account"; echo $profile; ?>" class="ctools-use-modal ctools-modal-ctools-ajax-register-style" title="Login"><?php printf( __( 'My Account', 'agrg' )); ?></a>
					</li>
                    <?php if(!empty($userresume)){ ?>
                    <li class="last">
						<a href="<?php echo esc_url( home_url( '/' ) )."resume/".$userresume; ?>" class="ctools-use-modal ctools-modal-ctools-ajax-register-style" title="Profile"><?php printf( __( 'Profile', 'agrg' )); ?></a>
					</li>
                    <li class="last">
						<a href="<?php echo esc_url( home_url( '/' ) )."edit-resume/?post=".$userresume; ?>" class="ctools-use-modal ctools-modal-ctools-ajax-register-style" title="Profile"><?php printf( __( 'Edit Profile', 'agrg' )); ?></a>
					</li>
                    <?php }else{ ?>
                    <li class="last">
						<a href="<?php echo esc_url( home_url( '/' ) )."add-resume"; ?>" class="ctools-use-modal ctools-modal-ctools-ajax-register-style" title="Profile"><?php printf( __( 'Add Resume', 'agrg' )); ?></a>
					</li>
                    <?php } ?>
                    
					<li class="last">
						<a href="<?php echo wp_logout_url(get_option('siteurl')); ?>" class="ctools-use-modal ctools-modal-ctools-ajax-register-style" title="Logout"><?php printf( __( 'Log out', 'agrg' )); ?></a>
					</li>
					<?php } else { ?>
					<li class="first">
						<a href="<?php $login = home_url()."/login"; echo $login; ?>" class="ctools-use-modal ctools-modal-ctools-ajax-register-style" title="Login"><?php printf( __( 'Login', 'agrg' )); ?></a>
					</li>
					<li class="last">
						<a href="<?php $register = home_url()."/register"; echo $register; ?>" class="ctools-use-modal ctools-modal-ctools-ajax-register-style" title="Register"><?php printf( __( 'Register', 'agrg' )); ?></a>
					</li>
					<?php } ?>	
				</ul>
			</div>

			<div class="top-social-icons">

				<?php 

					global $redux_demo; 

					$facebook_link = $redux_demo['facebook-link'];
					$twitter_link = $redux_demo['twitter-link'];
					$dribbble_link = $redux_demo['dribbble-link'];
					$flickr_link = $redux_demo['flickr-link'];
					$github_link = $redux_demo['github-link'];
					$pinterest_link = $redux_demo['pinterest-link'];
					$youtube_link = $redux_demo['youtube-link'];
					$google_plus_link = $redux_demo['google-plus-link'];
					$linkedin_link = $redux_demo['linkedin-link'];
					$tumblr_link = $redux_demo['tumblr-link'];
					$vimeo_link = $redux_demo['vimeo-link'];

				?>

				<?php if(!empty($facebook_link)) { ?>

					<a class="target-blank" href="<?php echo $facebook_link; ?>"><i class="fa fa-facebook-square"></i></a>

				<?php } ?>

				<?php if(!empty($twitter_link)) { ?>

					<a class="target-blank" href="<?php echo $twitter_link; ?>"><i class="fa fa-twitter-square"></i></a>

				<?php } ?>

				<?php if(!empty($dribbble_link)) { ?>

					<a class="target-blank" href="<?php echo $dribbble_link; ?>"><i class="fa fa-dribbble"></i></a>

				<?php } ?>

				<?php if(!empty($flickr_link)) { ?>

					<a class="target-blank" href="<?php echo $flickr_link; ?>"><i class="fa fa-flickr"></i></a>

				<?php } ?>

				<?php if(!empty($github_link)) { ?>

					<a class="target-blank" href="<?php echo $github_link; ?>"><i class="fa fa-github-square"></i></a>

				<?php } ?>

				<?php if(!empty($pinterest_link)) { ?>

					<a class="target-blank" href="<?php echo $pinterest_link; ?>"><i class="fa fa-pinterest-square"></i></a>

				<?php } ?>

				<?php if(!empty($youtube_link)) { ?>

					<a class="target-blank" href="<?php echo $youtube_link; ?>"><i class="fa fa-youtube-square"></i></a>

				<?php } ?>

				<?php if(!empty($google_plus_link)) { ?>

					<a class="target-blank" href="<?php echo $google_plus_link; ?>"><i class="fa fa-google-plus-square"></i></a>

				<?php } ?>

				<?php if(!empty($linkedin_link)) { ?>

					<a class="target-blank" href="<?php echo $linkedin_link; ?>"><i class="fa fa-linkedin-square"></i></a>

				<?php } ?>

				<?php if(!empty($tumblr_link)) { ?>

					<a class="target-blank" href="<?php echo $tumblr_link; ?>"><i class="fa fa-tumblr-square"></i></a>

				<?php } ?>

				<?php if(!empty($vimeo_link)) { ?>

					<a class="target-blank" href="<?php echo $vimeo_link; ?>"><i class="fa fa-vimeo-square"></i></a>

				<?php } ?>

			</div>

			<div class="top_menu">
				<?php wp_nav_menu(array('theme_location' => 'secondary', 'container' => 'false')); ?>
			</div>

		</div>

	</section>

	<header id="header">

		<div class="container">

			<div class="full" style="margin-bottom: 0;">

				<a class="logo" href="<?php echo home_url(); ?>">
					<?php global $redux_demo; $logo = $redux_demo['logo']['url']; if (!empty($logo)) { ?>
						<img src="<?php echo $logo; ?>" alt="Logo" />
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""/>
					<?php } ?>
				</a>

				<span class="top_menu new-posts-menu">

					<ul class="menu">
						<li><a href="#" class="button-ag"><span class="button-inner"><?php printf( __( 'Add New', 'agrg' )); ?><i class="fa fa-plus-circle"></i></span></a>
							<ul class="sub-menu">
								<img class="sub-menu-top-corner" src="<?php echo get_template_directory_uri(); ?>/images/sub-menu-corner.png"/>
								<li><a href="<?php $new_job = home_url()."/add-job"; echo $new_job; ?>"><i class="fa fa-bullhorn"></i><?php printf( __( 'Job', 'agrg' )); ?></a></li>
								<?php

									global $current_user;
									$user_id = $current_user->ID;
									$resume = $wpdb->get_results( "SELECT DISTINCT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$user_id."' ");

									if(empty($resume)) {

								?>
								<li><a href="<?php $new_resume = home_url()."/add-resume"; echo $new_resume; ?>"><i class="fa fa-file-text-o"></i><?php printf( __( 'Resume', 'agrg' )); ?></a></li>
								<?php } ?>
								<li><a href="<?php $new_company = home_url()."/add-company"; echo $new_company; ?>"><i class="fa fa-briefcase"></i><?php printf( __( 'Company', 'agrg' )); ?></a></li>
							</ul>
						</li>
					</ul>

				</span>

				<div class="main_menu">
					<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false')); ?>
				</div>

			</div>

		</div>

	</header> -->


<body>
  <!-- <nav class="sb-slidebar sb-left">
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
    <!-- Header START-->
    <header class="header-black" >
      <div class="container">
        <!-- <div class="menu-trigger">
          <div class="menu-click sb-toggle-left">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
          </div>
        </div> -->
        <div class="logo">
          <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/CareerImLogo.png" alt="Career I AM" /></a>
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
      
     <script>
jQuery(document).ready(function(){
		
		console.log("test ... ");
		jQuery(".rtm-upload-button-wrapper").css({"display":"block"});
		jQuery("#rtmedia-add-media-button-post-update").css({"display":"block"});
	
});
</script>
     
    </header>
    <!-- Header END -->
	
	
