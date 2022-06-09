<?php

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magento\Framework\Model\AbstractModel;

class Question extends AbstractModel implements QuestionInterface
{
    /**
     * Question status
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * Construct
     */
    protected function _construct()
    {
        $this->_init(\Magebit\Faq\Model\ResourceModel\Question::class);
    }

    /* Getters */

    /**
     * retrieve block id
     *
     * @return array|int|mixed|null
     */
    public function getId()
    {
        return $this->getData(self::QUESTION_ID);
    }

    /**
     * Retrieve Question
     *
     * @return array|mixed|string|null
     */
    public function getQuestion(): string
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * Retrieve Answer
     *
     * @return array|mixed|string|null
     */
    public function getAnswer(): string
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Retrieve status
     *
     * @return array|int|mixed|null
     */
    public function getStatus(): array
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     *  Retrieve Position
     *
     * @return array|mixed|string|null
     */
    public function getPosition(): string
    {
        return $this->getData(self::POSITION);
    }

    /**
     * Retrieve Update Time
     *
     * @return array|mixed|string|null
     */
    public function getUpdateTime(): string
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /* Setters */

    /**
     * Set Question
     *
     * @param $question
     * @return QuestionInterface|void
     */
    public function setQuestion($question): void
    {
        $this->setData(self::QUESTION, $question);
    }

    /**
     * Set Answer
     *
     * @param $answer
     * @return QuestionInterface|void
     */
    public function setAnswer($answer)
    {
        $this->setData(self::ANSWER, $answer);
    }

    /**
     * Set status
     * @param $status
     * @return QuestionInterface|void
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Set Position
     * @param $position
     * @return QuestionInterface|void
     */
    public function setPosition($position)
    {
        return $this->setData(self::POSITION, $position);
    }
}
