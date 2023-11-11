<?php

namespace App\UseCase\FoodDiary\Get;

class FoodDiaryGetCommand
{
    public function __construct(
        public readonly string $date,
    ) {}
}