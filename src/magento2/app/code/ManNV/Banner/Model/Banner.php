<?php

namespace ManNV\Banner\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use ManNV\Banner\Api\Data\BannerInterface;

class Banner extends AbstractModel implements BannerInterface, IdentityInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'mannv_banner_cache';

    /**
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'mannv_banner';


    public function _construct()
    {
        $this->_init(\ManNV\Banner\Model\ResourceModel\Banner::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData(self::BANNER_ID);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function getUrl()
    {
        return $this->getData(self::URL);
    }

    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    public function setID($id)
    {
        $this->setData(self::BANNER_ID, $id);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    public function setUrl($url)
    {
        $this->setData(self::URL, $url);
    }

    public function setImage($image)
    {
        $this->setData(self::IMAGE, $image);
    }
}
