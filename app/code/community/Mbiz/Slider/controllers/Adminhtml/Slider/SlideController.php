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
 * Adminhtml_Slider_Slide Controller
 * @package Mbiz_Slider
 */
class Mbiz_Slider_Adminhtml_Slider_SlideController extends Mage_Adminhtml_Controller_Action
{

// Monsieur Biz Tag NEW_CONST

// Monsieur Biz Tag NEW_VAR

    /**
     * Pre dispatch
     * @return void
     */
    public function preDispatch()
    {
        // Title
        $this->_title($this->__('Manage slides'));

        return parent::preDispatch();
    }

    /**
     * List
     * @return void
     */
    public function indexAction()
    {
        $this->_forward('grid');
    }

    /**
     * Grid
     * @return void
     */
    public function gridAction()
    {
        // Layout
        $this->loadLayout();

        // Title
        $this->_title($this->__('Grid'));

        // Content
        $grid = $this->getLayout()->createBlock('mbiz_slider/adminhtml_slide', 'grid');
        $this->_addContent($grid);

        // Render
        $this->renderLayout();
    }

    /**
     * New slide
     * @return void
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Edit slide
     * @return void
     */
    public function editAction()
    {
        // Object
        $object = Mage::getModel('mbiz_slider/slide')->load($this->getRequest()->getParam('id', false));
        Mage::register('current_slide', $object);

        // Layout
        // if handles were specified in arguments load them first
        $this->getLayout()->getUpdate()->addHandle('default');
        $this->getLayout()->getUpdate()->addHandle('editor');

        // add default layout handles for this action
        $this->addActionLayoutHandles();
        $this->loadLayoutUpdates();
        $this->generateLayoutXml();
        $this->generateLayoutBlocks();
        $this->_isLayoutLoaded = true;

        // Init session messages
        $this->_initLayoutMessages('adminhtml/session');

        // Title
        if ($object->getId()) {
            $this->_title($this->__('Edit Slide'));
        } else {
            $this->_title($this->__('New Slide'));
        }

        // Content
        $edit = $this->getLayout()->createBlock('mbiz_slider/adminhtml_slide_edit', 'edit_form');
        $this->_addContent($edit);

        // Render
        $this->renderLayout();
    }

    /**
     * Save slide
     * @return void
     */
    public function saveAction()
    {
        // Object
        $id     = $this->getRequest()->getParam('id', false);
        $object = Mage::getModel('mbiz_slider/slide')->load($id);

        // Save it
        try {
            $object->addData($this->getRequest()->getPost());
            $object->save();
        } catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($this->__('An error occurred.'));
            $this->_redirectReferer();
            return;
        }

        // Success
        $this->_getSession()->addSuccess($this->__('Slide saved successfully.'));
        $this->_redirect('*/*/index');
    }

    /**
     * Delete slide
     * @return void
     */
    public function deleteAction()
    {
        // Object
        $id     = $this->getRequest()->getParam('id', false);
        $object = Mage::getModel('mbiz_slider/slide')->load($id);

        // No object?
        if (!$object->getId()) {
            $this->_getSession()->addError($this->__('Slide not found.'));
            $this->_redirectReferer();
            return;
        }

        // Delete it
        try {
            $object->delete();
        } catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($this->__('An error occurred.'));
            $this->_redirectReferer();
            return;
        }

        // Success
        $this->_getSession()->addSuccess($this->__('Slide deleted successfully.'));
        $this->_redirect('*/*/index');
    }

// Monsieur Biz Tag NEW_METHOD

    /**
     * Is allowed?
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }

}