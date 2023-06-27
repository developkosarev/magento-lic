<?php
declare(strict_types=1);

namespace Diko\VueSpa\Service;

class OptionsReact implements OptionsInterface
{
    public function getOptions(): iterable
    {
        yield ['code' => 'react17', 'name' => 'react17'];
        yield ['code' => 'react18', 'name' => 'react18'];
    }
}
