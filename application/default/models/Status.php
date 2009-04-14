<?php

/**
 * Status
 *  
 * @author sean
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Status extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'status';
	
	public function getstatuslist()
	{
		$statuslist = new Status();
		
		return $statuslist->fetchAll()->toArray();
	}

}
