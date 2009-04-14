<?php

/**
 * Manufactures
 *  
 * @author sean
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Manufactures extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 't_manufactures';
	
	public function getmanufacturelist()
	{
		$manufactures = new Manufactures();
		
		return $manufactures->fetchAll()->toArray();
	}

}
