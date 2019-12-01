<?php

namespace MyVendor\DbSampleModule\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        
        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $this->addTitle2Column($setup);
        }

        $setup->endSetup();
    }

    public function addTitle2Column($setup)
    {
        $setup->getConnection()->addColumn(
            $setup->getTable('myvendor_dbsamplemodule_items'),
            'title2',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => '255',
                'nullable' => true,
                'comment' => 'Title 2 Column'
            ]
        );
    }
}
