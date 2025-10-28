<?php

declare(strict_types=1);

namespace Serializer\Exception;

class ValidationException extends \DomainException
{
    public static function invalidData(string $field, string $reason): static
    {
        return new static("Invalid data for field '{$field}': {$reason}");
    }

    public static function missingRequiredField(string $field): static
    {
        return new static("Missing required field: {$field}");
    }
}
