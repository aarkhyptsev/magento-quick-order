<?php

namespace Andrew\QuickOrder\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Andrew\QuickOrder\Model\OrderFactory;

class Save extends Action
{
    protected $resultJsonFactory;
    protected $orderFactory;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        OrderFactory $orderFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->orderFactory = $orderFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $response = ['success' => false];

        try {
            $sku = $this->getRequest()->getParam('sku');
            $phoneNumber = $this->getRequest()->getParam('phone_number');

            if ($sku && $phoneNumber) {
                $order = $this->orderFactory->create();
                $order->setData([
                    'sku' => $sku,
                    'phone_number' => $phoneNumber
                ]);
                $order->save();

                $response['success'] = true;
            }
        } catch (\Exception $e) {
            $response['error'] = $e->getMessage();
        }

        return $result->setData($response);
    }
}
