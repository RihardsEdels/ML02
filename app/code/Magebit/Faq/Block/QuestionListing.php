<?php

namespace Magebit\Faq\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magebit\Faq\Model\ResourceModel\Question\Collection;

class QuestionListing extends Template
{
    public $collection;

    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection():Collection
    {
        return $this->collection->create()->addFieldToFilter('status', 1);;
    }

    public function sortCollection($collection, $sortBy, $sortOrder):Collection
    {
        return $collection->setOrder($sortBy, $sortOrder);
    }

    public function clickSortHandler($collection)
    {
        if (array_key_exists('ASC', $_POST)) {
            $sortedCollection = $this->sortCollection($collection, 'position', 'ASC');
        }
        if (array_key_exists('DESC', $_POST)) {
            $sortedCollection = $this->sortCollection($collection, 'position', 'DESC');
        } else {
            $sortedCollection = $this->sortCollection($collection, 'position', 'ASC');
        }
        return $sortedCollection;
    }
}
