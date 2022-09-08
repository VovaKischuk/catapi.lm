<?php

namespace App\Transformer;

use DateTime;
use DateTimeInterface;

abstract class AbstractTransformer implements TransformerInterface
{
    public function getIncludes(): array
    {
        return [];
    }

    /**
     * Formats DateTime data into ISO 8601 string.
     */
    protected function formatDateTime(?DateTimeInterface $rawDatetime): ?string
    {
        if (!$rawDatetime) {
            return null;
        }
        $datetime = DateTime::createFromInterface($rawDatetime);

        return $datetime?->format(DateTime::ISO8601);
    }
}
