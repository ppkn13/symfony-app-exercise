<?php

namespace App\Entity\FoodDiary;

interface IFoodDiaryRepository
{
    public function find(\DateTimeImmutable $date);

    public function save(FoodDiary $foodDiary): void;
}
