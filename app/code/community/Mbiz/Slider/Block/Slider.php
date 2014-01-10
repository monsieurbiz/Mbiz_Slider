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
 * Slider Block
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Block_Slider extends Mage_Core_Block_Template
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Retrieve the slides
     * @return Mbiz_Slider_Model_Mysql4_Slide_Collection
     */
    public function getSlides()
    {
        $slides = Mage::getModel('mbiz_slider/slide')->getCollection();
        $slides->addActiveFilter();
        $slides->setOrder('position');

        return $slides;
    }

    /**
     * Retrieve the cache key info
     * @return array
     */
    public function getCacheKeyInfo()
    {
        return array(
            'full_action_name' => Mage::app()->getFrontController()->getAction()->getFullActionName(),
            'name_in_layout'   => $this->getNameInLayout(),
            'store'            => Mage::app()->getStore()->getId(),
            'design_package'   => Mage::getDesign()->getPackageName(),
            'design_theme'     => Mage::getDesign()->getTheme('template'),
        );
    }

    /**
     * Retrieve the cache tags
     * @return array
     */
    public function getCacheTags()
    {
        $tags = parent::getCacheTags();
        array_push(
            $tags,
            Mbiz_Slider_Helper_Data::CACHE_TAG
        );

        return $tags;
    }

    /**
     * Retrieve the cache lifetime
     * @return int
     */
    public function getCacheLifetime()
    {
        return 5 * 24 * 3600;
    }

    /**
     * Prepare HTML
     * @return string
     */
    protected function _toHtml()
    {
        // No slides?
        if (!count($this->getSlides())) {
            return null;
        }

        return parent::_toHtml();
    }

// Monsieur Biz Tag NEW_METHOD

}