<?php

namespace App\UseCase\Food;

use App\Entity\Food\Food;
use App\Entity\Food\FoodId;
use App\Repository\FoodRepository;
use App\UseCase\Food\Create\FoodCreateCommand;
use Symfony\Component\Uid\Ulid;

class FoodUseCase
{
    public function __construct(private readonly FoodRepository $foodRepository)
    {
    }

    public function create(FoodCreateCommand $command): void
    {
        $food = new Food(
            new FoodId(Ulid::generate()),
            $command->name,
            $command->unitWeight,
            $command->calorie,
            $command->protein,
            $command->fat,
            $command->carbohydrate
        );
        $this->foodRepository->save($food, true);
    }
}
