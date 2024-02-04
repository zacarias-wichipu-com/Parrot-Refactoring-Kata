<?php

declare(strict_types=1);

namespace Parrot;

final readonly class ParrotIncubator
{
    public static function hatchAParrot(
        ParrotType $type,
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ): Parrot {
        return match ($type) {
            ParrotType::EUROPEAN => new EuropeanParrot(),
            ParrotType::AFRICAN => new AfricanParrot(numberOfCoconuts: $numberOfCoconuts),
            ParrotType::NORWEGIAN_BLUE => new NorwegianBlueParrot(voltage: $voltage, isNailed: $isNailed),
        };
    }
}
