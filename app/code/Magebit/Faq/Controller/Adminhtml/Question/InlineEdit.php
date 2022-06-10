<?php
namespace Magebit\Faq\Controller\Adminhtml\Question;
 
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magebit\Faq\Model\Question;
use Magento\Framework\Controller\Result\Json;
 
class InlineEdit extends Action
{
    protected $jsonFactory;
    protected $question;
 
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        Question $question
    )
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->question = $question;
    }
 
    public function execute():Json
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];
        if ($this->getRequest()->getParam('isAjax')) {
            $questions = $this->getRequest()->getParam('items', []);
            if (empty($questions)) {
                $messages[] = __('Please correct the input data.');
                $error = true;
            } else {
                foreach (array_keys($questions) as $question) {
                    $questionData = $this->question->load($question);
                    try {
                        $questionData->setData(array_merge($questionData->getData(), $questions[$question]));
                        $questionData->save();
                    } catch (\Exception $e) {
                        $messages[] = "[Error:]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }
 
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
