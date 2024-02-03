<?php

declare(strict_types=1);

namespace Parrot;

final readonly class GenericParrot implements Parrot
{
    private function __construct(
        private ParrotType $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {
    }

    public static function hatchAParrot(
        ParrotType $type,
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ): Parrot {
        return match ($type) {
            ParrotType::EUROPEAN => new EuropeanParrot(),
            ParrotType::AFRICAN => new self(
                type: $type,
                numberOfCoconuts: $numberOfCoconuts,
                voltage: $voltage,
                isNailed: $isNailed
            ),
            ParrotType::NORWEGIAN_BLUE => new self(
                type: $type,
                numberOfCoconuts: $numberOfCoconuts,
                voltage: $voltage,
                isNailed: $isNailed
            ),
        };
    }

    public function getSpeed(): float
    {
        return match ($this->type) {
            ParrotType::EUROPEAN => $this->getBaseSpeed(),
            ParrotType::AFRICAN => max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts),
            ParrotType::NORWEGIAN_BLUE => $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage),
        };
    }

    public function getCry(): string
    {
        return match ($this->type) {
            ParrotType::EUROPEAN => 'Sqoork!',
            ParrotType::AFRICAN => 'Sqaark!',
            ParrotType::NORWEGIAN_BLUE => $this->voltage > 0 ? 'Bzzzzzz' : '...',
        };
    }

    private function getBaseSpeedWith(float $voltage): float
    {
        return min(24.0, $voltage * $this->getBaseSpeed());
    }

    private function getLoadFactor(): float
    {
        return 9.0;
    }

    private function getBaseSpeed(): float
    {
        return 12.0;
    }
}
