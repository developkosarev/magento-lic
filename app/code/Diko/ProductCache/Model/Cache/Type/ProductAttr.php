<?php
declare(strict_types=1);

namespace Diko\ProductCache\Model\Cache\Type;

use Magento\Framework\App\Cache\Type\FrontendPool;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;

class ProductAttr extends TagScope
{
    public const TYPE_IDENTIFIER = 'diko_product_attr';

    public const CACHE_TAG = 'DIKO_PRODUCT_ATTR';

    public function __construct(FrontendPool $cacheFrontendPool)
    {
        parent::__construct(
            $cacheFrontendPool->get(self::TYPE_IDENTIFIER),
            self::CACHE_TAG
        );
    }
}
