<?php
 
namespace Magebit\Faq\Model;
 
use Magento\Framework\Model\AbstractModel;
 
class Question extends AbstractModel  {
 
const CACHE_TAG = 'id';
 
    protected function _construct()
 
{
 
        $this->_init('Magebit\Faq\Model\ResourceModel\Question');
 
  }
 
public function getIdentities()
 
    {
 
        return [self::CACHE_TAG . '_' . $this->getId()];
 
    }
 
}