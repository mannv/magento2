<?php

namespace ManNV\Greeting\Ui\Component\Message\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Status extends Column
{
    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        $dataSource['data']['items'] = array_map(function ($item) {
            $item['status'] = $item['status'] == 1 ? 'OK' : 'NG';

            if ($item['id'] == 1) {
                $item['status'] = '<img style="width: 30px;" src="https://png.pngtree.com/element_our/20200702/ourlarge/pngtree-black-lock-icon-image_2292642.jpg" />';
            }

            return $item;
        }, $dataSource['data']['items']);
        return $dataSource;
    }
}
