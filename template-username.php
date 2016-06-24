<?php

/**
 * Template name: Reset username Page
 */

/* if ( is_user_logged_in() ) { 

	global $redux_demo; 
	$profile = $redux_demo['profile'];
	wp_redirect( $profile ); exit;

}

$page = get_page($post->ID);
$current_page_id = $page->ID;
 */
get_header(); ?>
<?php
if(isset($_POST['submit'])){
	

	
	
		global $wpdb;
		echo $useremail=$_POST['useremail'];
				

		$results = $wpdb->get_row("SELECT * FROM wp_users WHERE user_email ='".$useremail."'");
		
		
		
		$id=$results->ID;
		$username=$results->user_login;
	
		
		$update_query= $wpdb->update( 
			'wp_users', 
			array( 
				'user_email' => $useremail,	
				'user_login' => $username	
			), 
			array( 'ID' => $id ), 
			array( 
				'%s',	
				'%s'	
			),
			array('%d') 
		);
			if($username){	
			$from = get_option('admin_email');
	 $avatar= get_avatar( $email, 60 ); 
			  $uid  .=get_avatar( $user_ID ); 
				 
	 if($uid){
	
		 $avatar_url = get_avatar_url( $email, 60 ); 
	 }
	 else{ 
		 
		   $avatar="<img src='".$avatar_url."' style='width:60px; min-height:60px; display:inline-block; vertical-align: middle; margin: 0px 15px 0px 0px;'>";
	  }
			$headers = "MIME-Version: 1.0" . "\r\n";
       		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: '.$from . "\r\n";
			$subject = "username reset!";
			$msg = "<div><img border='0' src='http://careeriam.com/wp-content/uploads/2015/07/careeriam-logo.png' /> </div>" ;
			$msg .= 'Reset username.<br>Your login details<br><br>New username:'.$username.' <div> '.$avatar.'</div>'  ;
			wp_mail( $useremail, $subject, $msg, $headers );?>
			<script>
				window.location.assign("http://careeriam.com/login/");
			</script><?php
				
				}
				else{
							echo "Error ";
					
				}
				
}

?>
	<section id="blog">

		<div class="container">

			<div class="resume-skills">

				<h1 class="resume-section-title"><i class="fa fa-check"></i><?php _e( 'Forgot username', 'agrg' ); ?></h1>

				<div class="divider"></div>

				<div class="full">

					<div class="one_half first">

						<form action="" method="post">

							<div class="full" style="margin-bottom: 0;">  
						  	
							  	<span class="one_fourth first">
									<h3><?php _e( 'Email:', 'agrg' ); ?></h3>
								</span>

								<span class="three_fourth">
									<input type="text" name="useremail" id="useremail"  class="input-textarea" placeholder="" />
									<label for="User Name" class="error usernameError"></label>
								</span>

							</div>
							
							<input style="margin-bottom: 0;" name="submit" type="submit" value="<?php _e( 'Submit', 'agrg' ); ?>" class="input-submit">	 

							<span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
						  	  
						</form>
						</div>
              	</div>

			</div>

		</div>

	</section>

<?php get_footer(); ?>