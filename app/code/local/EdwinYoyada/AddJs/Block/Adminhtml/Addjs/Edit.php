<?php
	
class EdwinYoyada_AddJs_Block_Adminhtml_Addjs_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "addjs_id";
				$this->_blockGroup = "addjs";
				$this->_controller = "adminhtml_addjs";
				$this->_updateButton("save", "label", Mage::helper("addjs")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("addjs")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("addjs")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("addjs_data") && Mage::registry("addjs_data")->getId() ){

				    return Mage::helper("addjs")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("addjs_data")->getId()));

				} 
				else{

				     return Mage::helper("addjs")->__("Add Item");

				}
		}
}