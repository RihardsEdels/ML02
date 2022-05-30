<?php

namespace Magebit\Grid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /** @var PageFactory */
    private $pageFactory;

    public function __construct(
        Context $context,
        PageFactory $rawFactory
    ) {
        $this->pageFactory = $rawFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Magebit_Grid::home');
        $resultPage->getConfig()->getTitle()->prepend(__('Grid UI Example'));

        return $resultPage;
    }
}
