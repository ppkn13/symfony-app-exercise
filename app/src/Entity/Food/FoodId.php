<?php

namespace App\Entity\Food;

final class FoodId
{
    public function __construct(public readonly string $id)
    {}

    public function __toString(): string
    {
        return $this->id;
    }
}