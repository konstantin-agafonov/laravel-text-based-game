<?php

namespace App\Dto;

use Illuminate\Http\Request;
use RuntimeException;
use Throwable;

/**
 * Abstract transformer.
 */
abstract class AbstractRequestTransformer
{
    /**
     * Check request fields.
     *
     * @param string $name Field name
     * @param Request $request Request
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
     * Check array of fields.
     *
     * @param string $fieldName Array name
     * @param array $keys Field names
     * @param Request $request Request
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
