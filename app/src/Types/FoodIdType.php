<?php

namespace App\Types;

use App\Entity\Food\FoodId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class FoodIdType extends Type
{
    const FOOD_ID = 'food_id';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    public function getName(): string
    {
        return self::FOOD_ID;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->id;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): FoodId
    {
        return new FoodId($value);
    }
}
