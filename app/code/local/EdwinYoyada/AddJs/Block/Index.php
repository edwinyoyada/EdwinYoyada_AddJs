<?php
class EdwinYoyada_AddJs_Block_Index extends Mage_Core_Block_Template{

    public function methodblock() {

        $data='';

        $collections = Mage::getModel('addjs/addjs')->getCollection()->addFilter('enabled', 1)->setOrder('addjs_id','asc');

        foreach($collections as $collection)
        {
            $data .= $collection->getData('js_script').'<br />';
        }

        return "$data";
    }

}
