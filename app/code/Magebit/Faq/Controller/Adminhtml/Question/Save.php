<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

class Save extends \Magento\Backend\App\Action

{
    protected $questionFactory;
    protected $adapterFactory;
    protected $uploader;

    public function __construct(

        \Magento\Backend\App\Action\Context $context,
        \Magebit\Faq\Model\QuestionFactory $questionFactory

    ) {

        parent::__construct($context);

        $this->questionFactory = $questionFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        try {

            if (isset($data['id'])) {
                $model = $this->questionFactory->create()->load($data['id']);
            } else {
                $model = $this->questionFactory->create();
            }

            $model->addData([
                "question" => $data['question'],
                "answer" => $data['answer'],
                "status" => $data['status']
            ]);

            $saveData = $model->save();
            if ($saveData) {
                $this->messageManager->addSuccess(__('FAQ added successfully !'));
            }

        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }

        if ($this->getRequest()->getParam('back') == 'close') {
            $this->_redirect('*/*/index');
        } else {
            $this->_redirect('*/*/edit', ['id' => $model->getId()]);
        }
    }
}
