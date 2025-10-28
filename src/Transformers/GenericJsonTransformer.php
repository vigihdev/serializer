<?php

declare(strict_types=1);

namespace Serializer\Transformers;

use Serializer\Exception\TransformerException;

final class GenericJsonTransformer extends AbstractJsonTransformer
{

    public function __construct(
        private readonly string $dtoClass
    ) {
        parent::__construct();
    }

    /**
     * @throws TransformerException
     */
    public function transformJson(string $json): object
    {
        if (!$this->validateJson($json)) {
            throw TransformerException::invalidJson('Invalid format for single object');
        }

        try {
            return $this->serializer->deserialize($json, $this->dtoClass, 'json');
        } catch (\Throwable $e) {
            throw TransformerException::deserializationFailed($this->dtoClass, $e->getMessage());
        }
    }

    /**
     * @throws TransformerException
     */
    public function transformArrayJson(string $json): array
    {
        if (!$this->validateArrayJson($json)) {
            throw TransformerException::invalidJson('Invalid format for array');
        }

        try {
            return $this->serializer->deserialize($json, $this->dtoClass . '[]', 'json');
        } catch (\Throwable $e) {
            throw TransformerException::deserializationFailed($this->dtoClass . '[]', $e->getMessage());
        }
    }

    public function transformWithFile(string $filepath): object|array
    {
        try {
            return $this->transformFromFile($filepath);
        } catch (\Throwable $e) {
            throw new TransformerException("Transform file error: {$e->getMessage()}");
        }
    }
}
