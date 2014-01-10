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
 * Slide Form
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Block_Adminhtml_Slide_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Prepare form before rendering HTML
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getData('action'),
            'method'    => 'post',
            'enctype'   => 'multipart/form-data'
        ));

        $entity = Mage::registry('current_slide');
        $form->setDataObject($entity);

        if ($entity->getId()) {
            $form->addField('slide_id', 'hidden', array(
                'name' => 'slide_id'
            ));
        }

        $fieldset = $form->addFieldset('general', array(
            'legend' => Mage::helper('mbiz_slider')->__('General Information')
        ));

        // Media chooser
        $fieldset->addType('mediachooser','AntoineK_MediaChooserField_Data_Form_Element_Mediachooser');

        // Title
        $fieldset->addField('title', 'text', array(
            'name' => 'title',
            'label' => Mage::helper('mbiz_slider')->__('Title'),
            'title' => Mage::helper('mbiz_slider')->__('Title'),
            'required' => true,
        ));

        // sub Title
        $fieldset->addField('subtitle', 'text', array(
            'name' => 'subtitle',
            'label' => Mage::helper('mbiz_slider')->__('Subtitle'),
            'title' => Mage::helper('mbiz_slider')->__('Subtitle'),
            'required' => false,
        ));

        // Active field
        $fieldset->addField('is_active', 'select', array(
            'name' => 'is_active',
            'label' => Mage::helper('adminhtml')->__('Active'),
            'title' => Mage::helper('adminhtml')->__('Active'),
            'required' => true,
            'options' => Mage::getSingleton('adminhtml/system_config_source_yesno')->toArray(),
        ));

        // Image field
        $fieldset->addField('image_path', 'mediachooser', array(
            'name' => 'image_path',
            'label' => Mage::helper('mbiz_slider')->__('Image'),
            'title' => Mage::helper('mbiz_slider')->__('Image'),
            'required' => true
        ));

        // Image alternative text
        $fieldset->addField('image_alt', 'text', array(
            'name' => 'image_alt',
            'label' => Mage::helper('mbiz_slider')->__('Image alternative text'),
            'title' => Mage::helper('mbiz_slider')->__('Image alternative text'),
            'required' => true,
        ));

        // Url field
        $fieldset->addField('url', 'text', array(
            'name' => 'url',
            'label' => Mage::helper('mbiz_slider')->__('URL'),
            'title' => Mage::helper('mbiz_slider')->__('URL'),
            'required' => false,
            'note' => Mage::helper('mbiz_slider')->__('Use {{baseSecureUrl}} and {{baseUrl}} if needed.'),
        ));

        // Position field
        $fieldset->addField('position', 'text', array(
            'name' => 'position',
            'label' => Mage::helper('adminhtml')->__('Position'),
            'title' => Mage::helper('adminhtml')->__('Position'),
            'required' => false,
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Initialize form fields values
     * Method will be called after prepareForm and can be used for field values initialization
     * @return Mbiz_Slider_Block_Adminhtml_Slide_Edit_Form
     */
    protected function _initFormValues()
    {
        $entity = Mage::registry('current_slide');
        $this->getForm()->setValues($entity->getData());

        return $this;
    }

// Monsieur Biz Tag NEW_METHOD

}