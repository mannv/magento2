<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ManNV\Banner\Controller\Adminhtml\Banner;

use Magento\Framework\App\Action\HttpPostActionInterface;

/**
 * Create CMS page action.
 */
class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'ManNV_Banner::new';

    /**
     * @var \Magento\Backend\Model\View\Result\Forward
     */
    protected $resultForwardFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    )
    {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        echo '<pre>' . print_r($data, true) . '</pre>';
        die;
        die('sss');
//        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
//        $resultForward = $this->resultForwardFactory->create();
//        return $resultForward->forward('edit');
    }
}
