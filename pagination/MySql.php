<?php

	/**
	 *	# This class contains all the database related functionality 
	 *
	 *	@author Yashwant Tambe <yashwant.tambe@wwindia.com> <sandeep.jain@wwindia.com>
	 *
	 *   @package Class
	 */
	
	class MySql {
		/**
		 *	@var string $C_strUser Username of Mysql Server
		 *	@access private
		 */
		private $C_strUser;
		
		/**
		 *	@var string $C_strPassword Password of Mysql Server
		 *	@access private
		 */ 
		private $C_strPass;
		
		/**
		 *	@var string $C_strDataBase Database Name
		 *	@access private
		 */
		private $C_strDataBase;
		
		/**
		 *	@var string $C_strServer MySql Server
		 *	@access private
		 */
		private $C_strServer;
		
		/**
		 *	@var resource $C_rsConnection Connection Resource
		 *	@access private
		 */
		private $C_objConnection;

		private $C_errorMesage;

		private static $C_instance = null ;
		
		/**	
		 *	Counstructor of Class
	      *	
		 *	This is used to initialise the class variables
		 */
		function __construct() {
			
			$this->C_strUser = DB_USER;

			$this->C_strPass = DB_PASSWORD;

			$this->C_strDataBase = DB_NAME;

			$this->C_strServer = "localhost";
		}


		public static function getInstance () {
			if (null === self::$C_instance) {
			  self::$C_instance = new self ( ) ;
			}
			return self::$C_instance ;
		}


		/**
		 *	This function return the connection object
		 *	
		 *	@return resource Connection
		 */
		public function connect() {

			$L_objConn = $this->createDbConnection();

			$this->setDbConnection($L_objConn);

			return $L_objConn;

		}

		/**
		 *	This Function Connect to the Database
		 *	
		 *	@return resource Connection
		 */
		protected function createDbConnection() {

            
			$this->C_objConnection = @mysql_connect($this->C_strServer, $this->C_strUser, $this->C_strPass);

			if($this->C_objConnection === false)
			{
				throw new Exception('Could not connect: '.mysql_error());
			}

			$this->selectDatabase();
			return $this->C_objConnection;
		}

		/**
		 *	This Function Select the Database
		 *	
		 */

		private function selectDatabase() {

			$L_bResult = @mysql_select_db($this->C_strDataBase);

			if($L_bResult === false) {

				throw new Exception("Databse: ".mysql_error());
			}
		}


		/**
		 *	This Function Set The Class Variable Connection 
		 */
		private function setDbConnection($L_objConn) {

			$this->C_objConnection = $L_objConn;
		}


		/**
		 *	Execute The Queary
		 *	
		 *	@param string $L_strQuery	Query which will be execute
		 *	
		 *	@return resource $L_result  Result set of the query 
		 */
		public function executeQuery($L_strQuery) 
		{
			//$L_strQuery = mb_convert_encoding($L_strQuery,"latin1","auto");
			$L_result = @mysql_query($L_strQuery);
			
			if(DEBUG == true) 
			{
				//echo "true=".$L_strQuery."<br/><br/>";
			}

			//echo $L_strQuery."<br>";
			if($L_result === false) 
			{
				//echo mysql_error()."<br>";
				throw new Exception(mysql_error());
			}
			//echo "result=".$L_result;
			return $L_result;
		}


		/**
		 *	Execute The Insert Queary
		 *	
		 *	@param string $L_strTableName	   Table Name on Which In Insert Operation will be operate.
		 *	@param string $L_arrData	   Associated Array 'Column Name' => 'Value'
		 *	
		 *	@return bool $L_result	True -> Success , false -> Error 
		 */
		public function executeInsertQuery($L_strTableName, $L_arrData) {
			//print_r($L_strTableName);
			//echo $L_arrData;
		
			$L_arrData = $this->removeSqlInjectionFromArray($L_arrData);

			if(!is_array($L_arrData)) {
				
				throw new Exception("Bad Arguments in Implode");
			}
			$L_InsertQuery = "INSERT INTO ".$L_strTableName."(".implode(", ", array_keys($L_arrData)).")"."VALUES(".implode(", ", $L_arrData).")";
			
			$L_InsertQuery = mb_convert_encoding($L_InsertQuery,"utf8");
			
			
			$L_rsInsert = $this->executeQuery($L_InsertQuery);
			
			return $L_rsInsert;
		}
		

		# fn_SelectLastInsertedId 
		# Function Description : 
		#	This function is for fetching Last inserted Id
		#
		public function fn_SelectLastInsertedId()
		{
			# Select Last Inserted Id 
			$L_LastId = mysql_insert_id();
			
			# Return the Id 
			return $L_LastId;
		}
		# Function fn_SelectLastInsertedId END 


		/**
		 *	Execute The Update Queary
		 *	
		 *	@param string $L_strTableName	   Table Name on Which In Insert Operation will be operate.
		 *	@param array $L_arrData	   Associated Array 'Column Name' => 'Value'
		 *	@param string $L_strWhere   Where Condition For Update Query
		 *	
		 *	@return bool $L_result	True -> Success , false -> Error 
		 */
		public function executeUpdateQuery($L_strTableName, $L_arrData, $L_strWhere) {

			$L_arrData = $this->removeSqlInjectionFromArray($L_arrData);

			if(!is_array($L_arrData)) {
				throw new Exception("Bad Arguments in Impload");
			}

			$L_UpdateQuery = "UPDATE ".$L_strTableName." SET ";
			
			foreach($L_arrData As $L_strKeyColumn => $L_strValue)
			{
				//$L_UpdateValues[] = $L_strKeyColumn." = ".$L_strValue." ";
				$L_UpdateValues[] = $L_strKeyColumn." = ".mb_convert_encoding($L_strValue,"utf8")." ";

			}

			$L_UpdateQuery .= implode(", ", $L_UpdateValues)." WHERE ".$L_strWhere; 
			//echo $L_UpdateQuery;
			//exit;
			
			$L_rsUpdate = $this->executeQuery($L_UpdateQuery);
		//	exit();
			return $L_rsUpdate;
		}

		/**
		 *	This function modified each variable to prevents SQL Injection
		 *	@param array $L_arrData	   Associated Array 'Column Name' => 'Value'
		 */
		
		public function removeSqlInjectionFromArray($L_arrData) {
			//print_r($L_arrData);
			
			if(!is_array($L_arrData)) {
				throw new Exception("Bad Arguments in Impload");
			}

			foreach($L_arrData As $L_strKeyColumn => $L_strValue)
			{
				# Check This is string or not
				$L_strOld = $L_strValue; # old value => 'abc'
				$L_strFind   = '\'';
				$L_iPos = strpos($L_strOld, $L_strFind);
				
				if($L_iPos === 0) {
					$L_strReplace = substr($L_strOld,1,strlen($L_strOld)-2); 

					$L_strNew = $this->quote_smart($L_strReplace);
					
					$L_arrData[$L_strKeyColumn] = $L_strNew;
				} else {

				}
			}
			//print_r($L_arrData);
			return $L_arrData;

		}
		
		/**
		 * This function put mysql_real_escape_string in the string
		 * @param string $L_strValue
		 */
		public function quote_smart($L_strValue) {
			// Stripslashes
		     if (get_magic_quotes_gpc()) {
				$L_strValue = stripslashes($L_strValue);
		     }
		     // Quote if not a number or a numeric string
		     if (!is_numeric($L_strValue)) {
				$L_strValue = "'" . mysql_real_escape_string($L_strValue) . "'";
		     }
		     return $L_strValue;
		}

		public function fetchDataObject($L_strQuery) {
			//	$L_strQuery =mb_convert_encoding($L_strQuery,"latin1","auto");
		
			$L_resQuery = $this->executeQuery($L_strQuery);
			
			if($L_resQuery !== false) {

				//while($L_arrDataObject[] = mysql_fetch_object($L_resQuery));
				while($L_arrRow = mysql_fetch_object($L_resQuery))
				{
					foreach($L_arrRow AS $key=>$value)
					{
						$L_arrRow->$key = mb_convert_encoding($value,"latin1","auto");
					}
					$L_arrDataObject[] = $L_arrRow;
					
				}
				//array_pop($L_arrDataObject);
				
				return $L_arrDataObject;
			}
		}
		public function fn_FetchData($L_Query)
		{  
			# Execute the query using the function 
			$L_ResQuery = $this->executeQuery($L_Query);
			
			# Fetch all the records in an array 
			//while($L_arrData[] = mysql_fetch_array($L_ResQuery, MYSQL_ASSOC));
			while($L_arrRow = mysql_fetch_array($L_ResQuery, MYSQL_ASSOC))
			{
				foreach($L_arrRow AS $key=>$value)
					{
						$L_arrRow[$key] = mb_convert_encoding($value,"latin1","auto");
					}
				$L_arrData[] = 	$L_arrRow;
			}
			
			# Remove the last element of the array because it always comes empty (BECAUSE OF WHILE LOOP)
			//array_pop($L_arrData);
			
			# Return the array 
			
			return $L_arrData;
		}

		public function fn_NumRows($L_Query)
		{
			# Execute the query using the function 
			$L_ResQuery = $this->executeQuery($L_Query);
			
			# Return the array 
			return mysql_num_rows($L_ResQuery);
		}

		public function fn_Try()
		{
			if($this->C_errorMesage=="")
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function fn_Catch()
		{
			$L_exceptionMessage = $this->C_errorMesage;
			$this->C_errorMesage = "" ;
			return $L_exceptionMessage;
		}




	}
	
	# Class cls_MySql END
?>
