<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\DTO;

use Spatie\DataTransferObject\DataTransferObject;

abstract class DTO extends DataTransferObject
{
    protected static function formatAmount(int $amount): float
    {
        return round($amount / 100, 2);
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), \JSON_THROW_ON_ERROR);
    }
}
