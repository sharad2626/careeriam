<?php

	class Page
	{
		#class Variables
		var $C_objMySql;

		function cls_Page($L_objMySql)
		{
			$this->C_objMySql = $L_objMySql;
		}

		function fn_GetOffest($L_pageNo)
		{
			// counting the offset
			$L_offset = ($L_pageNo - 1) * ROW_PER_PAGE;

			return $L_offset;

		}
	}
?>