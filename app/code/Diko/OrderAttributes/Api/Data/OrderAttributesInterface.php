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
     * @return string
     */
    public function getComment();

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment($comment);
}
