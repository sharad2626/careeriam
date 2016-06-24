  <?php

	
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
  
<body style="margin:0; padding:0; font-family:\'Open sans\',\Arial\',sans-serif;">
	  <table width="550" style="margin:0 auto; "  cellspacing="0" cellpadding="0" border="0">
		<tr width="550" style=" background:#404040;margin:0; padding:0; ">
		  <td style="margin:0 auto; padding:25px 0; text-align:center;" >
			<img src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/images/logo.png" alt="Logo"  />
		  </td>
		</tr>
		<tr width="550" style="margin:0; padding:0; ">
		  <td style="margin:0 auto; text-align:center;" >
			<img src=".home_url()."/wp-content/themes/careeriam/images/wc-mailer.png" alt="Main Image"  />
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
			  <img src="http://careeriam.phpdevelopment.co.in/wp-content/themes/careeriam/images/default-user.png" alt="Profile pic" />
			</td>
			<td style=" width:300px; float:right; color:#fff; padding: 0 10px 0 0;"> 
				<h3 style="margin:0;">'.$name.'</h3>
				<p style="font-size: 14px;">'.$message.'</p>
				<p style="float:right; width:190px;">
				  <a href="#" style="display:inline; color:#fff; width:98px; height:34px; line-height:34px; padding:0 12px;">IGNORE</a>
				  <a href="#" style="display:inline-block; color:#fff; text-decoration:none; width:98px; height:34px; line-height:34px; text-align:center; background: #2ba7ca !important; background: -moz-linear-gradient(-45deg,  #2ba7ca 0%, #3bb9bc 49%, #41bfb0 52%, #46c79c 100%) !important; background: -webkit-linear-gradient(-45deg,  #2ba7ca 0%,#3bb9bc 49%,#41bfb0 52%,#46c79c 100%) !important; background: linear-gradient(135deg,  #2ba7ca 0%,#3bb9bc 49%,#41bfb0 52%,#46c79c 100%) !important; filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#2ba7ca\', endColorstr=\'#46c79c\',GradientType=1 ); ">REPLY</a>
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
				 <a href="#"><img src=".home_url()."/wp-content/themes/careeriam/images/wc-f.png" alt="Facebook"></a>
				 <a href="#"><img src=".home_url()."/wp-content/themes/careeriam/images/wc-t.png" alt="Twitter"></a>
				 <a href="#"><img src=".home_url()."/wp-content/themes/careeriam/images/wc-g.png" alt="Google"></a>
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
	

	
	/********* Email Template integration code end *********/


	?>