<?php
declare(strict_types=1);

namespace Diko\OrderAttributes\Model;

use Diko\OrderAttributes\Api\Data\OrderAttributesInterface;
use Diko\OrderAttributes\Api\OrderAttributesRepositoryInterface;
use Diko\OrderAttributes\Model\ResourceModel\OrderAttributes as OrderAttributesResourceModel;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class OrderAttributesRepository implements OrderAttributesRepositoryInterface
{
    /**
     * @var OrderAttributesInterface[]
     */
    protected $orderAttributesByOrderId = [];

    /**
     * @var OrderAttributesResourceModel $orderAttributesResourceModel
     */
    private OrderAttributesResourceModel $orderAttributesResourceModel;

    /**
     * @var OrderAttributesFactory
     */
    private OrderAttributesFactory $orderAttributesFactory;

    public function __construct(
        OrderAttributesResourceModel $orderAttributesResourceModel,
        OrderAttributesFactory $orderAttributesFactory
    ) {
        $this->orderAttributesResourceModel = $orderAttributesResourceModel;
        $this->orderAttributesFactory = $orderAttributesFactory;
    }

    public function getByOrderId(int $orderId): OrderAttributesInterface
    {
        if (!isset($this->orderAttributesByOrderId[$orderId])) {
            $orderAttributes = $this->orderAttributesFactory->create();
            $this->orderAttributesResourceModel->load($orderAttributes, $orderId, OrderAttributesInterface::ORDER_ID);

            $this->orderAttributesByOrderId[$orderId] = $orderAttributes;
        }

        return $this->orderAttributesByOrderId[$orderId];
    }

    /**
     * @throws CouldNotSaveException
     */
    public function save(OrderAttributesInterface $orderAttributes): OrderAttributesInterface
    {
        try {
            $this->orderAttributesResourceModel->save($orderAttributes);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $orderAttributes;
    }
}
