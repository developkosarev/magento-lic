<?php
declare(strict_types=1);

namespace Diko\OrderAttributes\ViewModel;

use Diko\OrderAttributes\Api\OrderAttributesRepositoryInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class OrderAttributes implements ArgumentInterface
{
    private OrderAttributesRepositoryInterface $repository;

    private RequestInterface $request;

    public function __construct(OrderAttributesRepositoryInterface $repository, RequestInterface $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }

    public function getComment(): ?string
    {
        $orderId = (int) $this->request->getParam('order_id');
        $orderAttribute = $this->repository->getByOrderId($orderId);

        return $orderAttribute->getComment();
    }
}
