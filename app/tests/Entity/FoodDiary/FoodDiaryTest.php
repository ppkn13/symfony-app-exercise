<?php

namespace App\Tests;

use App\Entity\Food\FoodId;
use App\Entity\FoodDiary\Date;
use App\Entity\FoodDiary\FoodDiary;
use App\Entity\FoodDiary\FoodDiaryItem;
use PHPUnit\Framework\TestCase;

class FoodDiaryTest extends TestCase
{
    public function test_sumCalorie_カロリーの合計量を計算できる(): void
    {

        $subject = new FoodDiary(
            new Date(new \DateTimeImmutable()),
            [
                new FoodDiaryItem(new FoodId('dummy1'), 'dummy1', 100, 340, 10, 20, 30),
                new FoodDiaryItem(new FoodId('dummy2'), 'dummy2', 100, 37.74, 1.11, 2.22, 3.33),
            ]
        );

        $actual = $subject->sumCalorie();

        $this->assertSame(377.74, $actual);
    }

    public function test_sumProtein_タンパク質の合計量を計算できる(): void
    {
        $subject = new FoodDiary(
            new Date(new \DateTimeImmutable()),
            [
                new FoodDiaryItem(new FoodId('dummy1'), 'dummy1', 100, 340, 10, 20, 30),
                new FoodDiaryItem(new FoodId('dummy2'), 'dummy2', 100, 37.74, 1.11, 2.22, 3.33),
            ]
        );

        $actual = $subject->sumProtein();

        $this->assertSame(11.11, $actual);
    }

    public function test_sumFat_脂質の合計量を計算できる(): void
    {
        $subject = new FoodDiary(
            new Date(new \DateTimeImmutable()),
            [
                new FoodDiaryItem(new FoodId('dummy1'), 'dummy1', 100, 340, 10, 20, 30),
                new FoodDiaryItem(new FoodId('dummy2'), 'dummy2', 100, 37.74, 1.11, 2.22, 3.33),
            ]
        );

        $actual = $subject->sumFat();

        $this->assertSame(22.22, $actual);
    }

    public function test_sumCarbohydrate_炭水化物の合計量を計算できる(): void
    {
        $subject = new FoodDiary(
            new Date(new \DateTimeImmutable()),
            [
                new FoodDiaryItem(new FoodId('dummy1'), 'dummy1', 100, 340, 10, 20, 30),
                new FoodDiaryItem(new FoodId('dummy2'), 'dummy2', 100, 37.74, 1.11, 2.22, 3.33),
            ]
        );

        $actual = $subject->sumCarbohydrate();

        $this->assertSame(33.33, $actual);
    }
}