<?php
 
namespace Magebit\Form\Model\ResourceModel\Custom;
 
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
class Collection extends AbstractCollection
 
{
 
    protected function _construct()
 
    {
 
        $this->_init('Magebit\Form\Model\Custom','Magebit\Form\Model\ResourceModel\Custom');
 
    }
 
}