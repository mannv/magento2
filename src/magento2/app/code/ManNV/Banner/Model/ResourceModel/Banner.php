<?php

namespace ManNV\Banner\Model\ResourceModel;

use Magento\Framework\App\ObjectManager;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    private $logger;

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('mannv_banner', 'id');
    }

    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        try {
            $image = $object->getData('image');
            if (!empty($image)) {
                $imageUploader = ObjectManager::getInstance()->get('ManNV\Banner\BannerImageUpload');
                $newImgRelativePath = $imageUploader->moveFileFromTmp($image, true);
                $arr = explode('/', $newImgRelativePath);
                $object->setData('image', array_pop($arr));
            }
        } catch (\Exception $e) {
            $this->logger->critical($e);
        }
        return parent::_beforeSave($object);
    }
}
