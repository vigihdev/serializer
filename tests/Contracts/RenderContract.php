<?php

declare(strict_types=1);

namespace Tests\Contracts;

/**
 * Interface RenderContract
 *
 * Defines the contract for an object that can be rendered as a string.
 */
interface RenderContract
{
    /**
     * Renders the object to a string.
     *
     * @return string The rendered output.
     */
    public function render(): string;
}
