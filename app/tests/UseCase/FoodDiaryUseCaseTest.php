<?php

namespace App\Tests;

use App\Entity\Food\Food;
use App\Entity\Food\FoodId;
use App\Entity\FoodDiary\Date;
use App\Entity\FoodDiary\FoodDiary;
use App\InMemoryRepository\InMemoryFoodDiaryRepository;
use App\InMemoryRepository\InMemoryFoodRepository;
use App\UseCase\FoodDiary\AddItem\FoodDiaryAddItemCommand;
use DateTimeImmutable;
use App\UseCase\FoodDiary\FoodDiaryUseCase;
use PHPUnit\Framework\TestCase;

class FoodDiaryUseCaseTest extends TestCase
{
    public function test_addDiaryItem_FoodDiaryが未作成なら新規作成される()
    {
        // arrange
        $foodRepository = new InMemoryFoodRepository();
        $foodDiaryRepository = new InMemoryFoodDiaryRepository();
        $food = new Food(
            new FoodId('test'),
            'food',
            100,
            200,
            10,
            20,
            30
        );
        $foodRepository->save($food);
        $subject = new FoodDiaryUseCase(
            $foodDiaryRepository,
            $foodRepository
        );
        $command = new FoodDiaryAddItemCommand('2023/01/01', 'test', 10);

        // act
        $subject->addDiaryItem($command);

        // assert
        $actual = $foodDiaryRepository->find(new Date(new DateTimeImmutable('2023/01/01')));
        $this->assertInstanceOf(FoodDiary::class, $actual);
    }
}