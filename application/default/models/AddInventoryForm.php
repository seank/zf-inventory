<?php
class AddInventoryForm extends Zend_Form
{
    public function __construct($options = null)
    {
        parent::__construct($options);
        $this->setName('item');
        $id = new Zend_Form_Element_Hidden('id');
        
        $nickname = new Zend_Form_Element_Text('nickname');
        $nickname->setLabel('Nickname ->')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $serial = new Zend_Form_Element_Text('serial');
        $serial->setLabel('Serial ->')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $dateofpurchase = new Zend_Form_Element_Text('purchasedate');
        $dateofpurchase->setLabel('Date Purchased ->')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $note = new Zend_Form_Element_Text('notes');
        $note->setLabel('Notes ->')
        ->setRequired(false)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
      	$inet	= new Zend_Form_Element_Text('inet');
        $inet->setLabel('IP Addresss ->')
        ->setRequired(false);
       // ->addFilter('StripTags')
       // ->addFilter('StringTrim');
        
        
        
        $mac = new Zend_Form_Element_Text('mac');
        $mac->setLabel('Mac Address ->')
        ->setRequired(false);
     //   ->addFilter('StripTags')
     //   ->addFilter('StringTrim');
               
        $ourcost = new Zend_Form_Element_Text('ourcost');
        $ourcost->setLabel('Our Cost ->')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $servicetag = new Zend_Form_Element_Text('service_tag');
        $servicetag->setLabel('Service Tag ->')
        ->setRequired(false)
        ->addFilter('StripTags')
        ->addFilter('StringTrim');
        
        $partnumber = new Zend_Form_Element_Text('part_number');
        $partnumber->setLabel('Part Number ->')
        ->setRequired(false)
        ->addFilter('StripTags')
        ->addFilter('StringTrim');
        
        $sites = new Selectfill('t_sites','name');
        $sitelist = $sites->filllist();
        $site = new Zend_Form_Element_Select('site_id');
        $site->setLabel('Site ->')
        ->setRequired(true)
        ->addValidator('NotEmpty', true)
        ->setMultiOptions($sitelist);
        
        $models = new Selectfill('t_models','name');
        $modellist = $models->filllist();
        $model = new Zend_Form_Element_Select('model_id');
        $model->setLabel('Model ->')
        ->setRequired(true)
        ->addValidator('NotEmpty',true)
        ->setMultiOptions($modellist);
        
        $positions = new Selectfill('t_positions','name');
        $positionlist = $positions->filllist();
        $position = new Zend_Form_Element_Select('posistion_id');
        $position->setLabel('Position ->')
        ->setRequired(true)
        ->addValidator('NotEmpty',true)
        ->setMultiOptions($positionlist);
        
        $statuses = new Selectfill('t_status','name');
        $statuslist = $statuses->filllist();
        $status = new Zend_Form_Element_Select('status_id');
        $status->setLabel('Status ->')
        ->setRequired(true)
        ->addValidator('NotEmpty',true)
        ->setMultiOptions($statuslist);
        
        $vendors = new Selectfill('t_vendors','name');
        $vendorlist = $vendors->filllist();
        $vendor = new Zend_Form_Element_Select('vendor_id');
        $vendor->setLabel('Vendor ->')
        ->setRequired(true)
        ->addValidator('NotEmpty',true)
        ->setMultiOptions($vendorlist);
                                
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($id, $nickname, $serial, $servicetag,
        $site, $partnumber, $model, $position, $vendor,
        $status, $inet, $mac, $dateofpurchase, $ourcost, $note, $submit));
    }
}
