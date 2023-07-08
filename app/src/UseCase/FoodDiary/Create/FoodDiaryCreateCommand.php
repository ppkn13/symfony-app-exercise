<?php

namespace App\UseCase\FoodDiary\Create;

class FoodDiaryCreateCommand
{
    public function __construct(
        public readonly string $date,
        public readonly string $foodId,
        public readonly int $amount
    )
    {
    }
}
