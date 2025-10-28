<?php

declare(strict_types=1);

namespace Tests\DTOs;

use Tests\Contracts\VehicleContract;

final class VehicleDto extends BaseDto implements VehicleContract
{

    public function __construct(
        private readonly string $namaMobil,
        private readonly string $imageUrl,
        private readonly int $harga,
        private readonly string $paketSewa,
        private readonly string $tipeMobil,
        private readonly string $actionUrl
    ) {
        // Validasi basic
        if ($harga < 0) {
            throw new \InvalidArgumentException('Harga tidak boleh negatif');
        }

        if (empty($namaMobil) || empty($paketSewa)) {
            throw new \InvalidArgumentException('Nama dan paket sewa wajib diisi');
        }
    }

    public function getNamaMobil(): string
    {
        return $this->namaMobil;
    }

    public function getImageUrl(): string
    {

        return $this->imageUrl;
    }

    public function getHarga(): int
    {
        return $this->harga;
    }

    public function getPaketSewa(): string
    {
        return $this->paketSewa;
    }

    public function getTipeMobil(): string
    {
        return $this->tipeMobil;
    }

    public function getActionUrl(): string
    {
        return $this->actionUrl;
    }

    public function getHargaFormatted(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}
