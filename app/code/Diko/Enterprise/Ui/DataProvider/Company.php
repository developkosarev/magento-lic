<?php
declare(strict_types=1);

namespace Diko\Enterprise\Ui\DataProvider;

use Diko\Enterprise\Model\ResourceModel\Company\Collection;
use Diko\Enterprise\Model\ResourceModel\Company\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class Company extends AbstractDataProvider
{
    /** @var Collection $collection */
    protected $collection;

    /** @var array */
    private array $loadedData;

    /**
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();

        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        if (!isset($this->loadedData)) {
            $this->loadedData = [];

            foreach ($this->collection->getItems() as $item) {
                $this->loadedData[$item->getData('id')] = $item->getData();
            }
        }

        //echo "<pre>";
        //print_r($this->loadedData);
        //die("dead");

        return $this->loadedData;
    }
}
