<?php

declare(strict_types=1);

namespace Tests\Contracts;

/**
 * Interface JsonableContract
 *
 * Defines the contract for objects that can be converted to a JSON string.
 */
interface JsonableContract
{
    /**
     * Converts the object to its JSON representation.
     *
     * @param int $options JSON encoding options.
     * @return string The JSON string.
     */
    public function toJson(int $options = 0): string;
}
