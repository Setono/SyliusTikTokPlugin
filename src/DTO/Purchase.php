<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\DTO;

use Sylius\Component\Core\Model\OrderInterface;

final class Purchase extends DTO
{
    public string $currency;

    public float $value;

    public static function fromOrder(OrderInterface $order): self
    {
        return new self([
            'currency' => (string) $order->getCurrencyCode(),
            'value' => self::formatAmount($order->getTotal()),
        ]);
    }
}
