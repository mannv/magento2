<?php

namespace ManNV\Banner\Ui\Component\Banner;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class Actions
 */
class Actions extends Column
{
    /** Url path */
    const URL_PATH_EDIT = 'banner/banner/edit';
    const URL_PATH_DELETE = 'banner/banner/delete';

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlInterface $urlBuilder, array $components = [], array $data = [])
    {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                // here we can also use the data from $item to configure some parameters of an action URL
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->urlBuilder->getUrl(self::URL_PATH_EDIT, ['id' => $item['id']]),
                        'label' => __('Edit')
                    ],
                    'remove' => [
                        'href' => $this->urlBuilder->getUrl(self::URL_PATH_DELETE, ['id' => $item['id']]),
                        'label' => __('Remove'),
                        'confirm' => [
                            'title' => __('Delete %1', $item['name']),
                            'message' => __('Are you sure you want to delete a %1 record?', $item['name']),
                        ],
                        'post' => true,
                    ]
                ];
            }
        }

        return $dataSource;
    }
}
