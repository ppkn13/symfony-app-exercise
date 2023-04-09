<?php

namespace App\Entity\Food;

class Food
{
    public function __construct(
        public readonly FoodId $id,
        public readonly string $name,
        public readonly int    $unitWeight,
        public readonly float  $calorie,
        public readonly float  $protein,
        public readonly float  $fat,
        public readonly float  $carbohydrate,
    ){}


    public function calculateCalorie($weight): float
    {
        $calorie = $weight * ($this->calorie / $this->unitWeight);
        return round($calorie, 2);
    }

    public function calculateProtein($weight): float
    {
        $protein = $weight * ($this->protein / $this->unitWeight);
        return round($protein, 2);
    }

    public function calculateFat($weight): float
    {
        $fat = $weight * ($this->fat / $this->unitWeight);
        return round($fat, 2);
    }

    public function calculateCarbohydrate($weight): float
    {
        $carbohydrate = $weight * ($this->carbohydrate / $this->unitWeight);
        return round($carbohydrate, 2);
    }
}
