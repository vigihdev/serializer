<?php

declare(strict_types=1);

namespace Serializer\Factory;

use Serializer\Contracts\TransformerContract;
use Serializer\Transformers\GenericJsonTransformer;

final class JsonTransformerFactory
{

    public static function create(string $dtoClass): TransformerContract
    {
        return new GenericJsonTransformer($dtoClass);
    }
}
