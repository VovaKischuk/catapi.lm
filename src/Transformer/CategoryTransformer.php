<?php

namespace App\Transformer;

class CategoryTransformer extends AbstractTransformer
{
    public function transform(mixed $data): array
    {
        return [
            'id' => $data->id ?? null,
            'name' => $data->name ?? null
        ];
    }
}