<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\Tag;

use Setono\TagBag\Tag\TwigTagInterface;

interface TtqTagInterface extends TwigTagInterface
{
    public const EVENT_PURCHASE = 'Purchase';
}
