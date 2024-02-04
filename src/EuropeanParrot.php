<?php

declare(strict_types=1);

namespace Parrot;

final readonly class EuropeanParrot implements Parrot
{
    const float BASE_SPEED = 12.0;
    const string CRY = 'Sqoork!';

    public function getSpeed(): float
    {
        return self::BASE_SPEED;
    }

    public function getCry(): string
    {
        return self::CRY;
    }
}
