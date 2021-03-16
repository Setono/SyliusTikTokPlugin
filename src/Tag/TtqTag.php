<?php

declare(strict_types=1);

namespace Setono\SyliusTikTokPlugin\Tag;

use Setono\SyliusTikTokPlugin\DTO\DTO;
use Setono\TagBag\Tag\TwigTag;

class TtqTag extends TwigTag implements TtqTagInterface
{
    private string $event;

    private ?DTO $dto;

    public function __construct(string $event, DTO $dto = null)
    {
        parent::__construct('@SetonoSyliusTikTokPlugin/tag/event.html.twig');

        $this->event = $event;
        $this->dto = $dto;
    }

    public function getContext(): array
    {
        return $this->getParameters();
    }

    protected function getParameters(): array
    {
        $ret = ['event' => $this->event];

        if (null !== $this->dto) {
            $ret['parameters'] = $this->dto->toJson();
        }

        return $ret;
    }
}
