<?php

namespace App\Entity\FoodDiary;

use DateTimeImmutable;

class FoodDiary
{
    public function __construct(
        public readonly DateTimeImmutable $date,
        /**
         * @var FoodDiaryItem[] $item
         */
        private array $items
    )
    {
    }

    public function add(FoodDiaryItem $item)
    {
        $this->items[] = $item;
    }

    public function sumCalorie(): float
    {
        return array_sum(array_map(function($item) {
            return $item->calorie;
        }, $this->items));
    }

    public function sumProtein(): float
    {
        return array_sum(array_map(function($item) {
            return $item->protein;
        }, $this->items));
    }

    public function sumFat(): float
    {
        return array_sum(array_map(function($item) {
            return $item->fat;
        }, $this->items));
    }

    public function sumCarbohydrate(): float
    {
        return array_sum(array_map(function($item) {
            return $item->carbohydrate;
        }, $this->items));
    }
}