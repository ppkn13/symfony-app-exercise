<?php

namespace App\Entity\FoodDiary;

use DateTimeImmutable;

class Date
{
    public function __construct(public readonly DateTimeImmutable $date)
    {}

    public function __toString(): string
    {
        return $this->date->format('Y-m-d');
    }
}