<?php
declare(strict_types=1);

namespace Diko\VueSpa\Service;

class OptionsFactory implements OptionsFactoryInterface
{
    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @throws \Exception
     */
    public function create(int $websiteId): OptionsInterface
    {
        switch ($websiteId) {
            case 1:
                $options = $this->options['vue'];
                break;
            case 2:
                $options = $this->options['react'];
                break;
            default:
                throw new \Exception('Spa options not found for websiteId: ' . $websiteId);
        }
        return $options;
    }
}
