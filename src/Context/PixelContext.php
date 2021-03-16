<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\Context;

use Setono\SyliusTikTokPlugin\Model\PixelInterface;
use Setono\SyliusTikTokPlugin\Repository\PixelRepositoryInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;

final class PixelContext implements PixelContextInterface
{
    /**
     * Caches pixel
     *
     * @var array<array-key, PixelInterface>|null
     */
    private ?array $pixels = null;

    private ChannelContextInterface $channelContext;

    private PixelRepositoryInterface $propertyRepository;

    public function __construct(ChannelContextInterface $channelContext, PixelRepositoryInterface $propertyRepository)
    {
        $this->channelContext = $channelContext;
        $this->propertyRepository = $propertyRepository;
    }

    public function getPixels(): array
    {
        if (null === $this->pixels) {
            $this->pixels = $this->propertyRepository->findEnabledByChannel($this->channelContext->getChannel());
        }

        return $this->pixels;
    }
}
