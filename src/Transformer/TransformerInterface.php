<?php

namespace App\Transformer;

interface TransformerInterface
{
    public function transform(mixed $data): array;

    public function getIncludes(): array;
}
