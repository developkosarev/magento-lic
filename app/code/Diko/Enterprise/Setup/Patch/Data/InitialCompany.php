<?php
declare(strict_types=1);

namespace Diko\Enterprise\Setup\Patch\Data;

use Diko\Enterprise\Model\ResourceModel\Company;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InitialCompany implements DataPatchInterface
{
    /** @var ModuleDataSetupInterface */
    private $moduleDataSetup;

    /** @var ResourceConnection */
    private $resource;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup, ResourceConnection $resource)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->resource = $resource;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply(): self
    {
        $connection = $this->resource->getConnection();
        $data = [
            [
                'title' => 'Default company',
                'prefix' => '01',
                'phone' => '+1234567890',
                'address' => 'San Francisco'
            ]
        ];
        $connection->insertMultiple(Company::MAIN_TABLE, $data);

        return $this;
    }
}
