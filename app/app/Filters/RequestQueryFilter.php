<?php

namespace App\Filters;

use Illuminate\Http\Request;

/**
 * Request-based filter class.
 */
class RequestQueryFilter extends AbstractQueryFilter
{
    /**
     * Request.
     *
     * @var Request
     */
    public Request $request;

    /**
     * Constructor.
     *
     * @param Request $request Request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Returns array of filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return (array) $this->request->query();
    }
}
