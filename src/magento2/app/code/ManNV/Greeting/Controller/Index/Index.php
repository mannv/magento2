<?php

namespace ManNV\Greeting\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

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

    public function __construct(Context $context, PageFactory $pageFactory, \ManNV\Greeting\Model\MessageFactory $messageFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->messageFactory = $messageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
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
