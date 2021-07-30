<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ManNV\Banner\Controller\Adminhtml\Banner;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use ManNV\Banner\Api\BannerRepositoryInterface;
use ManNV\Banner\Model\BannerFactory;

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
     * @var BannerFactory|mixed
     */
    private $bannerFactory;

    /**
     * @var BannerRepositoryInterface|mixed
     */
    private $bannerRepository;
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        BannerFactory $bannerFactory,
        BannerRepositoryInterface $bannerRepository,
        DataPersistorInterface $dataPersistor
    )
    {
        $this->dataPersistor = $dataPersistor;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->bannerFactory = $bannerFactory
            ?: ObjectManager::getInstance()->get(BannerFactory::class);

        $this->bannerRepository = $bannerRepository
            ?: ObjectManager::getInstance()->get(BannerRepositoryInterface::class);

        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            //TODO: validate post data


            /** @var \ManNV\Banner\Model\Banner $model */
            $model = $this->bannerFactory->create();
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                try {
                    $model = $this->bannerRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This banner no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setUrl($data['url']);
            $model->setDescription($data['description']);
            $model->setName($data['name']);
            $model->setImage($data['image']);

            try {
                $this->bannerRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the banner.'));
                $this->dataPersistor->clear('mannv_banner');
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the banner.'));
            }

            $this->dataPersistor->set('mannv_banner', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);

        }
        return $resultRedirect->setPath('*/*/new');
    }
}
