<?php

namespace Andrew\QuickOrder\Model\ResourceModel\Order;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Andrew\QuickOrder\Model\Order as OrderModel;
use Andrew\QuickOrder\Model\ResourceModel\Order as OrderResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(OrderModel::class, OrderResource::class);
    }
}
