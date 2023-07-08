<?php

namespace App\InMemoryRepository;

use App\Entity\Food\Food;
use App\Entity\Food\FoodId;
use App\Entity\Food\IFoodRepository;

class InMemoryFoodRepository implements IFoodRepository
{
    private $db = [];

    public function find(FoodId $foodId): Food
    {
        return isset($this->db[(string)$foodId]) ? $this->db[(string)$foodId] : null;
    }

    public function save(Food $food): void
    {
        $this->db[(string)$food->id] = clone $food;
    }
}

