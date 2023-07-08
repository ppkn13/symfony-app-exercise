<?php

namespace App\InMemoryRepository;

use App\Entity\FoodDiary\FoodDiary;
use App\Entity\FoodDiary\IFoodDiaryRepository;

class InMemoryFoodDiaryRepository implements IFoodDiaryRepository
{
    private $db = [];

    public function find(\DateTimeImmutable $date): ?FoodDiary
    {
        $id = $date->format('Y/m/d');
        return isset($this->db[$id]) ? $this->db[$id] : null;
    }

    public function save(FoodDiary $foodDiary): void
    {
        $id = $foodDiary->date->format('Y/m/d');
        $this->db[$id] = clone $foodDiary;
    }
}
