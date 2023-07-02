<?php
declare(strict_types=1);

namespace Diko\VueSpa\Service;

interface OptionsInterface
{
    public function getWebsiteId(): int;

    public function getOptions(): iterable;
}
