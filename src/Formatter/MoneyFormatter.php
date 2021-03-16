<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\Formatter;

final class MoneyFormatter
{
    public function format(int $money): float
    {
        return round($money / 100, 2);
    }
}
