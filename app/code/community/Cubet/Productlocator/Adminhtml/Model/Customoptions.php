<?php

class Cubet_Productlocator_Adminhtml_Model_Customoptions
{
 
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label'=>Mage::helper('adminhtml')->__('Left')),
            array('value' => 0, 'label'=>Mage::helper('adminhtml')->__('Right')),          
        );
    }

}