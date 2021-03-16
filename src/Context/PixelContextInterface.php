<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\Context;

use Setono\SyliusTikTokPlugin\Model\PixelInterface;

interface PixelContextInterface
{
    /**
     * Returns the pixels enabled for the active channel
     *
     * @return array<array-key, PixelInterface>
     */
    public function getPixels(): array;
}
