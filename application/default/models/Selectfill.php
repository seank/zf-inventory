<?php
class Selectfill  {
	
	public $tablename='' ;
	public $value='';
	
	function __construct($tablename='',$value='') {
		$this->tablename=$tablename;
		$this->value=$value;
				
		}
	function __destruct(){
		}
		
public function filllist()

{
		
	$dbconfig = Zend_Registry::get('config');
	$db = Zend_Db::factory($dbconfig->db);
	$listing = new Zend_Db_Select($db);
	$listing->from($this->tablename,array('id', $this->value) );
	$query = $listing->query();
	$result = array();
   	foreach ($query->fetchAll() as $row)
   	 {
    $result[$row['id']] = $row[$this->value];
	$db->closeConnection();
    

     	}
		return $result;
		
}

}
?>