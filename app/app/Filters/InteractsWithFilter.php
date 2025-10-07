<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Трейт фильтра для моделей.
 *
 * @method static Builder filtered(FilterInterface $filter)
 */
trait InteractsWithFilter
{
    /**
     * Фильтр.
     *
     * @param Builder $builder Запрос
     * @param FilterInterface $filter Фильтр
     * @return Builder
     */
    public function scopeFiltered(Builder $builder, FilterInterface $filter): Builder
    {
        return $filter->apply($builder);
    }
}
