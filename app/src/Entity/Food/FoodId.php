<?php

namespace App\Entity\Food;

final class FoodId
{
    public function __construct(private readonly string $id)
    {}

    public function getId(): string
    {
        return $this->id;
    }
}