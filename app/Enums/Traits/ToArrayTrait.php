<?php declare(strict_types=1);

namespace App\Enums\Traits;

/**
 * Trait to convert an enum to an associative array.
 */
trait ToArrayTrait
{
    /**
     * Returns an associative array of backing values => labels.
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