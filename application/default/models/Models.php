<?php

/**
 * Models
 *  
 * @author sean
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Models extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 't_models';
	
	public function getmodellist()
	{
		$modellist = new Models();
		
		return $modellist->fetchAll()->toArray();
	}

}
