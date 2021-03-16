<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\EventListener;

use Setono\SyliusTikTokPlugin\Tag\Tags;
use Setono\TagBag\Tag\TagInterface;
use Setono\TagBag\Tag\TwigTag;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class AddLibrarySubscriber extends TagSubscriber
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                'add',
            ],
        ];
    }

    public function add(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if (!$event->isMasterRequest() || !$this->isShopContext($request)) {
            return;
        }

        // Only add the library on 'real' page loads, not AJAX requests like add to cart
        if ($request->isXmlHttpRequest()) {
            return;
        }

        if (!$this->hasPixels()) {
            return;
        }

        $this->tagBag->addTag(
            (new TwigTag('@SetonoSyliusTikTokPlugin/tag/library.html.twig', [
                'pixels' => $this->getPixels(),
            ]))
                ->setSection(TagInterface::SECTION_HEAD)
                ->setName(Tags::TAG_LIBRARY)
        );
    }
}
