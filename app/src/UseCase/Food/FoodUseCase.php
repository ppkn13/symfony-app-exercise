<?php

namespace App\UseCase\Food;

use App\Entity\Food\Food;
use App\Entity\Food\FoodId;
use App\Repository\FoodRepository;
use App\UseCase\Food\Create\FoodCreateCommand;
use App\UseCase\Food\Get\FoodGetCommand;
use App\UseCase\Food\Get\FoodGetResult;
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

    public function get(FoodGetCommand $command): FoodGetResult
    {
        $foodId = new FoodId($command->foodId);
        $food = $this->foodRepository->find($foodId);
        return new FoodGetResult(
            $food->id,
            $food->name,
            $food->unitWeight,
            $food->calorie,
            $food->protein,
            $food->fat,
            $food->carbohydrate
        );
    }
}
