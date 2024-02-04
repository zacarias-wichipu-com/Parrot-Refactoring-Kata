<?php

declare(strict_types=1);

namespace Parrot;

final readonly class NorwegianBlueParrot implements Parrot
{
    const float BASE_SPEED = 12.0;
    const float MAX_SPEED = 24.0;
    const string CRY = 'Bzzzzzz';
    const string SILENCE = '...';

    public function __construct(
        private float $voltage,
        private bool $isNailed
    ) {
    }

    public function getSpeed(): float
    {
        return $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage);
    }

    public function getCry(): string
    {
        return $this->voltage > 0 ? self::CRY : self::SILENCE;
    }

    private function getBaseSpeedWith(float $voltage): float
    {
        return min(self::MAX_SPEED, $voltage * self::BASE_SPEED);
    }
}
