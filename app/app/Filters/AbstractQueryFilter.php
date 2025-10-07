<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Класс фильтра на основе запроса.
 */
abstract class AbstractQueryFilter implements FilterInterface
{
    /**
     * Билдер.
     *
     * @var Builder
     */
    protected Builder $builder;

    /**
     * Разделитель параметров.
     *
     * @var string
     */
    private string $paramsDelimiter = ',';

    /**
     * Разделитель сегметов даты.
     *
     * @var string
     */
    private string $dateDelimiter = '-';

    /**
     * Формат даты.
     *
     * @var string
     */
    private string $dateFormat = "Y-m-d";

    /**
     * Возвращает массив фильтров.
     *
     * @return array
     */
    abstract public function filters(): array;

    /**
     * Применяет фильтры.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value], function ($value) {
                    return $value !== null && $value !== '';
                }));
            }
        }

        return $this->builder;
    }

    /**
     * Форматирует даты.
     *
     * @param string $date
     * @param string $field
     * @return Builder
     */
    protected function formatDateRange(string $date, string $field): Builder
    {
        $dateExploded = explode($this->dateDelimiter, $date);
        $date = [
            date($this->dateFormat, strtotime($dateExploded[0])),
            date($this->dateFormat, strtotime($dateExploded[1])) . ' 23:59:59'
        ];
        return $this->builder->where($field, ">=", $date[0])->where($field, "<=", $date[1]);
    }

    /**
     * Прeобразовывает параметры в массив.
     *
     * @param $param
     * @return array
     */
    protected function paramToArray($param): array
    {
        return explode($this->paramsDelimiter, $param);
    }
}
