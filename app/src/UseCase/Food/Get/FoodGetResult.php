<?php

namespace App\UseCase\Food\Get;

class FoodGetResult
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly int    $unitWeight,
        public readonly float  $calorie,
        public readonly float  $protein,
        public readonly float  $fat,
        public readonly float  $carbohydrate
    )
    {
    }
}
