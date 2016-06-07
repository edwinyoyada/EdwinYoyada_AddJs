<?php
class EdwinYoyada_AddJs_Block_Adminhtml_Addjs_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("addjs_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("addjs")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("addjs")->__("Item Information"),
				"title" => Mage::helper("addjs")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("addjs/adminhtml_addjs_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
