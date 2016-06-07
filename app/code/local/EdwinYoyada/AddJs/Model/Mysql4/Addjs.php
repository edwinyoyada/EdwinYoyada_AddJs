<?php
class EdwinYoyada_AddJs_Model_Mysql4_Addjs extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("addjs/addjs", "addjs_id");
    }
}
