<?php

namespace Andrew\QuickOrder\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Order extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_order'; // Имя контроллера
        $this->_blockGroup = 'Andrew_QuickOrder';
        $this->_headerText = __('Quick Orders');
        parent::_construct();
        $this->buttonList->remove('add'); // Удаление кнопки добавления, если она не нужна
    }
}
