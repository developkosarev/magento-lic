<?php

namespace Diko\OrderAttributes\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class OrderAttributes extends AbstractDb
{
    const MAIN_TABLE = 'diko_order_attributes';
    const ID_FIELD_NAME = 'entity_id';

    /**
     * @var string
     */
    protected $_eventPrefix = 'order_attributes_resource_model';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
