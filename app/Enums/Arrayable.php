<?php

namespace App\Enums;

/**
 * Interface for enums that can be represented as an array.
 */
interface Arrayable
{
    /**
     * Returns an associative array of backing values => labels.
     *
     * @return array
     */
    public static function toArray(): array;
}