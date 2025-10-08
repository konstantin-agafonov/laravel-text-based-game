<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Query-based filter class.
 */
abstract class AbstractQueryFilter implements FilterInterface
{
    /**
     * Builder.
     *
     * @var Builder
     */
    protected Builder $builder;

    /**
     * Parameter delimiter.
     *
     * @var string
     */
    private string $paramsDelimiter = ',';

    /**
     * Date segment delimiter.
     *
     * @var string
     */
    private string $dateDelimiter = '-';

    /**
     * Date format.
     *
     * @var string
     */
    private string $dateFormat = "Y-m-d";

    /**
     * Returns array of filters.
     *
     * @return array
     */
    abstract public function filters(): array;

    /**
     * Applies filters.
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
     * Formats dates.
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
     * Converts parameters to array.
     *
     * @param $param
     * @return array
     */
    protected function paramToArray($param): array
    {
        return explode($this->paramsDelimiter, $param);
    }
}
