<?php

namespace App\Dto;

use RuntimeException;
use Throwable;

/**
 * Abstract array to DTO transformer.
 */
abstract class AbstractArrayTransformer
{
    /**
     * Check array fields.
     *
     * @param string $name Field name
     * @param array $data Array to check
     * @return void
     * @throws Throwable
     */
    public function assertFieldExist(string $name, array $data): void
    {

        throw_if(
            !array_key_exists($name, $data),
            new RuntimeException('Field' . ' ' . $name . ' ' . 'not filled')
        );
    }
}
