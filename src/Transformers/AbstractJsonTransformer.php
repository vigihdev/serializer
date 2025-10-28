<?php

declare(strict_types=1);

namespace Serializer\Transformers;

use Serializer\Contracts\TransformerContract;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\{ObjectNormalizer, ArrayDenormalizer};
use Serializer\Exception\TransformerException;

abstract class AbstractJsonTransformer implements TransformerContract
{

    protected readonly Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [
            new ObjectNormalizer(
                null,
                null,
                new PropertyAccessor(),
                new PhpDocExtractor()
            ),
            new ArrayDenormalizer(),
        ];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    protected function isValidJson(string $json): bool
    {
        json_decode($json);
        return json_last_error() === JSON_ERROR_NONE;
    }

    protected function validateJson(string $json): bool
    {
        $json = trim($json);
        return substr($json, 0, 1) === '{' && substr($json, -1) === '}' && $this->isValidJson($json);
    }

    protected function validateArrayJson(string $json): bool
    {
        $json = trim($json);
        return substr($json, 0, 1) === '[' && substr($json, -1) === ']';
    }

    protected function transformFromFile(string $filePath): object|array
    {

        if (!file_exists($filePath)) {
            throw TransformerException::fileNotFound($filePath);
        }

        $jsonContent = file_get_contents($filePath);
        if ($jsonContent === false) {
            throw TransformerException::fileReadError($filePath);
        }

        if ($this->validateJson($jsonContent)) {
            return $this->transformJson($jsonContent);
        } else if ($this->validateArrayJson($jsonContent)) {
            return $this->transformArrayJson($jsonContent);
        }
        throw new \InvalidArgumentException("Invalid Json File : {$filePath}");
    }

    protected function transformFileAsObject(string $filePath): ?object
    {
        if (!file_exists($filePath)) {
            throw TransformerException::fileNotFound($filePath);
        }

        $jsonContent = file_get_contents($filePath);
        if (!$this->validateJson($jsonContent)) {
            throw TransformerException::invalidJson("Invalid Json File : {$filePath}");
        }

        try {
            return $this->transformJson($jsonContent);
        } catch (\Throwable $e) {
            throw TransformerException::fileReadError($e->getMessage());
        }
    }

    protected function transformFileAsArray(string $filePath): array
    {

        if (!file_exists($filePath)) {
            throw TransformerException::fileNotFound($filePath);
        }

        $jsonContent = file_get_contents($filePath);
        if (!$this->validateArrayJson($jsonContent)) {
            throw TransformerException::invalidJson("Invalid Json File : {$filePath}");
        }

        try {
            return $this->transformArrayJson($jsonContent);
        } catch (\Throwable $e) {
            throw TransformerException::fileReadError($e->getMessage());
        }
    }
}
