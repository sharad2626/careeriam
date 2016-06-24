<?php
try {
        $objProduct = new Master($objMySql);
        
		if(!isPageRefresh()) 
		{  
            if(ISSET($_POST['hidPgRefRan'])) 
			{
				$objProduct->is_deleted="1";
				
                for($i=0;$i<count($_POST['selected']);$i++){
                   $WhereClause="id =".$_POST['selected'][$i];
                   $L_strResponse =  $objProduct->fn_updateRecords($WhereClause,"products");
                }
				
				if($L_strResponse == true){
					$L_strSuccessMessage = "Products deleted successfully.";
					
				}else{
					$L_strErrorMessage = "Select an item to delete.";
				}                
            }
			
        }
     
		$pageNum = 1;
		if($_GET['page']!=""){
			$pageNum = $_GET['page'];
		}
		
		$whereclause = "is_deleted='0'";		
        list($arrProducts,$maxPage) = $objProduct->fn_viewRecordsWithPaginationWithOrderWithCondition($pageNum,"products",'order_no','asc',$whereclause);

        	
  } catch (Exception $objException) {
	$L_strErrorMessage = $objException->getMessage();
}

	include(PP_ADMIN_HTML."viewProductcat.html");


?>
