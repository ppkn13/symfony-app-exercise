<?php

namespace App\UseCase\FoodDiary;

use App\Entity\Food\FoodId;
use App\Entity\Food\IFoodRepository;
use App\Entity\FoodDiary\FoodDiary;
use App\Entity\FoodDiary\Date;
use App\Entity\FoodDiary\FoodDiaryItem;
use App\Entity\FoodDiary\IFoodDiaryRepository;
use App\UseCase\FoodDiary\AddItem\FoodDiaryAddItemCommand;
use App\UseCase\FoodDiary\Get\FoodDiaryGetCommand;
use App\UseCase\FoodDiary\Get\FoodDiaryGetResult;
use DateTimeImmutable;

class FoodDiaryUseCase
{
    public function __construct(
        private IFoodDiaryRepository $foodDiaryRepository,
        private IFoodRepository $foodRepository
    )
    {
    }

    public function get(FoodDiaryGetCommand $command): FoodDiaryGetResult
    {
        $date = new Date(new DateTimeImmutable($command->date));
        $foodDiary = $this->foodDiaryRepository->find($date);
        $result = (string)$foodDiary->date;
        return new FoodDiaryGetResult($result);
    }

    public function addDiaryItem(FoodDiaryAddItemCommand $command): void
    {
        $date = new Date(new DateTimeImmutable($command->date));
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
