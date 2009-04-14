<?php
/**
 * PSI Inventory project
 * 
 * @author   Sean Keys  
 * @version  0.0.1
 */
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
date_default_timezone_set('America/Phoenix');

set_include_path('.'. PATH_SEPARATOR . '../library' . PATH_SEPARATOR . '../application/default/models/'. PATH_SEPARATOR . get_include_path());
require_once 'Zend/Controller/Front.php';
Zend_Loader::registerAutoload();  // autoloads stuff as we make calls

// load configuration
$config_db = new Zend_Config_Ini('../application/default/config.ini', 'general');

// setup registry
$registry = Zend_Registry::getInstance();
$registry->set('config', $config_db);

// setup database
$db = Zend_Db::factory($config_db->db);
Zend_Db_Table::setDefaultAdapter($db);


// setup registry


/* ************** MODIFY php.ini*************
in PHP.INI

off extension: php_pgsql.dll
on extension: php_pdo_pgsql.dll
*/


/**
 * Setup controller
 */

$controller = Zend_Controller_Front::getInstance();
$controller->setControllerDirectory('../application/default/controllers');
$controller->throwExceptions(true); // should be turned on in development time 

Zend_Layout::startMvc(array('layoutPath' => '../application/default/layouts') );

$controller->dispatch();
