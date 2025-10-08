<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Filter trait for models.
 *
 * @method static Builder filtered(FilterInterface $filter)
 */
trait InteractsWithFilter
{
    /**
     * Filter.
     *
     * @param Builder $builder Query
     * @param FilterInterface $filter Filter
     * @return Builder
     */
    public function scopeFiltered(Builder $builder, FilterInterface $filter): Builder
    {
        return $filter->apply($builder);
    }
}
