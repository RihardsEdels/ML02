<?php
namespace Magebit\Grid\Ui\DataProvider\Category\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{

      protected function _initSelect()
      {
          $this->addFilterToMap('entity_id', 'main_table.entity_id');
          $this->addFilterToMap('name', 'learninggridname.value');
          parent::_initSelect();
      }
}
