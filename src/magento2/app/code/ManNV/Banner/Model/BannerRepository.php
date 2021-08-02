<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace ManNV\Banner\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use ManNV\Banner\Api\BannerRepositoryInterface;
use ManNV\Banner\Api\Data\BannerInterface;
use ManNV\Banner\Controller\Adminhtml\Traits\RemoveImage;


class BannerRepository implements BannerRepositoryInterface
{
    use RemoveImage;

    /**
     * @var BannerFactory
     */
    private $bannerFactory;

    /**
     * @var ResourceModel\Banner
     */
    private $resource;

    public function __construct(BannerFactory $bannerFactory, \ManNV\Banner\Model\ResourceModel\Banner $resource)
    {
        $this->bannerFactory = $bannerFactory;
        $this->resource = $resource;
    }

    public function save(BannerInterface $model)
    {
        $this->resource->save($model);
        return $model;
    }

    public function getById(int $id)
    {
        $banner = $this->bannerFactory->create();
        $banner->load($id);
        if (!$banner->getId()) {
            throw new NoSuchEntityException(__('The banner with the "%1" ID doesn\'t exist.', $id));
        }
        return $banner;
    }

    public function delete(BannerInterface $model)
    {
        try {
            $this->resource->delete($model);
            $this->removeImage($model->getImage());
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the banner: %1', $exception->getMessage())
            );
        }
        return true;
    }

    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }
}
