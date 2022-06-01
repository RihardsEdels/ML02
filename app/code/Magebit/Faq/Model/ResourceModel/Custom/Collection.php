<?php
 
namespace Magebit\Faq\Model\ResourceModel\Custom;
 
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
class Collection extends AbstractCollection
 
{
 
    protected function _construct()
 
    {
 
        $this->_init('Magebit\Faq\Model\Custom','Magebit\Faq\Model\ResourceModel\Custom');
 
    }
 
}