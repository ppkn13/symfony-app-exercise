<?php

namespace App\UseCase\FoodDiary;

use App\Entity\Food\FoodId;
use App\Entity\Food\IFoodRepository;
use App\Entity\FoodDiary\FoodDiary;
use App\Entity\FoodDiary\FoodDiaryItem;
use App\Entity\FoodDiary\IFoodDiaryRepository;
use App\UseCase\FoodDiary\Create\FoodDiaryCreateCommand;
use DateTimeImmutable;

class FoodDiaryUseCase
{
    public function __construct(
        private IFoodDiaryRepository $foodDiaryRepository,
        private IFoodRepository $foodRepository
    )
    {
    }

    public function addDiaryItem(FoodDiaryCreateCommand $command): void
    {
        $date = new DateTimeImmutable($command->date);
        $foodDiary = $this->foodDiaryRepository->find($date);
        if (is_null($foodDiary)) {
            $foodDiary = new FoodDiary($date, []);
        }

        $foodId = new FoodId($command->foodId);
        $food = $this->foodRepository->find($foodId);
        $foodDiaryItem = new FoodDiaryItem(
            $foodId,
            $food->name,
            $command->amount,
            $food->calculateCalorie($command->amount),
            $food->calculateProtein($command->amount),
            $food->calculateFat($command->amount),
            $food->calculateCarbohydrate($command->amount)
        );

        $foodDiary->add($foodDiaryItem);
        $this->foodDiaryRepository->save($foodDiary);
    }
}
