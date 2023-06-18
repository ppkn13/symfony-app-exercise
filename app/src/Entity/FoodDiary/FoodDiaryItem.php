<?php

namespace App\Entity\FoodDiary;

use App\Entity\Food\FoodId;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'food_diary_items')]
class FoodDiaryItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column()]
    private int $id;

    #[ORM\ManyToOne(
        targetEntity: 'FoodDiary',
        inversedBy: 'items'
    )]
    #[ORM\JoinColumn(name: 'date', referencedColumnName: 'date')]
    private FoodDiary $foodDiary;

    public function __construct(
        #[ORM\Column(type: 'food_id')]
        public readonly FoodId $foodId,
        #[ORM\Column(length: 255)]
        public readonly string $name,
        #[ORM\Column(type: 'integer')]
        public readonly int $amount,
        #[ORM\Column]
        public readonly float  $calorie,
        #[ORM\Column]
        public readonly float  $protein,
        #[ORM\Column]
        public readonly float  $fat,
        #[ORM\Column]
        public readonly float  $carbohydrate,
    )
    {
    }

}