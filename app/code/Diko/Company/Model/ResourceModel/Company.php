<?php
declare(strict_types=1);

namespace Diko\Company\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Company extends AbstractDb
{
    /** @var string */
    const MAIN_TABLE = 'diko_company';

    /** @var string */
    const ID_FIELD_NAME = 'entity_id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
