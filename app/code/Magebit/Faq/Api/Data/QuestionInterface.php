<?php

namespace Magebit\Faq\Api\Data;

/**
 * Interface QuestionInterface
 * @package Magebit\Faq\Api\Data
 */
interface QuestionInterface
{
    /**
     *  Constants for keys of data array.
     */
    const QUESTION_ID = 'id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATE_TIME = 'updated_at';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Question
     *
     * @return string
     */
    public function getQuestion();

    /**
     * Get Answer
     *
     * @return string
     */

    public function getAnswer();

    /**
     * Get Status
     *
     * @return int|null
     */
    public function getStatus();

    /**
     * Get Position
     *
     * @return string
     */
    public function getPosition();

    /**
     * Get Updated At
     *
     * @return string|null
     */
    public function getUpdateTime();

    /*     Setters   */

    /**
     * Set Question
     *
     * @param $question
     * @return QuestionInterface
     */
    public function setQuestion($question);

    /**
     *  Set Answer
     *
     * @param $answer
     * @return QuestionInterface
     */
    public function setAnswer($answer);

    /**
     *  Set Status
     *
     * @param $status
     * @return QuestionInterface
     */
    public function setStatus($status);

    /**
     * Set Position
     *
     * @param $position
     * @return QuestionInterface
     */
    public function setPosition($position);
}
