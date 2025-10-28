<?php

declare(strict_types=1);

namespace Serializer\Exception;

class RendererException extends \RuntimeException
{
    public static function renderFailed(string $rendererClass, string $error): static
    {
        return new static("Renderer {$rendererClass} failed: {$error}");
    }

    public static function invalidData(string $rendererClass): static
    {
        return new static("Invalid data provided to {$rendererClass}");
    }
}
