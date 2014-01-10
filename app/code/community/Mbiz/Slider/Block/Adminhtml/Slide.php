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
 * Slide Grid Container
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Block_Adminhtml_Slide extends Mage_Adminhtml_Block_Widget_Grid_Container
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Constructor Override
     * @return Mbiz_Slider_Block_Adminhtml_Slide
     */
    protected function _construct()
    {
        parent::_construct();

        $this->_blockGroup = 'mbiz_slider';
        $this->_controller = 'adminhtml_slide';
        $this->_headerText = $this->__('Grid of Slides');

        return $this;
    }

    /**
     * Prepare Layout
     * @return Mbiz_Slider_Block_Adminhtml_Slide
     */
    protected function _prepareLayout()
    {
        //$this->_removeButton('add');
        return parent::_prepareLayout();
    }

// Monsieur Biz Tag NEW_METHOD

}