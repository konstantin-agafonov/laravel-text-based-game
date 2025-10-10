<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Filter interface for models.
 * 
 * Defines the contract for models that support filtering.
 */
interface HasFilter
{
    /**
     * Apply a filter to the model query.
     *
     * @param Builder $builder The query builder instance
     * @param FilterInterface $filter The filter to apply
     * @return Builder The modified query builder
     */
    public function scopeFiltered(Builder $builder, FilterInterface $filter): Builder;
}
