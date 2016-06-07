<?php

class EdwinYoyada_AddJs_Block_Adminhtml_Addjs_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("addjsGrid");
				$this->setDefaultSort("addjs_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("addjs/addjs")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("addjs_id", array(
				"header" => Mage::helper("addjs")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "addjs_id",
				));
                
				$this->addColumn("name", array(
				"header" => Mage::helper("addjs")->__("Script Name"),
				"index" => "name",
				));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('addjs_id');
			$this->getMassactionBlock()->setFormFieldName('addjs_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_addjs', array(
					 'label'=> Mage::helper('addjs')->__('Remove Addjs'),
					 'url'  => $this->getUrl('*/adminhtml_addjs/massRemove'),
					 'confirm' => Mage::helper('addjs')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray2()
		{
            $data_array=array(); 
			$data_array[0]='Enabled';
            return($data_array);
		}
		static public function getValueArray2()
		{
            $data_array=array();
			foreach(EdwinYoyada_AddJs_Block_Adminhtml_Addjs_Grid::getOptionArray2() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}