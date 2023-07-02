<?php
declare(strict_types=1);

namespace Diko\VueSpa\Service;

class OptionsDefault implements OptionsInterface
{
    private int $websiteId;

    private array $options;

    public function __construct(int $websiteId, array $options = [])
    {
        $this->websiteId = $websiteId;
        $this->options = $options;
    }

    public function getWebsiteId(): int
    {
        return $this->websiteId;
    }

    public function getOptions(): iterable
    {
        yield ['code' => 'default', 'name' => 'default'];
    }
}
