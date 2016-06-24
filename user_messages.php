<?php error_reporting(E_ALL);
ini_set("display_errors","ON");
/**
 * Template name:user_messages
 */
 
 //get_header();
get_template_part('header-activity');
if(!is_user_logged_in()){ 

 $login = home_url()."/login";
 wp_redirect( $login ); exit;

}
 
	
  if ( is_user_logged_in() ) {
    
    global $current_user;
    $userid = $current_user->ID;  //echo $userid;
    $usermail=$current_user->user_email;
   // echo "hi",$usermail;
   // $userresume = $wpdb->get_var( "SELECT DISTINCT ID FROM `{$wpdb->prefix}posts` WHERE post_type = 'resume' and (post_status = 'publish' or post_status = 'draft' or post_status = 'pending') and post_author = '".$userid."' ");  
  
  } 
 

	define("ROW_PER_PAGE",5);

//files included for pagination
	include ('pagination/Page.php'); 
	include ('pagination/functions.php'); 
	include ('pagination/MySql.php'); 
	include ('pagination/Master.php'); 


$objMySql = new MySql();

	try {
		$objMySql->connect();
	}catch(Exception $L_objException) {
		$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
		$_SESSION["sesError"] = $L_strErrorMessage;
	}  

$objProduct = new Master($objMySql);

		$pageNum = 1;
		$segments = explode('/', $_SERVER['REQUEST_URI']);
		$cn = count($segments);
    
	   

        $cnn= $cn-2;
		
		if($cn>3){
			$pageNum = $segments[$cnn];
		
		}else{
		
			$pageNum = 1;
		}

        //echo "page=".$pageNum."<br>";

		//$maxPage =3;
		
		$whereclause = "reciever_id='".$userid."'";		

        list($arrProducts,$maxPage) = $objProduct->fn_viewRecordsWithPaginationWithOrderWithCondition($pageNum,"wp_inboxmessage",'id','asc',$whereclause);

        $inbox_count = $objMySql->fn_NumRows("SELECT * FROM wp_inboxmessage WHERE reciever_id = $userid ");
        if($_GET['term']){

          $term=$_GET['term'];
         
             //$whereclause = "reciever_id=".$userid.' AND subject LIKE "%'.$term.'%"';   

			 $whereclause = "reciever_id=$userid  AND ( subject LIKE '%$term' OR message LIKE '%$term' )";   
            
			 //echo $term;
           list($arrProducts,$maxPage) = $objProduct->fn_viewRecordsWithPaginationWithOrderWithCondition($pageNum,"wp_inboxmessage",'id','asc',$whereclause);

            $inbox_count = $objMySql->fn_NumRows("SELECT * FROM wp_inboxmessage WHERE reciever_id = $userid ");
        }
 
     




?>
   
   <!-- Content START-->
  <!--  <html>    
<head>     
  <meta charset="utf-8">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/js/slidebars.js"></script>
    <script src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/js/plugins.js"></script>
    <script type="text/javascript" src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/js/scripts.js"></script>
    <script src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/js/carousel.js"></script>
    <script src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/js/carousel2.js"></script>
    <script type="text/javascript" src="http://careeriam.phpdevelopment.co.in/wp-content/themes/wpjobus/source/jquery.fancybox.js?v=2.1.5"></script>
    <script type="text/javascript" src="http://careeriam.phpdevelopment.co.in/wp-content/themes/wpjobus/js/jquery.validate.min.js">
    </script>
  <title>Career I Am</title> 
   

  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/style.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/custom.css" type="text/css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://careeriam.phpdevelopment.co.in/wp-content/themes/wpjobus/source/jquery.fancybox.css?v=2.1.5" media="screen" />
 

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/small.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/medium.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/large.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/slidebars.css">
 

  <link href="<?php echo get_stylesheet_directory_uri();?>/css/minimal.css" rel="stylesheet">
  

