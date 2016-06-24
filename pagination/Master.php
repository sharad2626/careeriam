<?php
/**
		 *	# This class contains primary functions for implementing CRUD functionality
		 *  C-Create
		 *  R-Read
		 *  U-Update
		 *  D-Delete
		 *	@author Sharad Pai<sharad.pai@wwindia.com>

		 *   @package Class
		 */

	class Master extends Page{

		/**
		 *	@var string array $C_arrProperties		Properties of Company Type table
		 *	@access public
		 */
		public $C_arrProperties;


		/**
		 *	@var resource $C_objMySql	Connection Resource
		 *	@access public
		 */
		public $C_objMySql;
		/**
		 *	Counstructor of Class
	      *
		 *	This is used to initialise the connection variables
		 */
		function __construct($L_objMySql) {
			$this->C_objMySql = $L_objMySql;
		}

		/**
		 *  This function is used to Set the $C_arrProperties variable
         *	@access public
		 *
		 *	@param $L_strPropertyName	name of the property
		 *
		 *	@param $L_val		value of the property
		 */
		public function __set($L_strPropertyName, $L_val) {
			 $this->C_arrProperties[$L_strPropertyName] = $L_val;
		}


		/**
		 *  This function is used to Get the $C_arrProperties variable
           *	@access public
		 *
		 *	@param $L_strPropertyName	name of the property
		 *
		 *	@return null if false else parameter value
		 */
		public function __get($L_strPropertyName) {
			 if(isset($this->C_arrProperties[$L_strPropertyName])) {
				 return($this->C_arrProperties[$L_strPropertyName]);
			 } else {
				 return(NULL);
			 }
		}

		# Start Login function
		public function fn_checkUserLogin($L_strEmail,$L_strPassword){
			try{
					$query= "select * from test where uname ='".trim($L_strEmail)."' and upassword = '".trim($L_strPassword)."'";
					$L_arrResults = $this->C_objMySql->fetchDataObject($query);
					if($L_arrResults === false)
					{
						return false;
					}
					else
					{
						return $L_arrResults;
					}
			 }
			 catch(Exception $L_objException)
			 {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
				throw new Exception($L_strErrorMessage);
			 }

		}
		# End Login Function



		/**
		 *	This Function Saves Data in table
         *	@access public
		 *	@param $L_tablename	name of the table in which data is inserted
		 *  @return "SUCCESS"
		 */
		function fn_Add($L_tablename){
			 try
			 {     
				if($this->C_objMySql->executeInsertQuery($L_tablename,$this->C_arrProperties) === false)
				 {
					//echo "nt successful";
					 return "ERROR : Company Login Not Inserted";
				 }
				 else
				 {
					  //echo "success";
					 return true;
				 }

			 }catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();

				throw new Exception($L_strErrorMessage);
			 }
		 }

		 /**
		 *	This Function Truncates record from given table
         *	@access public
		 *  @param $L_TableName name of the table which is truncated
		 *	@return bool  $sql	True -> Success , false -> Error
		 *
		 */
		public function fn_Truncatetable($L_TableName){
            try{
		      //$L_strWhere = " color_id = ".$this->color_id;

		      $rDelete="TRUNCATE TABLE ".$L_TableName;



			 $sql=$this->C_objMySql->executeQuery($rDelete);
		       if($sql==false)
			 {
				  return false;
			 }
		      else{
				 return true;
				 }

		 }catch(Exception $L_objException) {
             $L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();

				throw new Exception($L_strErrorMessage);
			 }
		 }

		 /**
		 *This Function is used to View records without pagination data
         *@access public
		 *@param $L_tablename name of the table from which records is fetched without pagination
		 *@return resource $L_arrResults  Result set of the query
		 */

		public function fn_viewRecordsWithoutPaginationWithoutCondition($L_tablename){

			 try {
			 $query = "SELECT * FROM $L_tablename";
			 $L_arrResults = $this->C_objMySql->fetchDataObject($query);
				if($L_arrResults === false)
				{
					return false;
				}
				else
				{
					return $L_arrResults;
				}
			 }catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
			throw new Exception($L_strErrorMessage);
			}
		 }

		 /**
		 *This Function is used to View records without pagination data
         *@access public
		 *@param $whereclause -where clause,$L_tablename name of the table from which records is fetched without pagination
		 *@return resource $L_arrResults  Result set of the query
		 */

		 public function fn_viewRecordsWithoutPaginWithCondition($L_tablename,$whereclause){
		 	 try {
			  $query = "SELECT * FROM ".$L_tablename." WHERE ".$whereclause;
			 $L_arrResults = $this->C_objMySql->fetchDataObject($query);
				if($L_arrResults === false)
				{
					return false;
				}
				else
				{
					return $L_arrResults;
				}
			 }catch(Exception $L_objException) {
		       $L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
				throw new Exception($L_strErrorMessage);
			}
		 }

		  /**

		 * This Function View records with pagination data and Resultset
         * @access public
		 * @param $L_strPropertyName,$L_page,$whereclause	name of the property
		 * @return resource $L_arrResults,$L_maxPage  Result set of the query

		 */
		  public function fn_viewRecordsWithPaginationWithCondition($L_page=0,$L_tablename,$whereclause)
		 {
			$L_strQuery=" SELECT * FROM ".$L_tablename." WHERE ".$whereclause;
			$L_maxPage="";
			if($L_page!=0)
			{
				$L_totalRecords = $this->C_objMySql->fn_NumRows($L_strQuery);
				if((ROW_PER_PAGE == 0)|| (ROW_PER_PAGE == "")) {
				throw new Exception("Division by Zero");
				}
				$L_maxPage=ceil($L_totalRecords/ROW_PER_PAGE);
				$L_strQuery .= " LIMIT ".$this->fn_GetOffest($L_page)." ,".ROW_PER_PAGE;
				
			}
			#exception handling
			try {
				$L_arrResult = $this->C_objMySql->fetchDataObject($L_strQuery);
				if($L_page!=0)
				{
					return array($L_arrResult,$L_maxPage);
				}
				else
				{
					return $L_arrResult;
				}
			}catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
				throw new Exception($L_strErrorMessage);
			}
		}

		 public function fn_viewRecordsWithPaginationWithOutCondition($L_page=0,$L_tablename)
		 { 
			$L_strQuery=" SELECT * FROM ".$L_tablename;
			$L_maxPage="";
			if($L_page!=0)
			{
				$L_totalRecords = $this->C_objMySql->fn_NumRows($L_strQuery);
				if((ROW_PER_PAGE == 0)|| (ROW_PER_PAGE == "")) {
				throw new Exception("Division by Zero");
				}
				$L_maxPage=ceil($L_totalRecords/ROW_PER_PAGE);
				$L_strQuery .= " LIMIT ".$this->fn_GetOffest($L_page)." ,".ROW_PER_PAGE;
			}
			#exception handling
			try {
				$L_arrResult = $this->C_objMySql->fetchDataObject($L_strQuery);
				if($L_page!=0)
				{
					return array($L_arrResult,$L_maxPage);
				}
				else
				{
					return $L_arrResult;
				}
			}catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
				throw new Exception($L_strErrorMessage);
			}
		}
		 public function fn_viewRecordsWithPaginationWithOrder($L_page=0,$L_tablename,$Sort,$Order)
		 {
			$L_strQuery=" SELECT * FROM ".$L_tablename." ORDER BY ".$Sort." ".$Order;
			$L_maxPage="";
			if($L_page!=0)
			{
				$L_totalRecords = $this->C_objMySql->fn_NumRows($L_strQuery);
				if((ROW_PER_PAGE == 0)|| (ROW_PER_PAGE == "")) {
				throw new Exception("Division by Zero");
				}
				$L_maxPage=ceil($L_totalRecords/ROW_PER_PAGE);
				$L_strQuery .= " LIMIT ".$this->fn_GetOffest($L_page)." ,".ROW_PER_PAGE;
			}
			#exception handling
			try {
				$L_arrResult = $this->C_objMySql->fetchDataObject($L_strQuery);
				if($L_page!=0)
				{
					return array($L_arrResult,$L_maxPage);
				}
				else
				{
					return $L_arrResult;
				}
			}catch(Exception $objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
				throw new Exception($L_strErrorMessage);
			}
		}

