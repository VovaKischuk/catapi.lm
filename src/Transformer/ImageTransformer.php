<?php

namespace App\Transformer;

class ImageTransformer extends AbstractTransformer
{
    public function transform(mixed $data): array
    {
        return [
            'id' => $data->id ?? null,
            'url' => $data->url ?? null,
            'width' => $data->width ?? null,
            'height' => $data->height ?? null
        ];
    }
}