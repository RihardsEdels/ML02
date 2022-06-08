<?php

namespace Magebit\Faq\Api;

interface QuestionManagementInterface
{
    /**
     * Enable Question
     * @param Data\QuestionInterface $question
     * @return mixed
     */
    public function enableQuestion(Data\QuestionInterface $question);

    /**
     * Disable Question
     *
     * @param Data\QuestionInterface $question
     * @return mixed
     */
    public function disableQuestion(Data\QuestionInterface $question);
}
