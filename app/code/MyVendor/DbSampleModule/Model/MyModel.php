<?php

namespace MyVendor\DbSampleModule\Model;

class MyModel extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'myvendor_dbsamplemodule_mymodel';
	protected $_cacheTag = 'myvendor_dbsamplemodule_mymodel';
	protected $_eventPrefix = 'myvendor_dbsamplemodule_mymodel';

	protected function _construct()
	{
		$this->_init(
			\MyVendor\DbSampleModule\Model\ResourceModel\MyModel::class
		);
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}
}
