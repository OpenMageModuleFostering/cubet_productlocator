<?php

class Cubet_Productlocator_IndexController extends Mage_Core_Controller_Front_Action {
    
    public function locationsaveAction() {
        $pid = $_GET['pid'];
        $latitude = $_GET['lat'];
        $longitude = $_GET['lon'];
        $loc = Mage::getModel('productlocator/locator')->addlocation($pid, $latitude, $longitude);
        return $loc;
    }

    public function getdirectionAction() {
        $from_lat = $_POST['frlat'];
        $from_lon = $_POST['frlon'];
        $to_lat = $_POST['tolat'];
        $to_lon = $_POST['tolon'];
        $resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $query = 'SELECT distance(' . $from_lat . ',' . $from_lon . ',' . $to_lat . ',' . $to_lon . ') as itemdistance';
        $results = $readConnection->fetchAll($query);
        echo $results[0]['itemdistance'] . 'KM';
    }

}
