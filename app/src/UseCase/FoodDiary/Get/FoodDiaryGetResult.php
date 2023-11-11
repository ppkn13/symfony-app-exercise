<?php

namespace App\UseCase\FoodDiary\Get;

class FoodDiaryGetResult
{
    public function __construct(
        public readonly string $date,
    ) {}
}