<?php

declare(strict_types=1);

namespace Tests\Contracts;

interface ArrayableContract
{
    public function toArray(): array;
}
