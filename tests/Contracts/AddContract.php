<?php

declare(strict_types=1);

namespace Tests\Contracts;

/**
 * Interface AddContract
 *
 * Defines the contract for adding single or multiple items.
 */
interface AddContract
{
    /**
     * Adds a single item.
     *
     * @return string
     */
    public function addItem(): string;

    /**
     * Adds multiple items.
     *
     * @return string
     */
    public function addItems(): string;
}
