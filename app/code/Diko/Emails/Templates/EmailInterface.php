<?php
declare(strict_types=1);

namespace Diko\Emails\Templates;

interface EmailInterface
{
    public function getTemplateIdentifier(): string;

    public function getSenderEmail(): string;

    public function getStoreId(): int;

    public function getEmail(): string;

    public function getTemplateVars(): array;
}
