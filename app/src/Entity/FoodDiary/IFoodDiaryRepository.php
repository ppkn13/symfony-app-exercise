<?php

namespace App\Entity\FoodDiary;

interface IFoodDiaryRepository
{
    public function find(Date $date);

    public function save(FoodDiary $foodDiary): void;
}
