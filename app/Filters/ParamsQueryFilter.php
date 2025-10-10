<?php

namespace App\Filters;

/**
 * Parameter-based filter class.
 * 
 * Filters queries based on provided parameters array.
 */
class ParamsQueryFilter extends AbstractQueryFilter
{
    /**
     * The filter parameters.
     *
     * @var array<string, mixed>
     */
    private array $params;

    /**
     * Create a new parameter-based filter instance.
     *
     * @param array<string, mixed> $params The filter parameters
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Get the filter parameters.
     *
     * @return array<string, mixed> The filter parameters
     */
    public function filters(): array
    {
        return $this->params;
    }
}
