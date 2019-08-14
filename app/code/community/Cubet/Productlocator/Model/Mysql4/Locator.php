<?php

class Cubet_Productlocator_Model_Mysql4_Locator extends Mage_Core_Model_Mysql4_Abstract {
    
     public function _construct() //Constructor
    {
        $this->_init('productlocator/location', 'id');
    }
}
?>
