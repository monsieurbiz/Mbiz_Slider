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

try {

    /* @var $installer Mage_Core_Model_Resource_Setup */
    $installer = $this;
    $installer->startSetup();

    // Create slides table
    $tableName = $installer->getTable('mbiz_slider/slide');
    if (!$installer->tableExists($tableName)) {
        $table = $installer->getConnection()->newTable($tableName);
        $table
            ->addColumn('slide_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary'  => true,
            ), 'Slide ID')
            ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
                'nullable' => true,
            ), 'Image title')
            ->addColumn('subtitle', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
                'nullable' => true,
            ), 'Image subtitle')
            ->addColumn('image_alt', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
                'nullable' => false,
            ), 'Image alternative')
            ->addColumn('image_path', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
                'nullable' => false,
            ), 'Image path')
            ->addColumn('url', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
                'nullable' => true,
            ), 'Image URL')
            ->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'nullable' => false,
                'default'  => 0,
            ), 'Position')
            ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                'nullable' => false,
                'default'  => 1,
            ), 'Is slider active?')
            ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
                'nullable' => false,
            ), 'Creation date')
            ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
                'nullable' => false,
            ), 'Update date')
        ;
        $installer->getConnection()->createTable($table);
    }

    $installer->endSetup();

} catch (Exception $e) {
    // Silence is golden
}
