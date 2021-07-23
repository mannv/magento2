<?php

namespace ManNV\Greeting\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use ManNV\Greeting\Helper\Data;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var \ManNV\Greeting\Model\MessageFactory
     */
    private $messageFactory;

    private $helper;

    public function __construct(Context $context, PageFactory $pageFactory,
                                \ManNV\Greeting\Model\MessageFactory $messageFactory,
                                Data $helper
    )
    {
        $this->pageFactory = $pageFactory;
        $this->messageFactory = $messageFactory;
        $this->helper = $helper;
        parent::__construct($context);
    }

    public function execute()
    {
        echo 'getEnableStatus: ' . $this->helper->getEnableStatus() . '<br />';
        echo 'getDefaultMessage: ' . $this->helper->getDefaultMessage() . '<br />';
        $message = $this->messageFactory->create();
        $collection = $message->getCollection();
        foreach ($collection as $item) {
            $record = $item->getData();

            echo "<pre>";
            print_r($record);
            echo "</pre>";
        }
//        var_dump($collection);
//        echo '<pre>';
//        print_r($collection, true);
//        echo '</pre>';
        exit;
//        return $this->pageFactory->create();
    }

}
