<?php

namespace Andrew\QuickOrder\Block\Product;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;

class View extends Template
{
    protected $productRepository;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getProductSku()
    {
        $product = $this->productRepository->getById($this->getRequest()->getParam('id'));
        return $product->getSku();
    }
}
