<?php


namespace ManNV\Banner\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'mannv_banner_collection';
    protected $_eventObject = 'banner_collection';

    public function _construct()
    {
        $this->_init(\ManNV\Banner\Model\Banner::class, \ManNV\Banner\Model\ResourceModel\Banner::class);
    }
}
