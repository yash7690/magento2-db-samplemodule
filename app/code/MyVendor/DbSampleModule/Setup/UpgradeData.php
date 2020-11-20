<?php

namespace MyVendor\DbSampleModule\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
	public function __construct(
		\MyVendor\DbSampleModule\Model\MyModelFactory $modelFactory
	) {
		$this->modelFactory = $modelFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '1.0.1', '<')) {
			$data = [
				'item_id' => 1,
                'title' => 'Item 1 - modified'
            ];

			$this->modelFactory->create()->setData($data)->save();
		}
	}
}

