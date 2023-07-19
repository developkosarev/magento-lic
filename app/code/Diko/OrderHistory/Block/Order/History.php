<?php

namespace Diko\OrderHistory\Block\Order;

use \Magento\Sales\Block\Order\History as BaseHistory;

/**
 * Sales order history block
 *
 * @api
 * @since 100.0.2
 */
class History extends BaseHistory
{
    /** @var string */
    protected $_template = 'Diko_OrderHistory::order/history.phtml';
}
