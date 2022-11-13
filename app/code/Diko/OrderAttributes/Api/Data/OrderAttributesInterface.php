<?php

declare(strict_types=1);

namespace Diko\OrderAttributes\Api\Data;

/**
 * Order attributes interface
 * @api
 * @since 1.0.0
 */
interface OrderAttributesInterface
{
    const ID = 'entity_id';
    const ORDER_ID = 'order_id';
    const COMMENT = 'comment';

    /**
     * Get order id
     * @return string
     */
    public function getOrderId();

    /**
     * @param string $value
     * @return $this
     */
    public function setOrderId($value);

    /**
     * Get comment
     * @return string
     */
    public function getComment();

    /**
     * @param string $value
     * @return $this
     */
    public function setComment($value);
}
