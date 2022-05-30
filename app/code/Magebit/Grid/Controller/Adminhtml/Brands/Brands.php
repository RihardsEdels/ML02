<?php

namespace Magebit\Grid\Controller\Adminhtml\Brands;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Brands extends \Magento\Backend\App\Action
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
        $resultPage->setActiveMenu('Magebit_Grid::Brands');
        $resultPage->getConfig()->getTitle()->prepend(__('Brand manager'));

        return $resultPage;
    }
}
