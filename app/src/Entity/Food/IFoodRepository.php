<?php

namespace App\Entity\Food;

interface IFoodRepository
{
    // NOTE 戻り値にFoodを指定したいがDoctrineBundleのEntityRepositoryに依存しているため指定できない
    public function find(FoodId $foodId);

    public function save(Food $food): void;
}
