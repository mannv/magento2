<?php

namespace ManNV\Banner\Api;

use ManNV\Banner\Api\Data\BannerInterface;

interface BannerRepositoryInterface
{
    /**
     * Save banner.
     *
     * @param BannerInterface $model
     * @return BannerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(BannerInterface $model);

    /**
     * Retrieve page.
     *
     * @param int $id
     * @return BannerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById(int $id);

//    /**
//     * Retrieve banner matching the specified criteria.
//     *
//     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
//     * @return \Magento\Cms\Api\Data\PageSearchResultsInterface
//     * @throws \Magento\Framework\Exception\LocalizedException
//     */
//    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete banner.
     *
     * @param BannerInterface $model
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(BannerInterface $model);

    /**
     * Delete banner by ID.
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
