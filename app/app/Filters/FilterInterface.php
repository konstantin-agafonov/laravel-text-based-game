<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Интерфейс фильтра.
 */
interface FilterInterface
{
    /**
     * Возвращает набор параметров для фильтрации.
     *
     * @return array
     */
    public function filters(): array;

    /**
     * Применяет фильтр.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder;
}
