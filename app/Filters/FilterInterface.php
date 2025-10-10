<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Filter interface.
 * 
 * Defines the contract for query filter implementations.
 */
interface FilterInterface
{
    /**
     * Get the filter parameters.
     *
     * @return array<string, mixed> The filter parameters
     */
    public function filters(): array;

    /**
     * Apply the filter to the query builder.
     *
     * @param Builder $builder The query builder instance
     * @return Builder The modified query builder
     */
    public function apply(Builder $builder): Builder;
}
