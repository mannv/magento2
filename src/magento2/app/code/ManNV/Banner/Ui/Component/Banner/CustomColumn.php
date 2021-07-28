<?php

namespace ManNV\Banner\Ui\Component\Banner;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class CustomColumn extends Column
{
    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        $name = $this->getData('name');
        $dataSource['data']['items'] = array_map(function ($item) use ($name) {
            $item['tmp_url'] = $item['url'];
            if ($name == 'image') {
                $item['image'] = '<a href="' . $item['tmp_url'] . '" target="_blank"><img style="max-width: 200px;" src="' . $item['image'] . '" /></a>';
            }
//            if ($name == 'url') {
//                $item['url'] = '<a href="' . $item['tmp_url'] . '" target="_blank">' . $item['tmp_url'] . '</a>';
//            }
            return $item;
        }, $dataSource['data']['items']);
        return $dataSource;
    }
}
