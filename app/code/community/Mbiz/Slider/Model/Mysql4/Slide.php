<?php
/**
 * This file is part of Mbiz_Slider for Magento.
 *
 * @license All rights reserved
 * @author Jacques Bodin-Hullin <@jacquesbh> <j.bodinhullin@monsieurbiz.com>
 * @category Mbiz
 * @package Mbiz_Slider
 * @copyright Copyright (c) 2013 Monsieur Biz (http://monsieurbiz.com/)
 */

/**
 * Resource Model of Slide
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Model_Mysql4_Slide extends Mage_Core_Model_Mysql4_Abstract
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Slide Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        $this->_init('mbiz_slider/slide', 'slide_id');
    }

    /**
     * Before save
     * @return Mbiz_Slider_Model_Mysql4_Slide
     */
    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {
        // Dates
        if (!$object->getId()) {
            $object->setCreatedAt(Mage::getSingleton('core/date')->gmtDate());
        }
        $object->setUpdatedAt(Mage::getSingleton('core/date')->gmtDate());

        return parent::_beforeSave($object);
    }

// Monsieur Biz Tag NEW_METHOD

}