public function fn_viewRecordsWithPaginationWithOrderWithCondition($L_page=0,$L_tablename,$Sort,$Order,$WhereClause)
		 { 

	       //echo"==========>". ROW_PER_PAGE;
		$L_strQuery=" SELECT * FROM ".$L_tablename." WHERE ".$WhereClause." ORDER BY ".$Sort." ".$Order;
			$L_maxPage="";
			if($L_page!=0)
			{
				$L_totalRecords = $this->C_objMySql->fn_NumRows($L_strQuery);  
				if((ROW_PER_PAGE == 0)|| (ROW_PER_PAGE == "")) {
				throw new Exception("Division by Zero");
				}
				$L_maxPage=ceil($L_totalRecords/ROW_PER_PAGE);
				$L_strQuery .= " LIMIT ".$this->fn_GetOffest($L_page)." ,".ROW_PER_PAGE;
			}
			#exception handling
			try {  
				$L_arrResult = $this->C_objMySql->fetchDataObject($L_strQuery);
				if($L_page!=0)
				{
					return array($L_arrResult,$L_maxPage);
				}
				else
				{
					return $L_arrResult;
				}
			}catch(Exception $objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
				throw new Exception($L_strErrorMessage);
			}
		}

		  /**

		 * This Function is used to get selected fields with condition
         * @access public
		 * @param $L_strPropertyName,$L_page,$whereclause,$params- Requred fields from table				 * @return resource $L_arrResults,$L_maxPage  Result set of the query
		 */
		  public function fn_GetReqFieldsWithPaginWithCondition($L_page=0,$params,$L_tablename,$whereclause)
		 {
			$L_strQuery=" SELECT ".$params." FROM ".$L_tablename." WHERE ".$whereclause;
			$L_maxPage="";
			if($L_page!=0)
			{
				//echo ROW_PER_PAGE;
				$L_totalRecords = $this->C_objMySql->fn_NumRows($L_strQuery);
				//echo $L_totalRecords;
				if((ROW_PER_PAGE == 0)|| (ROW_PER_PAGE == "")) {
				throw new Exception("Division by Zero");
				}
				$L_maxPage=ceil($L_totalRecords/ROW_PER_PAGE);
				$L_strQuery .= " LIMIT ".$this->fn_GetOffest($L_page)." ,".ROW_PER_PAGE;
				//echo $L_strQuery;
			}
			#exception handling
			try {
				$L_arrResult = $this->C_objMySql->fetchDataObject($L_strQuery);
				if($L_page!=0)
				{
					return array($L_arrResult,$L_maxPage);
				}
				else
				{
					return $L_arrResult;
				}
			}catch(Exception $objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
				throw new Exception($L_strErrorMessage);
			}
		}

		 /**
		 *This Function is used to View records without pagination data
         *@access public
		 *@param $whereclause -where clause,$L_tablename name of the table from which records is fetched without pagination
		 *@return resource $L_arrResults  Result set of the query
		 */

		 public function fn_GetReqFieldsWithoutPaginWithCondition($params,$L_tablename,$whereclause)		{
		 	 try {
			 $query =" SELECT ".$params." FROM ".$L_tablename." WHERE ".$whereclause;
			 $L_arrResults = $this->C_objMySql->fetchDataObject($query);
				if($L_arrResults === false)
				{
					return false;
				}
				else
				{
					return $L_arrResults;
				}
			 }catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
			throw new Exception($L_strErrorMessage);
			}
		 }
		 /**

		 * This Function is used to get selected fields with condition
         * @access public
		 * @param $L_strPropertyName,$L_page,$whereclause,$params- Requred fields from table				 * @return resource $L_arrResults,$L_maxPage  Result set of the query
		 */

		 public function fn_GetReqFieldsWithoutPaginWithoutCondition($params,$L_tablename){
		 	 try {
			 $L_strQuery=" SELECT ".$params." FROM ".$L_tablename;
			 $L_arrResults = $this->C_objMySql->fetchDataObject($query);
				if($L_arrResults === false)
				{
					return false;
				}
				else
				{
					return $L_arrResults;
				}
			 }catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();
			throw new Exception($L_strErrorMessage);
			}
		 }


		 public function fn_updateRecords($WhereClause,$L_tablename) {  
			
			 try {
				 if($this->C_objMySql->executeUpdateQuery($L_tablename,$this->C_arrProperties,$WhereClause) === false)
				 {
					// echo "hell1";
					 return "ERROR :  Not Updated";
				 }
				 else
				 {
					 return "SUCCESS";
				 }

			 }catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();

				throw new Exception($L_strErrorMessage);
			}

		 }

		/**
		 *	This Function Deletes the Record for the given ctype_id
         *	@access public
		 *
		 *	@return bool  $sql	True -> Success , false -> Error
		 *
		 */
		public function fn_deleteRecord($WhereClause,$L_tablename){
            try{
		      $rDelete="DELETE FROM ".$L_tablename." WHERE ".$WhereClause;

			 $sql=$this->C_objMySql->executeQuery($rDelete);
		       if($sql==false)
			 {
				  return false;
			 }
		      else{
				 return true;
				 }

		 }catch(Exception $L_objException) {
             $L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();

				throw new Exception($L_strErrorMessage);
			 }
		 }

		 /**
		 *	This Function Checks whether the search string is unoque
         *	@access public
		 *  @param $L_iEntity = Table field name,$L_iSearch = Name which is supposed to be in field,$L_tablename = Name of the table, $primarykey = Table primary key
		 *	@return bool  $sql	True -> Success , false -> Error
		 *
		 */
		public function fn_unique($primarykey,$L_tablename,$whereClause){
			try {
				$query = "SELECT COUNT(".$primarykey.") as cnt FROM ".$L_tablename." WHERE ".$whereClause;
				$L_arrResults = $this->C_objMySql->fetchDataObject($query);
				if($L_arrResults === false)
				{
					return false;
				}
				else
				{
					if($L_arrResults[0]->cnt != 0) {
						return true;
					}else
					{
						return false;
					}
				}
			}catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();

				throw new Exception($L_strErrorMessage);
			}
		}


		 /**
		 *	This Function Checks whether the search string is unique in either of 2 fields in table
         *	@access public
		 *  @param $L_iEntity1 = Table 1st field name,$L_iSearch = Name which is supposed to be in 1st field,$L_iEntity2 = Table 2nd field name,$L_tablename = Name of the table, $primarykey = Table primary key
		 *	@return bool  $sql	True -> Success , false -> Error
		 *
		 */
		 public function fn_uniqueintwofields($L_iEntity1,$L_iEntity2,$L_iSearch,$L_id=0,$L_tablename,$primarykey) {
			 try {
				 if($L_id !=0){
					 $query = "SELECT COUNT(".$primarykey.") as cnt FROM ".$L_tablename." WHERE (".$L_iEntity1."='".$L_iSearch."' OR ".$L_iEntity2."='".$L_iSearch."') AND ".$primarykey." <> $L_id";
				 }else{
					 $query = "SELECT COUNT(".$primarykey.") as cnt FROM ".$L_tablename." WHERE (".$L_iEntity1."='".$L_iSearch."' OR ".$L_iEntity2."='".$L_iSearch."')";
				 }

				//echo $query."<br>";

				$L_arrResults = $this->C_objMySql->fetchDataObject($query);

				//print_r($L_arrResults);
				if($L_arrResults === false)
				{
					return false;
				}
				else
				{
					if($L_arrResults[0]->cnt != 0) {
						return true;
					}else
					{
						return false;
					}
				}
			 }catch(Exception $L_objException) {
				$L_strErrorMessage = "Message:".$L_objException->getMessage()."<br>File:".$L_objException->getFile()."<br>Line:".$L_objException->getLine();

				throw new Exception($L_strErrorMessage);
			}
		 }

		// get users IP
		public function getUserIP(){

			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

			if ($ip == ''){

				$ip = $_SERVER['REMOTE_ADDR'];

			}

			return $ip;

		}


	}
	?>