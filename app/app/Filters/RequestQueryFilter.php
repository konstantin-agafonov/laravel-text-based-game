<?php

namespace App\Filters;

use Illuminate\Http\Request;

/**
 * Request-based filter class.
 * 
 * Filters queries based on HTTP request query parameters.
 */
class RequestQueryFilter extends AbstractQueryFilter
{
    /**
     * The HTTP request instance.
     *
     * @var Request
     */
    public Request $request;

    /**
     * Create a new request-based filter instance.
     *
     * @param Request $request The HTTP request instance
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the filter parameters from request query.
     *
     * @return array<string, mixed> The filter parameters
     */
    public function filters(): array
    {
        return (array) $this->request->query();
    }
}
