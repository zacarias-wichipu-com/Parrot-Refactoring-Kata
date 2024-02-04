<?php

declare(strict_types=1);

namespace Parrot;

final readonly class AfricanParrot implements Parrot
{
    public const float BASE_SPEED = 12.0;

    public const string CRY = 'Sqaark!';

    public const float LOAD_FACTOR = 9.0;

    public function __construct(
        private int $numberOfCoconuts,
    ) {
    }

    public function getSpeed(): float
    {
        return max(0, self::BASE_SPEED - self::LOAD_FACTOR * $this->numberOfCoconuts);
    }

    public function getCry(): string
    {
        return self::CRY;
    }
}
