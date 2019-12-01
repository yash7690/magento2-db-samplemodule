<?php

namespace MyVendor\DbSampleModule\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\MyVendor\DbSampleModule\Model\MyModelFactory $myModelFactory,
		\MyVendor\DbSampleModule\Model\ResourceModel\MyModel\CollectionFactory $collectionFactory
	) {
		parent::__construct($context);
		$this->myModelFactory = $myModelFactory;
		$this->collectionFactory = $collectionFactory;
	}

	public function execute()
	{
		//$this->saveNewData();
		//$this->updateExistingData();
		//$this->printCollectionUsingModel();
		//$this->printCollectionUsingCollection();
		$this->printFilteredCollection();
		echo "here";
		exit;
	}

	public function saveNewData()
	{
		$myModel = $this->myModelFactory->create();

		$myModel->setData([
			'title' => 'New Data #'.uniqid()
		]);

		$myModel->setStatus(1);

		$myModel->save();
	}

	public function updateExistingData()
	{
		$myModel = $this->myModelFactory->create();
		$myModel->load(1);
		$myModel->setTitle('Updated Title #'.uniqid());
		$myModel->save();		
	}

	public function printCollectionUsingModel()
	{
		$myModel = $this->myModelFactory->create();
		$collection = $myModel->getCollection();

		echo "<pre>";
		foreach ($collection as $item) {
			print_r($item->getData());
		}
		echo "</pre>";
	}

	public function printCollectionUsingCollection()
	{
		$collection = $this->collectionFactory->create();

		echo "<pre>";
		foreach ($collection as $item) {
			print_r($item->getData());
		}
		echo "</pre>";	
	}

	public function printFilteredCollection()
	{
		$collection = $this->collectionFactory->create();

		$collection->addFieldToSelect('title');
		$collection->addFieldToFilter('item_id', ['in' => [1, 2]]);
		$collection->setOrder('item_id', 'DESC');
		$collection->setPageSize(1);
		$collection->setCurPage(2);

		echo $collection->getSize();

		if ($collection->getSize()) {
			echo "<pre>";
			foreach ($collection as $item) {
				print_r($item->getData());
			}
			echo "</pre>";
		}
	}
}