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
 * Slide Model
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Model_Slide extends Mage_Core_Model_Abstract
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Prefix of model events names
     * @var string
     */
    protected $_eventPrefix = 'slide';

    /**
     * Parameter name in event
     * In observe method you can use $observer->getEvent()->getObject() in this case
     * @var string
     */
    protected $_eventObject = 'slide';

    /**
     * Slide Constructor
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('mbiz_slider/slide');
    }

    /**
     * Retrieve the image URL
     * @return string
     */
    public function getImageUrl()
    {
        return Mage::getBaseUrl('media') . $this->getImagePath();
    }

    /**
     * Retrieve the URL
     * @return string
     */
    public function getUrl()
    {
        return strtr($this->getData('url'), array(
            '{{baseUrl}}' => Mage::getUrl(),
            '{{baseSecureUrl}}' => Mage::getUrl('', array('_secure' => true)),
        ));
    }

    protected function _afterSave()
    {
        // Clean the cache
        Mage::app()->cleanCache(array(Mbiz_Slider_Helper_Data::CACHE_TAG));

        return parent::_afterSave();
    }

// Monsieur Biz Tag NEW_METHOD

}