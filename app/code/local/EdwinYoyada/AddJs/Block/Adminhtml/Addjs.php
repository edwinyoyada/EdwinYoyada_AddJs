<?php


class EdwinYoyada_AddJs_Block_Adminhtml_Addjs extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_addjs";
	$this->_blockGroup = "addjs";
	$this->_headerText = Mage::helper("addjs")->__("Addjs Manager");
	$this->_addButtonLabel = Mage::helper("addjs")->__("Add New Item");
	parent::__construct();
	
	}

}