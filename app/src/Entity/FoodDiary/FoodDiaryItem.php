<?php

namespace App\Entity\FoodDiary;

use App\Entity\Food\FoodId;

class FoodDiaryItem
{
    public function __construct(
        public readonly FoodId $foodId,
        public readonly string $name,
        public readonly int $amount,
        public readonly float  $calorie,
        public readonly float  $protein,
        public readonly float  $fat,
        public readonly float  $carbohydrate,
    )
    {
    }

}