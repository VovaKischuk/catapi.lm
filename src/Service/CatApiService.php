<?php

declare(strict_types=1);

namespace App\Service;

class CatApiService
{
    protected function isStatusCodeSuccessful(int $statusCode): bool
    {
        return $statusCode >= 200 && $statusCode < 300;
    }
}