</head>   -->
 
    <div class="company-header sections inbox-msgs">
      <div class="container">
          <!-- Breadcrumb START-->
          <div class="breadcrumbs-sec">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Messages</a></li>
            </ul>
          </div>
          <!-- Breadcrumb END-->
          
          <!-- Message Box START-->
          <div class="msg-wrap">
            <div class="one-fourth left-sidebar">
             <!--  <a href="#" class="gradient-btn compose-btn">Compose</a> -->
              <div class="inbox-menu">
                <ul>
                  <li>
                    <a href="<?php echo site_url();?>/user-messages"><i class="fa fa-inbox"></i> Inbox</a>
                    <span class="unread-total"><?php if($inbox_count!=""){ echo $inbox_count; } ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="three-fourth inbox-box">
              <h2>Inbox</h2>
            
              <div class="right-search">
			  
				<script type="text/javascript">

					function submit_form(){

						document.search_form.submit();

					} 

				</script>

                <form action="<?php $message_link = home_url()."/user-message/"; echo $message_link; ?>" method="get" id="search_form" name="search_form" >  
                <input class="search-box" type="text" name="term" value="<?= isset($_GET['term']) ? $_GET['term'] : '' ?>"placeholder="Search "/>  
                <div class="submit-search">
                  <input type="submit"  class=""value="Submit" /> 
                  <i class="fa fa-search" onclick="submit_form();"></i>
                </div>  
                </form>  

               <!--  <form id="wpjobus-companies" type="post" method="get" action="">
                  <input class="search-box" type="text" placeholder="Search.." />
                  <div class="submit-search">
                    <input type="button" id="comp_keyword" name="submit" class="submit line-btn" value="Submit">
                    <input type="hidden" id="companies_current_page" name="companies_current_page" value="1" />

                    <input type="hidden" id="companies_map_block" name="companies_map_block" value="" />

                    <input type="hidden" name="action" value="wpjobusSubmitCompaniesFilter" />
                  </div>
                </form> -->
              </div>
              <div class="msg-listing">
                <form method="get" action="">
                  <div class="head-msg">
                    <div class="select-msg">
                   
                    </div>
                    <div class="right-head">
                      <div class="page-msg">
                        <span>Showing <?php echo $pageNum?> of <?php echo $maxPage;?></span>
                      </div>
                      <div class="refresh">
                        <span>
                          <i class="fa fa-refresh"></i>
                        </span>
                      </div>
                      <div class="page-nav">
                       
                        <?php 
                        
             pagin($pageNum,$maxPage);

            
            ?>
                      </div>

                    </div>
                  </div>
                  <div class="main-msg">
                    
			<?php 
     
	/*echo "<pre>";
	print_r($arrProducts);
*/
   
      for($i=0;$i< count($arrProducts);$i++){

         //echo "<pre>";  
		  //print_r($arrProducts);
 
        ?>

					 <span class="msg-list unread">
                      <div class="your_msg">
						
					 	
					    
                        
                        <div class="name-box msg-box">
                        <!-- <i class="fa fa-star"></i>  -->
						 <?php
							
						   /*
							$sender_id = $arrProducts[$i]->sender_id;  

							//echo $arrProducts[$i]->id;  
					
							$wpjobus_resume_fullname = esc_attr(get_post_meta($sender_id, 'wpjobus_resume_fullname',true));
						
							if($wpjobus_resume_fullname!=''){	

								echo $wpjobus_resume_fullname;
							
							}else{
							
							 
							}

							*/  
								
							$sender_id = $arrProducts[$i]->sender_id;  
							$query = "SELECT * FROM wp_users WHERE ID =".$sender_id;
							
							//echo $query;

							//echo $sender_id;

							$from = $wpdb->get_results($query);

                            //echo "<pre>";
						    //print_r($from);

							
							
							//echo $from[0]->user_login;
							
							/* fetching data regarding picture */

						
							 ?>

                        <?php
						$user_post_record = $wpdb->get_results("SELECT ID FROM `wp_posts` WHERE `post_author` = $sender_id AND `post_type` = 'resume' ");


						$user_post_id = $user_post_record[0]->ID;  

						$wpjobus_resume_profile_picture = esc_attr(get_post_meta($user_post_id, 'wpjobus_resume_profile_picture',true));


							
						 ?>

						
						<?php 
							
							require_once(TEMPLATEPATH . '/inc/BFI_Thumb.php'); 
							$params = array( 'width' => 10, 'height' => 10, 'crop' => true );
							
							if(bfi_thumb( "$wpjobus_resume_profile_picture", $params )!=""){
								echo "<img src='" . bfi_thumb( "$wpjobus_resume_profile_picture", $params ) . "' alt='" . $wpjobus_resume_fullname . "'/>";
							}else{
								echo "<img src='" . get_stylesheet_directory_uri() . "/img/user-default.png' alt='" . $wpjobus_resume_fullname . "'/>";
							}
						?>
							
                       <span> <?php  echo $from[0]->user_nicename; ?> </span>
                          

                        </div>
                        <div class="mail-from msg-box">
                          <span><?php	echo substr($arrProducts[$i]->subject,0,9); ?></span>
                        </div>
                        <div class="mail-sub msg-box">
                          <span><?php	
                          $string = substr($arrProducts[$i]->message,0,40).'...';
                          echo $string;?>
                          </span>
                        </div>
                       <?php 
					   
						$senderid= $arrProducts[$i]->sender_id;  

						$to=$wpdb->get_results( "SELECT user_email FROM wp_users WHERE ID =".$senderid);
						$sender_email =$to[0]->user_email;

						
                          
						  ?>
                          <input type="hidden" class="to" value="<?php  echo $to?>">
                          <a class="fancybox send-msg msg-box" id="<?php echo $to; ?>"href="#inline1" value="<?php  echo $to?>">
                             <!-- <span class="reply"> <?php _e( 'Reply', 'agrg' ); ?></span> -->
                             <span class="reply"> <?php _e( '<i class="fa fa-reply-all" aria-hidden="true"></i>', 'agrg' ); ?></span>
                          </a>
                       
                        <div class="mail-date msg-box">
                          <span><?php //echo $arrProducts[$i]->date;?></span>
                        </div> 
                      </div>
                    </span> 

				<?php  }?>
                    <!--  -->
                  </div>
                  <div class="foot-msg">
                     <div class="right-head">
                      <div class="page-msg">
                        <span>Showing <?php echo $pageNum?> of  <?php echo $maxPage;?></span>
                      </div>
                      <div class="refresh">
                        <span>
                          <i class="fa fa-refresh"></i>
                        </span>
                      </div>
                      <div class="page-nav">
                       
                        <?php 
                        
						 pagin($pageNum,$maxPage);
						 //pagination($pageNum,$maxPage);

						
						?>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>  
          </div>
          <!-- Message Box END-->
      </div>
    </div>

    <!-- Content END-->
					      <div id="inline1" style="display: none;">
        <div class="two_third first">
          <h1 class="resume-section-title" style="margin-bottom: 10px;">
            <?php _e( 'Reply', 'agrg' ); ?>
          </h1>
          <div id="resume-contact" >
            <form id="contact" type="post" action="" >
                <h4>To</h4>
				<input type="text" name="UsrEmail" value="<?php echo $sender_email; ?>"/>
				<input type="hidden" name="reciever_id" value="<?php echo $senderid; ?>"/>

				<?php	global $current_user,$wpdb;
						$logged_userid = $current_user->ID;
				?>
				<input type="hidden" name="sender_id" value="<?php echo $logged_userid; ?>"/>

				<!-- <h4>To</h4>
				<input type="text" name="to" value="" class="to"/>
				-->              
			 <h4>Subject</h4>
              <input type="text" name="subject" value="">
              <h4>Message</h4>
              <span class="contact-message">
              <textarea name="message" id="message" cols="8" rows="8" ></textarea>
              </span>
              <input type="hidden" name="profpic" value="<?php echo $wpjobus_resume_profile_picture?>">
              <input type="hidden" name="fullname" value="<?php echo $wpjobus_resume_fullname;?>">
               <!-- <input type="hidden" name="reciver_email" value="<?php echo $wpjobus_resume_email;?>"> -->
              <input type="hidden" name="reciver_id" value="<?php echo $this_post_id;?>">
              <input type="text" name="receiverEmail" id="receiverEmail" value="<?php echo $wpjobus_resume_email; ?>" class="input-textarea" style="display: none;"/>
              
              <input type="hidden" name="action" value="wpjobContactForm1" />
              
        <?php wp_nonce_field('scf_html','scf_nonce'); ?>

              <input style="margin-bottom: 0;" name="submit" type="submit" value="Send Message" class="input-submit gradient-btn" id="sendmessage">
              <span class="submit-loading"><i class="fa fa-refresh fa-spin"></i></span>
            </form>
            <div id="success"> <span>
              <h3>Your message has been sent successfully</h3>
              </span> 
      </div>
            <div id="error"> <span>
              <h3>
                <?php _e( 'Something went wrong, try refreshing and submitting the form again.', 'agrg' ); ?>
              </h3>
              </span> 
      </div>
            
          </div>
        </div>
      </div>			 

				<script type="text/javascript">
        jQuery(document).ready(function() {

          jQuery('.fa-refresh').click(function() {
          location.reload();
        });
         jQuery('.fancybox').click(function() {

         var val= this.id;
         jQuery('.to').val(this.id);
        });

        });</script>			 


<style type="text/css">
  .fancybox{
    width: 12%;
    height: 38px;
    padding: 11px 11px !important;
  }
  .reply{
    color: #fff;
    margin: 0 auto;
  }
</style>
 <?php //get_footer();

   get_footer("profile");  

 ?>