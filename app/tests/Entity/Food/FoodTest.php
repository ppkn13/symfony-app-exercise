<?php

namespace App\Tests;

use App\Entity\Food\Food;
use App\Entity\Food\FoodId;
use PHPUnit\Framework\TestCase;

class FoodTest extends TestCase
{
    public function test_calculateCalorie_食品のカロリーを計算できる(): void
    {
        $food = new Food(new FoodId('1'), '鮭', 100, 198, 19.7, 12.4, 0.4);
        $this->assertSame(396.0, $food->calculateCalorie(200));
    }

    public function test_calculateProtein_食品のタンパク質量を計算できる(): void
    {
        $food = new Food(new FoodId('1'), '鮭', 100, 198, 19.7, 12.4, 0.4);
        $this->assertSame(39.4, $food->calculateProtein(200));
    }

    public function test_calculateFat_食品の脂質量を計算できる(): void
    {
        $food = new Food(new FoodId('1'), '鮭', 100, 198, 19.7, 12.4, 0.4);
        $this->assertSame(24.8, $food->calculateFat(200));
    }

    public function test_calculateCarbohydrate_食品の炭水化物量を計算できる(): void
    {
        $food = new Food(new FoodId('1'), '鮭', 100, 198, 19.7, 12.4, 0.4);
        $this->assertSame(0.8, $food->calculateCarbohydrate(200));
    }
}