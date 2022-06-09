<?php

declare(strict_types=1);

namespace Magebit\Faq\Model\Question\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class IsActive
 */
class Status implements OptionSourceInterface
{
    /**
     * @var \Magebit\Faq\Model\Question
     */
    protected $faqQuestion;

    /**
     * Constructor
     *
     * @param \Magebit\Faq\Model\Question $faqQuestion
     */
    public function __construct(\Magebit\Faq\Model\Question $faqQuestion)
    {
        $this->faqQuestion = $faqQuestion;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->faqQuestion->getStatus();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
