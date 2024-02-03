<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

final readonly class GenericParrot implements Parrot
{
    public function __construct(
        private ParrotType $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {
    }

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return match ($this->type) {
            ParrotType::EUROPEAN => $this->getBaseSpeed(),
            ParrotType::AFRICAN => max(
                0,
                $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts
            ),
            ParrotType::NORWEGIAN_BLUE => $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage),
            default => throw new Exception('Should be unreachable'),
        };
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return match ($this->type) {
            ParrotType::EUROPEAN => 'Sqoork!',
            ParrotType::AFRICAN => 'Sqaark!',
            ParrotType::NORWEGIAN_BLUE => $this->voltage > 0 ? 'Bzzzzzz' : '...',
            default => throw new Exception('Should be unreachable'),
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
