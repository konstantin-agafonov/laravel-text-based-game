<?php

namespace App\Filters;

/**
 * Класс фильтра на основе параметров
 */
class ParamsQueryFilter extends AbstractQueryFilter
{
    /**
     * Параметры.
     *
     * @var array
     */
    private array $params;

    /**
     * Конструктор.
     *
     * @param array $params Параметры
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Возвращает массив фильтров.
     *
     * @return array
     */
    public function filters(): array
    {
        return $this->params;
    }
}
