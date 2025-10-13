<?php declare(strict_types=1);

namespace App\Enums\Traits;

use Error;

/**
 * Трейт получения значения перечисления по имени.
 */
trait ValueByNameTrait
{
    /**
     * Возвращает значение по имени.
     *
     * @param string $name Имя перечисления
     * @return int
     */
    public static function getValueByName(string $name): int
    {
        foreach (self::cases() as $case) {
            if (mb_strtoupper($name) === $case->name) {
                return $case->value;
            }
        }
        throw new Error(e($name) . " is not a valid backing value for enum " . self::class);
    }
}
