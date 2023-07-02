<?php

declare(strict_types=1);

namespace Diko\DeviceSync\Controller\Push;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\CacheInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Diko\DeviceSync\Model\Cache\Type\CustomerData;

class Index implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;

    private CacheInterface $cache;

    private SerializerInterface $serializer;

    public function __construct(
        ResultFactory $resultFactory,
        CacheInterface $cache,
        SerializerInterface $serializer
    ) {
        $this->resultFactory = $resultFactory;
        $this->cache = $cache;
        $this->serializer = $serializer;
    }

    public function execute(): Json
    {
        //$cacheKey = self::ATTRIBUTE_METADATA_CACHE_PREFIX . $entityType . $suffix . $storeId;
        $cacheKey  = CustomerData::TYPE_IDENTIFIER;
        $cacheTag  = CustomerData::CACHE_TAG;

        $cacheKey1  = CustomerData::TYPE_IDENTIFIER . 'DEMO_CUSTOMER_1';
        $cacheKey2  = CustomerData::TYPE_IDENTIFIER . 'DEMO_CUSTOMER_2';

        $result = $this->cache->load($cacheKey);
        $result1 = $this->cache->load($cacheKey1);
        $result2 = $this->cache->load($cacheKey2);

        if ($result) {
            $cacheData = $this->serializer->unserialize($result);

            /** @var Json $jsonResult */
            $jsonResult = $this->resultFactory->create(ResultFactory::TYPE_JSON);
            $jsonResult->setData($cacheData);

            return $jsonResult;
        }

        $dateTime = new \DateTimeImmutable();
        $cacheData = [
            'message' => 'Cache',
            'time' => $dateTime->format('Y-m-d H:i:s')
        ];

        $storeData = $this->cache->save(
            $this->serializer->serialize($cacheData),
            $cacheKey,
            [$cacheTag],
            60 //86400
        );


        $storeData1 = $this->cache->save(
            $this->serializer->serialize($cacheData),
            $cacheKey1,
            [$cacheTag],
            120 //86400
        );

        $storeData2 = $this->cache->save(
            $this->serializer->serialize($cacheData),
            $cacheKey2,
            [$cacheTag],
            60 //86400
        );

        /** @var Json $jsonResult */
        $jsonResult = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $jsonResult->setData($cacheData);

        return $jsonResult;
    }
}
