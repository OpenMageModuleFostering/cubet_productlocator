<?php

class Cubet_Productlocator_Model_Observer {

    public function save_location(Varien_Event_Observer $observer) {
        
    }

    public function set_block($observer) {

        $action = $observer->getEvent()->getAction();
        $fullActionName = $action->getFullActionName();
        $layout_position = Mage::getStoreConfig('productlocator/map/side');
        $position = ($layout_position == 1) ? 'left' : 'right';
        $myXml = '<reference name="' . $position . '">';
        $myXml .= '<block type="productlocator/map" name="locator" template="productlocator/locator.phtml" />';
        $myXml .= '</reference>';

        $layout = $observer->getEvent()->getLayout();
        if ($fullActionName == 'catalog_product_view') {  //set any action name here
            $layout->getUpdate()->addUpdate($myXml);
            $layout->generateXml();
        }
    }

}

?>
