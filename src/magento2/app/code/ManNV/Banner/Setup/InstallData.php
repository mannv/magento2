<?php

namespace ManNV\Banner\Setup;

use Faker\Factory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $tableName = 'mannv_banner';
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name' => $faker->jobTitle,
                'description' => $faker->text(),
                'url' => $faker->url,
                'image' => 'https://cf.shopee.vn/file/0d162e8c5a8f6fd5dbbc3152b081985f_xhdpi'
            ];
        }
        foreach ($data as $item) {
            $setup->getConnection()->insertForce($setup->getTable($tableName), $item);
        }
    }

}
