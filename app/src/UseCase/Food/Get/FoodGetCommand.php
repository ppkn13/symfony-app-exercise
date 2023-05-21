<?php

namespace App\UseCase\Food\Get;

class FoodGetCommand
{
    public function __construct(
        public readonly string $foodId,
    )
    {
    }
}
