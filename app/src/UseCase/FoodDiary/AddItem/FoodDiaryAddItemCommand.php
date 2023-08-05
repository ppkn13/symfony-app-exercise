<?php

namespace App\UseCase\FoodDiary\AddItem;

class FoodDiaryAddItemCommand
{
    public function __construct(
        public readonly string $date,
        public readonly string $foodId,
        public readonly int $amount
    )
    {
    }
}
