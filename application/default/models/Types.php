<?php

/**
 * Types
 *  
 * @author sean
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Types extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'types';
	
	public function gettypeslist()
	{
		$typeslist = new Types();
		
		return $typeslist->fetchAll()->toArray();
	}

}
