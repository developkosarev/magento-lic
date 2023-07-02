<?php
declare(strict_types=1);

namespace Diko\VueSpa\Service;

class OptionsVue implements OptionsInterface
{
    public function getWebsiteId(): int
    {
        return 1;
    }

    public function getOptions(): iterable
    {
        yield ['code' => 'vue2', 'name' => 'vue2'];
        yield ['code' => 'vue3', 'name' => 'vue3'];
    }
}
