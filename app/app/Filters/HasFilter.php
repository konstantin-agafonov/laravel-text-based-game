<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Filter interface for models.
 */
interface HasFilter
{
    /**
     * Filter.
     *
     * @param Builder $builder Builder
     * @param FilterInterface $filter Filter
     * @return Builder
     */
    public function scopeFiltered(Builder $builder, FilterInterface $filter): Builder;
}
