<?php

namespace App\Enums;

/**
 * Interface for enums that expose backing value by case name.
 */
interface ValueByNameInterface
{
    /**
     * Returns backing value by case name.
     *
     * @param string $name Enum case name
     * @return int
     */
    public static function getValueByName(string $name): int;
}