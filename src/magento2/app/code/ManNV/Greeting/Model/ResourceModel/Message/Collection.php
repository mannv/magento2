<?php


namespace ManNV\Greeting\Model\ResourceModel\Message;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'mannv_greeting_collection';
    protected $_eventObject = 'greeting_collection';

    public function _construct()
    {
        $this->_init(\ManNV\Greeting\Model\Message::class, \ManNV\Greeting\Model\ResourceModel\Message::class);
    }
}
