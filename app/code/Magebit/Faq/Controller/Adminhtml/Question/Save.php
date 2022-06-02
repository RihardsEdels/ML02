<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

class Save extends \Magento\Backend\App\Action

{

    protected $customFactory;

    protected $adapterFactory;

    protected $uploader;

    public function __construct(

        \Magento\Backend\App\Action\Context $context,

        \Magebit\Faq\Model\QuestionFactory $customFactory

    ) {

        parent::__construct($context);

        $this->customFactory = $customFactory;
    }

    public function execute()

    {

        $data = $this->getRequest()->getPostValue();

       

        try {

            $model = $this->customFactory->create();

            $model->addData([

                "question" => $data['question'],

                "answer" => $data['answer'],

                "status" => $data['status'],

            ]);

            $saveData = $model->save();

            if ($saveData) {

                $this->messageManager->addSuccess(__('FAQ added successfully !'));
            }
        } catch (\Exception $e) {

            $this->messageManager->addError(__($e->getMessage()));
        }

        $this->_redirect('*/*/index');
    }
}
