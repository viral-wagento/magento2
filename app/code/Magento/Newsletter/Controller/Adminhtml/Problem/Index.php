<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Newsletter\Controller\Adminhtml\Problem;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;

class Index extends \Magento\Newsletter\Controller\Adminhtml\Problem implements HttpGetActionInterface,HttpPostActionInterface
{
    /**
     * Newsletter problems report page
     *
     * @return void
     */
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        $this->_view->loadLayout();
        $this->_view->getLayout()->getMessagesBlock()->setMessages($this->messageManager->getMessages(true));

        $this->_setActiveMenu('Magento_Newsletter::newsletter_problem');
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Newsletter Problems Report'));
        $this->_addBreadcrumb(__('Newsletter Problem Reports'), __('Newsletter Problem Reports'));

        $this->_view->renderLayout();
    }
}
