<?php

namespace ManNV\Greeting\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH = 'mannv_setting_greeting/';

    private function getConfig($field)
    {
        $path = self::XML_PATH . 'greeting_general/' . $field;
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, null);
    }

    public function getEnableStatus()
    {
        return $this->getConfig('enable');
    }

    public function getDefaultMessage()
    {
        return $this->getConfig('default_text');
    }
}
