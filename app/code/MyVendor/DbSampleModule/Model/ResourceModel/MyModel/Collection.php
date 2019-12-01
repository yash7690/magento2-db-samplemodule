<?php

namespace MyVendor\DbSampleModule\Model\ResourceModel\MyModel;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'item_id';
	protected $_eventPrefix = 'myvendor_disamplemodule_mymodel_collection';
	protected $_eventObject = 'mymodel_collection';

	protected function _construct()
	{
		$this->_init(
			\MyVendor\DbSampleModule\Model\MyModel::class,
			\MyVendor\DbSampleModule\Model\ResourceModel\MyModel::class
		);
	}
}
