<?php

namespace App\Types;

use App\Entity\FoodDiary\Date;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class FoodDiaryDateType extends Type
{
    const FOOD_DIARY_DATE = 'food_diary_date';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    public function getName(): string
    {
        return self::FOOD_DIARY_DATE;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return (string)$value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Date
    {
        return new Date(new \DateTimeImmutable($value));
    }
}
