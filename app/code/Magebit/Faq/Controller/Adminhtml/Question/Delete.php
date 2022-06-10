<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\Model\View\Result\Redirect;
use Magebit\Faq\Model\QuestionRepository;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;

/**
 * Delete question action.
 */
class Delete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    private $questionRepository;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        QuestionRepository $questionRepository
    ) {
        parent::__construct($context);
        $this->questionRepository = $questionRepository;
    }
    
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magebit_Faq::question';
    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute():Redirect
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            $title = "";
            try {
                $this->questionRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('The question has been deleted.'));

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }

        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a question to delete.'));

        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
