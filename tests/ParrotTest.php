<?php

declare(strict_types=1);

namespace Parrot\Tests;

use Parrot\Parrot;
use Parrot\ParrotTypeEnum;
use PHPUnit\Framework\TestCase;

class ParrotTest extends TestCase
{
    public function testSpeedOfEuropeanParrot(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::EUROPEAN,
            numberOfCoconuts: 0,
            voltage: 0,
            isNailed: false
        );
        self::assertSame(12.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithOneCoconut(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::AFRICAN,
            numberOfCoconuts: 1,
            voltage: 0,
            isNailed: false
        );
        self::assertSame(3.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithTwoCoconuts(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::AFRICAN,
            numberOfCoconuts: 2,
            voltage: 0,
            isNailed: false
        );
        self::assertSame(0.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithNoCoconuts(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::AFRICAN,
            numberOfCoconuts: 0,
            voltage: 0,
            isNailed: false
        );
        self::assertSame(12.0, $parrot->getSpeed());
    }

    public function testSpeedNorwegianBlueParrotNailed(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::NORWEGIAN_BLUE,
            numberOfCoconuts: 0,
            voltage: 1.5,
            isNailed: true
        );
        self::assertSame(0.0, $parrot->getSpeed());
    }

    public function testSpeedNorwegianBlueParrotNotNailed(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::NORWEGIAN_BLUE,
            numberOfCoconuts: 0,
            voltage: 1.5,
            isNailed: false
        );
        self::assertSame(18.0, $parrot->getSpeed());
    }

    public function testSpeedNorwegianBlueParrotNotNailedHighVoltage(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::NORWEGIAN_BLUE,
            numberOfCoconuts: 0,
            voltage: 4,
            isNailed: false
        );
        self::assertSame(24.0, $parrot->getSpeed());
    }

    public function testAnUnknownParrotWillWillThrownAnException(): void
    {
        $this->expectExceptionMessage('Should be unreachable');
        $unknownParrot = new Parrot(
            type: -1,
            numberOfCoconuts: 0,
            voltage: 0,
            isNailed: false
        );
        $unknownParrot->getSpeed();
    }

    public function testGetCryOfEuropeanParrot(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::EUROPEAN,
            numberOfCoconuts: 0,
            voltage: 0,
            isNailed: false
        );
        self::assertSame('Sqoork!', $parrot->getCry());
    }

    public function testGetCryOfAfricanParrot(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::AFRICAN,
            numberOfCoconuts: 1,
            voltage: 0,
            isNailed: false
        );
        self::assertSame('Sqaark!', $parrot->getCry());
    }

    public function testGetCryOfNorwegianBlueHighVoltage(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::NORWEGIAN_BLUE,
            numberOfCoconuts: 0,
            voltage: 4,
            isNailed: false
        );
        self::assertSame('Bzzzzzz', $parrot->getCry());
    }

    public function testGetCryOfNorwegianBlueNoVoltage(): void
    {
        $parrot = $this->getParrot(
            type: ParrotTypeEnum::NORWEGIAN_BLUE,
            numberOfCoconuts: 0,
            voltage: 0,
            isNailed: false
        );
        self::assertSame('...', $parrot->getCry());
    }

    private function getParrot(int $type, int $numberOfCoconuts, float $voltage, bool $isNailed): Parrot
    {
        return new Parrot(
            type: $type,
            numberOfCoconuts: $numberOfCoconuts,
            voltage: $voltage,
            isNailed: $isNailed
        );
    }
}
