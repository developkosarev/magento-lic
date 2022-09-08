<?php

namespace Diko\OrderAttributes\Model\ResourceModel\OrderAttributes;

use Diko\OrderAttributes\Model\OrderAttributes;
use Diko\OrderAttributes\Model\ResourceModel\OrderAttributes as OrderAttributesResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'order_attributes_collection';

    protected function _construct()
    {
        $this->_init(OrderAttributes::class, OrderAttributesResourceModel::class);
    }
}
