<?php

namespace ManNV\Banner\Controller\Adminhtml\Traits;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Driver\File;

trait RemoveImage
{
    private function removeImage($imageName)
    {
        $filesystem = ObjectManager::getInstance()->get(Filesystem::class);
        $file = ObjectManager::getInstance()->get(File::class);
        $mediaRootDir = $filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath();
        $bannerBasePath = ObjectManager::getInstance()->get('ManNV\Banner\BannerImageUpload')->getBasePath();
        $fullPath = $mediaRootDir . $bannerBasePath . '/' . $imageName;
        if ($file->isExists($fullPath)) {
            $file->deleteFile($fullPath);
        }
    }
}
