<?php

namespace ManNV\Banner\Ui\Component\Banner;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class CustomColumn extends Column
{
    private $storeManager;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = [],
        StoreManagerInterface $storeManager
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        $imageUploader = ObjectManager::getInstance()->get('ManNV\Banner\BannerImageUpload');
        $imgPath = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . $imageUploader->getBasePath();
        $name = $this->getData('name');
        $dataSource['data']['items'] = array_map(function ($item) use ($imgPath, $name) {
            if (!str_starts_with($item['image'], 'https://cf.shopee.vn')) {
                $item['image'] = $imgPath . '/' . $item['image'];
            }

            if ($name == 'image') {
                $item['image'] = '<a href="' . $item['url'] . '" target="_blank"><img style="max-width: 200px;" src="' . $item['image'] . '" /></a>';
            }
            return $item;
        }, $dataSource['data']['items']);
        return $dataSource;
    }
}
