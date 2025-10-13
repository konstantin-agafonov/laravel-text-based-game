<?php declare(strict_types=1);

namespace App\Enums\Traits;

use Error;

/**
 * Trait to obtain an enum backing value by its case name.
 */
trait ValueByNameTrait
{
    /**
     * Returns the backing value by case name.
     *
     * @param string $name Enum case name
     * @return int
     */
    public static function getValueByName(string $name): int
    {
        foreach (self::cases() as $case) {
            if (mb_strtoupper($name) === $case->name) {
                return $case->value;
            }
        }
        throw new Error( e($name . " is not a valid backing value for enum " . self::class) );
    }
}
