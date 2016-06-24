<?php
//test		
//	mysql_connect("localhost","root","ac3r")or die(mysql_error());
//	mysql_select_db("shemaroo_db")or die(mysql_error());


//Live
mysql_connect("localhost",DB_USER,DB_PASSWORD)or die(mysql_error());
mysql_select_db(DB_NAME)or die(mysql_error());
	
	
	function isPageRefresh()
	{
        if($_SESSION['S_PgRefRan']!=$_REQUEST['hidPgRefRan'])
		{
			$_SESSION['S_PgRefRan']=$_REQUEST['hidPgRefRan'];
			return false;
		}
		return true;
	}

	function pagin($pageNum,$maxPage,$SendType="GET")
	{
		#get current page
		$currentPage = $_SERVER["PHP_SELF"];

		$arrPath = explode("/",$currentPage);

		# get Page Name
		$pageName = $arrPath[count($arrPath)-1];

		#create queryString
		$queryString="";
		foreach ($_GET as $key => $value)
		{
			if($key == "page")
			{

			}
			else
			{
				$queryString .=$key."=".$value."&";
			}
		}

		$nav  = '';

		if($SendType=="GET")
		{
			$start=0;
			$end=0;
			/*if($maxPage <= 10)
				{*/
					$start=1;
					$end=1;
						if($pageNum == 1){
							
								
						echo "<span class='prev'>";
						echo "<a class='number current' style='color:black'><</a></span>";
						echo "<span class='next'>";
						
						$nextpage = $pageNum + 1;

						echo "<a href='".$pageName."?".$queryString."page=".$nextpage."' class='number'style='color:black'>></a> </span>";
						
						
							
												
						}
						

						
						
						 
				if($pageNum > 1 && $pageNum <= $maxPage){
							
							$prevpage= $pageNum -1;
							echo "<span class='prev'>";
					        echo "<a href='".$pageName."?".$queryString."page=".$prevpage."' class='number'style='color:black'><</a> </span>";

						
						
						$nextpage = $pageNum + 1;

						if($nextpage > $maxPage){
							//echo "two";
							echo "<span class='next'>";
						echo "<a class='number current'style='color:black'>></a></span>";

						}
						else{
							//echo "three";
							echo "<span class='next'>";
						echo "<a href='".$pageName."?".$queryString."page=".$nextpage."' class='number'style='color:black'>></a> </span>";
					    }

						}
					/*for($page = 1; $page <= $maxPage; $page++)
					{
						
						  if ($page == $pageNum)
						   {
							  $nav .= "<a class='number current'>".$page."</a>"; // no need to create a link to current page
						   }
						   else
						   {
							  $nav .= " <a href='".$pageName."?".$queryString."page=".$page."' class='number'>".$page."</a> ";
							 
						   }
					}*/

					
			/*	}
				else
				{
					$minp=($pageNum-5);
					$maxp=($pageNum+5);
					if($minp < 1){
						$start=1;
						for($page = 1; $page <= 10; $page++)
							{
								   if ($page == $pageNum)
								   {
									  $nav .= "<a class='number'>".$page."</a>"; // no need to create a link to current page
								   }
								   else
								   {
									  $nav .= " <a href='".$pageName."?".$queryString."page=".$page."' class='cls_pg'>".$page."</a> ";
								   }
							}
					}
					else if($maxp > $maxPage){
						$end=1;
						for($page = ($maxPage-10); $page <= $maxPage; $page++)
							{
								   if ($page == $pageNum)
								   {
									  $nav .= "<a class='number'>".$page."</a>"; // no need to create a link to current page
								   }
								   else
								   {
									  $nav .= " <a href='".$pageName."?".$queryString."page=".$page."' class='cls_pg'>".$page."</a> ";
								   }
							}
					}
					else
					{
						for($page = ($pageNum-5); $page <= ($pageNum+5); $page++)
							{
								   if ($page == $pageNum)
								   {
									  $nav .= "<a class='number'>".$page."</a>"; // no need to create a link to current page
								   }
								   else
								   {
									  $nav .= " <a href='".$pageName."?".$queryString."page=".$page."' class='cls_pg'>".$page."</a> ";
								   }
							}
					}
				}
			
			if ($start == 0)
			{
			   $page  = $pageNum - 1;
			   $prev  = "<a href='".$pageName."?".$queryString."page=".$page."'>&lt;</a>";

			   $first = "<a href='".$pageName."?".$queryString."page=1'>|&lt;</a>";
			}
			else
			{
			   $prev  = '&nbsp;'; // we're on page one, don't print previous link
			   $first = '&nbsp;'; // nor the first page link
			}

			if ($end == 0)
			{
			   $page = $pageNum + 1;
			   $next = "<a href='".$pageName."?".$queryString."page=".$page."'>&gt;</a>";

			   $last = "<a href='".$pageName."?".$queryString."page=".$maxPage."'>&gt;|</a>";
			}
			else
			{
			   $next = '&nbsp;'; // we're on the last page, don't print next link
			   $last = '&nbsp;'; // nor the last page link
			}*/
			/*echo "<div class='pagination'><div class='links'>".$first ." ". $prev ." ". $nav ." ". $next ." ". $last."</div><div class='results'>Showing Page ".$pageNum." of ".$maxPage."</div></div>";*/

			//echo "<div class='pagination left'><div class='links'>".$first ." ". $prev ." ". $nav ." ". $next ." ". $last."</div></div>";

		}
	}


	function pagination($pageNum,$maxPage,$pageUrl="",$SendType="GET")
	{
		#get current page
		if ($pageUrl !="")
		{
			$queryString = $pageUrl."&";
		}
		else
		{
			$currentPage = $_SERVER["PHP_SELF"];
		

		$arrPath = split("/",$currentPage);

		# get Page Name
		$pageName = $arrPath[count($arrPath)-1];

		#create queryString
		$queryString="";
		foreach ($_GET as $key => $value)
		{
			if($key == "page")
			{

			}
			else
			{	
				$queryString .=$key."=".$value."&";
			}
		}
		}
		$nav  = '';
		if($SendType=="POST")
		{
			for($page = 1; $page <= $maxPage; $page++)
			{
			   if ($page == $pageNum)
			   {
				  $nav .= $page; // no need to create a link to current page
			   }
			   else
			   {
				  $nav .= " <a href=# onClick='submitPage(".$page.")'>".$page."</a> ";
			   }
			}
			
			if ($pageNum > 1)
			{
			   $page  = $pageNum - 1;
			   $prev  = "<a href=# onClick='submitPage(".$page.")'>[Prev]</a>";

			   $first = "<a href=# onClick='submitPage(".$page.")'>[First Page]</a>";
			} 
			else
			{
			   $prev  = '&nbsp;'; // we're on page one, don't print previous link
			   $first = '&nbsp;'; // nor the first page link
			}

			if ($pageNum < $maxPage)
			{
			   $page = $pageNum + 1;
			   $next = "<a href=# onClick='submitPage(".$page.")'>[Next]</a>";

			   $last = "<a href=# onClick='submitPage(".$page.")'>[Last Page]</a>";
			} 
			else
			{
			   $next = '&nbsp;'; // we're on the last page, don't print next link
			   $last = '&nbsp;'; // nor the last page link
			}

			echo "<form name='pageForm' id='pageForm' action='' method='post'>";
			foreach ($_POST as $key => $value)
			{
				echo "<input type='hidden' name='".trim($key)."' value='".$value."'>";
			}
			echo "<input name='hidPgRefRan' id='hidPgRefRan' type='hidden' value='".RAND_GEN."'>";
			echo "<input type='hidden' name='page' id='page' value=''>";
			echo "<div align='center'>".$first . $prev . $nav . $next . $last."</div>";
			echo "</form>";
		}
		elseif($SendType=="GET")
		{
			for($page = 1; $page <= $maxPage; $page++)
			{
			   if ($page == $pageNum)
			   {
				  $nav .= "<font class='cls_pg'>".$page."</font>"; // no need to create a link to current page
			   }
			   else
			   {
				  $nav .= " <a href='".$pageName."?".$queryString."page=".$page."' class='cls_pg'>".$page."</a> ";
			   }
			}
			
			if ($pageNum > 1)
			{
			   $page  = $pageNum - 1;
			   $prev  = "<a href='".$pageName."?".$queryString."page=".$page."' class='cls_pg'>[Previous]</a>";

			   $first = "<a href='".$pageName."?".$queryString."page=1' class='cls_pg'>[First Page]</a>";
			} 
			else
			{
			   $prev  = '&nbsp;'; // we're on page one, don't print previous link
			   $first = '&nbsp;'; // nor the first page link
			}

			if ($pageNum < $maxPage)
			{
			   $page = $pageNum + 1;
			   $next = "<a href='".$pageName."?".$queryString."page=".$page."' class='cls_pg'>[Next]</a>";

			   $last = "<a href='".$pageName."?".$queryString."page=".$maxPage."' class='cls_pg'>[Last Page]</a>";
			}
			else
			{
			   $next = '&nbsp;'; // we're on the last page, don't print next link
			   $last = '&nbsp;'; // nor the last page link
			}
			echo "<div align='center'>".$first . $prev . $nav . $next . $last."</div>";
		}
	}
	
	function get_cat_name_from_id($id)
	{
		  $q = mysql_query("select prod_cat_name  as name from product_category where prod_cat_id=".$id);
		  $name = mysql_fetch_row($q);
		  print_r($name[0]);
	}
	
	function get_all_categories()
	{	
		  $q   = mysql_query("select prod_cat_id,prod_cat_name from product_category where prod_cat_parent='0' and is_deleted='0'") or die(mysql_error());
		  $arr = mysql_fetch_array($q);
		  return $arr;
	}		
	
	
	function get_category_icon($cat_name)
	{
			if(strtoupper($cat_name) == "LED, LCD OR PLASMA")
			{
					return "led";exit;
			}else if(strtoupper($cat_name) == "PROJECTOR")
			{
					return "projector";exit;				
			
			}else if(strtoupper($cat_name) == "SCREEN")
			{
					return "screen";exit;				
			}else if(strtoupper($cat_name) == "AMPLIFIER (STEREO & 5.1)")
			{
					
					return "ampli";exit;				
			}else if(strtoupper($cat_name) == "DVD PLAYER")
			{
					return "dvd";exit;				
			}else if(strtoupper($cat_name) == "AUTOMATION")
			{
					return "automation";exit;				
			}else if(strtoupper($cat_name) == "SPEAKER")
			{
					return "speaker";exit;				
			}else if(strtoupper($cat_name) == "SPEAKER CABLE")
			{
					return "speakercable";exit;				
			}else if(strtoupper($cat_name) == "HDMI CABLE")
			{
					return "hdmi";exit;				
			}else{
					return "screen";exit;
			}	
	}
	
	function get_category_name_from_subcat($sub_cat_id='')
	{
		  $q      = mysql_query("select prod_cat_parent as parent from product_category where is_deleted='0' and prod_cat_id='".$sub_cat_id."'") or die(mysql_error());
		  $parent = mysql_fetch_array($q);
		 	
		  $cat_name = get_cat_name_from_id($parent['parent']);	
		  
		  return $cat_name;		  
	}			
?>
