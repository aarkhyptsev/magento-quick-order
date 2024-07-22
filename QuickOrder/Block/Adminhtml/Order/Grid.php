<?php

namespace Andrew\QuickOrder\Block\Adminhtml\Order;

use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data as BackendHelper;
use Andrew\QuickOrder\Model\ResourceModel\Order\CollectionFactory;

class Grid extends Extended
{
    protected $collectionFactory;

    public function __construct(
        Context $context,
        BackendHelper $backendHelper,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('quick_order_grid'); // Уникальный идентификатор грида
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = $this->collectionFactory->create();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', [
            'header' => __('ID'),
            'type' => 'number',
            'index' => 'entity_id',
        ]);

        $this->addColumn('sku', [
            'header' => __('SKU'),
            'type' => 'text',
            'index' => 'sku',
        ]);

        $this->addColumn('phone_number', [
            'header' => __('Phone Number'),
            'type' => 'text',
            'index' => 'phone_number',
        ]);

        $this->addColumn('created_at', [
            'header' => __('Created At'),
            'type' => 'datetime',
            'index' => 'created_at',
        ]);

        return parent::_prepareColumns();
    }
}
