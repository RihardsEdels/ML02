<?php
namespace Magebit\Grid\Plugin;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Magebit\Grid\Ui\DataProvider\Category\ListingDataProvider as CategoryDataProvider;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\App\ProductMetadataInterface;

class AddAttributesToUiDataProvider
{
   private $productMetadata;
   private $attributeRepository;

   public function __construct(AttributeRepositoryInterface $attributeRepository,
                               ProductMetadataInterface $productMetadata)
   {  
        $this->attributeRepository = $attributeRepository; 
        $this->productMetadata = $productMetadata;
   }

   public function afterGetSearchResult(CategoryDataProvider $subject, SearchResult $result) {
       if ($result->isLoaded()) { 
          return $result; 
       } 
        
       $edition = $this->productMetadata->getEdition();

       $column = 'entity_id';
        
       if($edition == 'Enterprise')
          $column = 'row_id';
        
       $attribute = $this->attributeRepository->get('catalog_category', 'name'); 

       $result->getSelect()->joinLeft(
          ['learninggridname' => $attribute->getBackendTable()],
          "learninggridname.".$column." = main_table.".$column." AND learninggridname.attribute_id = ".$attribute->getAttributeId(),
          ['name' => "learninggridname.value"] 
       );  
      
       $result->getSelect()->where('learninggridname.value LIKE "B%"');

       return $result;
   }
}