<?php

declare(strict_types=1);

namespace Parrot;

interface Parrot
{
    public function getSpeed(): float;

    public function getCry(): string;
}
