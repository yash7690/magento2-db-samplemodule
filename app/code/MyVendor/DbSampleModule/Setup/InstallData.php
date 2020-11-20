<?php

namespace MyVendor\DbSampleModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class InstallData implements InstallDataInterface
{
    public function __construct(
        \MyVendor\DbSampleModule\Model\MyModelFactory $modelFactory
    ) {
        $this->modelFactory = $modelFactory;  
    }
 
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $data = [
            [
                'title' => 'Item 1',
                'status' => 1
            ],
            [
                'title' => 'Item 2',
                'status' => 1
            ],
            [
                'title' => 'Item 3',
                'status' => 1
            ]
        ];

        foreach ($data as $item) {
            $this->modelFactory->create()->setData($item)->save();
        }
 
        $setup->endSetup();
    }
}