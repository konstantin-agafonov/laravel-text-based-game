<?php

namespace App\Dto;

use RuntimeException;
use Throwable;

/**
 * Abstract array to DTO transformer.
 * 
 * Provides base functionality for transforming arrays to DTOs.
 */
abstract class AbstractArrayTransformer
{
    /**
     * Assert that a field exists in the array.
     *
     * @param string $name The field name to check
     * @param array<string, mixed> $data The array to check
     * @return void
     * @throws Throwable If the field does not exist
     */
    public function assertFieldExist(string $name, array $data): void
    {

        throw_if(
            !array_key_exists($name, $data),
            new RuntimeException('Field' . ' ' . $name . ' ' . 'not filled')
        );
    }
}
