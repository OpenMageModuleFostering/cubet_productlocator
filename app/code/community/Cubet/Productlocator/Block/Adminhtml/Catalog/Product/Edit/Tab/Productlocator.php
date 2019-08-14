<?php

class Cubet_ProductLocator_Block_Adminhtml_Catalog_Product_Edit_Tab_Productlocator extends Mage_Adminhtml_Block_Widget_Form implements Mage_Adminhtml_Block_Widget_Tab_Interface {

    public function _construct() {
        parent::_construct();
        $this->setTemplate('productlocator/catalog/product/edit/tab.phtml');
    }

    public function getTabLabel() {
        return $this->__('Product Location');
    }

    public function getTabTitle() {
        return $this->__('Click to view content');
    }

    public function canShowTab() {
        return TRUE;
    }

    public function isHidden() {
        return FALSE;
    }

}
