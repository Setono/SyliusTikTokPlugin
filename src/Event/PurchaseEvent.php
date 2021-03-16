<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\Event;

use Setono\SyliusTikTokPlugin\DTO\Purchase;
use Sylius\Component\Core\Model\OrderInterface;

final class PurchaseEvent
{
    public Purchase $purchase;

    public OrderInterface $order;

    public function __construct(Purchase $purchase, OrderInterface $order)
    {
        $this->purchase = $purchase;
        $this->order = $order;
    }
}
