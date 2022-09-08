<?php
declare(strict_types=1);

namespace Diko\OrderAttributes\Api;

use Diko\OrderAttributes\Api\Data\OrderAttributesInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Order attributes CRUD Interface
 */
interface OrderAttributesRepositoryInterface
{
    /**
     * @param int $orderId
     * @return OrderAttributesInterface
     * @throws LocalizedException
     */
    public function getByOrderId(int $orderId): OrderAttributesInterface;

    public function save(OrderAttributesInterface $orderAttributes): OrderAttributesInterface;
}
