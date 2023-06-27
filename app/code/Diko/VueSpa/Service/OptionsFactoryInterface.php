<?php
declare(strict_types=1);

namespace Diko\VueSpa\Service;

interface OptionsFactoryInterface
{
    public function create(int $websiteId): OptionsInterface;
}
