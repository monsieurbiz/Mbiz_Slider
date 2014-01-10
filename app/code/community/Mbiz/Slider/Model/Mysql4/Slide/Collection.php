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
 * Collection of Slide
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Model_Mysql4_Slide_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Slide Collection Resource Constructor
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('mbiz_slider/slide');
    }

    /**
     * Add active filter
     * @param bool $active Active or not
     * @return Mbiz_Slider_Model_Mysql4_Slide_Collection
     */
    public function addActiveFilter($active = true)
    {
        $this->addFieldToFilter('is_active', $active);
        return $this;
    }

// Monsieur Biz Tag NEW_METHOD

}