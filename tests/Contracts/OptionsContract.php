<?php

declare(strict_types=1);

namespace Tests\Contracts;

/**
 * Interface OptionsContract
 *
 * Defines the contract for an object that has configurable options.
 */
interface OptionsContract
{
    /**
     * Gets the options.
     *
     * @return array An array of options.
     */
    public function getOptions(): array;
}
