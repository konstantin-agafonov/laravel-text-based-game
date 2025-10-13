<?php declare(strict_types=1);

namespace App\Enums\Traits;

/**
 * Трейт получения перечисления в виде массива.
 */
trait ToArrayTrait
{
    /**
     * Возвращает ассоциативный массив.
     *
     * @return array
     */
    public static function toArray(): array
    {
        $array = [];

        foreach (self::cases() as $case) {
            $array[$case->value] = $case->label();
        }

        return $array;
    }
}