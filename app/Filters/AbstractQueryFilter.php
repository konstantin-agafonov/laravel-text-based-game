<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Abstract query filter class.
 * 
 * Provides base functionality for implementing query filters.
 */
abstract class AbstractQueryFilter implements FilterInterface
{
    /**
     * The query builder instance.
     *
     * @var Builder
     */
    protected Builder $builder;

    /**
     * The delimiter used for parsing parameter values.
     *
     * @var string
     */
    private string $paramsDelimiter = ',';

    /**
     * The delimiter used for parsing date segments.
     *
     * @var string
     */
    private string $dateDelimiter = '-';

    /**
     * The format used for date parsing.
     *
     * @var string
     */
    private string $dateFormat = "Y-m-d";

    /**
     * Get the array of filters to apply.
     *
     * @return array<string, mixed> The filter parameters
     */
    abstract public function filters(): array;

    /**
     * Apply all filters to the query builder.
     *
     * @param Builder $builder The query builder instance
     * @return Builder The modified query builder
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
     * Format and apply date range filter.
     *
     * @param string $date The date string to parse
     * @param string $field The database field name
     * @return Builder The modified query builder
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
     * Convert a parameter string to an array.
     *
     * @param string $param The parameter string
     * @return array<string> The parameter array
     */
    protected function paramToArray($param): array
    {
        return explode($this->paramsDelimiter, $param);
    }
}
