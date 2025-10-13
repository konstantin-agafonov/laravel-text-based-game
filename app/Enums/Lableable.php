<?php

namespace App\Enums;

/**
 * Interface for enums providing a display label.
 */
interface Lableable
{
    /**
     * Returns the display label.
     *
     * @return string
     */
    public function label(): string;
}
