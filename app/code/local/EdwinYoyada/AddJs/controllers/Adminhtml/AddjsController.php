<?php

class EdwinYoyada_AddJs_Adminhtml_AddjsController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("addjs/addjs")->_addBreadcrumb(Mage::helper("adminhtml")->__("Addjs  Manager"),Mage::helper("adminhtml")->__("Addjs Manager"));
				return $this;
		}
		public function indexAction()
		{
			    $this->_title($this->__("AddJs"));
			    $this->_title($this->__("Manager Addjs"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{
			    $this->_title($this->__("AddJs"));
				$this->_title($this->__("Addjs"));
			    $this->_title($this->__("Edit Item"));

				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("addjs/addjs")->load($id);
				if ($model->getId()) {
					Mage::register("addjs_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("addjs/addjs");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Addjs Manager"), Mage::helper("adminhtml")->__("Addjs Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Addjs Description"), Mage::helper("adminhtml")->__("Addjs Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("addjs/adminhtml_addjs_edit"))->_addLeft($this->getLayout()->createBlock("addjs/adminhtml_addjs_edit_tabs"));
					$this->renderLayout();
				}
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("addjs")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("AddJs"));
		$this->_title($this->__("Addjs"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("addjs/addjs")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("addjs_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("addjs/addjs");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Addjs Manager"), Mage::helper("adminhtml")->__("Addjs Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Addjs Description"), Mage::helper("adminhtml")->__("Addjs Description"));


		$this->_addContent($this->getLayout()->createBlock("addjs/adminhtml_addjs_edit"))->_addLeft($this->getLayout()->createBlock("addjs/adminhtml_addjs_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {


					$post_data['enabled']=implode(',',$post_data['enabled']);

						$model = Mage::getModel("addjs/addjs")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Addjs was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setAddjsData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setAddjsData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("addjs/addjs");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}


		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('addjs_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("addjs/addjs");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}

}
