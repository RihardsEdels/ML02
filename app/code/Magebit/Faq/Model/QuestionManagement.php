<?php

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data;
use Magebit\Faq\Api\QuestionManagementInterface;

class QuestionManagement extends Question implements QuestionManagementInterface
{

    protected function _construct()
    {
        $this->_init(\Magebit\Faq\Model\ResourceModel\Question::class);
    }


    public function enableQuestion(Data\QuestionInterface $question)
    {
        return $question->setStatus(true);
    }

    public function disableQuestion(Data\QuestionInterface $question)
    {
        return $question->setStatus(false);
    }
}
