<?php

namespace ManNV\Greeting\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            [
                'message' => 'TP HCM nâng mô hình điều trị Covid-19 lên 5 tầng',
                'url_key' => 'tp-hcm-nang-mo-hinh-dieu-tri-covid-19-len-5-tang',
            ],
            [
                'message' => 'Thêm 64 người Hà Nội, 4 Nghệ An nghi Covid-19',
                'url_key' => 'them-64-nguoi-ha-noi-4-nghe-an-nghi-covid-19',
            ],
            [
                'message' => '23 năm tù cho cựu tổng giám đốc phá sản đi cướp ngân hàng',
                'url_key' => '23-nam-tu-cho-cuu-tong-giam-doc-pha-san-di-cuop-ngan-hang',
            ]
        ];

        foreach ($data as $item) {
            $setup->getConnection()->insertForce($setup->getTable('mannv_greeting'), $item);
        }
    }

}
