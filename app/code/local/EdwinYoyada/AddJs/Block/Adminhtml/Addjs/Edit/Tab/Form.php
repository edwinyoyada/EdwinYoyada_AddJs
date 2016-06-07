<?php
class EdwinYoyada_AddJs_Block_Adminhtml_Addjs_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("addjs_form", array("legend"=>Mage::helper("addjs")->__("Item information")));

				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("addjs")->__("Script Name"),
						"name" => "name",
						));
					
						$fieldset->addField("js_script", "textarea", array(
						"label" => Mage::helper("addjs")->__("Script Value"),
						"name" => "js_script",
						));
									
						 $fieldset->addField('enabled', 'multiselect', array(
						'label'     => Mage::helper('addjs')->__('Enabled?'),
						'values'   => EdwinYoyada_AddJs_Block_Adminhtml_Addjs_Grid::getValueArray2(),
						'name' => 'enabled',
						));

				if (Mage::getSingleton("adminhtml/session")->getAddjsData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getAddjsData());
					Mage::getSingleton("adminhtml/session")->setAddjsData(null);
				} 
				elseif(Mage::registry("addjs_data")) {
				    $form->setValues(Mage::registry("addjs_data")->getData());
				}
				return parent::_prepareForm();
		}
}
