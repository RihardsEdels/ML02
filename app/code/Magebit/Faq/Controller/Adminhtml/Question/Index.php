<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Framework\View\Result\Page;

class Index extends \Magento\Backend\App\Action

{
    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute():Page
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magento_Backend::content');
        $resultPage->getConfig()->getTitle()->prepend(__('Frequently Asked Questions'));
        return $resultPage;
    }
}
