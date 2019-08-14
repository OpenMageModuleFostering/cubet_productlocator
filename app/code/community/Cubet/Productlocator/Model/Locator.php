<?php

class Cubet_Productlocator_Model_Locator extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('productlocator/location');
    }

    public function addlocation($pid, $latitude, $longitude) {
        $is_exist = $this->checklocation($pid);
        $resource = Mage::getSingleton('core/resource');
        $writeConnection = $resource->getConnection('core_write');
        $table = 'cubet_productlocator';
        if ($is_exist == 0):
            $query = "INSERT into {$table} (`pid`,`latitude`,`longitude`) values ('{$pid}','{$latitude}','{$longitude}')";
            $writeConnection->query($query);
            return 1;
        else:
            $query = "UPDATE {$table} SET latitude = '{$latitude}', longitude = '{$longitude}' WHERE pid = " . $pid;
            $writeConnection->query($query);
            return 1;
        endif;
    }

    public function checklocation($pid) {
        $resource = Mage::getSingleton('core/resource');
        $writeConnection = $resource->getConnection('core_write');
        $table = 'cubet_productlocator';
        $query = "SELECT * from {$table} where pid = '{$pid}'";
        $value = $writeConnection->fetchAll($query);
        if (!empty($value)) {
            return $value;
        } else {
            return 0;
        }
    }
}

?>
