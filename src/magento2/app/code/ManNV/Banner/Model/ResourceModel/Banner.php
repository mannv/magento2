<?php

namespace ManNV\Banner\Model\ResourceModel;

use Magento\Framework\App\ObjectManager;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('mannv_banner', 'id');
    }

    protected function _afterSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $image = $object->getData('image');
        if (!empty($image)) {
            $imageUploader = ObjectManager::getInstance()->get('ManNV\Banner\BannerImageUpload');
            $imageUploader->moveFileFromTmp($image);
        }
        return $this;
    }
}
