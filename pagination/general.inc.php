 <?php
	function __autoload($L_strClassName) {  //echo PP_CLASSES.$L_strClassName.".php"; exit;
       
         require_once(PP_CLASSES.$L_strClassName.".php");
		 
		     
	}
?>