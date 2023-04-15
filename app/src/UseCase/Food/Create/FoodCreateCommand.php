<?php

namespace App\UseCase\Food\Create;

class FoodCreateCommand
{
    public function __construct(
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
