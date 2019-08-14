<?php

class Cubet_Productlocator_Model_Mysql4_Locator_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

    public function _construct() //Constructor
    {
        parent::_construct();
        $this->_init('productlocator/location');
    }
}
?>
