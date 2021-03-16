<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\Doctrine\ORM;

use Setono\SyliusTikTokPlugin\Model\PixelInterface;
use Setono\SyliusTikTokPlugin\Repository\PixelRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Channel\Model\ChannelInterface;
use Webmozart\Assert\Assert;

class PixelRepository extends EntityRepository implements PixelRepositoryInterface
{
    public function findEnabledByChannel(ChannelInterface $channel): array
    {
        $result = $this->createQueryBuilder('o')
            ->andWhere(':channel MEMBER OF o.channels')
            ->andWhere('o.enabled = true')
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getResult()
        ;

        Assert::isArray($result);
        Assert::allIsInstanceOf($result, PixelInterface::class);

        return $result;
    }
}
