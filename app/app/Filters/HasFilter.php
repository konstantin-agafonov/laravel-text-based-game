<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Интерфейс фильтра для моделей.
 */
interface HasFilter
{
    /**
     * Фильтр.
     *
     * @param Builder $builder Билдер
     * @param FilterInterface $filter Фильтр
     * @return Builder
     */
    public function scopeFiltered(Builder $builder, FilterInterface $filter): Builder;
}
