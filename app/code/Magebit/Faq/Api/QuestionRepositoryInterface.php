<?php

namespace Magebit\Faq\Api;

interface QuestionRepositoryInterface
{
    /**
     * Get
     * @param Data\QuestionInterface $question
     * @return mixed
     */
    public function getById(Data\QuestionInterface $question);

    /**
     * Save
     *
     * @param Data\QuestionInterface $question
     * @return mixed
     */
    public function save(Data\QuestionInterface $question);

    /**
     * get List
     * @return \Magebit\Faq\Api\Data\QuestionInterface[]
     */
    public function getList();

    /**
     * Delete
     *
     * @param Data\QuestionInterface $question
     * @return mixed
     */
    public function delete(Data\QuestionInterface $question);

    /**
     * delete by ID
     * @param $blockId
     * @return mixed
     */
    public function deleteById($questionId);
}
