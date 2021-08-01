<?php

namespace ManNV\Banner\Model;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use ManNV\Banner\Model\ResourceModel\Banner\CollectionFactory;


class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    private $storeManager;

    /**
     * DataProvider constructor.
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var $banner \ManNV\Banner\Model\Banner */
        $imageUploader = ObjectManager::getInstance()->get('ManNV\Banner\BannerImageUpload');
        foreach ($items as $banner) {
            $row = $banner->getData();
            $imageUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . $imageUploader->getBasePath() . '/' . $row['image'];
            $row['imageBanner'][0]['url'] = $imageUrl;
            $row['imageBanner'][0]['type'] = 'image';
            $row['imageBanner'][0]['name'] = $row['image'];
            $row['imageBanner'][0]['size'] = 0;
            $this->loadedData[$banner->getId()] = $row;
        }
        return $this->loadedData;
    }
}
