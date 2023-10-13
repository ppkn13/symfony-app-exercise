<?php

namespace App\InMemoryRepository;

use App\Entity\FoodDiary\Date;
use App\Entity\FoodDiary\FoodDiary;
use App\Entity\FoodDiary\IFoodDiaryRepository;

class InMemoryFoodDiaryRepository implements IFoodDiaryRepository
{
    private $db = [];

    public function find(Date $date): ?FoodDiary
    {
        $id = (string)$date;
        return isset($this->db[$id]) ? $this->db[$id] : null;
    }

    public function save(FoodDiary $foodDiary): void
    {
        $id = (string)$foodDiary->date;
        $this->db[(string)$id] = clone $foodDiary;
    }
}
