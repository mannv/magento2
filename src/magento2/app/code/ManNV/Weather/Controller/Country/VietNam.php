<?php

namespace ManNV\Weather\Controller\Country;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class VietNam extends Action
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        echo __FILE__;die;
    }

}
