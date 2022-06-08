<?php

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Api\Data;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\EntityManager\HydratorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magebit\Faq\Model\ResourceModel\Question as ResourceQuestion;


class QuestionRepository implements QuestionRepositoryInterface
{
    private $resource;

    private $collectionFactory;

    private $questionFactory;

    private $hydrator;


    public function __construct(
        ResourceQuestion $resource,
        CollectionFactory $collectionFactory,
        QuestionFactory $questionFactory,
        ?HydratorInterface $hydrator = null
    ) {
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
        $this->questionFactory = $questionFactory;
        $this->hydrator = $hydrator ?? ObjectManager::getInstance()->get(HydratorInterface::class);
    }

    public function getById($questionId)
    {
        $question = $this->questionFactory->create();
        $this->resource->load($question, $questionId);
        if (!$question->getId()) {
            throw new NoSuchEntityException(__('The Question with the "%1" ID doesn\'t exist.', $questionId));
        }
        return $question;
    }

    public function delete(Data\QuestionInterface $question)
    {
        try {
            $this->resource->delete($question);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }


    public function save(Data\QuestionInterface $question)
    {
        try {
            $this->resource->save($question);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $question;
    }

    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }

    public function deleteById($questionID)
    {
        return $this->delete($this->getById($questionID));
    }
}
