<?php
namespace Magebit\SampleModule\Controler\Adminhtml\Index;
use Magento\Framework\Controler\ResultFactory;


class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
        return $this->resultPageFactory->create(REsultFactory::TYPE_PAGE);
    }
}