<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Filter trait for models.
 * 
 * Provides filtering functionality to models.
 *
 * @method static Builder filtered(FilterInterface $filter)
 */
trait InteractsWithFilter
{
    /**
     * Apply a filter to the query builder.
     *
     * @param Builder $builder The query builder instance
     * @param FilterInterface $filter The filter to apply
     * @return Builder The modified query builder
     */
    public function scopeFiltered(Builder $builder, FilterInterface $filter): Builder
    {
        return $filter->apply($builder);
    }
}
