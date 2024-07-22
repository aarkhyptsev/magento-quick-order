<?php

namespace Andrew\QuickOrder\Model;

use Magento\Framework\Model\AbstractModel;

class Order extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Andrew\QuickOrder\Model\ResourceModel\Order::class);
    }
}
