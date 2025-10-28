<?php

declare(strict_types=1);

namespace Tests\Contracts;

interface VehicleCompactContract
{
    public function getNamaMobil(): string;
    public function getImageUrl(): string;
    public function getTipeMobil(): string;
    public function getActionUrl(): string;
}
