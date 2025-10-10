<?php

namespace App\Dto;

use Illuminate\Http\Request;
use RuntimeException;
use Throwable;

/**
 * Abstract request transformer.
 * 
 * Provides base functionality for transforming HTTP requests to DTOs.
 */
abstract class AbstractRequestTransformer
{
    /**
     * Assert that a field exists in the request.
     *
     * @param string $name The field name to check
     * @param Request $request The HTTP request instance
     * @return void
     * @throws Throwable If the field does not exist
     */
    public function assertFieldExist(string $name, Request $request): void
    {
        throw_if(
            $request->$name === null,
            new RuntimeException('Field' . ' ' . $name . ' ' . 'not filled')
        );
    }

    /**
     * Assert that multiple fields exist in the request array.
     *
     * @param string $fieldName The array field name
     * @param array<string> $keys The field names to check
     * @param Request $request The HTTP request instance
     * @return void
     * @throws Throwable If any field does not exist
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
