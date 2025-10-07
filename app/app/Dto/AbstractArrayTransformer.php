<?php

namespace App\Dto;

use RuntimeException;
use Throwable;

/**
 * Абстрактный трансформер массива в DTO.
 */
abstract class AbstractArrayTransformer
{
    /**
     * Проверка полей массива.
     *
     * @param string $name Название поля
     * @param array $data Проверяемый массив
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
