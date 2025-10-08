<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Filter interface.
 */
interface FilterInterface
{
    /**
     * Returns set of parameters for filtering.
     *
     * @return array
     */
    public function filters(): array;

    /**
     * Applies filter.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder;
}
