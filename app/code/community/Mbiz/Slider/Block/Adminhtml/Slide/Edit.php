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
 * Slide Form Container
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Block_Adminhtml_Slide_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Constructor Override
     * @return Mbiz_Slider_Block_Adminhtml_Slide_Edit
     */
    protected function _construct()
    {
        parent::_construct();

        $this->_blockGroup = 'mbiz_slider';
        $this->_controller = 'adminhtml_slide';
        $this->_mode       = 'edit';

        $this->setFormActionUrl($this->getUrl('*/*/save', array('id' => $this->_getObject()->getId())));

        return $this;
    }

    /**
     * The header
     * @return string
     */
    public function getHeaderText()
    {
        if ($this->_getObject()->getId()) {
            $header = 'Edit Slide';
        } else {
            $header = 'New Slide';
        }
        return $this->__($header);
    }

    /**
     * Retrieve the slide
     * @return Mbiz_Slider_Model_Slide
     */
    protected function _getObject()
    {
        return Mage::registry('current_slide');
    }

// Monsieur Biz Tag NEW_METHOD

}