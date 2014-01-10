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
 * Slide Grid
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Block_Adminhtml_Slide_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Get collection object
     * @return Mbiz_Slider_Model_Mysql4_Slide_Collection
     */
    public function getCollection()
    {
        if (!parent::getCollection()) {
            $collection = Mage::getResourceModel('mbiz_slider/slide_collection');
            $this->setCollection($collection);
        }

        return parent::getCollection();
    }

    /**
     * Prepare columns
     * @return Mbiz_Slider_Block_Adminhtml_Slide_Grid
     */
    protected function _prepareColumns()
    {
        // Identifier
        $this->addColumn('slide_id', array(
            'header'   => Mage::helper('adminhtml')->__('#'),
            'width'    => 1,
            'type'     => 'number',
            'index'    => 'slide_id',
        ));

        // Title
        $this->addColumn('title', array(
            'header'   => Mage::helper('mbiz_slider')->__('Title'),
            'type'     => 'text',
            'index'    => 'title',
        ));

        // Image
        $this->addColumn('image', array(
            'header'   => Mage::helper('mbiz_slider')->__('Image'),
            'type'     => 'text',
            'index'    => 'image_path',
            'filter'   => false,
            'sortable' => false,
            'frame_callback' => array($this, 'decorateImage')
        ));

        // Creation date
        $this->addColumn('created_at', array(
            'header'   => Mage::helper('adminhtml')->__('Created At'),
            'type'     => 'datetime',
            'index'    => 'created_at',
        ));

        // Update date
        $this->addColumn('updated_at', array(
            'header'   => Mage::helper('adminhtml')->__('Updated At'),
            'type'     => 'datetime',
            'index'    => 'updated_at',
        ));

        // Position
        $this->addColumn('position', array(
            'header'   => Mage::helper('mbiz_slider')->__('Position'),
            'width'    => 1,
            'type'     => 'number',
            'index'    => 'position',
            'filter'   => false,
        ));

        // Status
        $this->addColumn('status', array(
            'header'   => Mage::helper('adminhtml')->__('Active'),
            'type'     => 'options',
            'index'    => 'is_active',
            'sortable' => false,
            'options'  => Mage::getSingleton('adminhtml/system_config_source_yesno')->toArray(),
            'frame_callback' => array($this, 'decorateStatus')
        ));

        return parent::_prepareColumns();
    }

    /**
     * Retrieve the edit URL
     * @param Mbiz_Slider_Model_Slide $item
     * @return string
     */
    public function getRowUrl($item)
    {
        return $this->getUrl('adminhtml/slider_slide/edit', array('id' => $item->getId()));
    }

    /**
     * Decorate status column values
     * @return string
     */
    public function decorateStatus($value, $row, $column, $isExport)
    {
        if ((bool) $row->getIsActive()) {
            $class = 'grid-severity-notice';
        } else {
            $class = 'grid-severity-critical';
        }
        return '<span class="' . $class . '"><span>' . $value . '</span></span>';
    }

    /**
     * Decorate image column values
     * @return string
     */
    public function decorateImage($value, $row, $column, $isExport)
    {
        return sprintf('<img src="%s"/>', $row->getImageUrl());
    }

// Monsieur Biz Tag NEW_METHOD

}