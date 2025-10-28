<?php

declare(strict_types=1);

namespace Serializer\Exception;

class TransformerException extends \RuntimeException
{

    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function fileNotFound(string $filepath): static
    {
        return new static("JSON file not found: {$filepath}");
    }

    public static function fileReadError(string $filepath): static
    {
        return new static("Cannot read file: {$filepath}");
    }

    public static function invalidJson(string $details): static
    {
        return new static("Invalid JSON format: {$details}");
    }

    public static function deserializationFailed(string $dtoClass, string $error): static
    {
        return new static("Failed to deserialize to {$dtoClass}: {$error}");
    }

    public static function classNotFound(string $className): static
    {
        return new static("Class not found: {$className}");
    }
}
