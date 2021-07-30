<?php

namespace ManNV\Banner\Api\Data;

/**
 * Interface BannerInterface
 * @package ManNV\Banner\Api\Data
 */
interface BannerInterface
{
    const BANNER_ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const URL = 'url';
    const IMAGE = 'image';

    public function getId();

    public function getName();

    public function getDescription();

    public function getUrl();

    public function getImage();

    public function setId($id);

    public function setName($name);

    public function setDescription($description);

    public function setUrl($url);

    public function setImage($image);
}
