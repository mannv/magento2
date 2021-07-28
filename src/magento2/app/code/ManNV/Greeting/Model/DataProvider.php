<?php

namespace ManNV\Greeting\Model;

use Magento\Ui\DataProvider\AbstractDataProvider;
use ManNV\Greeting\Model\ResourceModel\Message\CollectionFactory;


class DataProvider extends AbstractDataProvider
{
    /**
     * DataProvider constructor.
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct($name, $primaryFieldName, $requestFieldName, CollectionFactory $collectionFactory, array $meta = [], array $data = [])
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
}
