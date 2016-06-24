<?php
session_start();
header("Cache-Control: no-cache,must-revalidate");
header("Pragma: no-cache");

ini_set("post_max_size", "30M");
ini_set("upload_max_filesize","30M");
ini_set("memory_limit", -1 );
ini_set("max_execution_time",300000);
error_reporting(0);
//ini_set('display_errors', 1);

if($_SERVER['SERVER_NAME']=='shemaroohometheaters.com'){
	header("location:http://www.shemaroohometheaters.com/admin/");
}

	require_once("inc/config.inc.php"); 
	require_once("inc/general.inc.php");  
	require_once("inc/functions.php"); 
	
	global $L_strErrorMessage;
	global $L_strSuccessMessage;

	$L_Action 	= isSet($_REQUEST["action"])?$_REQUEST["action"]:"";
			
	# set Error Variables
	$L_strErrorMessage;
	$objMySql = new MySql();

	try {
		$objMySql->connect();
	}catch(Exception $L_objException) {
		$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
		$_SESSION["sesError"] = $L_strErrorMessage;
	}  
	
switch($L_Action){ 
		case 'dashboard':
		{ 
			if(ISSET($_SESSION['userId'])){
				$middlePage = "home.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}

      

		/* Add Feature*/ 
		case 'addfeature':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "addFeature.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}
		case 'viewfeature':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "viewFeature.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}
		case 'editfeature':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "editFeature.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}

	
		/* Add Product Basket*/

		case 'addproduct':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "addProduct.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}

		case 'viewproducts':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "viewProducts.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}

		case 'viewproducts_by_subcat_item':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "viewProducts_sub_cat_item.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}
		
		case 'editproduct':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "editProduct.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}
		
		case 'deleteproduct':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "viewProduct.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}


		/* End Product Basket*/
     	case 'addproductcat':{
			if(ISSET($_SESSION['userId'])){
				
				$middlePage = "addProductcat.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}

		case 'viewproductcat':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "viewProductcat.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}

		case 'editproductcat':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "editProductcat.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}
		
		case 'deleteproductcat':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "viewProductcat.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}

 

    /* product category*/
case 'addproductcat':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "addProductcat.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}

		case 'viewproductcat':{
			if(ISSET($_SESSION['userId'])){
				$middlePage = "viewProductcat.php";
				include(PP_ADMIN_PHP."adminTemplate.php");
			} else {
				include(PP_ADMIN_PHP."login.php");
			}
			break;
		}
		/* end product category*/
		
		/* About Us */
		case 'addAboutus' :
			{
				if(ISSET($_SESSION['userId'])){
						$middlePage = "addAboutus.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					} else {
						include(PP_ADMIN_PHP."login.php");
					}
					break;
			
			}
	
			case 'editAboutus' :
			{
							if(ISSET($_SESSION['userId'])){
									$middlePage = "editAboutus.php";
									include(PP_ADMIN_PHP."adminTemplate.php");
								} else {
									include(PP_ADMIN_PHP."login.php");
								}
								break;
						
			}

			case 'viewAboutus' :
			{
					if(ISSET($_SESSION['userId']))
					{
							$middlePage = "viewAboutus.php";
							include(PP_ADMIN_PHP."adminTemplate.php");
					} 
					else 
					{
							include(PP_ADMIN_PHP."login.php");
					}
					break;
			}
			/* End About Us*/	

			/* For Services */
			case 'addServices' :
				{
					if(ISSET($_SESSION['userId'])){
							$middlePage = "addServices.php";
							include(PP_ADMIN_PHP."adminTemplate.php");
						} else {
							include(PP_ADMIN_PHP."login.php");
						}
						break;
				
				}
				
				case 'editServices' :
				{
								if(ISSET($_SESSION['userId'])){
										$middlePage = "editServices.php";
										include(PP_ADMIN_PHP."adminTemplate.php");
									} else {
										include(PP_ADMIN_PHP."login.php");
									}
									break;
							
				}

				case 'viewServices' :
				{
						if(ISSET($_SESSION['userId']))
						{
								$middlePage = "viewServices.php";
								include(PP_ADMIN_PHP."adminTemplate.php");
						} 
						else 
						{
								include(PP_ADMIN_PHP."login.php");
						}
						break;
				}
				/* End Services*/	

				/*  Brands  */
				case 'addBrands' :
					{
						if(ISSET($_SESSION['userId'])){
								$middlePage = "addBrands.php";
								include(PP_ADMIN_PHP."adminTemplate.php");
							} else {
								include(PP_ADMIN_PHP."login.php");
							}
							break;
					
					}
			
					case 'editBrands' :
					{
									if(ISSET($_SESSION['userId'])){
											$middlePage = "editBrands.php";
											include(PP_ADMIN_PHP."adminTemplate.php");
										} else {
											include(PP_ADMIN_PHP."login.php");
										}
										break;
								
					}

					case 'viewBrands' :
					{
							if(ISSET($_SESSION['userId']))
							{
									$middlePage = "viewBrands.php";
									include(PP_ADMIN_PHP."adminTemplate.php");
							} 
							else 
							{
									include(PP_ADMIN_PHP."login.php");
							}
							break;
					}
					/* End Brands */	
	

				/* Change Password*/

				case 'changepassword':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "changePassword.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				case 'editproducts':
				{
					if(ISSET($_SESSION['userId']))
					{  
						$middlePage = "editproducts.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				case 'viewcat':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "viewcat.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				case 'addcat':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "addcat.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				case 'editcat':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "editcat.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				case 'viewsubcat':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "viewsubcat.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				
				case 'addsubcat':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "addsubcat.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				case 'editsubcat':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "editsubcat.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				case 'viewsubcat_item':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "viewsubcat_item.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				
				case 'addsubcat_item':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "addsubcat_item.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				case 'editsubcat_item':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "editsubcat_item.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				case 'viewbanner':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "viewbanner.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				case 'addbanner':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "addbanner.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				case 'editbanner':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "editbanner.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				case 'viewhotdeals':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "viewhotdeals.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				case 'addhotdeals':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "addhotdeals.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				
				case 'edithotdeals':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "edithotdeals.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}

				case 'viewenquiry':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "viewenquiry.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				case 'tnc':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "view_tnc.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				case 'edit_tnc':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "edit_tnc.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				case 'viewContactUs':
				{
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "contact_us.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else 
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
				}
				
				
				
				case 'logout':
				{
					include(PP_ADMIN_PHP."logout.php");
				}
				
				
				
				

				Default:
				{ 
					if(ISSET($_SESSION['userId']))
					{
						$middlePage = "home.php";
						include(PP_ADMIN_PHP."adminTemplate.php");
					}
					else
					{
						include(PP_ADMIN_PHP."login.php");
					}
					break;
		}
	}

?>
