<?php

namespace App\Filters;

use Illuminate\Http\Request;

/**
 * Класс фильтра на основе запроса.
 */
class RequestQueryFilter extends AbstractQueryFilter
{
    /**
     * Запрос.
     *
     * @var Request
     */
    public Request $request;

    /**
     * Конструктор.
     *
     * @param Request $request Запрос
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Возвращает массив фильтров.
     *
     * @return array
     */
    public function filters(): array
    {
        return (array) $this->request->query();
    }
}
