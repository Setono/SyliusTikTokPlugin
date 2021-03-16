<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $configuration = $menu->getChild('marketing');

        if (null !== $configuration) {
            $this->addChild($configuration);
        } else {
            $this->addChild($menu->getFirstChild());
        }
    }

    private function addChild(ItemInterface $item): void
    {
        $item
            ->addChild('tiktok', [
                'route' => 'setono_sylius_tiktok_admin_pixel_index',
            ])
            ->setLabel('setono_sylius_tiktok.ui.tiktok')
            ->setLabelAttribute('icon', 'video');
    }
}
