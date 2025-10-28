<?php

declare(strict_types=1);

namespace Tests\DTOs;

use Tests\Contracts\VehicleCompactContract;

final class VehicleCompactDto extends BaseDto implements VehicleCompactContract
{

    public function __construct(
        private readonly string $namaMobil,
        private readonly string $imageUrl,
        private readonly string $tipeMobil,
        private readonly string $actionUrl
    ) {}

    public function getNamaMobil(): string
    {
        return $this->namaMobil;
    }

    public function getImageUrl(): string
    {

        return $this->imageUrl;
    }

    public function getTipeMobil(): string
    {
        return $this->tipeMobil;
    }

    public function getActionUrl(): string
    {
        return $this->actionUrl;
    }
}
