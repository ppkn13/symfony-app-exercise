<?php

namespace App\Repository;

use App\Entity\Food\Food;
use App\Entity\FoodDiary\FoodDiary;
use App\Entity\FoodDiary\IFoodDiaryRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FoodDiaryRepository extends ServiceEntityRepository implements IFoodDiaryRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FoodDiary::class);
    }

    public function save(FoodDiary $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // public function find($id, $lockMode = null, $lockVersion = null): FoodDiary
    // {
    //     return parent::find($id, $lockMode = null, $lockVersion = null);
    // }
}
