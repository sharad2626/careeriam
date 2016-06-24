
<ul class="desk-menu">
		<?php if(!empty($userresume)){ ?>	
		<li><a href="<?php $profile = home_url()."/my-account"; echo $profile; ?>" title="my-account"><?php printf( __( 'My Account', 'agrg' )); ?></a></li>
		<?php } ?>

		<li><a href="<?php echo esc_url( home_url( '/' ) )."jobs/"; ?>" title="Profile"><?php printf( __( 'Jobs', 'agrg' )); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/' ) )."resumes/"; ?>" title="Profile"><?php printf( __( 'Members', 'agrg' )); ?></a></li>
		
		<?php if(!empty($userresume)){ 
			 $userid = $current_user->ID;
			 //echo $userid;
		
		?>	
		
		<li><a href="<?php echo esc_url( home_url( '/' ) )."user-messages/"; ?>" title="Profile"><?php printf( __( 'Inbox', 'agrg' )); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/' ) )."activity/"; ?>" title="Profile"><?php printf( __( 'Activity wall', 'agrg' )); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/' ) )."following-companies/?usrs_compns=".$userid; ?>" title="Profile"><?php printf( __( 'Companies', 'agrg' )); ?></a></li>
		
		<?php } ?>


		<?php if(!empty($userresume)){ ?>
		<li><a href="<?php echo esc_url( home_url( '/' ) )."resume/".$userresume; ?>" title="Profile"><?php printf( __( 'Profile', 'agrg' )); ?></a></li>
		<li><a href="<?php echo esc_url( home_url( '/' ) )."edit-profile/?post=".$userresume; ?>" title="Profile"><?php printf( __( 'Edit Profile', 'agrg' )); ?></a></li>
		<?php }else{ ?>
		<li><a href="<?php echo esc_url( home_url( '/' ) )."add-resume"; ?>" title="Profile"><?php printf( __( 'Add Resume', 'agrg' )); ?></a></li>
		<?php } ?>
		<li><a href="<?php echo wp_logout_url(get_option('siteurl')); ?>" title="Logout"><?php printf( __( 'Log out', 'agrg' )); ?></a></li>

</ul>

