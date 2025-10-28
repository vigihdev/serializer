<?php

declare(strict_types=1);

namespace Tests\Contracts;

interface VehicleNotAvailableHargaContract
{
    public function getHarga(): string;
    public function getPaketSewa(): string;
}
