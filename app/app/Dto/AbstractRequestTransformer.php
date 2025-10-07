<?php

namespace App\Dto;

use Illuminate\Http\Request;
use RuntimeException;
use Throwable;

/**
 * Абстрактный трансформер.
 */
abstract class AbstractRequestTransformer
{
    /**
     * Проверка полей запроса.
     *
     * @param string $name Название поля
     * @param Request $request Запрос
     * @return void
     * @throws Throwable
     */
    public function assertFieldExist(string $name, Request $request): void
    {
        throw_if(
            $request->$name === null,
            new RuntimeException('Field' . ' ' . $name . ' ' . 'not filled')
        );
    }

    /**
     * Проверка массива полей.
     *
     * @param string $fieldName Название массива
     * @param array $keys Названия полей
     * @param Request $request Запрос
     * @return void
     * @throws Throwable
     */
    public function assertFieldArrayExist(string $fieldName, array $keys, Request $request): void
    {
        foreach ($keys as $field) {
            throw_if(
                !$request->has($fieldName) || !array_key_exists($field, $request->$fieldName),
                new RuntimeException('Field' . ' ' . $field . ' ' . 'not filled')
            );
        }
    }
}
