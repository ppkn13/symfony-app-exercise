<?php

namespace App\Entity\Food;

use App\Repository\FoodRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoodRepository::class)]
class Food
{
    public function __construct(
        #[ORM\Id]
        #[ORM\GeneratedValue(strategy: 'NONE')]
        #[ORM\Column(type: 'food_id')]
        public readonly FoodId $id,
        #[ORM\Column(length: 255)]
        public readonly string $name,
        #[ORM\Column]
        public readonly int    $unitWeight,
        #[ORM\Column]
        public readonly float  $calorie,
        #[ORM\Column]
        public readonly float  $protein,
        #[ORM\Column]
        public readonly float  $fat,
        #[ORM\Column]
        public readonly float  $carbohydrate,
    )
    {
    }

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
