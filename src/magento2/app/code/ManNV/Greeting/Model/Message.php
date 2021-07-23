<?php

namespace ManNV\Greeting\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Message extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'mannv_greeting';

    protected $_cacheTag = 'mannv_greeting';

    protected $_eventPrefix = 'mannv_greeting';

    public function _construct()
    {
        $this->_init(\ManNV\Greeting\Model\ResourceModel\Message::class);
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
