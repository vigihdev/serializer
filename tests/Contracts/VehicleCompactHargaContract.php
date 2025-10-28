<?php

declare(strict_types=1);

namespace Tests\Contracts;

interface VehicleCompactHargaContract
{
    public function getHarga(): int;
    public function getPaketSewa(): string;
}
