<?php
declare(strict_types=1);

namespace Diko\Company\Model\ResourceModel\Company;

use Diko\Company\Model\Company;
use Diko\Company\Model\ResourceModel\Company as CompanyResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Company::class, CompanyResourceModel::class);
    }
}
