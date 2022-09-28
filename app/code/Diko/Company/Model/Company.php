<?php
declare(strict_types=1);

namespace Diko\Company\Model;

use Magento\Framework\Model\AbstractModel;

class Company extends AbstractModel
{
    protected function _construct(): void
    {
        $this->_init(ResourceModel\Company::class);
    }
}
