<?php

namespace ManNV\Banner\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use ManNV\Banner\Api\BannerRepositoryInterface;

/**
 * Delete CMS page action.
 */
class Delete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'ManNV_Banner::delete';

    /**
     * @var BannerRepositoryInterface
     */
    private $bannerRepository;

    public function __construct(Context $context, BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            try {
                $model = $this->bannerRepository->getById($id);
                $this->bannerRepository->delete($model);
                // display success message
                $this->messageManager->addSuccessMessage(__('The banner has been deleted.'));
            } catch (NoSuchEntityException $e) {
                // display error message
                $this->messageManager->addErrorMessage(__('We can\'t find a banner to delete.'));
            }
        }

        return $resultRedirect->setPath('*/*/');
    }
}
