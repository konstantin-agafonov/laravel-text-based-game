<?php

namespace App\Filters;

/**
 * Parameter-based filter class
 */
class ParamsQueryFilter extends AbstractQueryFilter
{
    /**
     * Parameters.
     *
     * @var array
     */
    private array $params;

    /**
     * Constructor.
     *
     * @param array $params Parameters
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Returns array of filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return $this->params;
    }
}
