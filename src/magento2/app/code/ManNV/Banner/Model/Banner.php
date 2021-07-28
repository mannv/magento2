<?php

namespace ManNV\Banner\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Banner extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'mannv_banner';

    protected $_cacheTag = 'mannv_banner';

    protected $_eventPrefix = 'mannv_banner';

    public function _construct()
    {
        $this->_init(\ManNV\Banner\Model\ResourceModel\Banner::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        return [];
    }
}
