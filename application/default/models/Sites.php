<?php

/**
 * Sites
 *  
 * @author sean
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Sites extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 't_sites';
	
	public function getsitelist()
	{
		
		$sites =new Sites();
		$select = $sites->select();
//		$select'id, name';
		echo $select->__toString();
		return  $sites->fetchAll($select)->toArray();
				
	}

}


