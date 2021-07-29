<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ManNV\Banner\Block\Adminhtml\Form;

use Magento\Backend\Block\Widget\Context;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * Return CMS block ID
     *
     * @return int|null
     */
    public function getBlockId()
    {
//        var_dump('getBlockID');
        return 0;
//        try {
//            return $this->blockRepository->getById(
//                $this->context->getRequest()->getParam('block_id')
//            )->getId();
//        } catch (NoSuchEntityException $e) {
//        }
//        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
