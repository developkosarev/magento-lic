<?php

declare(strict_types=1);

namespace Diko\OrderAttributes\Model;

use Diko\OrderAttributes\Api\Data\OrderAttributesInterface;
use Magento\Framework\Model\AbstractModel;

class OrderAttributes extends AbstractModel implements OrderAttributesInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'order_attributes_model';

    protected function _construct(): void
    {
        $this->_init(ResourceModel\OrderAttributes::class);
    }

    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    public function setOrderId($value): self
    {
        return $this->setData(self::ORDER_ID, $value);
    }

    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    public function setComment($value): self
    {
        return $this->setData(self::COMMENT, $value);
    }
}
