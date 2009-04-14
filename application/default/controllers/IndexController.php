<?php

/**
 * IndexController - The default controller class
 * 
 * @author
 * @version 
 */

require_once 'Zend/Controller/Action.php';

class IndexController extends Zend_Controller_Action 
{
	/**
	 * The default action - show the home page
	 */
    public function indexAction() 
    {
    	$this->view->title = "PSI Inventory Home";
    	
		// TODO Auto-generated IndexController::indexAction() action
    }

    public function  addAction()
    {
    	$this->view->title = "Add Item To Inventory";
    	$form = new AddInventoryForm();
		$form->submit->setLabel('Add');
		$this->view->form = $form;
        if ($this->_request->isPost()) {
        $formData = $this->_request->getPost();
        if ($form->isValid($formData)) {
            $items = new Items();
            $row = $items->createRow();
            $row->nickname = $form->getValue('nickname');
            $row->serial = $form->getValue('serial');
            $row->notes = $form->getValue('notes');
            if (trim($form->getValue('inet')) != "") {
            	$row->inet = $form->getValue('inet');
            }
            if (trim($form->getValue('mac')) !=  ""){
            	$row->mac = $form->getValue('mac');
            }
    		$row->part_number = $form->getValue('part_number');
			$row->service_tag = $form->getValue('service_tag');
            $row->ourcost = $form->getValue('ourcost');
            $row->purchasedate = $form->getValue('purchasedate');
            $row->model_id = $form->getValue('model_id');
            $row->position_id = $form->getValue('posistion_id');
            $row->status_id = $form->getValue('status_id');
            $row->vendor_id = $form->getValue('vendor_id');
            $row->site_id = $form->getValue('site_id');
            $row->save();
            $this->_redirect('/');
        } else {
            $form->populate($formData);
        }
      }
    }
    
    public function moreAction()
    {
    	$this->view->title = "Showing More On Item";
    	// TODO add view code
    }

    public function showallAction()
    {
    	$this->view->title = "Showing All PSI Inventory";
	    $items = new Items();
		$select = $items->select()->setIntegrityCheck(false);
		$select->from('t_items');
		$select->join('t_sites', 't_items.site_id = t_sites.id', 'name AS sitename' );
		$select->join('t_status', 't_items.status_id = t_status.id', 'name AS statusname');
		//echo $select->__toString();
		$this->view->items = $items->fetchAll($select);
	
		//TODO Figure out how to use a view instead
		
   /* 	$dbconfig = Zend_Registry::get('config');
		$db = Zend_Db::factory($dbconfig->db);
		$listing = new Zend_Db_Select($db);
		$listing->from('t_items');
		$items = $listing->query();
	//	$this->view->items = $items->fetchAll();
		return $items->fetchAll();
		$this->view->
	//	$db->closeConnection();
	//	return $result;
	*/
	
	
	
    }

    public function editAction()
	{
		   $this->view->title = "Editing Item";
	}
}
